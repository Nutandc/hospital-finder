<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            RolesAndPermissionsSeeder::class,
            RolesAndPermissionsSeederAms::class,
            RolesAndPermissionsSeederOpm::class,
            UsersTableSeeder::class
        ]);
    }
}
