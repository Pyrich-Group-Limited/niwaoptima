<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DepartmentsAndBranchesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // -- from me atp, if you are looking for department seeder go to staff.sql
    public function run()
    {
                    // create roles and assign created permissions
                    Eloquent::unguard();

                    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                    // DB::select('DROP table branches');
                    // DB::select('DROP table departments');

                    // DB::select('DROP table all_branch');
                    // DB::select('DROP table all_departments');
                    // DB::select('DROP table staff_tb');

                    $path1 = 'database/db/branches.sql';
                    DB::unprepared(file_get_contents($path1));

                    $path2 = 'database/db/departments.sql';
                    DB::unprepared(file_get_contents($path2));

                    $this->command->info('Departments and branches table seeded!');

                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                    Eloquent::reguard();


    }

}
