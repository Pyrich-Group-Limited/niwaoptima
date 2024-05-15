<?php

namespace Modules\ClaimsCompensation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClaimstypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        DB::table('claimstypes')->delete();

        $thetype = [
            [
                'name' => 'Accident',
            ],
            [
                'name' => 'Occupational Disease',
            ],
            [
                'name' => 'Death',
            ],
        ];
        

        DB::table('claimstypes')->insert($thetype);
        // $this->call("OthersTableSeeder");
    }
}
