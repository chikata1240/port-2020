@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
    <link rel="stylesheet" href="css/user/input/input.css">
@endsection

@section('header')
    @component('components.header')
        @slot('nav_content1')
          設定変更
        @endslot

        @slot('nav_content2')
          Myページ
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
      <div class="training_menu">Please choosing</div>
      <div class="training_contents">
        {{-- 読書 --}}
        <div class="book_content">
          <div class="content_header">Reeding Books</div>
          <form action="" method="post">
            <p>1.What is the title?</p>
            <input type="text" name="content">
            <p>2.How long is the time limit?</p>
            <input type="text" name="limit">
            <p>3.How many pages?</p>
            <input type="text" name="rule">
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="" >
            </div>
          </form>
        </div>
        {{-- トレーニング --}}
        <div class="book_content">
          <div class="content_header">Start Training</div>
          <form action="" method="post">
            <p>1.What are you doing?</p>
            <input type="text" name="content">
            <p>2.What is your goal?</p>
            <input type="text" name="limit">
            <p>3.Let's decide the rules!</p>
            <input type="textarea" name="rule">
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="">
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection