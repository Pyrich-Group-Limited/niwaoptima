<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SecretaryRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create or find the SECRETARY role
        $role = Role::firstOrCreate(['name' => 'SECRETARY']);

        // Assign the role to a user (replace 'user_id' with the actual user ID)
        //$user = \App\Models\User::find(1); // Replace 1 with the user ID you want to assign the role to
        //$user->assignRole($role);
    }
}
