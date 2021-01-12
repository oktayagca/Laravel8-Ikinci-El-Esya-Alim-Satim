@extends('layouts.home')
@section('title','User Profile')

@section('menu')
    @parent
@endsection
@section('categories')
    @include('home._userMenu')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <table id="datatable" class="table table-striped table-bordered"
               style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
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
            @include('home.message')
            @foreach($dataList as $rs)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$rs->id}}</td>
                    <td>
                        <a href="{{route('product',['id'=>$rs->product->id,'title'=>$rs->product->title])}}">{{$rs->product->title}}</a>
                    </td>
                    <td>{{$rs->subject}}</td>
                    <td>{{$rs->comment}}</td>
                    <td>{{$rs->rate}}</td>
                    <td>{{$rs->status}}</td>
                    <td>{{$rs->created_at}}</td>
                    <td>
                        <a href="{{route('destroyMyComments',['id'=>$rs->id])}}"
                           onclick="return confirm('Delete! Are you sure')"><img height="20" width="20" src="{{asset('assets')}}/images/delete.png"></img></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection