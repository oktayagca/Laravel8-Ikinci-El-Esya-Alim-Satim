<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = DB::select('select * from categories');
        return  view('admin.category',['categoryList'=>$categoryList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $categoryList = DB::table('categories')->get()->where('parent_id',0);
        return  view('admin.categoryAdd',['categoryList'=>$categoryList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        DB::table('categories')->insert([
            'parent_id'=>$request->input('parent_id'),
            'title'=>$request->input('title'),
            'keywords'=>$request->input('keywords'),
            'description'=>$request->input('description'),
            'slug'=>$request->input('slug'),
            'status'=>$request->input('status')
        ]);
        return redirect()->route('adminCategory');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryList = DB::table('categories')->get()->where('parent_id',0);
        $data = Category::find($id);
        return view('admin.categoryEdit',['data'=>$data,'categoryList'=>$categoryList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->parent_id = $request->input('parent_id');
        $data->title =$request->input('title');
        $data->keywords =$request->input('keywords');
        $data->description =$request->input('description');
        $data->slug =$request->input('slug');
        $data->status =$request->input('status');
        $data->save();

        return  redirect()->route('adminCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id','=',$id)->delete();
        return redirect()->route('adminCategory');
    }
}
