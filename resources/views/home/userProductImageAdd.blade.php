@extends('layouts.home')
@section('title','My Products')

@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <h4>Product: {{$data->title}}</h4>

        <div class="x_content">

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <br/>
                    @include('home.message')
                    <form action="{{route('userImageStore',['product_id'=>$data->id])}}" method="post"
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
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-striped table-bordered"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $rs)

                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$rs->id}}</td>
                            <td>{{$rs->title}}</td>
                            <td>
                                @if($rs->image)
                                    <img src="{{Storage::url($rs->image)}}"
                                         height="50" alt="">
                            @endif
                            <td>
                                <a href="{{route('userImageDelete',['id'=>$rs->id,'product_id'=>$data->id])}}"
                                   onclick="return confirm('Delete! Are you sure')"><i
                                        class="fa fa-times"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
