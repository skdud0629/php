<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel')</title>
</head>
<body>
<header>
    <h1>Laravel 입문</h1>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; 2023 Laravel</p>
</footer>
</body>
</html>