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
    {{-- ユーザー情報 --}}
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

    {{-- コンテンツ box--}}
    <div class="user_contents">
      {{-- コンテンツ --}}
      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>
      
      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      <div class="main_content_title">
        <div class="main_content_title_header"></div>
        <div class="main_content_title_parts">
          <div class="main_content_title_parts_title">Title</div>
          <div class="main_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="main_content_title_parts_title">Time Limit</div>
          <div class="main_content_title_parts_record">21日</div>
        </div>
      </div>

      
    </div>
  </div>
@endsection