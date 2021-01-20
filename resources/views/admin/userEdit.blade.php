@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit User</h3>
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
                                <form action="{{route('adminUserUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
                                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="name" name="name" class="form-control"value="{{$data->name}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">E-Mail </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="email" name="email" class="form-control" type="text" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="phone" name="phone" class="form-control" type="text" value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="address" id="address" class="form-control" type="text" value="{{$data->address}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                                        <input name="image" id="image" class="col-md-6 col-sm-6" type="file">
                                    </div>
                                    @if($data->profile_photo_path)
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="60" alt="">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Edit User</button>
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
