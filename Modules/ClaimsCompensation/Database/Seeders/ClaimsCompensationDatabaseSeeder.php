<?php

namespace Modules\ClaimsCompensation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClaimsCompensationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Model::unguard();

        $this->call(ClaimstypeTableSeeder::class);
    }
}
