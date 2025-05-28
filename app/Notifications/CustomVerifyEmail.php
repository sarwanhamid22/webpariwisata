<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Get the channels the notification will be sent through.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Build the verification URL.
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

    /**
     * Build the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verifikasi Email Anda - Wisata Wakatobi')
            ->greeting('Halo ' . $notifiable->name . ' 👋')
            ->line('Terima kasih telah mendaftar di Wisata Wakatobi.')
            ->line('Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda.')
            ->action('Verifikasi Email Sekarang', $this->verificationUrl($notifiable))
            ->line('Jika Anda tidak mendaftarkan akun, abaikan email ini.')
            ->salutation('Salam hangat, Tim Wisata Wakatobi 🌴');
    }

    /**
     * Optional: array representation for database (if needed).
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
