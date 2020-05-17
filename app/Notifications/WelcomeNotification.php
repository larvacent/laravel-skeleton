<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

/**
 * 用户注册欢迎通知
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The username.
     *
     * @var string
     */
    public $username;

    /**
     * Create a new notification instance.
     *
     * @param string $username
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * Get the notification's channels.
     *
     * @param mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Welcome Registration :appName',['appName'=>config('app.name')]))
            ->line(Lang::get('Your registered account is :username', ['username' => $this->username]))
            ->line(Lang::get('Thank you for choosing, we will be happy to help you in the process of your subsequent use of the service.'));
    }
}
