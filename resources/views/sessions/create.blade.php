@extends('layouts.app')

@section('content')
    <form action="{{route('sessions.store')}}" method="POST" class= "from__auth">
        {!! cstf_field() !!}