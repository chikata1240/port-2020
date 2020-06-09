@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/details/details.css">
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
        <x-sub-links :sub-links="$nav_content">
          Details
        </x-sub-links>
        <x-sub-links :sub-links="$nav_content">
          Archive
        </x-sub-links>
      </div>
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
              <div class="detail_content_title_parts_archive">
                <a href="/archive?id={{$content->content_id}}">
                  <div class="detail_content_title_parts_archive_link">
                    Archive
                  </div>
                </a>
              </div>
              {{-- content_delete --}}
              <div class="detail_content_delete_box">
                <a href="/details_destroy?id={{$content->content_id}}">
                  <div class="detail_content_delete"></div>
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
              <div class="detail_content_title_parts_archive">
                <a href="/archive?id={{$content->content_id}}">
                  <div class="detail_content_title_parts_archive_link">
                    Archive
                  </div>
                </a>
              </div>
              {{-- content_delete --}}
              <div class="detail_content_delete_box">
                <a href="/details_destroy?id={{$content->content_id}}">
                  <div class="detail_content_delete"></div>
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
          <div class="delete_content_box">
            {{-- progress --}}
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
            {{-- archive_delete --}}
            <div class="detail_content_archive_delete_box">
              <a href="/archive_delete?id={{$item->progress_id}}&content_id={{$item->content_id}}">
                <div class="detail_content_archive_delete"></div>
              </a>
            </div>
          </div>
        </div>
      @endforeach

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