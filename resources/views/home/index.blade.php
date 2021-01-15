@extends('layouts.home')
@section('title',$setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('slider')
    @include('home._slider')
@endsection
@section('categories')
    @include('home._category')
@endsection
@section('priceRange')
    @include('home._priceRange')
@endsection
@section('css')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        @include('home.message')
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Daily Items</h2>
            @foreach($daily as $rs)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img style="height: 249px" src="{{Storage::url($rs->image)}}" alt=""/>
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <h2>{{$rs->price}}</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        @php
                                            $avgrev = \App\Http\Controllers\HomeController::avrgreview($rs->id);
                                            $countreview = \App\Http\Controllers\HomeController::countreview($rs->id);
                                        @endphp
                                        <br>
                                        <span class="fa fa-star @if ($avgrev<1)-o empty @else checked @endif "></span>
                                        <span class="fa fa-star @if ($avgrev<2)-o empty @else checked @endif "></span>
                                        <span class="fa fa-star @if ($avgrev<3)-o empty @else checked @endif "></span>
                                        <span class="fa fa-star @if ($avgrev<4)-o empty @else checked @endif "></span>
                                        <span class="fa fa-star @if ($avgrev<5)-o empty @else checked @endif "></span>
                                        <i>({{$countreview}})</i>
                                    </div>
                                </div>
                                <p>{{substr($rs->title,0,101)}}</p>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <h2>{{$rs->price}}</h2>
                                        </div>
                                    </div>
                                    <p>{{$rs->title}}</p>
                                    <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}"
                                       class="btn btn-default add-to-cart">Quick View</a>
                                </div>
                            </div>
                        </div>

                        <div class="productinfo text-center">
                            <form action="{{route('userShopcartAdd',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input hidden name="quantity" type="number" value="1"/>
                                <button class="btn btn-default add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i>Add
                                    to cart
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div><!--features_items-->

        <div class="features_items">
            <div class="col-sm-12">
                <h2 class="title text-center">Last Items</h2>
            </div>
            <div class="tab-content">
                @foreach($last as $rs)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img style="height: 249px" src="{{Storage::url($rs->image)}}" alt=""/>
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <h2>{{$rs->price}}</h2>
                                        </div>
                                        <div class="col-sm-6">
                                            @php
                                                $avgrev = \App\Http\Controllers\HomeController::avrgreview($rs->id);
                                                $countreview = \App\Http\Controllers\HomeController::countreview($rs->id);
                                            @endphp
                                            <br>
                                            <span
                                                class="fa fa-star @if ($avgrev<1)-o empty @else checked @endif "></span>
                                            <span
                                                class="fa fa-star @if ($avgrev<2)-o empty @else checked @endif "></span>
                                            <span
                                                class="fa fa-star @if ($avgrev<3)-o empty @else checked @endif "></span>
                                            <span
                                                class="fa fa-star @if ($avgrev<4)-o empty @else checked @endif "></span>
                                            <span
                                                class="fa fa-star @if ($avgrev<5)-o empty @else checked @endif "></span>
                                            <i>({{$countreview}})</i>
                                        </div>
                                    </div>
                                    <p>{{substr($rs->title,0,101)}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$rs->price}}</h2>
                                        <p>{{$rs->title}}</p>
                                        <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}"
                                           class="btn btn-default add-to-cart">Quick View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="productinfo text-center">
                            <form action="{{route('userShopcartAdd',['id'=>$rs->id])}}" method="post">
                                @csrf
                                <input hidden name="quantity" type="number" value="1"/>
                                <button class="btn btn-default add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i>Add
                                    to cart
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Picked Items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($picked as $rs)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}"> <img
                                                    style="width: 268px" src="{{Storage::url($rs->image)}}" alt=""/>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <h2>{{$rs->price}}</h2>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @php
                                                            $avgrev = \App\Http\Controllers\HomeController::avrgreview($rs->id);
                                                            $countreview = \App\Http\Controllers\HomeController::countreview($rs->id);
                                                        @endphp
                                                        <br>
                                                        <span @if ($avgrev<1)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<1)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<2)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<2)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<3)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<3)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<4)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<4)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<5)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<5)-o empty @else checked @endif "></span>
                                                        <i style="color: black">({{$countreview}})</i>
                                                    </div>
                                                </div>
                                                <p>{{substr($rs->title,0,101)}}</p></a>
                                            <form action="{{route('userShopcartAdd',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <input hidden name="quantity" type="number" value="1"/>
                                                <button class="btn btn-default add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i>Add
                                                    to cart
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach($picked2 as $rs)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}"> <img
                                                    style="width: 268px" src="{{Storage::url($rs->image)}}" alt=""/>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <h2>{{$rs->price}}</h2>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @php
                                                            $avgrev = \App\Http\Controllers\HomeController::avrgreview($rs->id);
                                                            $countreview = \App\Http\Controllers\HomeController::countreview($rs->id);
                                                        @endphp
                                                        <br>
                                                        <span @if ($avgrev<1)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<1)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<2)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<2)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<3)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<3)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<4)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<4)-o empty @else checked @endif "></span>
                                                        <span @if ($avgrev<5)style="color: black"
                                                              @endif class="fa fa-star @if ($avgrev<5)-o empty @else checked @endif "></span>
                                                        <i style="color: black">({{$countreview}})</i>
                                                    </div>
                                                </div>
                                                <p>{{substr($rs->title,0,101)}}</p></a>
                                            <form action="{{route('userShopcartAdd',['id'=>$rs->id])}}" method="post">
                                                @csrf
                                                <input hidden name="quantity" type="number" value="1"/>
                                                <button class="btn btn-default add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i>Add
                                                    to cart
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
@endsection
