<?php

namespace Modules\Auth\Http\Responses\User;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class IndexResponse implements Responsable
{
    protected $users, $roles, $routePrefix;

    /**
     * IndexResponse constructor.
     * @param Collection $users
     */
    public function __construct(Collection $users, Collection $roles, $routePrefix)
    {
        if (Auth::user()->isSuper())
            $this->users = $users;
        else
            $this->users = $users->filter(function ($user) {
                return $user->super = 1;
            });
        $this->roles = $roles;
        $this->routePrefix = $routePrefix;
    }

    public function toResponse($request)
    {
        return view('auth::users.index')->with('users', $this->transformUsers())
            ->with('roles', $this->transformRoles());
    }

    public function transformUsers()
    {
        return $this->users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status,
                'roles' => $user->roles->where('guard_name', $this->routePrefix)->pluck('name')->toArray()
            ];
        });
    }

    public function transformRoles()
    {
        return $this->roles->map(function ($role) {
            return [
                $role->id,
                $role->name
            ];
        })->toAssoc();
    }
}
