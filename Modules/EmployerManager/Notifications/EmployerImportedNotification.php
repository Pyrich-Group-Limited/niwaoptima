<?php

namespace Modules\EmployerManager\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployerImportedNotification extends Notification
{
    use Queueable;

    protected $employerData;

    public function __construct($employerData)
    {
        $this->employerData = $employerData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hello ' . $this->employerData['contact_firstname'] . ' ' . $this->employerData['contact_surname'] . ',')
            ->line('Please find below your user details!')
            ->line('Email: ' . $this->employerData['company_email'])
            ->line('Password: ' . "12345678")
            ->line('You can use this details to login and access your dashboard.')
            ->action('Login', "https://essp.NIWA.gov.ng/login")
            ->line('Thank you.')
            ->line('E-NIWA');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
