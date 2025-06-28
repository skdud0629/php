@extends('layouts.app')

@section('content')
    <div class ="container">
        <h1>새 포럼 글쓰기</h1>
    </div>
    <hr/>
    <form action="{{route('articles.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="제목을 입력하세요." required>
        </div>

        <div class="form-group">
            <label for="content">내용</label>
            <textarea name="content" id="content" class="form-control" rows="10" placeholder="내용을 입력하세요." required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">글쓰기</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">목록으로</a>
        </div>
    </form>

