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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="widget-content">

                            <div class="detail">

                                <div class="col-sm-6 detail-child" style="width: 63%;">

                                    <div class="product-inner">
                                        <h2 class="product-name">{{ $product->name }}</h2>
                                        <div style="display: flex;"><b>Category:</b> &ensp; <p>{{ $product->category->name }}</p>
                                        </div>
                                        <div style="display: flex;"><b>Brand:</b> &ensp; <p>{{ $product->brand->name }}</p>
                                        </div>
                                        <div style="display: flex;"><b>Tags:</b> &ensp; <p>{{ $product->tags }}</p>
                                        </div>
                                        <div style="display: flex;"><b>Price:</b> &ensp; $<p>{{ number_format($product->price) }}</p>
                                        </div>
                                        <div role="tabpanel">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active">
                                                    <h2>Product Description</h2>
                                                    <p>{{ $product->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="detail-child" style="width: 33%; margin-right: 1%;">
                                    <div class="col-sm-4">
                                        <div class="product-images">

                                            <div class="product-main-img">
                                                <img src="../images/{{ $product->image }}" width="400px" height="600px" alt="k tải được">
                                            </div> &emsp;

                                            <div>
                                                <a href="{{ route('editProducts', $product->id) }}" class="btn btn-success"><i class="icon-edit"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- hết  -->
                        </div>

                        &emsp;

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

                        <div class="widget-content">
                            <div class="col-sm-4" style="margin-left: 2%;">
                                <h2>Add Image</h2> &ensp;
                                <form action="{{ route('storeImage') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div style="display: flex; flex-direction: column;">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <div class="control-group" style="width: 50%; display: flex; align-items: center;">
                                            <label class="control-label" style="width: 15%;">Image</label> &emsp;
                                            <input type="file" name="image_url[]" style="width: 50%;" multiple> <br>

                                            @error ('image_url')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <div class="control-group" style="width: 50%; display: flex; align-items: center;">
                                            <label class="control-label" style="width: 15%;">Sort order</label> &emsp;
                                            <div class="controls">
                                                <input type="number" name="sort_order" value="{!! old('sort_order') !!}">
                                                @error ('sort_order')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <button type="submit" class="btn btn-primary" style="width: 8%; margin-left: 8.8%;">Up Load</button>
                                    </div>
                                    &emsp;

                                    @if ($errors -> any())
                                    <div class="alert alert-primary text-center">
                                        @foreach ($errors->all() as $errors)
                                        <p>{{ $errors }}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="widget-content">
                                                    <table style="width:100%" class="table table-striped table-bordered">

                                                        <thead>
                                                            <tr>
                                                                <th style="width:5%; text-align: center;">No</th>
                                                                <th style="width:15%; text-align: center;">Image</th>
                                                                <th style="width:52%;"></th>
                                                                <th style="width:8%; text-align: center;">Sort order</th>
                                                                <th style="width:10%; text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($images as $key => $imageList)
                                                            <tr>
                                                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                                                <td style="text-align: center;"><img src="../images/{{ $imageList->image_url }}" height="50px" width="150px" alt="Khong tai duoc"></td>
                                                                <td></td>
                                                                <td style="text-align: center;">{{ $imageList->sort_order }}</td>
                                                                <td style="text-align: center;">
                                                                    <form method="post" action="">
                                                                        <input value="{{ $imageList->id }}" type="hidden" name="id" id="imageId">
                                                                        <a class="btn btn-danger" href="/phone/public/destroyImage/{{ $imageList->id }}/{{ $product->id }}" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="icon-trash"></i></a>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>
    </main><!-- End #main -->

    @include ('admin.common.footer')
</body>

</html>