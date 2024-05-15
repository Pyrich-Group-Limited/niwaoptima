<?php

namespace Modules\HumanResource\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\HumanResource\Models\Ranking;

class RankingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Model::unguard();
       DB::table('rankings')->delete();
        $rank=[
            [
                'name'=>'General Manager'
            ],
            [
                'name'=>'Assitant General Manager'
            ],
            [
                'name'=>'Principal Manager'
            ],
            [
                'name'=>'Senior Manager'
            ],
            [
                'name'=>' Manager'
            ],
            [
                'name'=>'Assitant Manager'
            ],
            [
                'name'=>'Officer 1'
            ],
            [
                'name'=>'Officer 2'
            ],
            [
                'name'=>'Senior Supervisor'
            ],
            [
                'name'=>'ED'
            ],
            [
                'name'=>'MD'
            ],
          


        ];
        DB::table('rankings')->insert($rank);

     
       
    }
}
