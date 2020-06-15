@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/user_edit/user_edit.css">
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
        </x-sub-link>
      </div>
    </div>

    {{-- コンテンツ --}}
    <div class="user_contents">
      <div class="user_edit_content_title_header">
        <div class="user_edit_content_title_header_line_l"></div>
        <div class="user_edit_content_title_header_line_s"></div>
        <div class="user_edit_content_title_header_line_s"></div>
      </div>
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
              <input type="file" name="file_name" id="file_name" value="{{old('file_name')}}"> 
            </label>
            @error('file_name')
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
@endsection