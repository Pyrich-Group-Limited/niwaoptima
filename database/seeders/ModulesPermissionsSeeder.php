<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModulesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        // Define permissions
        $permissions = [
            'view user management module',
            'view service applications module',
            'view approval module',
            'view service applications setup module',
            'view operational task module',
            'view my task module',
            'view asset management module',
            'view incoming documents module',
            'view incoming documents',
            'view overview module',
            'view report module',
        ];

        // Create permissions
        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        // Assign permissions to super-admin role
        $role = Role::where('name', 'super-admin')->first();
        if ($role) {
            $role->syncPermissions($permissions);
        }
    }
}

