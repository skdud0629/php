{{--
<h1>Hello Laravel!</h1>
<h1><?= isset($greeting) ? "{$greeting}": 'Hello'; ?> <?=%name; ?></h1>
<h1>{{$greeting or 'Hello'}} {{$name or ''}}</h1>
<h1>안녕하세요 Foo</h1>

@if($itemCount = count($items))
    <p>{{$itemCount}} 종류의 과일이 있습니다.</p>
@else
    <p>과일이 없습니다.</p>
@endif

@extends('layouts.master')

@section('title', 'Welcome Page')

@section('content')
    <p>자식뷰는 'content' 섹션</p>
@endsection

@section('style')
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
@endsection

@section('content')
   <p> 저는 자식 뷰의 'conent' 섹션 입니다.</p>
@endsection

@section('script')
    <script>
        console.log('자식 뷰의 스크립트');
    </script>
@endsection

<footer>
    <p>저는 꼬리입니다</p>
</footer>

@section('content')
    @include('partials.footer')
@endsection

@section('content')
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert('저는 자식뷰의 script 섹션입니다.');
    </script>
@endsection

@section('script')
    <script>
        alert("저는 조각뷰의 script 섹션입니다.");
    </script>
@endsection

@section('script')
    @parent
    <script>
        alert('저는 조각뷰의 script 섹션입니다.');
    </script>
@endsection

--}}

<h1><?= isset($greeting) ? "{$greeting} " : 'hello' ; ?> <?= $name; ?></h1>
<h1>{{$greeting or 'Hello'}}{{$name or ''}}</h1>
<h1>안녕하세요 Foo</h1>
@if ($itemCount = count($items))
    <p>{{$itemCount}} 종류의 과일이 있습니다.</p>
@else
    <p>과일이 없습니다.</p>
@endif

<ul>
@foreach($items as $item)
    <li>{{$item}}</li>
@endforeach
</ul>

<ul>
@forelse($items as $item)
    <li>{{$item}}</li>
@empty
    <li>과일이 없습니다.</li>
</ul>


@extends('layouts.master')
@section('content')
    <p>자식뷰는 'content' 섹션</p>
@endsection


@section('style')
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
@endsection
@section('content')
    <p>저는 자식 뷰의 'content' 섹션 입니다.</p>
@endsection
@section('script')
    <script>
        console.log('자식 뷰의 스크립트');
    </script>
@endsection
<footer>
    <p>저는 꼬리입니다</p>
</footer>


@section('content')
    @include('partials.footer')
@endsection
@section('script')
    <script>
        alert('저는 자식뷰의 script 섹션입니다.');
    </script>
@endsection

@section('script')
    <script>
        alert("저는 조각뷰의 script 섹션입니다.");
    </script>
@endsection