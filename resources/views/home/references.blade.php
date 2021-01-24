@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
@extends('layouts.home')
@section('title','References-'.$setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
<section id="cart_items">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="title text-center"> <strong>References</strong></h2>
            <div id="gmap" class="">
            </div>
        </div>
    </div>
    <div class="register-req">
        <p>{!! $setting->references !!}</p>
    </div><!-
</div>
</section>
@endsection
