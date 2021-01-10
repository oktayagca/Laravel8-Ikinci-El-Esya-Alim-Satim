@extends('layouts.home')
@section('title',$data->title)
@section('description'){{$data->description}}@endsection
@section('keywords', $data->keywords)

@section('content')
    <div class="col-sm-12 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-4">
                <div class="view-product">
                    <img id="" src="{{Storage::url($data->image)}}" alt=""/>
                    <h3>ZOOM</h3>
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
                                    <a href=""><img style="height: 84px" src="{{Storage::url($rs->image)}}"
                                         class="girl img-responsive" alt=""/></a>
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
                    <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                    <h2>{{$data->title}}</h2>
                    <p>Product ID: {{$data->id}}</p>
                    <img src="images/product-details/rating.png" alt=""/>
                    <span>
									<span>US ${{$data->price}}</span>
									<label>Quantity:</label>
									<input type="text" value="{{$data->quantity}}"/>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                    <p><b>Availability:</b> @if($data->status=='True')In Stock @else Sold out  @endif</p>
                    <p><b>Location:</b> {{$data->location}}</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <p><b>Description:</b> {{$data->description}}</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <p>{!! $data->detail !!}</p>
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
