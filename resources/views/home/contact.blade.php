@extends('layouts.home')
@section('title','Contact -'. $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('content')
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Contact <strong>Us</strong></h2>
                    <div id="gmap" class="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        @include('home.message')
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" action="{{route('sendMessage')}}" method="post">
                            @csrf
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name & Surname">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email" @if($email) value="{{$email}}"@endif>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="phone" class="form-control" required="required" placeholder="Phone">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p>{!! $setting->contact !!}</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                @if($setting->facebook !=null)
                                    <li><a href="{{$setting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>@endif
                                @if($setting->twitter !=null)
                                    <li><a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>@endif
                                @if($setting->instagram !=null)
                                    <li><a href="{{$setting->instagram}}" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>@endif
                                @if($setting->youtube !=null)
                                    <li><a href="{{$setting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>@endif
                                @if($setting->google_plus !=null)
                                    <li><a href="{{$setting->google_plus}}" target="_blank"><i
                                                class="fa fa-google-plus"></i></a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
