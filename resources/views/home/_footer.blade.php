@php
    $setting=\App\Http\Controllers\HomeController::getSetting();
    $products = \App\Http\Controllers\HomeController::footerProduct();
@endphp

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <h4>Address</h4>
                        {{$setting->company}}<br>
                        {{$setting->address}}<br>
                        <strong>Fax :</strong>{{$setting->phone}}
                    </div>
                </div>
                <div class="col-sm-7">
                    @foreach($products as $rs)
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    @if($rs->image)
                                        <img src="{{Storage::url($rs->image)}}" alt="" >
                                    @endif
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>{{substr($rs->title,0,33)}}</p>
                            <h2>{{$rs->created_at}}</h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-3 ">
                    <div class="single-widget">
                        <h2 style="visibility: hidden">About Shopper</h2>
                        <form action="{{route('contactWithEmail')}}" method="post" class="searchform">
                            @csrf
                            <input name="email" type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2021 Designed by {{$setting->company}} </p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->
