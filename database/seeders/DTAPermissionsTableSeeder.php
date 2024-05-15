<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DTAPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Reset cached roles and permissions
           // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $arrayOfPermissionNames =
                [
                    'approve as md leaveapproval',
                    ' approve as hod leaveapproval',
                    'approve as account',
                ];

            $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
                return ['name' => $permission, 'guard_name' => 'web'];
            });

            Permission::insert($permissions->toArray());

            // create roles and assign created permissions

            $super_admin_role = Role::find(1);
            $super_admin_role->givePermissionTo(Permission::all());

        
    }
}
