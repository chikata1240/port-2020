@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
    <link rel="stylesheet" href="css/user/reply/reply.css">
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
      {{-- コンテンツ本体 --}}
      <div class="main_content_title">
        @foreach ($reply_records as $record_items)
          {{-- ヘッダー --}}
          <div class="main_content_title_header">
            <div class="main_content_title_header_day">
              {{$record_items->created_at->format('Y年m月d日 H時i分')}}
            </div>
          </div>
          <div class="detail_content_title_parts_box">
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
            {{-- フォーム --}}
            <div class="reply_content_form">
              <form action="/reply?id={{$record_items->progress_id}}" method="POST">
                @csrf
                <input type="hidden" name="progress_id" value="1">
                <input type="hidden" name="user_id" value="1">
                <input class="reply_form_text" type="text" name="comment">
                <input class="reply_form_submit" type="submit">
              </form>
            </div>
            @endforeach

            {{-- 繰り返し --}}
            @foreach ($replies as $reply)
            {{-- 隙間のデザイン --}}
            <div class="reply_design_box">
              <div class="reply_design"></div>
            </div>
            {{-- 返信文 --}}
            <div class="reply_content_text">
              <div class="reply_content_text_image">
                <img src="{{asset('/storage/img/' . $reply->file_name)}}" alt="">
              </div>
              <div class="reply_content_text_main">
                <div class="reply_content_text_main_user">
                <div class="reply_content_text_main_user_name">Name: {{$reply->name}}</div>
                  <div class="reply_content_text_main_user_day">{{$reply->created_at->format('Y年m月d日 H時i分')}}</div>
                </div>
                <div class="reply_content_text_main_message">
                  {{$reply->comment}}
                </div>
              </div>
              <div class="reply_content_text_main_delete_box">
                <a href="/reply_delete?id={{$reply->reply_id}}&progress_id={{$reply->progress_id}}">
                  <div class="reply_content_text_main_delete"></div>
                </a>
              </div>
            </div>
            @endforeach

            {{-- ページネーション  --}}
            <div class="reply_content_pagenation">
              <div>
                前のページ | 次のページ
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection