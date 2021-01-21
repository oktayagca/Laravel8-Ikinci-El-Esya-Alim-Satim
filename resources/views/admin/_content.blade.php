@php
    use App\Http\Controllers\Admin\HomeController;
    $newComments = HomeController::newComments();
    $newMessages = HomeController::messageList();
    $newProducts = HomeController::newProducts();
    $userCount = HomeController::userCount();
    $productCount = HomeController::productCount();
    $commentCount = HomeController::commentCount();
    $messageCount = HomeController::messageCount();
    $orderCount = HomeController::orderCount();
    $newOrders = HomeController::newOrders();
@endphp
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
               <a href="{{route('adminUser')}}"> <span class="count_top"><i class="fa fa-user"></i> Total Users</span></a>
                <div class="count">{{$userCount}}</div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('adminProducts')}}"> <span class="count_top"><i class="fa fa-desktop"></i> Total Products</span></a>
                <div class="count">{{$productCount}}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('adminComment')}}"><span class="count_top"><i class="fa fa-comments-o"></i> Total Comments</span></a>
                <div class="count green">{{$commentCount}}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('adminMessage')}}"><span class="count_top"><i class="fa fa-comment"></i> Total Messages</span></a>
                <div class="count">{{$messageCount}}</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('adminOrders')}}"> <span class="count_top"><i class="fa fa-table"></i> Total Orders</span></a>
                <div class="count">{{$orderCount}}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <a href="{{route('adminOrderList',['status'=>'new'])}}"> <span class="count_top"><i class="fa fa-table"></i> Total New Orders</span></a>
                <div class="count">{{$newOrders}}</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
    <div class="row">
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><a href="{{route('adminComment')}}" >New Comments</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            @foreach($newComments as $rs)
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a href="{{route('adminCommentShow',['id'=>$rs->id])}}"
                                                   onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')"
                                                   ;>{{$rs->subject}}</a>
                                            </h2>
                                            <div class="byline">
                                                <span>{{$rs->created_at}}</span> by <a
                                                    href="{{route('adminUserShow',['id'=>$rs->user->id])}}"
                                                    onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')"
                                                    ;>
                                                    {{$rs->user->name}}
                                                </a>
                                            </div>
                                            <p class="excerpt">
                                                {{$rs->comment}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><a href="{{route('adminMessage')}}" >New Messages</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            @foreach($newMessages as $rs)
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a href="{{route('adminMessageEdit',['id'=>$rs->id])}}"
                                                   onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')"
                                                   ;>{{$rs->subject}}</a>
                                            </h2>
                                            <div class="byline">
                                                    {{$rs->name}}
                                            </div>
                                            <p class="excerpt">
                                                {{$rs->message}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 ">
            <div>
                <div class="x_title">
                    <h2><a href="{{route('adminProducts')}}">New Products</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <ul class="list-unstyled top_profiles scroll-view">
                    @foreach($newProducts as $rs)
                    <li class="media event">
                        @if($rs->image)
                        <a href="{{route('adminProductEdit',['id'=>$rs->id])}}" style="padding-right: 20px">
                                <img src="{{Storage::url($rs->image)}}"
                                     height="40" alt="" >
                        </a>
                        @else
                            <a href="{{route('adminProductEdit',['id'=>$rs->id])}}" class="pull-left border-aero profile_thumb"></a>
                        @endif
                        <div class="media-body">
                            <a class="title" href="{{route('adminProductEdit',['id'=>$rs->id])}}">{{$rs->title}}</a>
                            <p><strong>${{$rs->price}} </strong>  by <a
                                    href="{{route('adminUserShow',['id'=>$rs->user->id])}}"
                                    onclick=" return !window.open(this.href, '',',height=700,width=1100,top=50,left=100')"
                                    ;>
                                    {{$rs->user->name}}
                                </a> </p>
                            <p><small>{{$rs->created_at}}</small>
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
