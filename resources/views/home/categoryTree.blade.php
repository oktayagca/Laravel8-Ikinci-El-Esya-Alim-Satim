<div id="{{trim($divId," ")}}" class="panel-collapse collapse">
    <div class="panel panel-default">
        @foreach($children as $subcategory)
            <ul>
                @if(count($subcategory->children))

                    <div class="panel-heading">
                        <h4 class="panel-title">
                            @if(count($subcategory->children)) <a data-toggle="collapse"  href="#{{$subcategory->id}}"><span class="badge pull-right"> <i
                                        class="fa fa-plus"></i> </span></a>@endif
                            <a  href="www.google.com">
                                {{$subcategory->title}}
                            </a>
                        </h4>
                    </div>

                    @include('home.categoryTree',['children'=>$subcategory->children,'divId'=>$subcategory->id])

                @else

                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="www.google.com">
                                {{$subcategory->title}}
                            </a>
                        </h4>
                    </div>
                @endif
            </ul>
        @endforeach
    </div>
</div>