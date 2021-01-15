<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Order::where('user_id',Auth::id())->get();
        return view('home.userOrder',['dataList'=>$dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $total = $request->input('total');
        return view('home.userOrderAdd',['total'=>$total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Order();
        $data->name =$request->input('name');
        $data->address =$request->input('address');
        $data->email =$request->input('email');
        $data->phone =$request->input('phone');
        $data->total =$request->input('total');
        $data->user_id =Auth::id();
        $data->Ip =$_SERVER['REMOTE_ADDR'];
        $data->save();

        $dataList = Shopcart::where('user_id',Auth::id())->get();
        foreach ($dataList as $rs){
            $data2 = new Orderitem();
            $data2->user_id =Auth::id();
            $data2->product_id =$rs->product_id;
            $data2->order_id =$data->id;
            $data2->price =$rs->product->price;
            $data2->quantity =$rs->quantity;
            $data2->amount =$rs->quantity * $rs->product->price;
            $data2->IP =$_SERVER['REMOTE_ADDR'];
            $data2->save();

        }
        $data3=Shopcart::where('user_id',Auth::id());
        $data3->delete();

        return redirect()->route('userOrders')->with('success','Prdouct order successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,$id)
    {
        $dataList = Orderitem::where('user_id',Auth::id())->where('order_id',$id)->get();
        return view('home.userOrderitem',['dataList'=>$dataList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
