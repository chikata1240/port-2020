@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/main/components/header_component.css">
    <link rel="stylesheet" href="css/main/main.css">
@endsection

@section('header')
    @component('components.header')
        @slot('nav_content1')
        設定変更
        @endslot

        @slot('nav_content2')
          ログアウト
        @endslot
    @endcomponent
@endsection

@section('content')
  <div class="user_main">
    <div class="user_information">
      @foreach ($items as $item)
          <div>
          <p>名前：{{$item->name}}</p>
          </div>
          <div>
            目標：
          </div>
      @endforeach
    </div>
    <div class="user_contents">
    </div>
  </div>
@endsection