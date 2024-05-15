<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_activities')->delete();
        $stepActivities = [
            ['step_activity' => 'Data entry'],
            ['step_activity' => 'Data validation'],
            ['step_activity' => 'Data processing'],
            ['step_activity' => 'Data output'],
        ];

        DB::table('step_activities')->insert($stepActivities);
    }
}
