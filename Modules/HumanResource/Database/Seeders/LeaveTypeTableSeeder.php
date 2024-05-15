<?php

namespace Modules\HumanResource\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        DB::table('leavetype')->delete();
        $leave_types = [
            [
                'name'=> "SELECT LEAVE TYPE ",
                'duration' => 0
            ],
            [
                'name'=> 'CASUAL LEAVE',
                'duration' => 7
            ],
            [
                'name'=> "ANNUAL LEAVE ",
                'duration' => 30
            ],
            
            [
                'name' =>'SICK LEAVE',
                'duration' => 90
            ]
            ,[
                'name' => 'EXAMINATION LEAVE',
                'duration' => 10
            ],
            [
                'name' => 'STUDY LEAVE',
                'duration' => 180
            ],
            [
                'name' => 'SPECIAL LEAVE FOR PILGRIMAGE',
                'duration' => 30
            ],
            [
                'name' => 'COMPASSIONATE LEAVE',
                'duration' => 14
            ],
            [
                'name' => 'LEAVE OF ABSCENCE',
                'duration' => 365
            ]
        ];
        DB::table('leavetype')->insert($leave_types);
        
        
    }
}
