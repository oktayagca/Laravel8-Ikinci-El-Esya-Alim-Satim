@extends('layouts.home')
@section('title',"Product List-". $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('categories')
    @include('home._category')
@endsection
@section('priceRange')
    @include('home._priceRange')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">All Products</h2>
            @include('home.message')
            @foreach($dataList as $rs)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center" style="height: 385px">
                            <img  style="height: 249px" src="{{Storage::url($rs->image)}}" alt=""/>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h2>{{$rs->price}}$</h2>
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
                                <h2>{{$rs->price}}$</h2>
                                <p>{{$rs->title}}</p>
                                <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}" class="btn btn-default add-to-cart">Quick View</a>
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
    </div>

@endsection
