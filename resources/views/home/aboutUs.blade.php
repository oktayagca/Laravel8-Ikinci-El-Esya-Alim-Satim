@extends('layouts.home')
@section('title','About Us -'. $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
<section id="cart_items">
<div class="container">
    <div class="register-req">
        <p>{!! $setting->aboutUs !!}</p>
    </div><!-
</div>
</section>
@endsection
