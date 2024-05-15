<?php

namespace Modules\EmployerManager\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DateTime;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Notification;
use Modules\EmployerManager\Notifications\EmployerImportedNotification;


class EmployersImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $skippedFirstRow = false;

        foreach ($rows as $row) {
            if (!$skippedFirstRow) {
                $skippedFirstRow = true;
                continue; // Skip the first row
            }

            $app_code = "NIRC" . uniqid();

            $employer = new Employer();
            $employer->company_name = $row[0];
            $employer->company_email = $row[1];
            $employer->company_address = $row[2];
            $employer->company_rcnumber = $row[3];
            $employer->cac_reg_year = $row[4];
            $employer->contact_number = $row[5];
            $employer->company_localgovt = $row[6];
            $employer->company_state = $row[7];
            $employer->status = $row[8];
            $employer->applicant_code = $app_code;
            $employer->contact_surname = $row[9];
            $employer->contact_firstname = $row[10];
            $employer->contact_middlename = $row[11];
            $employer->branch_id = $row[12];
            $employer->user_type = $row[14];
            $employer->password = Hash::make('12345678');
            $employer->user_id = 1;

            // Define validation rules
            $rules = [
                'company_email' => 'required|email|unique:employers,company_email',
                'applicant_code' => 'required|unique:employers,applicant_code',
            ];

            // Define custom error messages
            $messages = [
                'company_email.unique' => 'The email address is already in use.',
                'applicant_code.unique' => 'The applicant code is already in use.',
            ];

            // Create an associative array of attributes and their values
            $attributes = [
                'company_email' => $employer->company_email,
                'applicant_code' => $employer->applicant_code,
            ];

            // Validate data
            $validator = Validator::make($attributes, $rules, $messages);

            if ($validator->fails()) {
                // Validation fails, display error messages
                $errors = $validator->errors()->all();
                Flash::error(implode('<br>', $errors));
                return back()->withInput()->withErrors($validator);
            } else {
                // Validation passes, create Employer record
                $employer->save();
            }
        }
    }
}
