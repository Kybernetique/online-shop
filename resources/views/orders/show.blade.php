@extends('layouts.app')
@section('content')
    @foreach($data as $item)
        {{$item->items}}
    @endforeach
@endsection
