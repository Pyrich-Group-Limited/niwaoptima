<?php

namespace App\Imports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class Paymentrecords implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $skippedFirstRow = false;
        //
        foreach ($collection as $row) {

            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }

            $records = [
                'serviceapplication_code' => $row[0],
                'payment_type' => $row[1],
                'rrr' => $row[2],
                'invoice_number' => $row[3],
                'invoice_generated_at' => Carbon::createFromTimestamp(($row[4] - 25569) * 86400)->toDateTimeString(),
                // 'invoice_duration' => $row[5],
                'invoice_duration' => Carbon::createFromTimestamp(($row[5] - 25569) * 86400)->toDateString(),
                'payment_status' => $row[6],
                'amount' => $row[7],
                'approval_status' => $row[8],
                'paid_at' => Carbon::createFromTimestamp(($row[9] - 25569) * 86400)->toDateTimeString(),

                'transaction_id' => $row[10],

                'branch_id' => $row[11],
            ];

            DB::table('payments')->insert($records);
        }
    }
}
