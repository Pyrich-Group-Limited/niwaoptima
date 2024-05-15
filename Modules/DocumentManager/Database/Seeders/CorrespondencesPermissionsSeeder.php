<?php

namespace Modules\DocumentManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CorrespondencesPermissionsSeeder extends Seeder
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
                'create correspondence',
                'read correspondence',
                'update correspondence',
                'delete correspondence',
                'assign correspondence to department',
                'read department-correspondence memo Assigned',
                'delete correspondence-department memo Assigned',
                'assign correspondence to users',
                'read user-correspondence  memo Assigned',
                'delete correspondence-user   memo Assigned',
                'add comment to correspondence'
            ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());

        // Assign permissions to Super admin role
        $super_admin_role = Role::first();
        $super_admin_role->givePermissionTo(Permission::all());
    }
}
