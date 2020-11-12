<?php

namespace App\Providers;

use Dompdf\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        Gate::before(function ($user, $ability) {
            if ($user->isSuper()) {
                return true;
            }
        });

        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                $guard = $this->getCurrentGuard(Auth::guard()->getName());
                try {
                    return $user->hasPermissionTo($permission->name, $guard);
                } catch (PermissionDoesNotExist $permissionDoesNotExist) {
                    return false;
                }catch (\Exception $ex){
                    return false;
                }
            });
        }

    }

    protected function getPermissions()
    {
        try{
            return Permission::with('roles')->get();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getCurrentGuard($guardName)
    {
        $guards = array_keys(config('auth.guards'));
        foreach ($guards as $guard) {
            if (strpos($guardName, 'login_' . $guard) !== false) {
                return $guard;
            }
        }

    }
}
