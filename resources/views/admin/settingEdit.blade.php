@extends('layouts.admin')
@section('title', 'Edit Settings')
@section('css')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Settings</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        @include('home.message')
        <form action="{{route('adminSettingUpdate')}}" method="post" data-parsley-validate
              class="form-horizontal form-label-left" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content">
                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab"
                                       data-toggle="tab" href="#general" role="tab"
                                       aria-controls="general" aria-selected="true">General
                                        Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="smtp-tab" data-toggle="tab"
                                       href="#smtp" role="tab" aria-controls="smtp"
                                       aria-selected="false">Smtp Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-tab" data-toggle="tab"
                                       href="#social" role="tab" aria-controls="social"
                                       aria-selected="false">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="about-tab" data-toggle="tab"
                                       href="#about" role="tab" aria-controls="about"
                                       aria-selected="false">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab"
                                       href="#contact" role="tab" aria-controls="contact"
                                       aria-selected="false">Contact Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="references-tab" data-toggle="tab"
                                       href="#references" role="tab" aria-controls="references"
                                       aria-selected="false">References</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="general"
                                     role="tabpanel" aria-labelledby="general-tab">
                                    <input type="hidden" id="id" name="id" class="form-control"
                                           value="{{$data->id}}">
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" name="title"
                                                   class="form-control"
                                                   value="{{$data->title}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Keywords </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="keywords" name="keywords"
                                                   class="form-control" type="text"
                                                   value="{{$data->keywords}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="description" name="description"
                                                   class="form-control" type="text"
                                                   value="{{$data->description}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Company</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="company" id="price"
                                                   class="form-control" type="text"
                                                   value="{{$data->company}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="address" id="address"
                                                   class="form-control" type="text"
                                                   value="{{$data->address}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="phone" id="phone" class="form-control"
                                                   type="text" value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Fax</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="fax" id="fax" class="form-control"
                                                   type="text" value="{{$data->fax}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">E-Mail</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="email" id="email" class="form-control"
                                                   type="text" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="status" id="status"
                                                    class="form-control">
                                                <option
                                                    selected="selected">{{$data->status}}</option>
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="smtp" role="tabpanel"
                                     aria-labelledby="smtp-tab">
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Smtp
                                            Server</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="smtpServer" id="smtpServer"
                                                   class="form-control" type="text"
                                                   value="{{$data->smtpServer}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Smtp
                                            E-Mail</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="smtpEmail" id="smtpEmail"
                                                   class="form-control" type="text"
                                                   value="{{$data->smtpEmail}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Smtp
                                            Password</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="smtpPassword" id="smtpPassword"
                                                   class="form-control" type="password"
                                                   value="{{$data->smtpPassword}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Smtp
                                            Port</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="smtpPort" id="smtpPort"
                                                   class="form-control" type="number"
                                                   value="{{$data->smtpPort}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="social" role="tabpanel"
                                     aria-labelledby="social-tab">

                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Facebook</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="facebook" id="facebook"
                                                   class="form-control" type="text"
                                                   value="{{$data->facebook}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Instagram</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="instagram" id="instagram"
                                                   class="form-control" type="text"
                                                   value="{{$data->instagram}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Twitter</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="twitter" id="twitter"
                                                   class="form-control" type="text"
                                                   value="{{$data->twitter}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Youtube</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input name="youtube" id="youtube"
                                                   class="form-control" type="text"
                                                   value="{{$data->youtube}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="about" role="tabpanel"
                                     aria-labelledby="about-tab">
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">About
                                            Us</label>
                                        <div class="col-md-6 col-sm-6 ">
                                                                    <textarea id="editor1" class="ckeditor"
                                                                              name="aboutUs">{{$data->aboutUs}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                     aria-labelledby="contact-tab">
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">Contact</label>
                                        <div class="col-md-6 col-sm-6 ">
                                                                    <textarea id="editor1" class="ckeditor"
                                                                              name="contact">{{$data->contact}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="references" role="tabpanel"
                                     aria-labelledby="references-tab">
                                    <div class="item form-group">
                                        <label
                                            class="col-form-label col-md-3 col-sm-3 label-align">References</label>
                                        <div class="col-md-6 col-sm-6 ">
                                                                    <textarea id="editor1" class="ckeditor"
                                                                              name="references">{{$data->references}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset
                                        </button>
                                        <button type="submit" class="btn btn-success">Edit
                                            Settings
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /page content -->
    </div>
    </div>
@endsection
