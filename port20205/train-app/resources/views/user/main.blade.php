@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
    <link rel="stylesheet" href="css/user/main/main.css">
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

    {{-- コンテンツ box--}}
    <div class="user_contents">
      {{-- 繰り返しforeach --}}
      @foreach ($records as $record_items)
        {{-- コンテンツ本体 --}}
        <div class="main_content_title">
          {{-- ヘッダー --}}
          <div class="main_content_title_header">
            <div class="main_content_title_header_day">
              {{$record_items->created_at->format('Y年m月d日 H時i分')}}
            </div>
          </div>
          <div class="detail_content_title_parts_box">
            <a href="reply?id={{$record_items->progress_id}}">
              <div class="detail_content_title_parts">
                {{-- 画像 --}}
                <div class="detail_content_title_parts_image">
                  <img src="{{asset('/storage/img/'.$record_items->file_name)}}" alt="">
                </div>
                {{-- 本文 --}}
                <div class="detail_content_title_parts_text">
                  <div class="detail_content_title_parts_text_title">content</div>
                  <div class="detail_content_title_parts_text_recode">{{$record_items->content}}</div>
                  <div class="detail_content_title_parts_text_title">progress</div>
                  <div class="detail_content_title_parts_text_recode">{{$record_items->progress}}</div>
                  <div class="detail_content_title_parts_text_title">memo</div>
                  <div class="detail_content_title_parts_text_recode">{{$record_items->memo}}</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach

      {{-- コンテンツ本体 --}}
      <div class="main_content_title">
        {{-- ヘッダー --}}
        <div class="main_content_title_header">
          day
        </div>
        <div class="detail_content_title_parts_box">
          <a href="">
            <div class="detail_content_title_parts">
              {{-- 画像 --}}
              <div class="detail_content_title_parts_image">
                image
              </div>
              {{-- 本文 --}}
              <div class="detail_content_title_parts_text">
                <div class="detail_content_title_parts_text_title">content</div>
                <div class="detail_content_title_parts_text_recode">筋トレ</div>
                <div class="detail_content_title_parts_text_title">progress</div>
                <div class="detail_content_title_parts_text_recode">腹筋100回</div>
                <div class="detail_content_title_parts_text_title">memo</div>
                <div class="detail_content_title_parts_text_recode">腹筋が痛くて千切れそう。。。これから毎日がんばって行きます！！！！！やるゾォぉぉぉぉぉぉぉぉぉぉぉぉ</div>
              </div>
            </div>
          </a>
        </div>
      </div>

      {{-- コンテンツ本体 --}}
      <div class="main_content_title">
        {{-- ヘッダー --}}
        <div class="main_content_title_header">
          day
        </div>
        <div class="detail_content_title_parts_box">
          <a href="">
            <div class="detail_content_title_parts">
              {{-- 画像 --}}
              <div class="detail_content_title_parts_image">
                image
              </div>
              {{-- 本文 --}}
              <div class="detail_content_title_parts_text">
                <div class="detail_content_title_parts_text_title">content</div>
                <div class="detail_content_title_parts_text_recode">筋トレ</div>
                <div class="detail_content_title_parts_text_title">progress</div>
                <div class="detail_content_title_parts_text_recode">腹筋100回</div>
                <div class="detail_content_title_parts_text_title">memo</div>
                <div class="detail_content_title_parts_text_recode">腹筋が痛くて千切れそう。。。これから毎日がんばって行きます！！！！！やるゾォぉぉぉぉぉぉぉぉぉぉぉぉ</div>
              </div>
            </div>
          </a>
        </div>
      </div>

      {{-- コンテンツ本体 --}}
      <div class="main_content_title">
        {{-- ヘッダー --}}
        <div class="main_content_title_header">
          day
        </div>
        <div class="detail_content_title_parts_box">
          <a href="">
            <div class="detail_content_title_parts">
              {{-- 画像 --}}
              <div class="detail_content_title_parts_image">
                image
              </div>
              {{-- 本文 --}}
              <div class="detail_content_title_parts_text">
                <div class="detail_content_title_parts_text_title">content</div>
                <div class="detail_content_title_parts_text_recode">筋トレ</div>
                <div class="detail_content_title_parts_text_title">progress</div>
                <div class="detail_content_title_parts_text_recode">腹筋100回</div>
                <div class="detail_content_title_parts_text_title">memo</div>
                <div class="detail_content_title_parts_text_recode">腹筋が痛くて千切れそう。。。これから毎日がんばって行きます！！！！！やるゾォぉぉぉぉぉぉぉぉぉぉぉぉ</div>
              </div>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>
@endsection