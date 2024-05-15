<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // if (Role::count() == 0) {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            // create roles and assign created permissions
            $arrayOfRoleNames =
                [
                    'REGIONAL MANAGER',
                    'HSC',
                ];

            $roles = collect($arrayOfRoleNames)->map(function ($role) {
                return ['name' => $role, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()];
            });

            $super_admin_role = Role::insert($roles->toArray());

        //}
    }
}
