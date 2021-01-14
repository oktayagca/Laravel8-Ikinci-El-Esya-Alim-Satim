<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('adminHome')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            @if(Auth::user()->profile_photo_path)
            <div class="profile_pic">
                <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" alt="..." class="img-circle profile_img">
            </div>
            @else
                <div class="profile_pic">
                    <img src="{{asset('assets')}}/admin/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
            @endif
            <div class="profile_info">
                <span>Welcome,</span><br>
                @auth
                <a href="#" class=""><span>{{Auth::user()->name}}</span></a>
                <a href={{route('logout')}} class="d-block"><span>Logout</span></a>
                @endauth
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{route('adminCategory')}}"><i class="fa fa-edit"></i> Category </a></li>
                    <li><a href="{{route('adminProducts')}}"><i class="fa fa-desktop"></i> Products </a></li>
                    <li><a href="{{route('adminSetting')}}"><i class="fa fa-gears"></i> Settings</a></li>
                    <li><a href="{{route('adminMessage')}}"><i class="fa fa-comment"></i>Contact Messages</a></li>
                    <li><a href="{{route('adminComment')}}"><i class="fa fa-comments-o"></i>Comments </a>
                    <li><a href="{{route('adminFaq')}}"><i class="fa fa-question-circle"></i>FAQ </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
