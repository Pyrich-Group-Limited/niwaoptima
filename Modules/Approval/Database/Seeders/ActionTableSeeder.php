<?php

namespace Modules\Approval\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $actions = [
            ['name' => 'Create', 'status' => 'Created'],
            ['name' => 'Approve', 'status' => 'Approved'],
            ['name' => 'Modify', 'status' => 'Modified'],
            ['name' => 'Return', 'status' => 'Returned'],
            ['name' => 'Decline', 'status' => 'Declined'],
        ];

        DB::table('actions')->insert($actions);
    }
}
