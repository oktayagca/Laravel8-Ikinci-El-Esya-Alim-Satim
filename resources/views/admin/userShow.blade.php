<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets')}}/admin/images/favicon.ico" type="image/ico"/>

    <title>{{$data->name}}</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets')}}/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets')}}/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets')}}/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('assets')}}/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('assets')}}/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('assets')}}/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets')}}/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets')}}/admin/build/css/custom.min.css" rel="stylesheet">
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

</head>
<body class="nav-md">


<div class="x_title">
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('home.message')
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered"
                                       style="width:100%">
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <th rowspan="8" align="center" valign="center">
                                            @if($data->profile_photo_path)
                                                <img src="{{Storage::url($data->profile_photo_path)}}" height="300" style="border-radius: 10px">
                                            @endif
                                        </th>
                                        <th>Id</th>
                                        <td class="sorting_1">{{$data->id}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Name</th>
                                        <td>{{$data->name}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>E-Mail</th>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Phone</th>
                                        <td>{{$data->phone}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Address</th>
                                        <td>{{$data->address}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Date</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Roles</th>
                                        <td>
                                            <table>
                                                @foreach($data->roles as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td>
                                                            <a href="{{route('adminUserRoleDelete',['userid'=>$data->id,'roleid'=>$row->id])}}"
                                                               onclick="return confirm('Delete! Are you sure')"><i
                                                                    class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Add Role</th>
                                        <td>
                                            <form action="{{route('adminUserRoleAdd',['id'=>$data->id])}}" method="post"
                                                  data-parsley-validate
                                                  class="form-horizontal form-label-left">
                                                @csrf
                                                <div class="item form-group">
                                                    <div class="col-sm-5" style="padding-left: 0px">

                                                        <select class="form-control" name="roleid">
                                                            @foreach($dataList as $rs)
                                                                <option value="{{$rs->id}}">{{$rs->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-7" style="padding-left: 0px">
                                                        <button type="submit" class="btn btn-success">Add Role
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
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
</body>
</html>
