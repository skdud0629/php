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


//여기서부터 사용자 인증
Route::get('/','WelcomeController@index');

Route::get('/auth/lgoin', function(){
    $credentials = [
        'email'=> 'john@example.com',
        'password'=>'password'];
    if (!auth()->attempt($credentials)) {
        return '인증 실패';
    }
    return redirect('protected');
});

Route::get('protected', function () {
    dump(session()->all());
    if (!(auth()->check())) {
        return '누구세요';
    }
    return '어서오세요';
});

Route::get('/auth/logout', function () {
    auth()->logout();
    return '로그아웃 되었습니다.';
});

//auth 미들웨어
Route::get('protected', ['middleware' => 'auth', function () {
    dump(session()->all());
    return '어서오세요';
}]);

///빨간책
///
Route::get('/',function(){
    return '<h1>Welcome to the Laravel Application</h1>';
});

Route::get('/{foo}', function ($foo) {
    return $foo;
});

Route::get('/{foo?}', function ($foo ='bar') {
    return $foo;
});


Route::pattern('foo', '[0-9a-zA-Z]{3}');

Route::get('/{foo?}', function ($foo = 'bar') {
    return $foo;
});

Route::get('/{foo?}', function ($foo = 'bar') {
    return $foo;
})->where('foo', '[0-9a-zA-Z]{3}');

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

Route::get('/', function () {
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
    return view('welcome', ['items' =>$items]);
});


Route::resource('articles','ArticleController');


Route::get('/auth/login', function () {
   $credentials = [
       'email' => 'john@example,com',
         'password' => 'password'
   ];

   if (!auth()->attempt($credentials)) {
       return '인증 실패';
   }
    return redirect('protected');
});

Route::get('protected', function () {
    dump(session()->all());
    if (!(auth()->check())) {
        return '누구세요';
    }
    return '어서오세요';
});

Route::get('/auth/logout', function () {
    auth()->logout();
    return '로그아웃 되었습니다.';
});

Route::get('protected', ['middleware' => 'auth', function () {
  //if 절 삭제
}]);