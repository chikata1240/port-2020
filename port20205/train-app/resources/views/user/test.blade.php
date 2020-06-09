@extends('layouts.master')

@section('stylesheet')
    <link rel="stylesheet" href="css/user/components/header/header_component.css">
    <link rel="stylesheet" href="css/user/components/user_information/user_information_component.css">
    <link rel="stylesheet" href="css/user/components/sub_link/sub_link_component.css">
    <link rel="stylesheet" href="css/user/test/test.css">
@endsection

@section('header')
    
@endsection

@section('content')
<div class="user_main">
    {{-- ユーザー情報 --}}
    <div class="user_information">
      <x-user-information :user-information="$user_information" />
      <div class="drop_down_list_box">
        <button type="button" id="nav-btn" class="hamburger">
          <span class="bdr"></span>
          <span class="bdr"></span>
        </button>
      </div>
      <div id="composer" class="composer_box">
        <x-sub-links sub-links="main">
          Main
        </x-sub-links>
        <x-sub-links sub-links="user">
          User
        </x-sub-links>
        <x-sub-links sub-links="user_edit">
          Image
        </x-sub-links>
        <x-sub-links sub-links="input">
          Input
        </x-sub-links>
        <x-sub-links sub-links="input">
          Input
        </x-sub-links>
        <x-sub-links sub-links="input">
          Input
        </x-sub-links>
      </div>
    </div>

    {{-- コンテンツ box--}}
    <div class="user_contents">
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('/js/dropdown/dropdown.js')}}"></script>
@endsection