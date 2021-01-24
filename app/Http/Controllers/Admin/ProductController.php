<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataList = Product::all()->sortByDesc('created_at');
        return view('admin.product',['dataList'=>$dataList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataList = Category::with('children')->get();
        return  view('admin.productAdd',['dataList'=>$dataList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->title =$request->input('title');
        $data->brand = $request->input('brand');
        $data->keywords =$request->input('keywords');
        $data->description =$request->input('description');
        $data->slug =$request->input('slug');
        $data->status =$request->input('status');
        $data->category_id =$request->input('category_id');
        $data->user_id =Auth::id();
        $data->price =$request->input('price');
        $data->warranty_status = $request->input('warrantyStatus');
        $data->quantity =$request->input('quantity');
        $data->location =$request->input('location');
        $data->detail =$request->input('detail');
        if($request->file('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('adminProducts')->with('success','Product added successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $dataList = Category::with('children')->get();
        $data = Product::find($id);
        return view('admin.productEdit',['data'=>$data,'dataList'=>$dataList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $data = Product::find($id);
        $data->title =$request->input('title');
        $data->brand = $request->input('brand');
        $data->keywords =$request->input('keywords');
        $data->description =$request->input('description');
        $data->slug =$request->input('slug');
        $data->status =$request->input('status');
        $data->category_id =$request->input('category_id');
        $data->price =$request->input('price');
        $data->warranty_status = $request->input('warrantyStatus');
        $data->tax =$request->input('tax');
        $data->location =$request->input('location');
        $data->detail =$request->input('detail');
        if($request->file('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('adminProducts')->with('success','Product updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        //DB::table('categories')->where('id','=',$id)->delete();
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('adminProducts')->with('success','Product deleted successfully');;
    }
}
