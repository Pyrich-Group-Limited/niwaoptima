<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() === 0) {
            // Add default User
            $user = new User();
            $user->first_name = 'Admin';
            $user->last_name = 'Admin';
            $user->email = 'admin@niwa.com';
            $user->type='company';
            $user->password = bcrypt('12345678');
            $user->email_verified_at = now();
            $user->save();

            // Create token

            $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;

            // Assign Super Admin role

            $super_admin_role = Role::where('name', '=', 'super-admin')->first();

            $user->assignRole($super_admin_role);
        }
    }
}
