<?php
Route::get('/', function () {
    return [
        'from' => [
            'address' => 'john@example.com',
            'name' => 'Admin',
        ],
    ];
});
