<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        @yield('stylesheet')
    </head>
    <body>
        {{-- ヘッダー --}}
        <header>
            @yield('header')
        </header>

        {{-- コンテンツ --}}
        @yield('content')

        {{-- フッター --}}
        <footer>
            @include('include.footer-file')
        </footer>
    </body>