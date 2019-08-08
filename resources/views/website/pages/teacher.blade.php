@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')
   <div class=" text-right" dir="rtl">
        <teacher :id="{{ $id }}"></teacher>

   </div>
@endsection
