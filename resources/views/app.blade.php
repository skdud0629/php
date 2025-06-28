<!DOCTYPE>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>
       {{config('app.name',{csrf_token()} ,'Laravel')}}
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2023 라라벨</p>
    </footer>
    @yield('script')
</body>
</html>