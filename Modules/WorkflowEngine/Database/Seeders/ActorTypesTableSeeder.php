<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actor_types')->delete();
        $actorTypes = [
            ['actor_type' => 'Human'],
            ['actor_type' => 'System'],
        ];

        DB::table('actor_types')->insert($actorTypes);
    }
}
