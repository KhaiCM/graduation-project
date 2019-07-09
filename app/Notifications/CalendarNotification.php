<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CalendarNotification extends Notification
{
    use Queueable;

    protected $sc;

    protected $property;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sc, $property)
    {
        $this->sc = $sc;
        $this->property = $property;
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
                    ->line('Bạn vừa đặt một lịch hẹn trong hệ thống, email được gửi để nhắc nhở bạn không quên lịch hẹn')
                    ->action('truy cập hệ thống', url('/'))
                    ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
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
