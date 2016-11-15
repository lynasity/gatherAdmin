<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class newArticle extends Notification implements ShouldQueue
{
    use Queueable;
    private $gzh_name;
    private $title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($gzh_name,$title)
    {
        $this->gzh_name=$gzh_name;
        $this->title=$title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('[知否]新文章来啦～')
                    ->line('神一样的小编，有未处理的新文章哦～')
                    ->line('内容：'.$this->title.'--'.$this->gzh_name)
                    ->action('快去处理吧～', 'http://www.gatheradmin.com/home');
    }
}
