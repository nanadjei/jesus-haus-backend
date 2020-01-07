<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\NotificationChannels\Mobiforte\MobiforteChannel;
use App\NotificationChannels\Mobiforte\MobiforteMessage;

class MobiforteSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $sender_id;

    public $message;

    public $phone;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender_id, $message, $phone)
    {
        $this->sender_id = $sender_id;
        $this->message = trim($message);
        $this->phone = $phone;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [MobiforteChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMobiforte($notifiable)
    {
        logger()->info("From: " . $this->sender_id . "\n" . "Message: " . $this->message);

        return (new MobiforteMessage)
            ->from($this->sender_id)
            ->content($this->message);
    }
}
