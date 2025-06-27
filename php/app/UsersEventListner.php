<?php

class UsersEventListner
{
    public function handle($event)
    {
        $event->user->last_login = now();
        return $event->user->save();
    }
}
