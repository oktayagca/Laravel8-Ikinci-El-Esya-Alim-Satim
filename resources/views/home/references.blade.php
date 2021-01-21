@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
@extends('layouts.home')
@section('title','References-',$setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
<section id="cart_items">
<div class="container">
    <div class="register-req">
        <p>{!! $setting->references !!}</p>
    </div><!-
</div>
</section>
@endsection
