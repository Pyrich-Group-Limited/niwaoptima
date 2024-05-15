<?php

namespace Modules\DocumentManager\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MemoAssignedToUser extends Notification implements ShouldQueue
{
    use Queueable;

    private $_memo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($memo)
    {
        $this->_memo = $memo;
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
            ->line('A new memo has been assigned to you!')
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
