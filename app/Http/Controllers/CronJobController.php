<?php

namespace App\Http\Controllers;

use App\Models\ServiceApplication;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceApplicationExpired;
use Carbon\Carbon;
use App\Models\Notification;

class CronJobController extends Controller
{

    public function sendExpiryEmails()
  {
    // Calculate the date 3 days from now
    $expiryDateThreshold = Carbon::now()->addDays(3);

    // Find service applications expiring in 3 days
    $expiringApplications = ServiceApplication::where('expiry_date', '<', $expiryDateThreshold)
        ->whereNotNull('user_id') // Ensure there is an employer associated
        ->get();

    // Iterate through each expiring application and send email to employer
    foreach ($expiringApplications as $application) {
        $employer = $application->employer; // Assuming employer relation is defined
        if ($employer) {
            // Send email to employer
            Mail::to($employer->company_email)->send(new ServiceApplicationExpired($application, $employer));
        }

       
    }

    return 'Expiry emails sent successfully!';
  }

}
