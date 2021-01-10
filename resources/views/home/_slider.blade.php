<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php $j=0;@endphp
                        @foreach($slider as $rs)
                            <li data-target="#slider-carousel" data-slide-to="$j" class="active"></li>
                            @php $j=$j+1;@endphp
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @php $i=0;@endphp
                        @foreach($slider as $rs)
                            @php $i=$i+1;@endphp
                            <div class="item @if($i==1)active @endif">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>{{$rs->title}}</h2>
                                    <p>{{$rs->price}} $ </p>
                                    <a href="{{route('product',['id'=>$rs->id,'title'=>$rs->title])}}"
                                            type="button" class="btn btn-default get">Get it now
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 441px" src="{{Storage::url($rs->image)}}"
                                         class="girl img-responsive" alt=""/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
