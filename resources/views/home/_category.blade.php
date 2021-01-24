@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp
<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        @foreach($parentCategories as $rs)

            <div class="panel-heading ">
                <h4 class="panel-title">
                    @if(count($rs->children)) <a data-toggle="collapse"  href="#{{$rs->id}}"><span class="badge pull-right"> <i
                                class="fa fa-plus"></i> </span></a>
                    <a href="{{route('categoryProducts',['id'=>$rs->id,'slug'=>$rs->title])}}">
                        {{$rs->title}}
                    </a>
                     @else
                        <a  href="{{route('categoryProducts',['id'=>$rs->id,'slug'=>$rs->title])}}">
                            {{$rs->title}}
                        </a>
                    @endif
                </h4>
            </div>
            @if(count($rs->children))
                @include('home.categoryTree',['children'=>$rs->children,'divId'=>$rs->id])
            @endif
        @endforeach
    </div>
</div><!--/category-products-->
