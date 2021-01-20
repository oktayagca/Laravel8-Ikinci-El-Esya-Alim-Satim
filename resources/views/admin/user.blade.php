@extends('layouts.admin')
@section('title', 'User List')
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
                    <h3>Users</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        @include('home.message')
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
                                                                <th></th>
                                                                <th>Name</th>
                                                                <th>E-Mail</th>
                                                                <th>Phone</th>
                                                                <th>Address</th>
                                                                <th>Roles</th>
                                                                <th style="..." colspan="2">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($dataList as $rs)

                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1">{{$rs->id}}</td>
                                                                    <td>
                                                                        @if($rs->profile_photo_path)
                                                                            <img src="{{Storage::url($rs->profile_photo_path)}}"
                                                                                 height="40" alt=""
                                                                                 style="border-radius: 10px">
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$rs->name}}</td>
                                                                    <td>{{$rs->email}}</td>
                                                                    <td>{{$rs->phone}}</td>
                                                                    <td>{{$rs->address}}</td>
                                                                    <td>
                                                                        @foreach($rs->roles as $row)
                                                                            {{$row->name}},
                                                                        @endforeach
                                                                        <a href="{{route('adminUserRoles',['id'=>$rs->id])}}"onclick="
                                                                           return !window.open(this.href,
                                                                        '',',height=800,width=1100,top=50,left=100')";>
                                                                            <i class="fa fa-plus-circle"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('adminUserEdit',['id'=>$rs->id])}}"><i
                                                                                class="fa fa-edit"></i></a></td>
                                                                    <td>
                                                                        <a href="{{route('adminUserDelete',['id'=>$rs->id])}}"
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
