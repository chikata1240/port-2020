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
      {{-- ヘッダー --}}
      <div class="archive_content_title_header"></div>
      <div class="archive_content">
        <div class="archive_message">
          <div>
            <p>Well done!!</p>
            <p>Leave it in the archive!!<p>
          </div>
        </div>
      {{-- フォーム --}}
        <div class="archive_content_title_parts">
          <form action="/archive" method="POST" >
            @csrf
            <input type="hidden" name="content_id" value="{{$content_id}}">
            <p>1.When?</p>
            <input id="year" type="text" name="year">
            <label for="year">年</label>
            <input id="month" type="text" name="month">
            <label for="month">月</label>
            <input id="day" type="text" name="day">
            <label for="day">日</label>
            <p>2.How is your progress?</p>
            <input type="text" name="progress">
            <p>3.Memo</p>
            <input type="textarea" name="memo">
            <div class="content_submit">
              <input class="content_submit_button" type="submit" value="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection