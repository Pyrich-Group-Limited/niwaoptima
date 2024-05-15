<?php

namespace Modules\Approval\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use Modules\Approval\Models\Action;
use Modules\Approval\Models\Request;

class RequestSavedNotification extends Notification
{
    use Queueable;

    private $request;
    public $isCreator;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Request $request, $isCreator = 1)
    {
        $this->request = $request;
        $this->isCreator = $isCreator;
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
            ->greeting(new HtmlString('Hi <em>' . ($this->isCreator ? ($this->request->staff->user->first_name . ' ' . $this->request->staff->user->last_name) : ($notifiable->first_name . ' ' . $notifiable->last_name)) . '</em>,'))
            ->line(
                $this->isCreator ?
                    new HtmlString('You have <em>' . strtoupper(Action::find($this->request->action_id)->status) . '</em> a <b>' . $this->request->type->name . '</b> request.')
                    : new HtmlString('Action required: Review and process the <b>' . $this->request->type->name . '</b> request from <em>' . ($this->request->staff->user->first_name . ' ' . $this->request->staff->user->last_name) . '</em> currently in your queue.')
            )
            ->action('View Request', $this->isCreator ? route('request.show', $this->request->id) : route('appraisal.show', $this->request->id))

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
