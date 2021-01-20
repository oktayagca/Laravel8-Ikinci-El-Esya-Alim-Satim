<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class ComingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Orderitem::all();
        $dataList2=collect();

        foreach ($dataList as $rs){
            if($rs->product->user_id == Auth::id()){
                $dataList2 ->push($rs);
            }
        }

        return view('home.userComingOrder',['dataList'=>$dataList2]);

    }


    public function list($status)
    {
        $dataList = Orderitem::where('status',$status)->get();

        $dataList2=collect();

        foreach ($dataList as $rs){
            if($rs->product->user_id == Auth::id()){
                $dataList2 ->push($rs);
            }
        }

        return view('home.userComingOrder',['dataList'=>$dataList2,'status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,$id,$product_id)
    {
        $data = Order::find($id);
        $dataList = Orderitem::where('order_id',$id)->where('product_id',$product_id)->get();
        return view('home.userComingOrderitem',['data'=>$data,'dataList'=>$dataList]);
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
    public function update(Request $request, Order $order,$id)
    {
        $data = Order::find($id);
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        $data->save();
        return redirect()->back()->with('success','Order Updated');
    }
    public function itemupdate(Request $request, Order $order,$id)
    {
        $data = Orderitem::find($id);
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        $data->save();
        return redirect()->back()->with('success','Order Item Updated');
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
