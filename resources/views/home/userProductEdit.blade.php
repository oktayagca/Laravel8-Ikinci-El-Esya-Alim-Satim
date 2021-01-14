@extends('layouts.home')
@section('title','Add Product')
@section('css')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9">

        <form action="{{route('userProductUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
              class="form-horizontal form-label-left" enctype="multipart/form-data">
            @csrf
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Category</label>
                <div class="col-md-9 col-sm-9 ">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($dataList as $rs)
                            <option value="{{$rs->id}}" @if($rs->id==$data->category_id) selected="selected" @endif>
                                {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Title</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" id="title" name="title" class="form-control"value="{{$data->title}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Keywords </label>
                <div class="col-md-9 col-sm-9 ">
                    <input id="keywords" name="keywords" class="form-control" type="text" value="{{$data->keywords}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Description</label>
                <div class="col-md-9 col-sm-9 ">
                    <input id="description" name="description" class="form-control" type="text" value="{{$data->description}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Price</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="price" id="price" class="form-control" type="number" value="{{$data->price}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Quantity</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="quantity" id="quantity" class="form-control" type="number" value="{{$data->quantity}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-2 label-align">Minimum Quantity</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="minQuantity" id="minQuantity" class="form-control" type="number" value="{{$data->minQuantity}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tax</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="tax" id="tax" class="form-control" type="number" value="{{$data->tax}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Location</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="location" id="location" class="form-control" type="text" value="{{$data->location}}">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Detail</label>
                <div  class="col-md-9 col-sm-9 ">
                    <textarea id="editor1" class="ckeditor" name="detail" >{{$data->detail}}</textarea>
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Image</label>
                <input name="image" id="image" class="col-md-9 col-sm-9" type="file">
            </div>
            @if($data->image)
                <div class="item form-group" style="padding: 0px">
                    <label class="col-form-label col-md-2 col-sm-3 label-align"></label>
                    <div class="col-md-9 col-sm-9 ">
                        <img src="{{Storage::url($data->image)}}" height="60" alt="">
                    </div>
                </div>
            @endif
            <div class="ln_solid"></div>
            <div class="item form-group" style="padding: 0px">
                <div class="col-md-9 col-sm-9 offset-md-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                </div>
            </div>
        </form>

    </div>
@endsection
