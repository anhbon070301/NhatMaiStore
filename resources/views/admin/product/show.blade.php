<!DOCTYPE html>
<html lang="en">
@include ('admin.common.head')

<body>
    @include ('admin.common.index')

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="icon-inbox"></i> PRODUCT</li>
                    <li class="breadcrumb-item"> CREATE</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div>
                            @if (session()->has('messageAdd'))
                            <div class="alert alert-success">
                                {{ session('messageAdd') }}
                            </div>
                            @endif

                            @if (session()->has('messageUpdate'))
                            <div class="alert alert-success">
                                {{ session('messageUpdate') }}
                            </div>
                            @endif

                            @if (session()->has('messageDelete'))
                            <div class="alert alert-success">
                                {{ session('messageDelete') }}
                            </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <a href="{{ route('createProduct') }}" class="btn btn-primary"> <i class="ri-add-fill"></i> </a>

                            <div class="table-responsive">
                                <div class="widget-content">

                                    <form action=" {{ route('indexProduct') }} " method="get">
                                        <div class="search"> &emsp;

                                            <div class="search-element">

                                                <div class="control-group detail" style="width: 30%;">
                                                    <label class="form-control detail-left">Product's name</label>
                                                    <input id='searchInput' style="width: 57%;" class="form-control" name="searchInput" type='text' placeholder="Product's name" value="{{ $name }}" />
                                                </div>

                                                <div class="control-group detail" style="width: 30%;">
                                                    <label class="form-control detail-left">Brand</label>
                                                    <select name="brand" style="height: 28px;" class="form-control detail-right">
                                                        <option value="">-----</option>
                                                        @foreach ($brands as $brand)
                                                        @if ($productBrand == $brand->id)
                                                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                                        @else
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="control-group detail" style="width: 30%;">
                                                    <label class="form-control detail-left">Category</label>
                                                    <select class="detail-right" style="height: 28px;" name="category">
                                                        <option value="">-----</option>
                                                        @foreach ($categories as $category)
                                                        @if ($productCategory == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="search-element">

                                                <div class="control-group detail" style="width: 30%;">
                                                    <label class="form-control detail-left">Is New</label>
                                                    <select class="detail-right" style="height: 28px;" name="isNew">
                                                        @if ($productNew == 1)
                                                        <option value="">-----</option>
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Yes</option>
                                                        @elseif ($productNew == 0)
                                                        <option value="">-----</option>
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                        @elseif (!empty($productNew))
                                                        <option value="">-----</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="control-group detail" style="width: 30%;">
                                                    <label class="form-control detail-left">Best Sell</label>
                                                    <select class="detail-right" style="height: 28px;" name="bestSell">
                                                        @if ($productBestSell == 1)
                                                        <option value="">-----</option>
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Yes</option>
                                                        @elseif ($productBestSell == 0)
                                                        <option value="">-----</option>
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                        @elseif (!empty($productBestSell))
                                                        <option value="">-----</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="control-group" style="width: 30%; height: 90%;">
                                                    <button class="btn btn-secondary" name="btnSearch" value="btnSearch" style="color: black ;border-radius: 20px; height: 90%;"><i class="icon-search"></i></button> &emsp;
                                                    <a href="{{ route('indexProduct') }}" class="btn btn-secondary" style="color: black ;border-radius: 20px; height: 70%;"><i class="icon-retweet"></i></a>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

                                    <table style="width:100%" class="table table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th style="width:2%; text-align: center;">No</th>
                                                <th style="width:10%; text-align: center;">Image</th>
                                                <th style="width:20%; text-align: center;">Product's Name</th>
                                                <th style="width:12%; text-align: center;">Brand</th>
                                                <th style="width:15%; text-align: center;">Category</th>
                                                <th style="width:5%; text-align: center;">Price</th>
                                                <th style="width:7%; text-align: center;">Old Price</th>
                                                <th style="width:7%; text-align: center;">Best sell</th>
                                                <th style="width:5%; text-align: center;">New</th>
                                                <th style="width:2%; text-align: center;">Active</th>
                                                <th style="width:18%; text-align: center;">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($products as $productKey => $product)
                                            <tr>
                                                <td style="text-align: center;"> {{ $productKey + 1 }} </td>
                                                <td style="text-align: center;"><img src="{{ asset('images/' . $product->image_url) }}" width="100px" alt="No Image"></td>
                                                <td style="text-align: center;">{{ $product->name }}</td>
                                                <td style="text-align: center;">{{ $product->brand->name }}</td>
                                                <td style="text-align: center;">{{ $product->category->name }}</td>
                                                <td style="text-align: right;">${{ number_format($product->price) }}</td>
                                                @if ($product->old_price != 0)
                                                <td style="text-align: right;">${{ number_format($product->old_price) }}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if ($product->is_best_sell == 1)
                                                <td style="text-align: center;"><img src="{{ asset('images/ok-16.png') }}" alt=""></td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if ($product->is_new == 1)
                                                <td style="text-align: center;"><img src="{{ asset('images/ok-16.png') }}" alt=""></td>
                                                @else
                                                <td></td>
                                                @endif
                                                <input type="hidden" value="{{ $product->id }}" class="id" id="idp">
                                                <td style="text-align: center;"><input type="checkbox" class="toggle-position" value="{{ $product->id }}" data-name="{{ $product->name }}" data-url="{{route('active')}}" data-id="{{ $product->id }}" data-on="Yes" data-off="No" data-size="mini" data-toggle="toggle" data-width="15" data-height="10" {{ $product->active == 1 ? 'checked' : '' }}></td>
                                                <td style="text-align: center;">
                                                    <input value="{{ $product->id }}" type="hidden" name="id">
                                                    <a class="btn btn-success" href="{{ route('editProducts', $product->id)  }}"><i class="icon-edit"></i></a>
                                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');" href="{{ route('destroyProducts', $product->id) }}"> <i class="icon-trash"></i></a>
                                                    <a class="btn btn-info" href="{{ route('showImage', $product->id) }}"><i class="icon-eye-open"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Basic Pagination</h5>

                            <!-- Basic Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav><!-- End Basic Pagination -->

                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include ('admin.common.footer')
</body>

</html>