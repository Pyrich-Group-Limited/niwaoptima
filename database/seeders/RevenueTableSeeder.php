<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RevenueTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'branch_id' => 1,
                'amount' => 422631425.28,
            ],
            [
                'branch_id' => 2,
                'amount' => 367594387.24,
            ],
            [
                'branch_id' => 3,
                'amount' => 227553818.27,
            ],
            [
                'branch_id' => 4,
                'amount' => 93912611.80,
            ],
            [
                'branch_id' => 5,
                'amount' => 77399585.41,
            ],
            [
                'branch_id' => 6,
                'amount' => 70636300.00,
            ],
            [
                'branch_id' => 7,
                'amount' => 49155088.75,
            ],
            [
                'branch_id' => 8,
                'amount' => 56144461.50,
            ],
            [
                'branch_id' => 9,
                'amount' => 48270930.00,
            ],
            [
                'branch_id' => 10,
                'amount' => 52255309.00,
            ],
            [
                'branch_id' => 11,
                'amount' => 35639500.00,
            ],
            [
                'branch_id' => 13,
                'amount' => 36490000.00,
            ],
            [
                'branch_id' => 14,
                'amount' => 30993238.75,
            ],
            [
                'branch_id' => 15,
                'amount' => 21497500.00,
            ],
            [
                'branch_id' => 16,
                'amount' => 27098338.75,
            ],
            [
                'branch_id' => 17,
                'amount' => 15356100.00,
            ],
            [
                'branch_id' => 18,
                'amount' => 18396571.43,
            ],
            [
                'branch_id' => 12,
                'amount' => 7372481.75,
            ],
            [
                'branch_id' => 19,
                'amount' => 10635000.00,
            ],
            [
                'branch_id' => 20,
                'amount' => 512570.83,
            ],
        ];

        // Set the timezone to the desired timezone
date_default_timezone_set('Africa/Lagos');

// Get the Unix timestamp for the beginning of the year 2022
$timestamp = strtotime('2022-01-01 00:00:00');

// Format the timestamp to 'Y-m-d H:i:s'
$current_date_time = date('Y-m-d H:i:s', $timestamp);

        foreach ($data as $payment) {
            DB::table('payments')->insert([
                'employer_id' => 1,
                'payment_type' => 1,
                'rrr' => rand(),
                'invoice_number' => 'NIWA-'.rand(),
                'invoice_generated_at' => $current_date_time,
                'payment_status' => 1,
                'approval_status' => 1,
                'branch_id' => $payment['branch_id'],
                'service_id' => 6,
                'invoice_duration' => date('Y-m-d'),
                'amount' => $payment['amount'],
                'created_at' => $current_date_time,
                'updated_at' => $current_date_time,
            ]);
        }
    }
}
