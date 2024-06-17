<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerDocumentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $employerDocuments;
    public $user;
    public $status;
    public $service_app;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employerDocuments, $user, $status, $service_app)
    {
        $this->employerDocuments = $employerDocuments;
        $this->user = $user;
        $this->status = $status;
        $this->service_app = $service_app;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('My Uploaded Document')
            ->view('emails.employer-document');
    }
}
