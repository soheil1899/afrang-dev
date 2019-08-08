@extends('admin.dashboard')
@section('page')
    @if($id==null)
        <Categoryedit :id="null"></Categoryedit>

    @else
        <Categoryedit :id="{{ $id }}"></Categoryedit>

    @endif

@endsection
