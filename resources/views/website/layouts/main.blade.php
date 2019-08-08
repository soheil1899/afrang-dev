<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ @$header->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" ref="{{ asset('/media/Layout/'.\App\setting::where('lang',1)->first()->favicon) }}"
          type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ @$header->description }}">
    <meta name="msapplication-TileColor" content="red">
    <meta name="theme-color" content="red">
    <meta name="msapplication-navbutton-color" content="red">
    <meta name="apple-mobile-web-app-status-bar-style" content="red">
    <meta name="google-site-verification" content="..."/>
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{  url()->current() }}">
    <meta property="og:title" content="{{ @$header->title }}">
    <meta property="og:description" content={{ @$header->description }}"">
    <meta property="og:image" content="{{ asset(@$header->image) }}">
    <!-- Twitter -->
    <meta property="twitter:card" content="">
    <meta property="twitter:url" content="{{  url()->current() }}">
    <meta property="twitter:title" content="{{ @$header->title }}">
    <meta property="twitter:description" content="{{ @$header->description }}">
    <meta property="twitter:image" content="{{ asset(@$header->image) }}">
    @yield('css')
</head>
<body>
<div dir="rtl" id="app">

    @include('website.layouts.header')


    @yield('main')


    @include('website.layouts.footer')

</div>
</body>
@yield('js')
</html>
