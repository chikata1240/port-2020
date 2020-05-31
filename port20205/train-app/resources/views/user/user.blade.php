@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
    <link rel="stylesheet" href="css/user/user/user.css">
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
      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>

      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>

      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>
      
      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>

      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>

      <div class="user_content_title">
        <div class="user_content_title_header"></div>
        <a href="">
          <div class="user_content_title_parts">
            <div class="user_content_title_parts_title">Title</div>
            <div class="user_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
            <div class="user_content_title_parts_title">Time Limit</div>
            <div class="user_content_title_parts_record">21日</div>
          </div>
        </a>
      </div>
    </div>
  </div>
@endsection