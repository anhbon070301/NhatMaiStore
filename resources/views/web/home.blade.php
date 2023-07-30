@extends('layouts.app')

@section('content')
<section>
    <!-- Homepage Slider -->
    <div class="homepage-slider">
        <div id="sequence">
            <ul class="sequence-canvas">
                <!-- Slide 1 -->
                <li class="bg4">
                    <!-- Slide Title -->
                    <h2 class="title">Responsive</h2>
                    <!-- Slide Text -->
                    <h3 class="subtitle">It looks great on desktops, laptops, tablets and smartphones</h3>
                    <!-- Slide Image -->
                    <img class="slide-img" src="{{asset('images/slide1.png')}}" alt="Slide 1" />
                </li>
                <!-- End Slide 1 -->
                <!-- Slide 2 -->
                <li class="bg3">
                    <!-- Slide Title -->
                    <h2 class="title">Color Schemes</h2>
                    <!-- Slide Text -->
                    <h3 class="subtitle">Comes with 5 color schemes and it's easy to make your own!</h3>
                    <!-- Slide Image -->
                    <img class="slide-img" src="{{asset('images/slide2.png')}}" alt="Slide 2" />
                </li>
                <!-- End Slide 2 -->
                <!-- Slide 3 -->
                <li class="bg1">
                    <!-- Slide Title -->
                    <h2 class="title">Feature Rich</h2>
                    <!-- Slide Text -->
                    <h3 class="subtitle">Huge amount of components and over 30 sample pages!</h3>
                    <!-- Slide Image -->
                    <img class="slide-img" src="{{asset('images/slide3.png')}}" alt="Slide 3" />
                </li>
                <!-- End Slide 3 -->
                <!-- Slide 3 -->
                <li class="bg5">
                    <!-- Slide Title -->
                    <h2 class="title">Feature Rich 1111</h2>
                    <!-- Slide Text -->
                    <h3 class="subtitle">Huge amount of components and over 30 sample pages!</h3>
                    <!-- Slide Image -->
                    <img class="slide-img" src="{{asset('images/slide3.png')}}" alt="Slide 4" />
                </li>
                <!-- End Slide 3 -->
            </ul>
            <div class="sequence-pagination-wrapper">
                <ul class="sequence-pagination">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Homepage Slider -->

    <!-- New Product -->
    <div class="section">
        <div class="container">
            <h2>New</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Product -->
                    <div class="shop-item">
                        <!-- Product Image -->
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product1.jpg" alt="Item Name"></a>
                        </div>
                        <!-- Product Title -->
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <!-- Product Available Colors-->
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <!-- Product Price-->
                        <div class="price">
                            $999.99
                        </div>
                        <!-- Add to Cart Button -->
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                    <!-- End Product -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product2.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product3.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product4.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End New Product -->

    <!-- Best Sell -->
    <div class="section">
        <div class="container">
            <h2>Best Sell</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Product -->
                    <div class="shop-item">
                        <!-- Product Image -->
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product1.jpg" alt="Item Name"></a>
                        </div>
                        <!-- Product Title -->
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <!-- Product Available Colors-->
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <!-- Product Price-->
                        <div class="price">
                            $999.99
                        </div>
                        <!-- Add to Cart Button -->
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                    <!-- End Product -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product2.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product3.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product4.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Best Sell -->

    <!-- Discount -->
    <div class="section">
        <div class="container">
            <h2>Discount</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Product -->
                    <div class="shop-item">
                        <!-- Product Image -->
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product1.jpg" alt="Item Name"></a>
                        </div>
                        <!-- Product Title -->
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <!-- Product Available Colors-->
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <!-- Product Price-->
                        <div class="price">
                            $999.99
                        </div>
                        <!-- Add to Cart Button -->
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                    <!-- End Product -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product2.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product3.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="page-product-details.html"><img src="img/product4.jpg" alt="Item Name"></a>
                        </div>
                        <div class="title">
                            <h3><a href="page-product-details.html">Lorem ipsum dolor</a></h3>
                        </div>
                        <div class="colors">
                            <span class="color-white"></span>
                            <span class="color-black"></span>
                            <span class="color-blue"></span>
                            <span class="color-orange"></span>
                            <span class="color-green"></span>
                        </div>
                        <div class="price">
                            $999.99
                        </div>
                        <div class="actions">
                            <a href="page-product-details.html" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Discount -->

</section> <!-- End Section -->
@endsection