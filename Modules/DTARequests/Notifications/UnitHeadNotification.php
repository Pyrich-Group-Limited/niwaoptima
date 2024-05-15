<?php

namespace Modules\DTARequests\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class UnitHeadNotification extends Notification
{
    use Queueable;

    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('You have been assigned as a unit head.')
            ->line('You have a new DTA request from EBS NIWA portal')
            ->line('You can use this details to login and access your dashboard.')
            ->action('View Dashboard', url('/dtarequests/dtarequests'))
            ->line('Thank you for using our application!');
    }

   /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
