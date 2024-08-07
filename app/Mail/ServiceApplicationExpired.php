<?php

namespace App\Mail;

use App\Models\ServiceApplication;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceApplicationExpired extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $employer;

    public function __construct(ServiceApplication $application, Employer $employer)
    {
        $this->application = $application;
        $this->employer = $employer;
    }

    public function build()
    {
        return $this->markdown('emails.service_application_expired')
                    ->subject('Your Service Application Has Expired');
    }
}
