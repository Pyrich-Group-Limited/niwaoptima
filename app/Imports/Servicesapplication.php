<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class Servicesapplication implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        $skippedFirstRow = false;
        //
        foreach ($collection as $row) {
            // dd($collection);
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }
            $code = 'Nisapc' . uniqid();
            // dd($row);
            $records = [
                'serviceapplication_code' => $code,
                'applicant_code' => $row[0],
                'service_id' => $row[1],
                'service_type_id' => $row[2],
                'application_form_payment_status' => $row[3],
                'date_of_inspection' => Carbon::createFromTimestamp(($row[4] - 25569) * 86400)->toDateTimeString(), //op
                // 'current_step' => intval($row[5]),//13 is the final step
                'current_step' => 13, //13 is the final step
                'mse_are_documents_verified' => $row[6],
                'finance_is_application_fee_verified' => $row[7],
                'finance_is_processing_fee_verified' => $row[8],
                'finance_is_inspection_fee_verified' => $row[9],
                'inspection_status' => $row[10],
                'are_equipment_and_monitoring_fees_verified' => $row[11],
                'area_officer_approval' => $row[12],
                'hod_marine_approval' => $row[13],
            ];

            DB::table('service_applications')->insert($records);
        }
    }
}
