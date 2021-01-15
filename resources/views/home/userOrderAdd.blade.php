@extends('layouts.home')
@section('title','Order Products')

@section('content')
    <div class="col-sm-12">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">

                        <div class="form-one">
                            <p>Order Details</p>
                            <form action="{{route('userOrderStore')}}" method="post">
                                @csrf
                                <input  type="hidden" name="total" value="{{$total}}">
                                <input type="text" name="name" value="{{Auth::user()->name}}"
                                       placeholder="Name & Surname">
                                <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email*">
                                <input type="text" name="address" value="{{Auth::user()->address}}"
                                       placeholder="Address">
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="Phone">

                                <button type="submit" class="btn btn-default add-to-cart">Place
                                    Holder</button>
                            </form>
                        </div>
                        <div class="form-two">
                            <p>Payments Details</p>
                            <form>
                                <input  type="hidden" name="total" value="{{$total}}">
                                <input type="text" name="cardname" placeholder="Card Name & Surname"
                                       value="{{Auth::user()->name}}">
                                <input type="number" name="cardnumber" placeholder="Card Number">
                                <input type="text" name="validDates" placeholder="Valid Dates">
                                <input type="text" name="key" placeholder="Secret Number">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
