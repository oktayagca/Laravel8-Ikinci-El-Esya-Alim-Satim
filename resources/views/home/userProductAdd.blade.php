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

        <form action="{{route('userProductStore')}}" method="post" data-parsley-validate
              class="form-horizontal form-label-left" enctype="multipart/form-data">
            @csrf
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Category</label>
                <div class="col-md-9 col-sm-9 ">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($dataList as $rs)
                            <option value="{{$rs->id}}">
                                {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Title</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" id="title" name="title" class="form-control">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Keywords </label>
                <div class="col-md-9 col-sm-9 ">
                    <input id="keywords" name="keywords" class="form-control" type="text">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Description</label>
                <div class="col-md-9 col-sm-9 ">
                    <input id="description" name="description" class="form-control" type="text">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Price</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="price" id="price" class="form-control" type="number" value="0">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Quantity</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="quantity" id="quantity" class="form-control" type="number"
                           value="1">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Minimum
                    Quantity</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="minQuantity" id="minQuantity" class="form-control"
                           type="number" value="1">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Tax</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="tax" id="tax" class="form-control" type="number" value="18">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Location</label>
                <div class="col-md-9 col-sm-9 ">
                    <input name="location" id="location" class="form-control" type="text">
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Detail</label>
                <div class="col-md-9 col-sm-9 ">
                    <textarea id="editor1" class="ckeditor" name="detail"></textarea>
                </div>
            </div>
            <div class="item form-group" style="padding: 0px">
                <label class="col-form-label col-md-2 col-sm-3 label-align">Image</label>
                <input name="image" id="image" class="col-md-6 col-sm-6" type="file">
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group" style="padding: 0px">
                <div class="col-md-9 col-sm-9 ">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>


    </div>
@endsection
