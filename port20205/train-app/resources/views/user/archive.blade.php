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
      @foreach ($user_information as $information)
      {{-- 画像 --}}
      <div class="user_image">
        <img src="{{asset('/storage/img/'.$information->file_name)}}" alt="">
      </div>
      {{-- 名前 --}}
      <div class="user_name">
        <div>Name</div>
        <div>{{$information->name}}</div>
        <div>Arrival</div>
        <div>0</div>
      </div>
      @endforeach
    </div>

    {{-- コンテンツ --}}
    <div class="user_contents">
      {{-- ヘッダー --}}
      <div class="archive_content_title_header"></div>
      <div class="archive_content">
        <div class="archive_message">
          <div>
            <p>Well done!!</p>
            <p>Leave it in the archive!!<p>
          </div>
        </div>
      {{-- フォーム --}}
        <div class="archive_content_title_parts">
          <form action="/archive" method="POST" >
            @csrf
            <p>1.When?</p>
            <input type="text" name="day">
            <p>2.How is your progress?</p>
            <input type="text" name="progress">
            <p>3.Memo</p>
            <input type="textarea" name="memo">
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection