@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{$setting->phone}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{$setting->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            @if($setting->facebook !=null)
                                <li><a href="{{$setting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>@endif
                            @if($setting->twitter !=null)
                                <li><a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>@endif
                            @if($setting->instagram !=null)
                                <li><a href="{{$setting->instagram}}" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>@endif
                            @if($setting->youtube !=null)
                                <li><a href="{{$setting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>@endif
                            @if($setting->google_plus !=null)
                                <li><a href="{{$setting->google_plus}}" target="_blank"><i
                                            class="fa fa-google-plus"></i></a></li>@endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{route('home')}}"><img src="{{asset('assets')}}/images/home/logo.png" alt=""/></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">

                            @auth
                                @php
                                    $userRoles = Auth::user()->roles->pluck('name');
                                @endphp
                                <li><a href="{{route('userShopcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li class="dropdown"><a href="#"><i class="fa fa-user"></i> {{Auth::user()->name}}<i
                                            class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a style="background-color: #696763" href="{{route('myProfile')}}">My
                                                Profile</a></li>
                                        <li><a style="background-color: #696763" href="{{route('myComments')}}">My
                                                Comments</a></li>
                                        <li><a style="background-color: #696763" href="{{route('userOrders')}}">My
                                                Orders</a></li>
                                        @if($userRoles->contains('seller'))
                                        <li><a style="background-color: #696763" href="{{route('userProducts')}}">My
                                                Products</a></li>
                                        <li><a style="background-color: #696763" href="{{route('userComingOrders')}}">Coming
                                                Orders</a></li>
                                        @endif
                                        @if($userRoles->contains('admin'))
                                            <li><a style="background-color: #696763" href="{{route('adminHome')}}">Admin Panel</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-unlock"></i> Logout</a></li>
                            @endauth

                            @guest()
                                <li><a href="{{route('userShopcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li><a href="/login"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="/login"><i
                                            class="fa fa-lock"></i> Login</a></li>
                                <li><a href="/register"><i
                                            class="fa fa-sign-in"></i> Register</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('home')}}" class="">Home</a></li>
                            <li><a href="{{route('products')}}">Products</a></li>
                            <li><a href="{{route('userProductCreate')}}">Sell Product</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li><a href="{{route('references')}}">References</a></li>
                            <li><a href="{{route('aboutUs')}}">About Us</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="">
                        <div class="form-group col-md-12">
                            <form action="{{route('getProduct')}}" method="post">
                                @csrf
                                <div class="search_box pull-right">
                                    <div class="form-group col-md-8">
                                        @livewire('search')
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <button type="submit" class="search-button-link"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @livewireScripts

                    </div>
                </div>

            </div>
        </div>

    </div>
</header><!--/header-->
