@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
    <link rel="stylesheet" href="css/user/user_edit/user_edit.css">
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
        <img src="{{asset('/storage/img/'. $information->file_name)}}" alt="">
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
      <div class="user_edit_content_title_header"></div>
      <div class="user_edit_content_title_parts">
        {{-- 画像 --}}
        <div class="user_edit_content_title_parts_image">
          @foreach ($user_information as $information)
            <img src="{{asset('/storage/img/'. $information->file_name)}}" alt="">
          @endforeach
        </div>
        {{-- フォーム --}}
        <div class="user_edit_content_title_parts_form">
          <form action="/user_edit" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="file_name">
              ファイルを選択
              <input type="file" name="file_name" id="file_name"> 
            </label>
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection