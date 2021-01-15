@extends('layouts.admin')
@section('title')
    Admin {{$status}} Order List
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{$status}} Orders</h3>
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
                                                                <th>User</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>E-Mail</th>
                                                                <th>Address</th>
                                                                <th>Total</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($dataList as $rs)

                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1">{{$rs->id}}</td>
                                                                    <td>{{$rs->user->name}}</td>
                                                                    <td>{{$rs->name}}</td>
                                                                    <td>{{$rs->phone}}</td>
                                                                    <td>{{$rs->email}}</td>
                                                                    <td>{{$rs->address}}</td>
                                                                    <td>{{$rs->total}}</td>
                                                                    <td>{{$rs->created_at}}</td>
                                                                    <td>{{$rs->status}}</td>

                                                                    <td>
                                                                        <a href="{{route('adminOrderShow',['id'=>$rs->id])}}"
                                                                           onclick=" return !window.open(this.href, '',',height=800,width=1100,top=50,left=100')";><i
                                                                                class=" fa fa-edit"></i></a></td>
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
