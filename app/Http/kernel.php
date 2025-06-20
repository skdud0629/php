<?php

namespace App\Http;


class Kernel
{
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
    ];
}
