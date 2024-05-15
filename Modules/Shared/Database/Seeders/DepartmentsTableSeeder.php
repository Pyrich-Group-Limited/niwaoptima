<?php

namespace Modules\Shared\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        // DB::table('departments')->truncate();
        $offices = [
            ['name'=>'Administration, Coporate Services And Human Resources'],
            ['name'=>'Finance/Account'],
            ['name'=>'Marine'],
            ['name'=>'Engineering'],
            ['name'=>'Survey'],
            ['name'=>'Ports and Enviromental Services'],
            ['name'=>'Audit and Internal Co-ordiantion'],
            ['name'=>'Inland Waterways Police Command'],
            ['name'=>'Co-ordination'],
            ['name'=>'Project Management and Special Duties'],
            ['name'=>'Procument'],
            ['name'=>'Legal'],
            ['name'=>'Research Planning and ICT'],
            ['name'=>'Business Development'],
            ['name'=>'Office Of The MD'],
            ['name'=>'Area Manager'],



        ];
       DB::table('departments')->insert($offices);
    }

}
