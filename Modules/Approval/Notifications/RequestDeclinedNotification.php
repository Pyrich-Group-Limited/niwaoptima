<?php

namespace Modules\Approval\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use Modules\Approval\Models\Action;
use Modules\Approval\Models\Request;

class RequestDeclinedNotification extends Notification
{
    use Queueable;

    private $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
        ->subject($this->request->type->name)
        ->greeting(new HtmlString('Hi <em>' . ($this->request->staff->user->first_name . ' ' . $this->request->staff->user->last_name) . '</em>,'))
        ->line(new HtmlString('Your <b>' . $this->request->type->name . '</b> request has been '. strtoupper(Action::find($this->request->action_id)->status) .', no further actions can be taken.'))
        ->action('View Request', route('request.show', $this->request->id))

        ->line(new HtmlString('If you have any questions, please do not hesitate to
                contact us at <a style="color: #0fac81; text-decoration:none;"
                    href="mailto:info@NIWA.gov.ng">info@NIWA.gov.ng</a>, or visit our website
                at <a style="color: #0fac81; text-decoration:none;" target="_blank"
                    href="https://NIWA.gov.ng">www.NIWA.gov.ng</a> anytime.'));
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
