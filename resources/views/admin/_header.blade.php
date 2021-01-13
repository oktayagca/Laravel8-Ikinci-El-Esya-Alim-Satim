<!-- top navigation -->
@php
    $messages = \App\Http\Controllers\Admin\HomeController::messageList();
    $numberOfMessages = count($messages);
@endphp

<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    @if(Auth::user()->profile_photo_path)
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                           id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" alt="">{{Auth::user()->name}}
                        </a>
                    @else
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                           id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('assets')}}/admin/images/img.jpg" alt="">{{Auth::user()->name}}
                        </a>
                    @endif

                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('myProfile')}}"> Profile</a>
                        <a class="dropdown-item" href="{{route('adminSetting')}}">
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i>
                            Log Out</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                       data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{$numberOfMessages}}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach($messages as $rs)
                            <li class="nav-item">
                                <a href="{{route('adminMessageEdit',['id'=>$rs->id])}}"
                                   onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')"
                                   ;>

                                    <span class="image"><i class="fa fa-user"></i></span>
                                    <span>
                          <span>{{$rs->name}}</span>
                        </span>
                                    <span class="message">
                        {{$rs->message}}
                        </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
