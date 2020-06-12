@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/top/toppage.css">
@endsection

@section('header')
    <div class="header"></div>  
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>
        
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
@endif

@endsection
@section('content')
<div class="contents">
  <div class="content_style">
    <div class="title">
      Train Train
    </div>
    <img src="{{asset('/img/train_image1.png')}}" width="450px" height="100px" alt="線路のイメージ">
  </div>
</div>
@endsection