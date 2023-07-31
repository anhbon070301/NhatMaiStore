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
                        <h3><a href="page-product-details.html">{{$item->name}}</a></h3>
                    </div>
                    <div class="price">
                        ${{number_format($item->price)}}
                    </div>
                    <div class="actions">
                        <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add</a>
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