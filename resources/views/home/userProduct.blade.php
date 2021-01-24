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
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <a class="btn btn-round btn-info" href="{{route('userProductCreate')}}">Add Product</a>
                                <div class="clearfix"></div>
                            </div>
                            @include('home.message')
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box table-responsive">
                                                            <table id="datatable"
                                                                   class="table table-striped table-bordered"
                                                                   style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Category</th>
                                                                    <th>Title</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th>Location</th>
                                                                    <th>Image</th>
                                                                    <th>Image Gallery</th>
                                                                    <th>Status</th>
                                                                    <th style="..." colspan="2">Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($dataList as $rs)

                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1">{{$rs->id}}</td>
                                                                        <td>
                                                                            {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title)}}
                                                                        </td>
                                                                        <td>{{$rs->title}}</td>
                                                                        <td>{{$rs->quantity}}</td>
                                                                        <td>{{$rs->price}}</td>
                                                                        <td>{{$rs->location}}</td>
                                                                        <td>
                                                                            @if($rs->image)
                                                                                <img src="{{Storage::url($rs->image)}}"
                                                                                     height="30" alt="">
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{route('userImageCreate',['product_id'=>$rs->id])}}">
                                                                                <img
                                                                                    src="{{asset('assets/admin/images')}}/gallery.png"
                                                                                    height="30"> </a>
                                                                        </td>
                                                                        <td>@if($rs->status=='New') The product is not approved yet @elseif($rs->status=='False') Canceled @else Product on display @endif</td>
                                                                        <td>
                                                                            <a href="{{route('userProductEdit',['id'=>$rs->id])}}"><i
                                                                                    class="fa fa-edit"></i></a></td>
                                                                        <td>
                                                                            <a href="{{route('userProductDelete',['id'=>$rs->id])}}"
                                                                               onclick="return confirm('Delete! Are you sure')"><i
                                                                                    class="fa fa-times"></i></a></td>
                                                                    </tr>

                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    </div>
@endsection
