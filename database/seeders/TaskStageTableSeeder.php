<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskstage = [
            [
                'name' => 'Todo',
                'complete' => 0,
                'project_id' => '0',
                'color' => null,
                'order' => '0',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'In Progress',
                'complete' => 0,
                'project_id' => '0',
                'color' => null,
                'order' => '1',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Review',
                'complete' => 0,
                'project_id' => '0',
                'color' => null,
                'order' => '2',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Done',
                'complete' => 0,
                'project_id' => '0',
                'color' => null,
                'order' => '3',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];
        if (DB::table('task_stages')->count() == 0) {
            DB::table('task_stages')->insert(
                $taskstage
            );
        }
    }
}
