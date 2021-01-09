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
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="active">References</li>
        </ol>
    </div><!--/breadcrums-->

    <div class="register-req">
        <p>{!! $setting->references !!}</p>
    </div><!-
</div>
</section>
@endsection
