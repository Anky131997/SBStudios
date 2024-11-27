<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobNotification extends Notification
{
    use Queueable;

    public $job;
    public $header;
    public $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($job, $header, $message)
    {
        $this->job = $job;
        $this->header = $header;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }
    
    public function toDatabase(object $notifiable): array{
        return [
            'header' => $this->header,
            'message' => $this->message,
        ];
    }

    public function toBroadCast(object $notifiable): array{
        return [
            'header' => $this->header,
            'message' => $this->message,
        ];
    }
}
