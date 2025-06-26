<?php
@extends('layouts.app')

@section('content')
<div class ='container'>
    <h1>포럼 글 목록</h1>
    <hr/>
    <ul>
        @if($article->count())
            <div class="text-center">
                {!! $article->render() !!}
            </div>
        @forelse($articles as $articles)
            <li>
                {{$article->title}}
                <small>
                    by {{$article->user->name}} |
                </small>
            </li>
        @empty
            <li>글이 없습니다.</li>
        @endforelse
    </ul>
</div>