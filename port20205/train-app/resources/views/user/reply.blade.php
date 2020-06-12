@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/reply/reply.css">
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
        </x-sub-links>
      </div>
    </div>

    {{-- コンテンツ box--}}
    <div class="user_contents">
      {{-- 繰り返しforeach --}}
      {{-- コンテンツ本体 --}}
      <div class="main_content_title">
          {{-- ヘッダー --}}
          <div class="main_content_title_header">
            <div class="main_content_title_header_day">
              {{$reply_records->created_at->format('Y年m月d日 H時i分')}}
            </div>
          </div>
          <div class="detail_content_title_parts_box">
            <div class="detail_content_title_parts">
              {{-- 画像 --}}
              <div class="detail_content_title_parts_image">
                <img src="{{asset('/storage/img/'.$reply_records->file_name)}}" alt="">
              </div>
              {{-- 本文 --}}
              <div class="detail_content_title_parts_text">
                <div class="detail_content_title_parts_text_title">content</div>
                <div class="detail_content_title_parts_text_recode">{{$reply_records->content}}</div>
                <div class="detail_content_title_parts_text_title">progress</div>
                <div class="detail_content_title_parts_text_recode">{{$reply_records->progress}}</div>
                <div class="detail_content_title_parts_text_title">memo</div>
                <div class="detail_content_title_parts_text_recode">{{$reply_records->memo}}</div>
              </div>
            </div>
            {{-- フォーム --}}
            <div class="reply_content_form">
              <form action="/reply_post?id={{$reply_records->progress_id}}" method="POST">
                @csrf
                <input type="hidden" name="progress_id" value="{{$reply_records->progress_id}}">
                <input type="hidden" name="user_id" value="{{$auth_id}}">
                <input class="reply_form_text" type="text" name="comment">
                <input class="reply_form_submit" type="submit">
              </form>
            </div>
          </div>

          <div>
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
              {{-- ページネーション  --}}
              <div class="detail_pagenation">
                {!! $replies->appends(['id' => $progress_id])->links() !!}
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection