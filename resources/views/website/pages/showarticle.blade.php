@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')
        <div class="container text-right mt-5 documentsshow" dir="rtl" >
            @foreach($article->toContent as $key)
                @if($key->methods=="Title")
                    <h2>{{ $key->title }}</h2>
                @endif
                    @if($key->methods=="Images")
                 <img src="{{ $key->title }}" class="img-fluid">
                    @endif
                @if($key->methods=="Paragraph")
                    {!!  $key->Text !!}
                @endif
            @endforeach
        </div>

@endsection
