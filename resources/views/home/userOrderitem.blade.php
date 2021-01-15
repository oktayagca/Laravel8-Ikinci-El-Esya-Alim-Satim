@extends('layouts.home')
@section('title','My Order İtems')

@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <section id="cart_items">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Product</td>
                        <td class="description">Title</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Amount</td>
                        <td>Note</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                    <tbody>
                    @include('home.message')
                    @foreach($dataList as $rs)
                        <tr>
                            <td class="cart_product">
                                <a href="">@if($rs->product->image)
                                        <img
                                            src="{{Storage::url($rs->product->image)}}"
                                            height="30" alt="">
                                    @endif</a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="{{route('product',['id'=>$rs->product_id,'title'=>$rs->product->title])}}">{{substr($rs->product->title,0,20)}}</a>
                                </h4>
                                <p>Product Id: {{$rs->product_id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$rs->product->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                {{$rs->quantity}}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$rs->amount}}</p>
                            </td>
                            <td class="">
                            {{$rs->note}}
                            </td>
                            <td class="">
                                {{$rs->status}}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{$rs->order->total}}</span></td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>


        </section>
@endsection
