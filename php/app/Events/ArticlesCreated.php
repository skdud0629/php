<?php


namespace App\Providers;

use App\Models\Article;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class ArticlesCreated extends Event
{
    use SerializesModels;

    public $articles;

    public function __construct(Article $articles)
    {
        $this->articles = $articles;
    }
}
