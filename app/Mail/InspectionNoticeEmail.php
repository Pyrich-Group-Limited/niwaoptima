<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectionNoticeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $service_app;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $service_app)
    {
        $this->user = $user;
        $this->service_app = $service_app;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('My Inspection Notice')
            ->view('emails.employer-inspection');
    }
}
