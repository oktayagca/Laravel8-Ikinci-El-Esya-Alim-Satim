@extends('layouts.admin')
@section('title', 'Add Image')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Image</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <br/>
                                <form action="{{route('adminImageUpdate',['id'=>$data->id,'product_id'=>$product_id])}}" method="post"
                                      data-parsley-validate
                                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" value="{{$data->title}}" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                                        <input name="image" id="image" class="col-md-6 col-sm-6" type="file">
                                    </div>
                                    @if($data->image)
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <img src="{{Storage::url($data->image)}}" height="60" alt="">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Edit Image</button>
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
