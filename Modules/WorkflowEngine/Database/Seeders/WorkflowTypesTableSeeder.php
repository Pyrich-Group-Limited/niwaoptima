<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workflow_types')->delete();
        $workflowTypes = [
            ['workflow_type' => 'Sequential'],
            ['workflow_type' => 'Parallel'],
            ['workflow_type' => 'Iterative'],
            ['workflow_type' => 'Hybrid'],
        ];

        DB::table('workflow_types')->insert($workflowTypes);
    }
}
