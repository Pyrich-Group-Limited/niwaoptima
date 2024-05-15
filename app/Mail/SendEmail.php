<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $attachment)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.sendemail')
                    ->with(['body' => $this->body,'attachment' => $this->attachment]);
    }
}
