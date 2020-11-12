<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Arr;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\CreateRoleRequest;
use Modules\Auth\Http\Requests\UpdateRoleRequest;
use Modules\Auth\Http\Responses\Role\IndexResponse;
use Modules\Auth\Http\Responses\Role\StoreResponse;
use Modules\Auth\Http\Responses\Role\UpdateResponse;
use Modules\Auth\Repositories\RoleRepository;
use Nwidart\Modules\Routing\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Role $role)
    {
        $this->middleware('auth');
        $this->middleware(['permission:role-view|role-create|role-edit|role-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
        $this->model = new RoleRepository($role);
    }

    /**
     * Display a listing of the resource.
     * @return IndexResponse
     */
    public function index()
    {
        $roles = $this->model->allRolesByGuard($this->routePrefix);
        return new IndexResponse($roles);
    }


    public function create()
    {
        /*return view('auth::roles.create');*/
    }


    /**
     * Store a newly created resource in storage.
     * @param CreateRoleRequest $request
     * @return StoreResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();
        $input['guard_name'] = 'backend';
        $role = $this->model->create(Arr::except($input, ['permission', 'full-access']));
        if (isset($input['permission']))
            $role->syncPermissions($input['permission']);
        return new StoreResponse($role);
    }


    public function show()
    {
        return view('auth::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        /*$role = $this->model->getById($id);
        return new EditResponse($role);*/
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateRoleRequest $request
     * @param $id
     * @return UpdateResponse
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $input = $request->all();
        $role = $this->model->update($id, ['name' => $input['name']]);
        //$role = $this->model->update($id, array_except($input, ['permission', 'full-access']));
        if (isset($input['permission']))
            $role->syncPermissions($input['permission']);
        return new UpdateResponse($role);
    }


    public function destroy($id)
    {
        $role = $this->model->getById($id);
        $usersCount = User::role($role)->count();
        if ($usersCount > 0) {
            return redirect()->route('roles.index')
                ->with('failed', 'Role cannot be deleted. Users are found with this role.');
        } else {
            $this->model->delete($id);
            return redirect()->route('roles.index')
                ->with('success', 'Role deleted successfully.');
        }
    }
}
