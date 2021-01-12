<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets')}}/admin/images/favicon.ico" type="image/ico"/>

    <title>@yield('title')</title>

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

</head>
<body class="nav-md">


<div class="x_title">
    <H2><Comment></Comment> Detail</H2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <br/>
            <form action="{{route('adminCommentUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
                  class="form-horizontal form-label-left" enctype="multipart/form-data">
                @include('home.message')
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled type="text" id="id" name="id" class="form-control" value="{{$data->id}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled id="name" name="name" class="form-control" type="text" value="{{$data->user->name}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Product</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled id="product" name="product" class="form-control" type="text" value="{{$data->product->title}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="subject" id="subject" class="form-control" type="text" value="{{$data->subject}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Comment</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="comment" id="comment" class="form-control" type="text"
                               value="{{$data->comment}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Rate</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="rate" id="rate" class="form-control" type="text"
                               value="{{$data->rate}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">IP</label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea name="IP" id="note" IP="form-control">{{$data->IP}}</textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Crate Date</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="created_at" id="created_at" class="form-control" type="text" value="{{$data->created_at}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Updated Date</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="created_at" id="created_at" class="form-control" type="text" value="{{$data->created_at}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="status">
                            <option selected>{{$data->status}}</option>
                            <option >True</option>
                            <option >False</option>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Edit Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
