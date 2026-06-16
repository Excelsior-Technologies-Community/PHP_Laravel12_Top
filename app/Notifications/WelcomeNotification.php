<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }


    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Welcome to our application!')
                    ->line('Thank you for joining us.')
                    ->action('Go to Dashboard', url('/home'))
                    ->line('We are glad to have you here!');
    }


    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Welcome!',
            'message' => 'Thank you for registering on our platform.',
            'url' => url('/home'),
        ];
    }
}