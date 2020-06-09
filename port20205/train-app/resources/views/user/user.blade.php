@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/user/user.css">
@endsection

@section('content')
  <div class="user_main">
    {{-- ユーザー情報 --}}
    <div class="user_information">
      <x-user-information :user-information="$user_information" />
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

    {{-- コンテンツ box--}}
    <div class="user_contents">
      {{-- コンテンツ --}}
      <?php
        $i = 0; 
      ?>
      @foreach ($contents as $content)
      @if ($content->type == 'book')
        <div class="user_content_title">
          <div class="user_content_title_header"></div>
          <a href="/details?id={{$content->content_id}}">
            <div class="user_content_title_parts">
              <div class="user_content_title_parts_title">Title</div>
              <div class="user_content_title_parts_record">{{$content->content}}</div>
              <div class="user_content_title_parts_title">Time Limit</div>
              <div class="user_content_title_parts_record">{{$content->limit}}</div>
              <div class="user_content_title_parts_record">{{$limit[$i]}}day</div>
            </div>
          </a>
        </div>
        <?php
          $i++;
        ?>
      @else
        <div class="user_content_title">
          <div class="user_content_title_header"></div>
          <a href="/details?id={{$content->content_id}}">
            <div class="user_content_title_parts">
              <div class="user_content_title_parts_title">Doing</div>
              <div class="user_content_title_parts_record">{{$content->content}}</div>
              <div class="user_content_title_parts_title">Your Goal</div>
              <div class="user_content_title_parts_record">{{$content->limit}}</div>
            </div>
          </a>
        </div>
      @endif
      @endforeach
    </div>
@endsection