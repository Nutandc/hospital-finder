<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 12/18/2018
 * Time: 11:45 AM
 */

namespace Modules\Auth\Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeederAms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        //app()['cache']->forget('spatie.permission.cache');

        // user permissions
        Permission::firstOrCreate(['name' => 'hospital-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'hospital-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'hospital-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'hospital-delete', 'guard_name' => 'backend']);
        // role permissions
        Permission::firstOrCreate(['name' => 'disease-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'disease-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'disease-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'disease-delete', 'guard_name' => 'backend']);

        //class permission
        Permission::firstOrCreate(['name' => 'symptom-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'symptom-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'symptom-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'symptom-delete', 'guard_name' => 'backend']);

        Permission::firstOrCreate(['name' => 'doctor-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'doctor-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'doctor-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'doctor-delete', 'guard_name' => 'backend']);

        Permission::firstOrCreate(['name' => 'user-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'user-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'user-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'user-delete', 'guard_name' => 'backend']);

        Permission::firstOrCreate(['name' => 'role-view', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'role-create', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'role-edit', 'guard_name' => 'backend']);
        Permission::firstOrCreate(['name' => 'role-delete', 'guard_name' => 'backend']);




        // create roles and assign created permissions
        $role = Role::firstOrCreate(['name' => 'Administrator', 'guard_name' => 'backend']);
        $permissions = Permission::where('guard_name', 'backend')->get();
        $role->syncPermissions($permissions);
    }
}
