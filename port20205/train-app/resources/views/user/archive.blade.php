@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/components/slide/slide_component.css">
    <link rel="stylesheet" href="css/user/archive/archive.css">
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
      {{-- ヘッダー --}}
      <div class="archive_content_title_header"></div>
      <div class="archive_content">
        <div class="archive_message">
          <div>
            <p>
              Well done!!
              <span class="archive_border_line"></span>
            </p>
            <p>
              Leave it in the archive!!
              <span class="archive_border_line"></span>
            </p>
          </div>
        </div>
      {{-- フォーム --}}
        <div class="archive_content_title_parts">
          @foreach ($plan as $plan_item)
          <form action='/archive_{{$plan_item["type"]}}' method="POST" >
            @csrf
            <input type="hidden" name="content_id" value="{{$content_id}}">
            <p>1.When?</p>
            <input id="year" type="text" name="year" class="input_text" value="{{old('year')}}">
            <label for="year" class="input_day">年</label>
            <input id="month" type="text" name="month" class="input_text"  value="{{old('month')}}">
            <label for="month" class="input_day">月</label>
            <input id="day" type="text" name="days" class="input_text"  value="{{old('days')}}">
            <label for="day" class="input_day">日</label>
            @error('day')
              <span>{{$message}}</span>
            @enderror
            <p>2.How is your progress?</p>
            @if ($plan_item['type'] == 'book')
              <input id="progress" type="text" name="progress" value="{{old('progress')}}">
              <label for="progress">ページ</label>
            @else
              <input type="text" name="progress"  value="{{old('progress')}}">
            @endif
            @error('progress')
              <span>{{$message}}</span>
            @enderror
            <p>3.Memo</p>
            <input id="memo" type="textarea" name="memo" value="{{old('memo')}}">
            @error('memo')
              <span>{{$message}}</span>
            @enderror
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="">
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection