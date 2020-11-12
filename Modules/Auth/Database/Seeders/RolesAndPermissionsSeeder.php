<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 12/19/2018
 * Time: 5:21 PM
 */

namespace Modules\Auth\Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::firstOrCreate(['name' => 'backend-permission']);
        $role = Role::firstOrCreate(['name' => 'Administrator', 'guard_name' => 'backend']);
        $permissions = Permission::where('guard_name', 'backend')->get();
        $role->syncPermissions($permissions);
    }
}
