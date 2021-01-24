@extends('layouts.home')
@section('title','Frequently Asked Question-'. $setting->title)
@section('description'){{$setting->description}}@endsection
@section('keywords', $setting->keywords)
@section('menu')
@endsection
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center"><strong>Frequently Asked Question</strong></h2>
                <div id="gmap" class="">
                </div>
            </div>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($dataList as $rs)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne"  >
                        <h4 class="panel-title" style="padding: 10px 15px">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$rs->id}}"
                               aria-expanded="true" aria-controls="collapseOne">
                                {{$rs->question}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{$rs->id}}" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            {!! $rs->answer  !!}
                        </div>
                    </div>
                </div>
                    @endforeach

        </div>

    </div>

@endsection
