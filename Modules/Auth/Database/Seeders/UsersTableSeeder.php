<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Auth\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $superUser = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin',
                'password' => bcrypt('Admin321'),
                'super' => true,
                'status' => true
            ]);
        if (!$superUser->hasRole('Administrator'))
            $superUser->assignRole('Administrator', 'backend');

        if (!$superUser->hasPermissionTo('backend-permission'))
            $superUser->givePermissionTo('backend-permission');
    }
}
