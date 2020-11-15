<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\UserRequest;

class RequestNotification extends Notification
{
    use Queueable;

    protected $request;

    /**
     * Create a new notification instance.
     *
     * @param UserRequest $request
     */
    public function __construct(UserRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {

        if($this->request->requestType->name == 'pending'){
            return (new MailMessage)
                ->greeting('Hello!')
                ->line('Your request has been sent')
                ->action('Home', url('/'))
                ->line('Thank you for using our application!');
        }else if($this->request->requestType->name == 'success'){
            return (new MailMessage)
                ->greeting('Hello!')
                ->line('Your request has been verified')
                ->action('Home', url('/'))
                ->line('Thank you for using our application!');
        }else{
            return (new MailMessage)
                ->greeting('Hello!')
                ->line('Your request has been rejected!')
                ->action('Home', url('/'))
                ->line('Thank you for using our application!');
        }

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
