<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets')}}/admin/images/favicon.ico" type="image/ico"/>

    <title>Order Items</title>

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
                                <h2>Order Information</h2>
                                    <table id="datatable" class="table table-striped table-bordered"
                                           style="width:100%">
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <th>Id</th>
                                            <td class="sorting_1">{{$data->id}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>User</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Name</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Address</th>
                                            <td>{{$data->address}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Phone</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>E-Mail</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Total</th>
                                            <td>{{$data->total}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>IP</th>
                                            <td>{{$data->IP}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Create Date</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <th>Updated Date</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>

                                <div class="card-box table-responsive">
                                    <table id="datatable"
                                           class="table table-striped table-bordered"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <td>Product</td>
                                            <td>Title</td>
                                            <td>Price</td>
                                            <td>Quantity</td>
                                            <td>Amount</td>
                                            <td>Note</td>
                                            <td>Status</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <h2>Order İtem Information</h2>
                                        @include('home.message')
                                        @foreach($dataList as $rs)
                                            <form action="{{route('userComingOrderItemUpdate',['id'=>$rs->id])}}"
                                                  method="post"
                                                  data-parsley-validate
                                                  class="form-horizontal form-label-left">
                                                @csrf
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <a href="">@if($rs->product->image)
                                                                <img
                                                                    src="{{Storage::url($rs->product->image)}}"
                                                                    height="30" alt="">
                                                            @endif</a>
                                                    </td>
                                                    <td>
                                                        <h4>
                                                            <a href="{{route('product',['id'=>$rs->product_id,'title'=>$rs->product->title])}}">{{substr($rs->product->title,0,20)}}</a>
                                                        </h4>
                                                        <p>Product Id: {{$rs->product_id}}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{$rs->product->price}}</p>
                                                    </td>
                                                    <td class="cart_quantity">
                                                        {{$rs->quantity}}
                                                    </td>
                                                    <td class="cart_total">
                                                        <p class="cart_total_price">{{$rs->amount}}</p>
                                                    </td>

                                                    <td>
                                                        <div class="item form-group">
                                                            <div class="col-sm-12" style="padding-left: 0px">
                                                               <textarea class="form-control" name="note"
                                                                         rows="2" cols="15">{{$rs->note}}</textarea>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="item form-group">
                                                            <div class="col-sm-12" style="padding-left: 0px">
                                                                <select class="form-control" name="status">
                                                                    <option selected>{{$rs->status}}</option>
                                                                    <option>Accepted</option>
                                                                    <option>Cancelled</option>
                                                                    <option>Shipping</option>
                                                                    <option>Completed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="item form-group">
                                                            <div class="col-sm-12" >
                                                                <button type="submit" class="btn btn-success">Edit
                                                                    Order Item
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                        <tr>
                                            <td colspan="6">&nbsp;</td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tr>
                                                        <td>Total</td>
                                                        <td><span>{{$rs->price}}</span></td>
                                                    </tr>
                                                </table>
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
