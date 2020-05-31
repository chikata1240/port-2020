@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header_component.css">
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
    {{-- コンテンツ --}}
    <div class="user_contents">
      {{-- コンテンツタイトル --}}
      @foreach ($detail_content as $content)
        @if ($content->type == 'book')
          <div class="detail_content_title">
            <div class="detail_content_title_header"></div>
            <div class="detail_content_title_parts">
              <div class="detail_content_title_parts_goal">
                <div class="detail_content_title_parts_title">Title</div>
                <div class="detail_content_title_parts_record">{{$content->content}}</div>
                <div class="detail_content_title_parts_title">Time limit</div>
                <div class="detail_content_title_parts_record">{{$content->limit}}</div>
                <div class="detail_content_title_parts_title">Progress</div>
                <div class="detail_content_title_parts_record">{{$remaining_pages['reed_page']}}/{{$remaining_pages['max_page']}}({{$remaining_pages['remaining_page']}}%)</div>
              </div>
              <div class="detail_content_title_parts_archibe">
                <a href="/archive?id={{$content->content_id}}">
                  <div class="detail_content_title_parts_archibe_link">
                    Archive
                  </div>
                </a>
              </div>
            </div>
          </div>
        @else
          <div class="detail_content_title">
            <div class="detail_content_title_header"></div>
            <div class="detail_content_title_parts">
              <div class="detail_content_title_parts_goal">
                <div class="detail_content_title_parts_title">Doing</div>
                <div class="detail_content_title_parts_record">{{$content->content}}</div>
                <div class="detail_content_title_parts_title">Your Goal</div>
                <div class="detail_content_title_parts_record">{{$content->limit}}</div>
                <div class="detail_content_title_parts_title">Rules</div>
                <div class="detail_content_title_parts_record">{{$content->rule}}</div>
              </div>
              <div class="detail_content_title_parts_archibe">
                <a href="/archive?id={{$content->content_id}}">
                  <div class="detail_content_title_parts_archibe_link">
                    Archive
                  </div>
                </a>
              </div>
            </div>

          </div>
        @endif
      @endforeach

      {{-- コンテンツの進捗 --}}
      @foreach ($archives as $item)
        <div class="detail_content_progress">
          <div class="detail_content_progress_header"></div>
          <div class="detail_content_progress_parts">
            <div class="detail_content_progress_parts_title">Day</div>
            <div class="detail_content_progress_parts_record">{{$item->day}}</div>
            <div class="detail_content_progress_parts_title">Progress</div>
            @if ($content->type == 'book')
              <div class="detail_content_progress_parts_record">{{$item->progress}}ページ</div>
            @else
              <div class="detail_content_progress_parts_record">{{$item->progress}}</div>
            @endif
            <div class="detail_content_progress_parts_title">memo</div>
            <div class="detail_content_progress_parts_record">{{$item->memo}}</div>
          </div>
        </div>
      @endforeach

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