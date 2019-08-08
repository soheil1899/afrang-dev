@extends('admin.dashboard')

@section('page')
    @isset($id)
<editarticle :id="{{ $id }}" :token="{{ json_encode(csrf_token()) }}"></editarticle>
@else
<editarticle :token="{{ json_encode(csrf_token()) }}"></editarticle>
@endisset
@endsection