<div class="">
    <input wire:model="search" name="search" type="text" class="input search-input" list="mylist"
           placeholder="Search product.."/>
    @if(!empty($query))
        <datalist id="mylist">
            @foreach($dataList as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}}</option>
            @endforeach
        </datalist>
    @endif
</div>
