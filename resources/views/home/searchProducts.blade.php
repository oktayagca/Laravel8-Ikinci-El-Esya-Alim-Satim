@extends('layouts.home')
@section('title',"Search Product-".$setting->title)
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
            <h2 class="title text-center">{{$search}} Products</h2>
            @foreach($dataList as $rs)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img  style="height: 249px" src="{{Storage::url($rs->image)}}" alt=""/>
                            <h2>{{$rs->price}}$</h2>
                            <p>{{substr($rs->title,0,101)}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$rs->price}}$</h2>
                                <p>{{$rs->title}}</p>
                                <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}" class="btn btn-default add-to-cart">Quick View</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href=""><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!--features_items-->
    </div>

@endsection
