@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/main/components/header_component.css">
    <link rel="stylesheet" href="css/user/details/details.css">
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
      {{-- コンテンツタイトル --}}
      <div class="detail_content_title">
        <div class="detail_content_title_header"></div>
        <div class="detail_content_title_parts">
          <div class="detail_content_title_parts_title">Title</div>
          <div class="detail_content_title_parts_record">PHPフレームワーク Laravel 入門</div>
          <div class="detail_content_title_parts_title">Time limit</div>
          <div class="detail_content_title_parts_record">21日</div>
          <div class="detail_content_title_parts_title">Progress</div>
          <div class="detail_content_title_parts_record">100%</div>
        </div>
      </div>

      {{-- コンテンツの進捗 --}}
      <div class="detail_content_progress">
        <div class="detail_content_progress_header"></div>
        <div class="detail_content_progress_parts">
          <div class="detail_content_progress_parts_title">Day</div>
          <div class="detail_content_progress_parts_record">2020/05/20</div>
          <div class="detail_content_progress_parts_title">Progress</div>
          <div class="detail_content_progress_parts_record">20ページ</div>
          <div class="detail_content_progress_parts_title">memo</div>
          <div class="detail_content_progress_parts_record">とても勉強になった</div>
        </div>
      </div>

      <div class="detail_content_progress">
        <div class="detail_content_progress_header"></div>
        <div class="detail_content_progress_parts">
          <div class="detail_content_progress_parts_title">Day</div>
          <div class="detail_content_progress_parts_record">2020/05/20</div>
          <div class="detail_content_progress_parts_title">Progress</div>
          <div class="detail_content_progress_parts_record">20ページ</div>
          <div class="detail_content_progress_parts_title">memo</div>
          <div class="detail_content_progress_parts_record">とても勉強になった</div>
        </div>
      </div>

      <div class="detail_content_progress">
        <div class="detail_content_progress_header"></div>
        <div class="detail_content_progress_parts">
          <div class="detail_content_progress_parts_title">Day</div>
          <div class="detail_content_progress_parts_record">2020/05/20</div>
          <div class="detail_content_progress_parts_title">Progress</div>
          <div class="detail_content_progress_parts_record">20ページ</div>
          <div class="detail_content_progress_parts_title">memo</div>
          <div class="detail_content_progress_parts_record">とても勉強になった</div>
        </div>
      </div>

      {{-- ページネーション  --}}
      <div class="detail_pagenation">
        <div class="detail_pagenation_parts">
          <a href="">前のページ</a>
        </div>
        <div class="detail_pagenation_parts">
          <a href="">次のページ</a>
        </div>
      </div>
    </div>
  </div>
@endsection