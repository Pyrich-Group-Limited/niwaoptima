<?php

namespace Modules\DocumentManager\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CorrespondenceCreated extends Notification
{
    use Queueable;

    private $_correspondence;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($correspondence)
    {
        $this->_correspondence = $correspondence;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hello ' . $notifiable->first_name . ' ' . $notifiable->last_name . ',')
            ->line('A new internal correspondence has been uploaded!')
            ->line('Please login and check your dashboard.')
            ->line('Thank you.')
            ->line('E-NIWA');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
