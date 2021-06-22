<?php

namespace App\Notifications;

use App\Models\NewsItem;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\FacebookPoster\FacebookPosterChannel;
use NotificationChannels\FacebookPoster\FacebookPosterPost;

class NewsItemPosted extends Notification
{
    use Queueable;

    /**
     * @var NewsItem
     */
    private $newsItem;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(NewsItem $newsItem)
    {
        $this->newsItem = $newsItem;
    }

    /**
     * Get the notification's delivery channels.
     * this is an array of channels(ways to send notifications).
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [
            FacebookPosterChannel::class,
        ];
    }

    /**
     * Get the Facebook post representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \NotificationChannels\FacebookPoster\FacebookPosterPost
     */
    public function toFacebookPoster($notifiable)
    {
        return (new FacebookPosterPost($this->newsItem->summary))
            ->withLink(config('app.url') . '/nieuws/' . $this->newsItem->id);
    }
}
