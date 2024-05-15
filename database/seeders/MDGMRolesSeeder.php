<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MDGMRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $roles = ['AGM/MGR', 'MD', 'GM Admin/HR'];

        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName]);
        }
    }
}
