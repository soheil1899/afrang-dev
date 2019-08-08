@extends('admin.dashboard')
@section('page')
    @if(isset($id))
    <{{ $name }} :id="{{ $id }}" :token="{{ json_encode(csrf_token()) }}"></{{ $name }}>
    @else
        <{{ $name }} :token="{{ json_encode(csrf_token()) }}"></{{ $name }}>

    @endif
@endsection