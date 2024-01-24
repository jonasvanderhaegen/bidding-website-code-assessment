<?php

namespace App\Notifications;

use App\Models\Bid;
use App\Models\Lot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNotificationToWinnerOfLot extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Lot $lot, private Bid $bid)
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
    public function toMail(object $notifiable): MailMessage
    {
        $url = route('lot.show', ['lot' => $this->lot->id]);

        $mailMessage = (new MailMessage)
            ->subject("Congratulations, your won on our lot: {$this->lot->name}" )
            ->line("Your bid with amount of € {$this->bid->amount} won at {$this->lot->datetime_end}")
            ->action('View the lot you won', $url);

        if ($this->lot->user) {

            $mailMessage
                ->line("The lot item has been added to your collection of lots.")
                ->action('Go login', route('login', ['email' => $this->lot->user->email]))
                ->line("in order to continue with the payment so we can deliver the lot item.");

        } else {

            $registerUrl = route('register', [
                'name' => $this->bid->firstname . ' ' . $this->bid->lastname,
                'email' => $this->bid->email,
                'lot_id' => $this->lot->id,
                'bid_id' => $this->bid->id
            ]);

            $mailMessage
                ->line("Please sign up in order to continue with the payment so we can deliver the lot item.")
                ->action('Sign up', $registerUrl);
        }

        return $mailMessage;
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
