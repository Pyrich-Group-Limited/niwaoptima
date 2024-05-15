<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\Shared\Models\Branch;

class NewBranchTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        $arrayOfRegions =
                [
                    'Abuja Region',
'Ibadan Region',
'Lagos Region',
'Port harcourt Region',
'Asaba Region',
'Enugu Region',
'Jos Region',
'Kaduna Region',
'Kano Region',
'Maiduguri Region',
                ];

            $regions = collect($arrayOfRegions)->map(function ($region) {
                return ['branch_name' => $region, 'created_at' => now(), 'updated_at' => now()];
            });

            Branch::insert($regions->toArray());
        
    }
}
