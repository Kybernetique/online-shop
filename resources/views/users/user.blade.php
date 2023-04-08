@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{-- User email --}}
        <h1>{{$user->email}}</h1>
        <hr>
    </div>
@endsection
