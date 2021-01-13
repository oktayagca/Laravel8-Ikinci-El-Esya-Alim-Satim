@extends('layouts.admin')
@section('title', 'Add Frequently Asked Question')
@section('css')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add FAQ</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-round btn-info" href="{{route('adminFaq')}}">FAQ List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <br/>
                                <form action="{{route('adminFaqStore')}}" method="post" data-parsley-validate
                                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Position</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="number" id="position" name="position" class="form-control"
                                                   value="0">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Question </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="question" name="question" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Answer</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea id="editor1" class="ckeditor" name="answer"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="status" id="status" class="form-control">
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </div>
                                </form>
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
