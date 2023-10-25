<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FuelApplication extends Notification
{
    use Queueable;

    protected $fuel_quantity;
    protected $fuel_name;
    protected $user_name;


    /**
     * Create a new notification instance.
     */
    public function __construct($fuel_quantity, $fuel_name, $user_name)
    {
        $this->fuel_quantity = $fuel_quantity;
        $this->fuel_name = $fuel_name;
        $this->user_name = $user_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabse(object $notifiable): array
    {
        return [
            'data' => 'Пользователь под именем ' . $this->user_name . ' запрашивает ' . $this->fuel_quantity . 'л. топлива под названием ' . $this->fuel_name,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => 'Пользователь под именем ' . $this->user_name . ' запрашивает ' . $this->fuel_quantity . 'л. топлива под названием ' . $this->fuel_name,
        ];
    }
}
