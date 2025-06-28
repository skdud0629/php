<?php

class UsersEventListner
{
    public function handle($event)
    {
        $event->user->last_login = now();
        return $event->user->save();
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\UserCreated',
            'App\Listeners\UsersEventListner@handle'
        );
    }

    public function onUserCreated($event)
    {
        // Handle the user created event
        $user = $event->user;
        $user->last_login = now();
        $user->save();
    }
}
