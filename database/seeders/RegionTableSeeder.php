<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\UnitManager\Models\Region;

class RegionTableSeeder extends Seeder
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
                    'Abuja',
                    'Lagos',
                    'Ibadan',
                    'Port harcourt',
                    'Asaba',
                    'Enugu',
                    'Jos',
                    'Kaduna',
                    'Kano',
                    'Maiduguri',
                    'Bauchi',
                ];

            $regions = collect($arrayOfRegions)->map(function ($region) {
                return ['name' => $region, 'created_at' => now(), 'updated_at' => now()];
            });

            Region::insert($regions->toArray());
        
    }
}
