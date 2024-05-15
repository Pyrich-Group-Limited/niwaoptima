<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_types')->delete();
        $stepTypes = [
            ['step_type' => 'Manual'],
            ['step_type' => 'Automatic'],
            ['step_type' => 'Decision'],
        ];

        DB::table('step_types')->insert($stepTypes);
    }
}
