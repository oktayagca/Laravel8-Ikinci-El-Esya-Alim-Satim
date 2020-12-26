@extends('layouts.admin')
@section('title', 'Edit Category')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Category</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-round btn-info" href="{{route('adminCategory')}}">Category List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <br/>
                                <form action="{{route('adminCategoryUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
                                      class="form-horizontal form-label-left">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Parent</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="0" >Main Category</option>
                                                @foreach($categoryList as $rs)
                                                    <option value="{{$rs->id}}" @if($rs->id==$data->parent_id) selected="selected" @endif>{{$rs->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" name="title" value="{{$data->title}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Keywords </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="keywords" name="keywords" value="{{$data->keywords}}" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="description" name="description" value="{{$data->description}}" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Slug</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="slug" value="{{$data->slug}}"  id="slug" class="form-control" type="text">
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
                                            <button type="submit" class="btn btn-success">Update</button>
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
