<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
//custom
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\ResetPassword;
class MailResetPasswordNotification extends Notification
{
    use Queueable;
    protected $pageUrl;
    public $token;
    public $url;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $url)
    {
        $this->url = $url;
// we can set whatever we want here, or use .env to set environmental variables
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
//        if (static::$toMailCallback) {
//            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
//        }
        return (new MailMessage)
//            ->subject(Lang::getFromJson('Reset application Password v1'))
            ->line('Forgot Password')
            ->action('Click to reset', $this->url.'&&email='.$notifiable['email'])
            ->line('Thank you for using our application');
//            ->line('If you did not request a password reset, no further action is required.');
    }
}
