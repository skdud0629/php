<?php
{{$article->title}}
<small class="text-muted">
    작성자: {{ $article->user->name }} |
    작성일: {{ $article->created_at->format('Y-m-d H:i') }}
</small>
<footer>
    이 메일은 {{ config('app.name') }}에서 발송한 것입니다.
    <br/>
    <br/>
    <div style="font-size: 0.8em; color: #999;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 50px; height: 50px;">
    </div>
</footer>