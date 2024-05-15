<?php

namespace Modules\Approval\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('types')->truncate();

        // $this->call("OthersTableSeeder");
        $types = [
            [
                'name' => 'Dredging',
                'cycle' => 'Once',
                'scopeable_type' => null,
                'scopeable_id' => null,
                'metric' => 'Year',
                'duration' => 1,
                'status' => true,
            ],
            // [
            //     'name' => 'ESSP Registration',
            //     'cycle' => 'Once',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Days',
            //     'duration' => 7,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Casual Leave',
            //     'cycle' => 'Periodically',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 2,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Duty and Transport Allowance',
            //     'cycle' => 'Periodically',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 2,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Out of Pocket Expense',
            //     'cycle' => 'Periodically',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 2,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Certification',
            //     'cycle' => 'Annually',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 2,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Death Claim',
            //     'cycle' => 'Annually',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 3,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Accident Claim',
            //     'cycle' => 'Annually',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 3,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Disease Claim',
            //     'cycle' => 'Annually',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Months',
            //     'duration' => 3,
            //     'status' => true,
            // ],
            // [
            //     'name' => 'Form Builder',
            //     'cycle' => 'Periodically',
            //     'scopeable_type' => null,
            //     'scopeable_id' => null,
            //     'metric' => 'Days',
            //     'duration' => 7,
            //     'status' => true,
            // ],
        ];

        DB::table('types')->insert($types);
    }
}
