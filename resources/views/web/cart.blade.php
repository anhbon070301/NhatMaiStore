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
                            <input class="form-control input-sm input-micro" type="text" value="{{ $value['qty'] ?? 0 }}">
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
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection