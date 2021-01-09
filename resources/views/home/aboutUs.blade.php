@extends('layouts.home')
@section('title','About Us -'. $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
<section id="cart_items">
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="active">About Us</li>
        </ol>
    </div><!--/breadcrums-->

    <div class="register-req">
        <p>{!! $setting->aboutUs !!}</p>
    </div><!-
</div>
</section>
@endsection
