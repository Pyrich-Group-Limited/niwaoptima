<?php

namespace App\Mail;

use App\Models\ServiceApplication;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientDemandNoticeEmail extends Mailable
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
        return $this->markdown('emails.client_demand_notice')
                    ->subject('Your Demand Notice Invoice Is Ready');
    }
}
