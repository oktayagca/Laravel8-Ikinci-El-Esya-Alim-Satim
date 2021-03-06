@extends('layouts.home')
@section('title',$data->title)
@section('description'){{$data->description}}@endsection
@section('keywords', $data->keywords)
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')

    <div class="col-sm-12 padding-right">
        @include('home.message')
        <div class="product-details"><!--product-details-->
            <div class="col-sm-4">
                <div class="view-product">
                    <img id="asd" src="{{Storage::url($data->image)}}" alt=""/>

                </div>
                </br>
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @php $i=0;@endphp
                        @foreach($dataList as $rs)
                            @php $i=$i+1;@endphp
                            <div class="item @if($i==1)active @endif">
                                <div class="col-sm-6">
                                    <img id="resim" style="height: 84px" src="{{Storage::url($rs->image)}}"
                                         class="girl img-responsive" alt=""/>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Controls -->
                    <a class="left item-control" href="#slider-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#slider-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>

            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$data->title}}</h2>
                    <p>Product ID: {{$data->id}}</p>


                    <form action="{{route('userShopcartAdd',['id'=>$data->id])}}" method="post">
                        @csrf
                        <span>
                        <div class="col-sm-12" style="padding:0px">
                            <span>US ${{$data->price}}</span>

                        <label>Quantity:</label>
                        <input name="quantity" type="number" value="1" max="{{$data->quantity}}"/>

                        <button type="submit" class="btn btn-default cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                             </div>
                                </span>
                    </form>
                    <p><b>Category:</b> {{$data->category->title}}</p>
                    <p><b>Brand:</b> {{$data->brand}}</p>
                    <p><b>Availability:</b> @if($data->quantity>0)In Stock @else Sold out  @endif</p>
                    <p><b>Location:</b> {{$data->location}}</p>
                    <p><b>Quantity:</b> {{$data->quantity}}</p>
                    <p><b>Warranty status:</b> {{$data->warranty_status}}</p>
                    <p><b>Seller:</b>{{$data->user->name}} </p>
                    <p><b>Tel:</b>{{$data->user->phone}} </p>

                    @php
                        $avgrev = \App\Http\Controllers\HomeController::avrgreview($data->id);
                        $countreview = \App\Http\Controllers\HomeController::countreview($data->id);
                    @endphp
                    <span class="fa fa-star @if ($avgrev<1)-o empty @else checked @endif "></span>
                    <span class="fa fa-star @if ($avgrev<2)-o empty @else checked @endif "></span>
                    <span class="fa fa-star @if ($avgrev<3)-o empty @else checked @endif "></span>
                    <span class="fa fa-star @if ($avgrev<4)-o empty @else checked @endif "></span>
                    <span class="fa fa-star @if ($avgrev<5)-o empty @else checked @endif "></span>
                    <a href="#reviews" data-toggle="tab">{{$countreview}} Comment(s) {{$avgrev}} / Add Comment</a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    <li class=""><a href="#reviews" data-toggle="tab">Comments</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <p>{!! $data->detail !!}</p>
                </div>
                <div class="tab-pane fade " id="reviews">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            @if(count($reviews))
                            @foreach($reviews as $rs)
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>{{$rs->user->name}}</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>{{$rs->created_at}}</a></li>
                                        <li>
                                            <span class="fa fa-star @if ($rs->rate>=1)checked @endif"></span>
                                            <span class="fa fa-star @if ($rs->rate>=2)checked @endif"></span>
                                            <span class="fa fa-star @if ($rs->rate>=3)checked @endif"></span>
                                            <span class="fa fa-star @if ($rs->rate>=4)checked @endif"></span>
                                            <span class="fa fa-star @if ($rs->rate==5)checked @endif"></span>
                                        </li>
                                    </ul>
                                    <strong>{{$rs->subject}}</strong>
                                    <p>{{$rs->comment}}</p>
                                </div>
                            @endforeach
                            @else
                                <p>No comments yet</p>
                            @endif
                        </div>

                        <div class="col-sm-6">
                            <p><b>Write Your Review</b></p>
                            @livewire('review',['id'=> $data->id])
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($picked as $rs)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img style="width: 268px" src="{{Storage::url($rs->image)}}" alt=""/>
                                            <h2>{{$rs->price}}</h2>
                                            <p>{{substr($rs->title,0,101)}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--/recommended_items-->

    </div>
@endsection


