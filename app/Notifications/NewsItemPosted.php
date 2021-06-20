<?php

namespace App\Notifications;

use A17\Twill\Models\Setting;
use A17\Twill\Repositories\SettingRepository;
use App\Models\NewsItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
     * this is an array of channels(ways to send notifications)
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            FacebookPosterChannel::class
        ];
    }


    /**
     * Get the Facebook post representation of the notification.
     *
     * @param  mixed  $notifiable.
     * @return \NotificationChannels\FacebookPoster\FacebookPosterPost
     */
    public function toFacebookPoster($notifiable) {
        return (new FacebookPosterPost($this->newsItem->summary))
            ->withLink('https://tiny-restaurant.test/nieuws/' . $this->newsItem->id);
    }

    /**
     * TODO implement for custom page settings
     *
     * @return string
     */
    public function routeNotificationForFacebookPoster(): array
    {
        $repository = app(SettingRepository::class);
        $page_id = $repository->byKey('facebook_page_id');
        $access_token = $repository->byKey('facebook_access_token');

        return [
            'page_id' => $page_id ?? config('services.facebook_poster.page_id'),
            'access_token' => $access_token ?? config('services.facebook_poster.access_token'),
        ];
    }
}
