@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/main/main.css">
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
      @foreach ($records as $record_items)
        {{-- コンテンツ本体 --}}
        <div class="main_content_title">
          {{-- コンテンツヘッダー --}}
          <div class="main_content_title_header">
            <div class="main_content_title_header_day">
              {{$record_items->created_at->format('Y年m月d日 H時i分')}}
            </div>
          </div>
          {{-- コンテンツ情報 --}}
          <div class="detail_content_title_parts_box">
            <a href="reply?id={{$record_items->progress_id}}">
              <div class="detail_content_title_parts">
                {{-- ユーザー画像 --}}
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

      {{-- ページネーション  --}}
      <div class="detail_pagenation">
        {!! $records->links() !!}
      </div>
    </div>
  </div>
@endsection