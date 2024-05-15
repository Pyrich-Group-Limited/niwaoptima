<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportPermissionsSeeder extends Seeder
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
            'read account statement',
            'read invoice summary',
            'read bill summary',
            'read product stock',
            'read cash flow',
            'read income summary',
            'read expense summary',
            'approve or decline document niwaexpresspaymentmodule',
            'read tax summary'
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $super_admin_role = Role::find(1);
        $super_admin_role->givePermissionTo(Permission::all());
    }
}
