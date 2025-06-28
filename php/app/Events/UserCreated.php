<?php


namespace App\Providers;

use App\Models\Article;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class UserCreated extends Event
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
