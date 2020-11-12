<?php

namespace Modules\Backend\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\CreateUserRequest;
use Modules\Auth\Http\Requests\UpdateProfileRequest;
use Modules\Auth\Http\Requests\UpdateUserRequest;
use Modules\Auth\Http\Responses\User\IndexResponse;
use Modules\Auth\Http\Responses\User\ShowResponse;
use Modules\Auth\Http\Responses\User\StoreResponse;
use Modules\Auth\Http\Responses\User\UpdateResponse;
use Modules\Auth\Repositories\RoleRepository;
use Modules\Auth\Repositories\UserRepository;
use Nwidart\Modules\Routing\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $routePrefix = 'backend';
    protected $repository, $role;

    public function __construct(User $user, Role $role)
    {
        $this->middleware('auth');
        $this->middleware(['permission:user-view|user-create|user-edit|user-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:user-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);
        $this->repository = new UserRepository($user);
        $this->role = new RoleRepository($role);
    }

    /**
     * Display a listing of the resource.
     * @return IndexResponse
     */
    public function index()
    {
        $users = $this->repository->getAll()->sortByDesc('created_at');
        $roles = $this->role->allRolesByGuard($this->routePrefix);
        if (!Auth::user()->isSuper())
            $users = $users->where('super', false)->sortByDesc('created_at');
        return new IndexResponse($users, $roles, $this->routePrefix);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateUserRequest $request
     * @return StoreResponse
     */
    public function store(CreateUserRequest $request)
    {
//        $systemPermission = $this->repository->getSystemPermissionByRoutePrefix($this->routePrefix);
        $password_generated = Str::random(10);
        $request->request->add(['password_generated' => $password_generated]);
        $input = $request->all();
        $user = $this->repository->create($input);
//        $user->givePermissionTo($systemPermission);
        $user->assignRole($this->role->getById($input['roles'])->name, $this->routePrefix);
        return new StoreResponse($user, $password_generated);
    }

    /**
     * Show the specified resource.
     * @return ShowResponse
     */
    public function show($id)
    {
        $user = $this->repository->getById($id);
        return new ShowResponse($user);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $request
     * @param  $id
     * @return UpdateResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->all();
        $user = $this->repository->getById($id);
        if (!isset($input['super']))
            $input['super'] = false;
        $user->update($input);
        //Log::info($user->getRoleNames()->first());
        $roles = $user->roles->where('guard_name', $this->routePrefix);
        foreach ($roles as $role) {
            $user->removeRole($role);
        }
        $user->assignRole($this->role->getById($input['roles'])->name, $this->routePrefix);
        return new UpdateResponse($user);

    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->repository->getById($id);
            $roles = $user->roles;
            $applicationPermission = User::applicationPermissions();
            $applicationPermission = array_diff($applicationPermission, [$this->routePrefix . '-permission']);
            if (!empty($applicationPermission)) {
                if ($user->hasAnyPermission($applicationPermission)) {
                    $this->repository->deleteFomApplication($id, $roles, $this->routePrefix);
                    DB::commit();
                    return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully');
                } else {
                    $this->repository->delete($id);
                    DB::commit();
                    return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully');
                }
            } else {
                $this->repository->delete($id);
                DB::commit();
                return redirect()->route('users.index')
                    ->with('success', 'User deleted successfully');
            }
        } catch (\PDOException $ex) {
            DB::rollBack();
            try {
                $user->status = false;
                $user->save();
                //$this->repository->deleteFomApplication($id, $roles, $this->routePrefix);
                DB::commit();
                return redirect()->route('users.index')
                    ->with('warning', 'The user cannot be deleted. Thus, the user has been inactivated.');
            } catch (\Exception $ex) {
                DB::rollBack();
                return redirect()->route('users.index')
                    ->with('failed', 'User cannot be deleted.');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('users.index')
                ->with('failed', 'User cannot be deleted.');
        }
    }


    public function profile()
    {
        $user = $this->repository->getById(Auth::user()->id);
        $locationRepo = new LocationRepository((new Location()));
        $selectDepartments = $this->department->selectDepartments();
        $selectLocations = $locationRepo->selectLocations();
        return view('auth::users.profile', compact('user', 'selectDepartments', 'selectLocations'));
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $input = $request->all();
        $user = $this->repository->getById($id);
        $user->update($input);
        return redirect()->route($this->routePrefix . '.profile')
            ->with('success', 'Profile updated successfully');
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar->getRealPath());
            $img->stream();
            Storage::disk('local')->put('/public/avatars/' . $filename, $img, 'public');
            $user = Auth::user();
            Storage::delete('/public/avatars/' . $user->avatar);
            $user->avatar = $filename;
            $user->save();
            return redirect()->route($this->routePrefix . '.profile')
                ->with('success', 'Profile image updated successfully');
        }
    }
}
