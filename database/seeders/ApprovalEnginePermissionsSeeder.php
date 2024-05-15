<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

 class ApprovalEnginePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayOfPermissionNames =
        [
            'read approval request',
            'read approval appraisal',
            'read approval types',
            'read niwaexpresspaymentmodule',
            'read document approval',
            'approve or decline payments niwaexpresspaymentmodule',
            'approve or decline service applications documents',
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $super_admin_role = Role::find(1);
        $super_admin_role->givePermissionTo(Permission::all());
    }
}
