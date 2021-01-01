@extends('layouts.admin')
@section('title', 'Add Image')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Image</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product: {{$data->title}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <br/>
                                <form action="{{route('adminImageStore',['product_id'=>$data->id])}}" method="post"
                                      data-parsley-validate
                                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
                                        <input name="image" id="image" class="col-md-6 col-sm-6" type="file">
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Add Image</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @foreach($images  as $rs)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        @if($rs->image)
                                            <img style="width: 100%; display: block;" src="{{Storage::url($rs->image)}}"
                                                 alt="image"/>
                                        @endif
                                        <div class="mask">
                                            <p>{{$rs->title}}</p>
                                            <div class="tools tools-bottom">
                                                <a href="{{route('adminImageDelete',['id'=>$rs->id,'product_id'=>$data->id])}}"
                                                   onclick="return confirm('Image will be delete! Are you sure')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="{{route('adminImageEdit',['id'=>$rs->id,'product_id'=>$data->id])}}"><i
                                                        class="fa fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><strong>Image Id: {{$rs->id}} </strong>
                                        </p>
                                        <p>Image Title: {{$rs->title}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
    </div>
    </div>
@endsection
