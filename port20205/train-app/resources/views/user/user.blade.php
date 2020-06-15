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
      {{-- コンテンツ --}}
      @foreach ($contents as $content)
      @if ($content->type == 'book')
        <div class="user_content_title">
          <div class="user_content_title_header">
            @if ($content->arrival == 1)
            <div class="user_content_title_header_text_box">
              <div class="user_content_title_header_text">
                Arrival!
              </div>
            </div>
            @else
            <div class="user_content_title_header_line_w"></div>
            <div class="user_content_title_header_line_y"></div>
            @endif
          </div>
          <a href="/details?id={{$content->content_id}}">
            <div class="user_content_title_parts">
              <div class="user_content_title_parts_title">Title</div>
              <div class="user_content_title_parts_record">{{$content->content}}</div>
              <div class="user_content_title_parts_title">Time Limit</div>
              <div class="user_content_title_parts_record">{{$content->limit}}</div>
              @if ($content->arrival == 0)
                @if (is_numeric($content->diff))
                <div class="user_content_title_parts_record">{{$content->diff}}day</div>
                @else
                <div class="user_content_title_parts_record">{{$content->diff}}</div>
                @endif
              @endif
            </div>
          </a>
        </div>
      @else
        <div class="user_content_title">
          <div class="user_content_title_header">
            @if ($content->arrival == 1)
            <div class="user_content_title_header_text_box">
              <div class="user_content_title_header_text">
                Arrival!
              </div>
            </div>
            @else
            <div class="user_content_title_header_line_w"></div>
            <div class="user_content_title_header_line_y"></div>
            @endif
          </div>
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
      {{-- ページネーション  --}}
      @if (count($contents) >= 9)
      <div class="detail_pagenation">
        {!! $contents->links() !!}
      </div>
      @endif
    </div>
@endsection