@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Product</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-round btn-info" href="{{route('adminProducts')}}">Product List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <br/>
                                <form action="{{route('adminProductUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
                                      class="form-horizontal form-label-left">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($dataList as $rs)
                                                    <option value="{{$rs->id}}" @if($rs->id==$data->category_id) selected="selected" @endif>{{$rs->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" name="title" class="form-control"value="{{$data->title}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Keywords </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="keywords" name="keywords" class="form-control" type="text" value="{{$data->keywords}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="description" name="description" class="form-control" type="text" value="{{$data->description}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="price" id="price" class="form-control" type="number" value="{{$data->price}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="quantity" id="quantity" class="form-control" type="number" value="{{$data->quantity}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Minimum Quantity</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="minQuantity" id="minQuantity" class="form-control" type="number" value="{{$data->minQuantity}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tax</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="tax" id="tax" class="form-control" type="number" value="{{$data->tax}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Location</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="location" id="location" class="form-control" type="text" value="{{$data->location}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Detail</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="detail" id="detail" class="form-control" type="detail" value="{{$data->detail}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Slug</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="slug" id="slug" class="form-control" type="text" value="{{$data->slug}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="status" id="status" class="form-control">
                                                <option selected ="selected">{{$data->status}}</option>
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Edit Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    </div>
    </div>
@endsection
