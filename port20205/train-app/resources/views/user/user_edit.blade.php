@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/main/components/header_component.css">
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
    </div>
    {{-- コンテンツ --}}
    <div class="user_contents">
      <div class="user_edit_content_title_header"></div>
      <div class="user_edit_content_title_parts">
        {{-- 画像 --}}
        <div class="user_edit_content_title_parts_image">
          <img src="{{asset('/storage/img/'.$file_name)}}" alt="">
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