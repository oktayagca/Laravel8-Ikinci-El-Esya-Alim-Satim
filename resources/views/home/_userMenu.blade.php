<h2>User Panel</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('myProfile')}}">My Profile</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('userShopcart')}}">My Shop Cart</a></h4>
        </div>
    </div>    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('userOrders')}}">My Orders</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('myComments')}}">My Comments</a></h4>
        </div>
    </div>
    @php
        $userRoles = Auth::user()->roles->pluck('name');""
    @endphp
    @if($userRoles->contains('seller'))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('userProducts')}}">My Products</a></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Coming Order
                </a>
            </h4>
        </div>
        <div id="womens" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <li><a href="{{route('userComingOrders')}}">All Orders</a></li>
                    <li><a href="{{route('userComingOrderList',['status'=>'New'])}}">New Orders</a></li>
                    <li><a href="{{route('userComingOrderList',['status'=>'Accepted'])}}">Accepted Orders</a></li>
                    <li><a href="{{route('userComingOrderList',['status'=>'Cancelled'])}}">Cancelled Orders</a></li>
                    <li><a href="{{route('userComingOrderList',['status'=>'Shipping'])}}">Shipping Orders</a></li>
                    <li><a href="{{route('userComingOrderList',['status'=>'Completed'])}}">Completed Orders</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    @if($userRoles->contains('admin'))
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('adminHome')}}" target="_blank">Admin Panel</a></h4>
            </div>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a href="{{route('logout')}}">Logout</a></h4>
        </div>
    </div>

</div>

