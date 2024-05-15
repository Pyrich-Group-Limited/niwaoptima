<?php
namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\MailMessage;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $actionUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actionUrl)
    {
        $this->actionUrl = $actionUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Reset Password Notification')
            ->view('emails.reset_password');
    }
}
