<?php

namespace Modules\Shared\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // DB::table('branches')->truncate();
        $areaoffices = [
            ['branch_name'=>'Lagos'],
            ['branch_name'=>'Port Harcourt'],
            ['branch_name'=>'Warri'],
            ['branch_name'=>'Onitsha A/O'],
            ['branch_name'=>'Yenogoa'],
            ['branch_name'=>'Eket'],
            ['branch_name'=>'Abeokuta'],
            ['branch_name'=>'Lokoja'],
            ['branch_name'=>'Calabar'],
            ['branch_name'=>'Kaduna'],
            ['branch_name'=>'Jalingo'],
            ['branch_name'=>'Hadejia'],
            ['branch_name'=>'Minna'],
            ['branch_name'=>'Sokoto'],
            ['branch_name'=>'Abuja L/O'],
            ['branch_name'=>'Maiduguri'],
            ['branch_name'=>'Yola'],
            ['branch_name'=>'Oguta'],
            ['branch_name'=>'Igbokoda'],
            ['branch_name'=>'Onitsha R/P'],
            ['branch_name'=>'Yalewa/Yauri'],
            ['branch_name'=>'Baro Port'],

        ];
        DB::table('branches')->insert($areaoffices);
    }

}
