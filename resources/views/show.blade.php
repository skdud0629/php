<?php
@extends('layouts.app')
@section('title', $article->title)
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p class="text-muted">
        작성자: {{ $article->user->name }} |
        작성일: {{ $article->created_at->format('Y-m-d H:i') }}
    </p>
    <div class="content">
        {!! nl2br(e($article->content)) !!}
    </div>
    <div class="mt-4">
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">목록으로</a>
        @if (auth()->check() && auth()->user()->id === $article->user_id)
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">수정</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">삭제</button>
            </form>
        @endif
    </div>
    @stop

    @section('script')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('articles.show', $article->id) }}',
                type: 'GET',
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        </script>
@stop