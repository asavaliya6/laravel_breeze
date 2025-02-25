<?php
  
namespace App\Notifications;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
  
class BirthdayWish extends Notification
{
    use Queueable;
  
    private $messages;
  
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line($this->messages['hi'])
                    ->line($this->messages['wish'])
                    ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
              
        ];
    }
}
