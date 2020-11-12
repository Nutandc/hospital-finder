<?php

namespace Modules\Auth\Repositories;

use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Spatie\Permission\Models\Permission;

class UserRepository extends Repository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        $attributes['password'] = $this->encryptPassword($attributes['password_generated']);
        return $this->model->create($attributes);
    }

    public function encryptPassword($password_generated)
    {
        return Hash::make($password_generated);
    }

    public function getSystemPermissionByRoutePrefix($routePrefix)
    {
        $permissionName = '';
        if ($routePrefix) {
                $permissionName = $routePrefix . '-permission';
        }

        return $permissionName;
    }

    public function getUsersByPermissionGaurd($permission, $guard)
    {
        return Permission::findByName($permission, $guard)->users;
    }

    public function selectUsers($users)
    {
        $selectUsers = [];
        foreach ($users as $user) {
            $selectUsers[$user->id] = $user->name;
        }
        return $selectUsers;
    }

    public function deleteFomApplication($id, $roles, $routePrefix)
    {
        $user = $this->getById($id);
        if ($routePrefix) {
            $roles = $roles->where('guard_name', $routePrefix);
            foreach ($roles as $role) {
                $user->removeRole($role);
            }
            $user->revokePermissionTo($routePrefix . '-permission');
        }
    }
}
