<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    public $token;

    /**
     * Buat notifikasi dengan token reset password.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Channel pengiriman.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Template email reset password.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Reset Password Anda - Wisata Wakatobi')
            ->greeting('Halo, ' . $notifiable->name . ' 👋')
            ->line('Kami menerima permintaan untuk mereset password akun Anda.')
            ->line('Klik tombol di bawah ini untuk membuat password baru.')
            ->action('Reset Password Sekarang', $resetUrl)
            ->line('Link ini hanya berlaku selama 60 menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.')
            ->salutation('Salam hangat, Tim Wisata Wakatobi 🌴');
    }

    /**
     * Optional: data array untuk notifikasi berbasis database.
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
