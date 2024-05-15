<?php

namespace Modules\Shared\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Database\Seeders\BranchesTableSeeder;

class SharedDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DepartmentsTableSeeder::class);
         $this->call(BranchesTableSeeder::class);
    }
}
