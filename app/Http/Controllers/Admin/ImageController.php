<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $product_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $data = Product::find($product_id);
        $images = DB::table('images')->where('product_id','=',$product_id)->get();
        return view('admin.imageAdd',['data'=>$data,'images'=>$images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
        $data = new Image();
        $data->title =$request->input('title');
        $data->product_id =$product_id;
        if($request->file('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();

        return redirect()->route('adminImageCreate',['product_id'=>$product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$product_id)
    {
        $data = Image::find($id);
        return view('admin.imageEdit',['data'=>$data,'product_id'=>$product_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$product_id)
    {
        $data = Image::find($id);
        $data->title =$request->input('title');
        $data->product_id =$product_id;
        if($request->file('image')) {
            $data->image = Storage::putFile('images', $request->file('image'));
        }
        $data->save();
        return redirect()->route('adminImageCreate',['product_id'=>$product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image,$id,$product_id)
    {
        $data = Image::find($id);
        $data->delete();
        return redirect()->route('adminImageCreate',['product_id'=>$product_id]);
    }
}
