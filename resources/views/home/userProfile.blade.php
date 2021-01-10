@extends('layouts.home')
@section('title','User Profile')

@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        @include('profile.show')
    </div>
@endsection
