@extends('layouts.app')

@section('content')
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shopping Cart</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                    @foreach ($carts as $value)
                    <!-- Shopping Cart Item -->
                    <tr>
                        <!-- Shopping Cart Item Image -->
                        <td class="image"><a href="page-product-details.html"><img src="{{ asset('images/'.$value['options']['image'] ?? '') }}" alt="Item Name"></a></td>
                        <!-- Shopping Cart Item Description & Features -->
                        <td>
                            <div class="cart-item-title"><a href="page-product-details.html">{{ $value['name'] ?? '' }}</a></div>
                        </td>
                        <!-- Shopping Cart Item Quantity -->
                        <td class="quantity">
                            <!-- <input type="hidden" name="products[{{ $value['id'] }}][id]" value="{{ $value['id'] }}">
                                <input class="form-control input-sm input-micro cart" data-id="{{ $value['id'] }}" type="text" name="products[{{ $value['id'] }}][quantity]" value="{{ $value['qty'] }}"> -->
                            <input id="cart-{{ $value['id'] }}" class="form-control input-sm input-micro cart" data-id="{{ $value['id'] }}" data-name="{{ $value['name'] }}" data-image="{{ $value['options']['image'] }}" data-price="{{ $value['price'] }}" type="text" name="quantity" value="{{ $value['qty'] }}">
                        </td>
                        <!-- Shopping Cart Item Price -->
                        <td class="price">${{ $value['price'] ?? 0 }}</td>
                        <!-- Shopping Cart Item Actions -->
                        <td class="actions">
                            <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    <!-- End Shopping Cart Item -->
                    @endforeach
                </table>
                <!-- End Shopping Cart Items -->
            </div>
        </div>
        <div class="row">
            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <tr>
                        <td><b>Shipping</b></td>
                        <td>Free</td>
                    </tr>
                    <tr class="cart-grand-total">
                        <td><b>Total</b></td>
                        <td><b>$163.55</b></td>
                    </tr>
                </table>
                <!-- Action Buttons -->
                <div class="pull-right">
                    <button id="update-cart" data-cart="{{ auth()->user()->id ?? 0 }}" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</button>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    /* Styles for the toast container */
    .toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        border-radius: 4px;
        opacity: 0;
        transform: translateY(100%);
        transition: opacity 0.3s, transform 0.3s;
    }

    /* Success toast style */
    .toast.success {
        background-color: #4CAF50;
        color: white;
    }

    /* Error toast style */
    .toast.error {
        background-color: #f44336;
        color: white;
    }

    /* Show the toast */
    .toast.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#update-cart').on('click', function() {
            const carts = $('.cart');
            var cartData = [];
            var cart_id = $(this).data('cart');

            carts.each(function() {
                cartData.push({
                    id: $(this).data('id'),
                    qty: $(this).val(),
                    name: $(this).data('name'),
                    price: $(this).data('price'),
                    options: {
                        image: $(this).data('image')
                    },
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    cart_id: cart_id,
                    data: cartData,
                },
                success: function(response) {
                    var successToast = '<div class="toast success">Cart has been updated successfully!</div>';
                    $('.section').append(successToast);
                    setTimeout(function() {
                        successToast.remove();
                    }, 3000);
                },
                error: function(xhr, text, err) {
                    var errorToast = $('<div class="toast error">An error occurred. Please try again later.</div>');
                    console.log('222222');
                    $('.section').append(errorToast);
                    setTimeout(function() {
                        errorToast.remove();
                    }, 3000);
                }
            });
        });
    });
</script>