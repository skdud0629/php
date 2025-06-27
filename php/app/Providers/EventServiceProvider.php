<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        \app\Models\Event::listen('article.created', function ($article) {
            var_dump($article);
            var_dump($article->author);
        });
    }

    public function handle(\App\Articles\Events\ArticleCreated $event)
    {
        // Handle the event
        $article = $event->article;
        var_dump($article);
        var_dump($article->author);
    }

    protected $listeners = [
        \App\Articles\Events\ArticleCreated::class => [
            \App\Articles\Listeners\SendArticleCreatedNotification::class,
        ],
    ];

}
