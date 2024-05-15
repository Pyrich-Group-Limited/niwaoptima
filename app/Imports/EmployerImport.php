<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmployerImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        $skippedFirstRow = false;
        
        foreach ($collection as  $row) {
            # code...
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }
            // dd($row);



            $record = [
                'ecs_number'=>1,
                'company_name' => $row[0],
                'company_email' => $row[1],
                'company_address' => $row[2],
                'company_rcnumber' => $row[3],
                'cac_reg_year' => $row[4],
                'contact_number' => $row[5],
                'company_localgovt' => $row[6],
                'company_state' => $row[7],
                'status' => $row[8],
                'contact_surname' => $row[9],
                'contact_firstname' => $row[10],
                'contact_middlename' => $row[11],
                'branch_id' => $row[12],
                'password' => Hash::make($row[13]),
                
                'user_type' => $row[14],

            ];
            DB::table('employers')->insert($record);
        }
    }
}
