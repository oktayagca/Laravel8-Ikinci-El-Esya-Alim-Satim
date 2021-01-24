@extends('layouts.home')
@section('title')
    Coming {{$status}} Order List
@endsection

@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            @include('home.message')
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box table-responsive">
                                                            <table id="datatable"
                                                                   class="table table-striped table-bordered"
                                                                   style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <td>Order Id</td>
                                                                    <td>Product</td>
                                                                    <td>Title</td>
                                                                    <td>Price</td>
                                                                    <td>Quantity</td>
                                                                    <td>Amount</td>
                                                                    <td>Note</td>
                                                                    <td>Status</td>
                                                                    <td></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($dataList as $rs)

                                                                    <tr role="row" class="odd">
                                                                        <td>{{$rs->order->id}}</td>
                                                                        <td>
                                                                            <a href="">@if($rs->product->image)
                                                                                    <img
                                                                                        src="{{Storage::url($rs->product->image)}}"
                                                                                        height="30" alt="">
                                                                                @endif</a>
                                                                        </td>
                                                                        <td>
                                                                            <h5>
                                                                                <a href="{{route('product',['id'=>$rs->product_id,'title'=>$rs->product->title])}}">{{substr($rs->product->title,0,20)}}</a>
                                                                            </h5>
                                                                        </td>
                                                                        <td>
                                                                            <p>{{$rs->product->price}}</p>
                                                                        </td>
                                                                        <td class="cart_quantity">
                                                                            {{$rs->quantity}}
                                                                        </td>
                                                                        <td class="cart_total">
                                                                            <p class="cart_total_price">{{$rs->amount}}</p>
                                                                        </td>
                                                                        <td>
                                                                            {{$rs->note}}
                                                                        </td>
                                                                        <td>
                                                                            {{$rs->status}}
                                                                        </td>

                                                                        <td>
                                                                            <a href="{{route('userComingOrderShow',['id'=>$rs->order->id,'product_id'=>$rs->product_id])}}"
                                                                               onclick=" return !window.open(this.href, '',',height=800,width=1100,top=50,left=100')"
                                                                               ;><i
                                                                                    class=" fa fa-edit"></i></a></td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>
        </div>
    </div>
@endsection
