<div>
<form action="{{route('productsWithPrice')}}" method="post">
    @csrf
<div class="form-row">

    <div class="form-group col-md-6">
        <label for="price-range" class="control-label">Min price</label>
        <input name="minPrice" type="text" class="form-control minPrice" placeholder="From">
    </div>

    <div class="form-group col-md-6">
        <label for="price-range" class="control-label">Max price</label>
        <input name="maxPrice" type="text" class="form-control maxPrice" placeholder="To">
    </div>

</div>
<!-- END OF PRICE RANGE FORM -->
<div class="form-row">
    <div class="col-md-12">
        <button class="market-search-submit form-control"> Search </button>
    </div>
</div>

</form>
</div>
