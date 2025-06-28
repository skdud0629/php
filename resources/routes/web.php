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

Route::resource('articles', 'ArticleController');

DB::listen(function ($query) {
    var_dump($query->sql);
});

Route::resource('articles', 'ArticleController');

Event::listen('article.created', function ($article) {
    // Article created event logic
    var_dump($article);
    var_dump($article->author);
});

Route::get('mail', function () {
    $user = \App\Models\User::find(1);
    \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\WelcomeMail($user));
    return Mail::send('emails.welcome', ['user' => $user], function ($message) use ($user) {
        $message->to($user->email, $user->name)
                ->subject('Welcome to Our Application');
    });
});

Route::get('markdown',function(){
    $text =<<<EOT

EOT;
return app(ParsedownExtra::class)->text($text);
});

Route::get('docs/{file}', function ($file) {
  $text = (new App\Documentation)->get($file);
    if (!$text) {
        abort(404, 'Documentation not found');
    }
    return app(ParsedownExtra::class)->text($text);
})->where('file', '[a-zA-Z0-9\-_]+');

Route::get('docs/{file}', function ($file) {
    $text = (new App\Documentation)->get($file);
    if (!$text) {
        abort(404, 'Documentation not found');
    }
    return app(ParsedownExtra::class)->text($text);
})->where('file', '[a-zA-Z0-9\-_]+');

Route::auth();

Route::get('auth/register', function () {
    return view('auth.register');
});

Route::post('auth/register', function (Illuminate\Http\Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    auth()->login($user);
    return redirect()->route('home');
});

Route::get('auth/login', function () {
    return view('auth.login');
});

Route::post('auth/logout',[
    'as' => 'logout',
    function () {
        auth()->logout();
        return redirect()->route('home');
    }
]);

Route::get('auth/login', function () {
    return view('auth.login');
});

Route::get('reminder', function () {
    return view('auth.passwords.email');
});

Route::post('reminder', function (Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);
    $user = \App\Models\User::where('email', $request->input('email'))->first();
    if (!$user) {
        return back()->withErrors(['email' => '이메일 주소가 등록되어 있지 않습니다.']);
    }
    // 비밀번호 재설정 링크 전송 로직
    return back()->with('status', '비밀번호 재설정 링크가 이메일로 전송되었습니다.');
});

Route::get('auth/confirm', function () {
    return view('auth.passwords.confirm');
});


