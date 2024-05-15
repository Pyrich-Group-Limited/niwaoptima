<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class WorkflowEngineDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ActorRolesTableSeeder::class);
        $this->call(ActorTypesTableSeeder::class);
        $this->call(FieldTypesTableSeeder::class);
        $this->call(StepActivitiesTableSeeder::class);
        $this->call(StepTypesTableSeeder::class);
        $this->call(WorkflowTypesTableSeeder::class);
    }
}
