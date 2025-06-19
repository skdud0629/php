<?php

Route:get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
   return '<h1>Hello fool</h1>';
});

Route::get('/{foo}', function ($foo) {
    return $foo;
});

Route::get('/{foo}', function ($foo ='bar') {
    return $foo;
});


Route::pattern('foo', '[0-9]+');

Route::get('/{foo}', function ($foo = 'bar') {
    return $foo;
})->where('foo', '[0-9]+');

Route::get('/', [
    'as' => 'home',
    function () {
        return '제 이름은 "home입니다.';
    }
]);

Route::get('/home', function () {
    return redirect()->route('home');
});


Route::get('/', function () {
    return view('errors.503');
});

Route::get('/',function (){
    return view('welcome')->with('name', 'Foo');
});

Route::get('/', function () {
    return view('welcome')->with(['name' => 'Foo', 'greeting' => '안녕하세요']);
});

Route::get('/', function () {
    return view('welcome', ['name' => 'Foo', 'greeting' => '안녕하세요']);
});

Route::get('/', function () {
    $items = ['apple', 'banana', 'orange'];
    return view ('welcome', compact('items'));
});

Route::get('/','WelcomeController@index');