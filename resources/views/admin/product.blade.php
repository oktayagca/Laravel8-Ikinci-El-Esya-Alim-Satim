@extends('layouts.admin')
@section('title', 'Product List')
@section('css')
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{asset('assets')}}/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
          rel="stylesheet">
    <link href="{{asset('assets')}}/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
          rel="stylesheet">
    <link href="{{asset('assets')}}/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
          rel="stylesheet">
    <link href="{{asset('assets')}}/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
          rel="stylesheet">
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Product</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a class="btn btn-round btn-info" href="{{route('adminProductCreate')}}">Add Product</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <table id="datatable" class="table table-striped table-bordered"
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
                                                                                 height="30" alt="" >
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('adminImageCreate',['product_id'=>$rs->id])}}">
                                                                            <img
                                                                                src="{{asset('assets/admin/images')}}/gallery.png"
                                                                                height="30" > </a>
                                                                    </td>
                                                                    <td>{{$rs->status}}</td>
                                                                    <td>
                                                                        <a href="{{route('adminProductEdit',['id'=>$rs->id])}}"><i
                                                                                class="fa fa-edit"></i></a></td>
                                                                    <td>
                                                                        <a href="{{route('adminProductDelete',['id'=>$rs->id])}}"
                                                                           onclick="return confirm('Delete! Are you sure')"><i
                                                                                class="fa fa-trash"></i></a></td>
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
@endsection

@section('footer')
    <!-- Datatables -->
    <script src="{{asset('assets')}}/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script
        src="{{asset('assets')}}/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('assets')}}/admin/vendors/pdfmake/build/vfs_fonts.js"></script>

@endsection
