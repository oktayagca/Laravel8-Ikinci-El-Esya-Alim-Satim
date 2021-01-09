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
    <H2>Message Detail</H2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <br/>
            <form action="{{route('adminMessageUpdate',['id'=>$data->id])}}" method="post" data-parsley-validate
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
                        <input disabled id="name" name="name" class="form-control" type="text" value="{{$data->name}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">E-Mail</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled id="email" name="email" class="form-control" type="text" value="{{$data->email}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="phone" id="phone" class="form-control" type="text" value="{{$data->phone}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Subject</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="subject" id="subject" class="form-control" type="text"
                               value="{{$data->subject}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Message</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="message" id="message" class="form-control" type="text"
                               value="{{$data->message}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Admin Note</label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea name="note" id="note" class="form-control">{{$data->note}}</textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="status" id="status" class="form-control" type="text" value="{{$data->status}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Ip</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input disabled name="ip" id="ip" class="form-control" type="text" value="{{$data->ip}}">
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
