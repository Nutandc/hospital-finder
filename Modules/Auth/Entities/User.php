<?php

namespace Modules\Auth\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use function is_string;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected static $ignoreChangedAttributes = ['remember_token', 'updated_at', 'avatar', 'super', 'status'];
    protected static $logAttributes = [
        'name', 'email', 'designation', 'phone', 'department.name'
    ];
    protected static $logName = 'User';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'super', 'status', 'avatar', 'designation', 'phone', 'department_id', 'location_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function applicationPermissions()
    {
        return ['backend-permission'];
    }

    public function isSuper()
    {
        return $this->super == 1;
    }

    public function assignRole($roles, string $guard = null)
    {
        $roles = is_string($roles) ? [$roles] : $roles;
        $guard = $guard ?: $this->getDefaultGuardName();
        $roles = collect($roles)
            ->flatten()
            ->map(function ($role) use ($guard) {
                $role = Role::findByName($role, $guard);
                return $this->getStoredRole($role);
            })
            ->each(function ($role) {
                $this->ensureModelSharesGuard($role);
            })
            ->all();

        $this->roles()->saveMany($roles);

        $this->forgetCachedPermissions();

        return $this;
    }

    protected function getStoredRole($role): Role
    {
        $roleClass = $this->getRoleClass();

        if (is_numeric($role)) {
            return $roleClass->findById($role, $this->getDefaultGuardName());
        }

        if (is_string($role)) {
            return $roleClass->findByName($role, $this->getDefaultGuardName());
        }

        if (is_a($role, get_class($roleClass))) {
            return $role;
        }

        return $role;
    }

    public function removeRole($role)
    {
        if (is_a($role, get_class($this->getRoleClass()))) {
            $this->roles()->detach($this->getStoredRole($role));
        } else {
            $this->roles()->detach($this->getStoredRole($role));
        }
        $this->load('roles');
    }

    public function hasAnyPermission(...$permissions): bool
    {
        if (is_array($permissions[0])) {
            $permissions = $permissions[0];
        }
        foreach ($permissions as $permission) {
            if ($this->can($permission)) {
                return true;
            }
        }

        return false;
    }


}
