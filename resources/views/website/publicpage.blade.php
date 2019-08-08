@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')
    <div id="app">
        @if(isset($id))

            <{{ $component }} :id="{{ $id }}"></{{ $component }}>

    @else
            <{{ $component }}></{{ $component }}>

    @endif

    </div>
@endsection
