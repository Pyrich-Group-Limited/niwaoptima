<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddNewPermissionsSeeder extends Seeder
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
            'send documents to legal and procurement',
            'send documents to project management and procurement',
            'view project management',
            'access qgis and arcgis',
            'access iot for survey',
            'send documents to marine department',
            'send documents to survey department',
            'view and approve invoices',
            'view salary module',
            'access gifmis',
            'send documents to finance department',
            'access asset management vessel cargo data',
            'view crm module',
            'view finance and marine module',
            'access calendar event planner',
            'view all events calendar',
            'access  admin hr module leaveapproval',
            'view asset management',
            'send memo',
            'view and filter area officers data',
            'view debtors list',
            'view clients list',
            'view private jets list',
            'view operational locations list',
            'view marine dashboard',
            'view engineering dashboard',
            'view finance and account dashboards',
            'view audit dashboards',
            'view corporate affairs dashboards'
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        $super_admin_role = Role::find(1);
        $super_admin_role->givePermissionTo(Permission::all());
    }
}
