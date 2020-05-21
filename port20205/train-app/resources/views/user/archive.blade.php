@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/main/components/header_component.css">
    <link rel="stylesheet" href="css/user/archive/archive.css">
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
    {{-- ユーザー情報 --}}
    <div class="user_information">

    </div>

    {{-- コンテンツ --}}
    <div class="user_contents">
    </div>
  </div>
@endsection