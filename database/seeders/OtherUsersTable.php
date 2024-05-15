<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OtherUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'Alh Munirudeen';
        $user->last_name = 'Bola';
        $user->middle_name = 'Oyebamiji';
        $user->email = 'md@niwa.com';
        $user->type = 'company';
        $user->password = bcrypt('12345678');
        $user->email_verified_at = now();
        $user->save();

        $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;



        $mdrole = Role::where('name', '=', 'Managing Director')->first();

        $user->assignRole($mdrole);


        
    }
}
