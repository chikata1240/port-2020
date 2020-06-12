@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/input/input.css">
@endsection

@section('content')
  <div class="user_main">
    {{-- ユーザー情報 --}}
    <div class="user_information">
      <x-user-information :user-information="$user_information" :arrival="$arrival" />
      <x-slide />
      <div id="composer" class="composer_box">
        <x-sub-links sub-links="home">
          Home
        </x-sub-links>
        <x-sub-links sub-links="user">
          User
        </x-sub-links>
        <x-sub-links sub-links="user_edit">
          ImageChange
        </x-sub-links>
        <x-sub-links sub-links="input">
          Input
        </x-sub-links>
      </div>
    </div>

    {{-- コンテンツ --}}
    <div class="user_contents">
      <div class="training_menu">Please choosing</div>
      <div class="training_contents">
        {{-- 読書 --}}
        <div class="training_content">
          <div class="training_content_header">Reeding Books</div>
          <form action="/input_book" method="post">
            @csrf
            <input type="hidden" name="type" value="book">
            <p>1.What is the title?</p>
            <input type="text" name="book_content" value="{{old('book_content')}}">
            @error('book_content')
              <span>{{$message}}</span>
            @enderror
            <p>2.How long is the time limit?</p>
            <input id="year" type="text" name="year" placeholder="XXXX" value="{{old('year')}}">
            <label for="year">年</label>
            <input id="month" type="text" name="month" placeholder="XX" value="{{old('month')}}">
            <label for="month">月</label>
            <input id="day" type="text" name="day" placeholder="XX" value="{{old('day')}}">
            <label for="day">日</label>
            @error('book_limit')
              <span>{{$message}}</span>
            @enderror
            <p>3.How many pages?</p>
            <input type="text" name="book_rule" value="{{old('book_rule')}}">
            @error('book_rule')
              <span>{{$message}}</span>
            @enderror
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="" >
            </div>
          </form>
        </div>
        {{-- トレーニング --}}
        <div class="training_content">
          <div class="training_content_header">Start Training</div>
          <form action="/input_training" method="post">
            @csrf
            <input type="hidden" name="type" value="training">
            <p>1.What are you doing?</p>
            <input type="text" name="training_content" value="{{old('training_content')}}">
            @error('training_content')
              <span>{{$message}}</span>
            @enderror
            <p>2.What is your goal?</p>
            <input type="text" name="training_limit" value="{{old('training_limit')}}">
            @error('training_limit')
              <span>{{$message}}</span>
            @enderror
            <p>3.Let's decide the rules!</p>
            <input type="textarea" name="training_rule" value="{{old('training_rule')}}">
            @error('training_rule')
              <span>{{$message}}</span>
            @enderror
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