@extends('layouts.admin')
@section('title', 'Comment List')
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
                    <h3>Comments</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <div class="clearfix"></div>
                                        </div>
                                        <a>@include('home.message')</a>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <table id="datatable" class="table table-striped table-bordered"
                                                               style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Product</th>
                                                                <th>Subject</th>
                                                                <th>Comment</th>
                                                                <th>Rate</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                                <th style="..." colspan="2">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($dataList as $rs)

                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1">{{$rs->id}}</td>
                                                                    <td>
                                                                        <a href="{{route('adminUserShow',['id'=>$rs->user->id])}}"
                                                                           onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')";>
                                                                        {{$rs->user->name}}
                                                                        </a></td>

                                                                    <td>
                                                                        <a target="_blank" href="{{route('adminProductEdit',['id'=>$rs->product->id])}}">{{$rs->product->title}}</a>
                                                                    </td>
                                                                    <td>{{$rs->subject}}</td>
                                                                    <td>{{$rs->comment}}</td>
                                                                    <td>{{$rs->rate}}</td>
                                                                    <td>{{$rs->status}}</td>
                                                                    <td>{{$rs->created_at}}</td>
                                                                    <td>
                                                                        <a href="{{route('adminCommentShow',['id'=>$rs->id])}}"
                                                                           onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')";><i
                                                                                class=" fa fa-edit"></i></a></td>
                                                                    <td>
                                                                        <a href="{{route('adminCommentDelete',['id'=>$rs->id])}}"
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
