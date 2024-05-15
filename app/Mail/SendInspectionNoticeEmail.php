<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInspectionNoticeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $inspectionDatetime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inspectionDatetime)
    {
        $this->inspectionDatetime = $inspectionDatetime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Inspection Notification Message')
            ->view('emails.employer-inspection');
    }
}
