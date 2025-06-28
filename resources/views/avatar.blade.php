<?php
@php
    #size = isset($size) ? $size : 100;
@endphp

@if (isset($user) and $user)
    @php
        $avatarUrl = $user->avatar ? asset('storage/' . $user->avatar) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?s=' . $size;
    @endphp
    <img src="{{ $avatarUrl }}" alt="{{ $user->name }}'s avatar" class="rounded-circle" width="{{ $size }}"
         height="{{ $size }}">
    </a>
@else
    <a class="avatar-link" href="{{ route('login') }}">
        <img src="https://www.gravatar.com/avatar/?d=mp&s={{ $size }}" alt="Default Avatar" class="rounded-circle"
             width="{{ $size }}" height="{{ $size }}">
    </a>
@endif
