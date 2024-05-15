<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AssignDefaultRoleSeeder extends Seeder
{
    public function run()
    {
        // Define the name of the default role
        $defaultRoleName = 'user';

        // Get the default role or create it if it doesn't exist
        $defaultRole = Role::firstOrCreate(['name' => $defaultRoleName]);

        // Find users without any roles assigned
        $usersWithoutRole = User::doesntHave('roles')->get();

        // Assign the default role to users without any role
        foreach ($usersWithoutRole as $user) {
            $user->assignRole($defaultRole);
            $this->command->info("Assigned '$defaultRoleName' role to user: {$user->name}");
        }

        $this->command->info('Default roles assigned to users.');
    }
}
