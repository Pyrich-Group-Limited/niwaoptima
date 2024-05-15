<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // if (Staff::count() === 0) {
            // Add default User
            Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $user = new Staff();
            $user->user_id = 1;
            $user->department_id = 1;
            $user->branch_id = 1;
            $user->ranking_id = 1;
        
            $user->dash_type = 1;
            $user->statusz = 1;
            $user->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            Eloquent::reguard();
           
       // }
    }
}
