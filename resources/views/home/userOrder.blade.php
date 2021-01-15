@extends('layouts.home')
@section('title','My Orders')

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
                                                                        <td>{{$rs->name}}</td>
                                                                        <td>{{$rs->phone}}</td>
                                                                        <td>{{$rs->email}}</td>
                                                                        <td>{{$rs->address}}</td>
                                                                        <td>{{$rs->total}}</td>
                                                                        <td>{{$rs->created_at}}</td>
                                                                        <td>{{$rs->status}}</td>

                                                                          <td>  <a href="{{route('userOrderShow',['id'=>$rs->id])}}"><i
                                                                                    class="fa fa-plus"></i></a></td>
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
