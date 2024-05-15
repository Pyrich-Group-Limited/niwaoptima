<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $staff=[
            [

                'user_id'=>2 ,
                'department_id'=>1 ,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>3 ,
                'department_id'=>2 ,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>4 ,
                'department_id'=>3 ,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>5 ,
                'department_id'=> 4,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 6,
                'department_id'=>5,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>7 ,
                'department_id'=>6,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>8 ,
                'department_id'=>7,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>9 ,
                'department_id'=>8,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 10,
                'department_id'=> 9,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 11,
                'department_id'=>10,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>12 ,
                'department_id'=>11,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=>13 ,
                'department_id'=> 12,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 14,
                'department_id'=> 13,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 15,
                'department_id'=> 14,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],
            [

                'user_id'=> 16,
                'department_id'=> 14,
                'branch_id'=> 1,
                'ranking_id'=> 1,
                'dash_type'=> 1,
                'statusz'=> 1,
            ],

        ];
        DB::table('staff')->insert($staff);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
