@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')
    <div class="m-5">
        <checkmobilephone></checkmobilephone>

    </div>
@endsection
