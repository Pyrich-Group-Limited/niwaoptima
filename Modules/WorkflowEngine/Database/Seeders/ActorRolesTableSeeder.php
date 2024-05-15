<?php

namespace Modules\WorkflowEngine\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actor_roles')->delete();
        $actorRoles = [
            ['actor_role' => 'Approver'],
            ['actor_role' => 'Initiator'],
            ['actor_role' => 'Owner'],
            ['actor_role' => 'Participant'],
        ];

        DB::table('actor_roles')->insert($actorRoles);
    }
}
