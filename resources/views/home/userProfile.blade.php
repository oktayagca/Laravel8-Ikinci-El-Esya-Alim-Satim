@extends('layouts.home')
@section('title','User Profile')

@section('menu')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        @include('profile.show')
    </div>
@endsection
