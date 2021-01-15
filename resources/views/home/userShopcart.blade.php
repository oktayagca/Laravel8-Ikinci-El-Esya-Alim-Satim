@extends('layouts.home')
@section('title','My Shopcart')

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
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total=0;
                    @endphp
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
                                <div class="cart_quantity_button">
                                    <form action="{{route('userShopcartUpdate',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <input
                                            onchange="this.form.submit()"
                                            class="cart_quantity_input"
                                            type="number" name="quantity"
                                            value="{{$rs->quantity}}"
                                            autocomplete="off" size="2" min="1" max="{{$rs->product->quantity}}">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$rs->product->price * $rs->quantity}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('userShopcartDelete',['id'=>$rs->id])}}"
                                   onclick="return confirm('Delete! Are you sure')"><i
                                        class="fa fa-times"></i></a></td>
                        </tr>
                        @php
                            $total +=$rs->product->price * $rs->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{$total}}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{$total}}</span></td>
                                </tr>
                            </table>
                            <form action="{{route('userOrderAdd')}}" method="post">
                                @csrf
                                <input hidden type="text" name="total" value="{{$total}}">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default add-to-cart">Place
                                        Holder</button>
                                </div>
                            </form>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>


        </section>
@endsection
