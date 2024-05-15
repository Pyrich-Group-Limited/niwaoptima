<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\MailMessage;

class BulkStaffEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $ccEmail; // Add a public property for the CC email address
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($users, $ccEmail, $password)
    {
        $this->users = $users;
        $this->ccEmail = $ccEmail; // Store the CC email address
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Welcome to E-NIWA')
            ->to($this->ccEmail)
            //->to($this->users->email)
            //->cc($this->ccEmail) // Set the CC email address
            ->view('emails.bulk_staff_email');
    }
}
