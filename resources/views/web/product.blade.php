@extends('layouts.app')

@section('content')
<div class="eshop-section section">
    <div class="container">
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 col-sm-6">
                <div class="shop-item">
                    <div class="shop-item-image">
                        <a href="{{route('web.product.detail', $item->id)}}"><img src="{{ asset('images/'.$item->image_url) }}" alt="Item Name"></a>
                    </div>
                    <div class="title">
                        <h3><a href="{{route('web.product.detail', $item->id)}}">{{$item->name}}</a></h3>
                    </div>
                    <div class="price">
                        ${{number_format($item->price)}}
                    </div>
                    <div class="actions">
                        <a class="btn btn-small add-cart" data-id="{{$item->id}}" 
                            data-name="{{$item->name}}" data-price="{{$item->price}}" data-image="{{$item->image_url}}">
                            <i class="icon-shopping-cart icon-white"></i> Add
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            <ul class="pagination pagination-lg">
                <li><a href="{{ $products->appends(request()->except('page'))->previousPageUrl() }}">Previous</a></li>
                @foreach($products->links()->getData()["elements"][0] as $key => $item)
                <li class="{{(isset(request()->query()['page']) && request()->query()['page'] == $key) ? 'active' : ''}}"><a href="{{$item}}">{{$key}}</a></li>
                @endforeach
                <li><a href="{{ $products->appends(request()->except('page'))->nextPageUrl() }}">Next</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.add-cart').on('click', function(){
            var user_id = '{{auth()->user()->id ?? ""}}';
            var cart = JSON.parse(localStorage.getItem('cart')) ?? [];
            var productId = $(this).data("id");
            var productName = $(this).data("name");
            var productPrice = $(this).data("price");
            var productImage = $(this).data("image");
            var amount = parseInt($('#amount').val() ?? 1);
            var filter = cart.filter(x => x['id'] == productId);
            if(filter.length == 0) {
                cart.push({
                    'id': productId,
                    'user_id' : user_id,
                    'name': productName,
                    'price': productPrice,
                    'amount': amount,
                    'image': productImage
                });
            } else {
                filter.map(x => {
                    x['amount'] = parseInt(x['amount']) + parseInt(amount);
                });
            }
            localStorage.setItem('cart', JSON.stringify(cart));

            console.log(JSON.parse(localStorage.getItem('cart')));
        });
    });
</script>