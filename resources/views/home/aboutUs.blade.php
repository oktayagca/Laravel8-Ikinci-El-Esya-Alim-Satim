@extends('layouts.home')
@section('title','About Us -'. $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
<section id="cart_items">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="title text-center"> <strong>About Us</strong></h2>
            <div id="gmap" class="">
            </div>
        </div>
    </div>
    <div class="register-req">
        <p>{!! $setting->aboutUs !!}</p>
    </div><!-
</div>
</section>
@endsection
