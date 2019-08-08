@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')
    <div >
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center">
            <!-- Brand -->

            <!-- Links -->
            <ul class="navbar-nav text-center container text-right  " dir="rtl">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepageuser') }}">@lang('site.Dashboard')</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        @lang('site.Payment')
                    </a>
                    <div class="dropdown-menu text-right">
                        <a class="dropdown-item" href="{{ route('addCredit') }}">@lang('site.AddtoCredit')</a>
                        <a class="dropdown-item" href="{{ route('credit') }}">@lang('site.Credit')</a>
                        <a class="dropdown-item" href="#">@lang('site.Report')</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        @lang('site.ProductList')
                    </a>
                    <div class="dropdown-menu text-right">
                        <a class="dropdown-item" href="#">@lang('site.OnlineClass')</a>
                        <a class="dropdown-item" href="#">@lang('site.Class')</a>
                        <a class="dropdown-item" href="#">@lang('site.Product')</a>
                    </div>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown text-right">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        @lang('site.FavList')
                    </a>
                    <div class="dropdown-menu text-right">
                        <a class="dropdown-item" href="#">@lang('site.FavProf')</a>
                        <a class="dropdown-item" href="#">@lang('site.FavOnlineClass')</a>
                        <a class="dropdown-item" href="#">@lang('site.faClass')</a>
                        <a class="dropdown-item" href="#">@lang('site.FavProduct')</a>
                    </div>
                </li>
                <li class="nav-item dropdown text-right">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        @lang('site.Setting&Ticket')
                    </a>
                    <div class="dropdown-menu text-right">
                        <a class="dropdown-item" href="#">@lang('site.ProfileEdit')</a>
                        <a class="dropdown-item" href="#">@lang('site.newTicket')</a>
                        <a class="dropdown-item" href="#">@lang('site.TicketList')</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">@lang('site.Exit')</a>
                </li>
            </ul>
        </nav>
        <hr>
        <div class="container">
            <{{ @$component }} ></{{ @$component }}>
        </div>
    </div>
@endsection
