<?php

namespace App\Mail;

use App\Models\ServiceApplication;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAreaManagerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $employer;
    public $areaManager;

    public function __construct(ServiceApplication $application, Employer $employer, $areaManager)
    {
        $this->application = $application;
        $this->employer = $employer;
        $this->areaManager = $areaManager;
    }

    public function build()
    {
        return $this->markdown('emails.area_manager_notify')
                    ->subject('A Demand Notice Is Awaiting Your Approval');
    }
}
