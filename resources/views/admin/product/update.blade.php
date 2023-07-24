<!DOCTYPE html>
<html lang="en">
@include ('admin.common.head')

<body>
    @include ('admin.common.index')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homeAdmin')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('showBrand')}}">Brand</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                    <li class="breadcrumb-item active">{{ $product->name ?? "" }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add brand form</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updateProducts', $product->id) }}" enctype="multipart/form-data" method="post" id="edit-profile" class="form-horizontal">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="control-group col-md-6">
                                            <label class="control-label">Category <span style="color: red;">*</span></label>
                                            <div class="controls">
                                                <select class="form-select" name="category_id">
                                                    @foreach ($categories as $categoryList)
                                                    @if ($errors->any())
                                                    @if (old('category_id') == $categoryList->id)
                                                    <option value="{!! old('category_id') !!}" selected>
                                                        {{ $categoryList->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $categoryList->id }}">{{ $categoryList->name }}
                                                    </option>
                                                    @endif
                                                    @elseif ($categoryList->id == $category->id)
                                                    <option value="{{ $categoryList->id }}" selected>
                                                        {{ $categoryList->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $categoryList->id }}">{{ $categoryList->name }}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error ('category_id')
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-6">
                                            <label class="control-label">Brand <span style="color: red;">*</span></label>
                                            <div class="controls">
                                                <select class="form-select" name="brand_id">
                                                    @foreach ($brands as $brandList)
                                                    @if ($errors->any())
                                                    @if (old('brand_id') == $brandList->id)
                                                    <option value="{!! old('brand_id') !!}" selected>{{ $brandList->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $brandList->id }}">{{ $brandList->name }}</option>
                                                    @endif
                                                    @elseif ($brandList->id == $brand->id)
                                                    <option value="{{ $brandList->id }}" selected>{{ $brandList->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $brandList->id }}">{{ $brandList->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error ('brand_id')
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Product name <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <input type="text" class="form-control" name="name" value="{!! old('name') !!}">
                                            @else
                                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                            @endif

                                            @error ('name')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="row">
                                        <div class="control-group col-md-6">
                                            <label class="control-label">Price <span style="color: red;">*</span></label>
                                            <div class="controls">
                                                @if ($errors->any())
                                                <input class="form-control" name="price" value="{!! old('price') !!}" type="text" />
                                                @else
                                                <input class="form-control" name="price" value="{{ $product->price }}" type="text" />
                                                @endif
                                                @error ('price')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-6">
                                            <label class="control-label">Price old</label>
                                            <div class="controls">
                                                @if ($errors->any())
                                                <input class="form-control" name="old_price" value="{!! old('old_price') !!}" type="text" />
                                                @else
                                                <input class="form-control" name="old_price" value="{{ $product->old_price }}" type="text" />
                                                @endif
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Tags</label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <input class="form-control" name="tags" value="{!! old('tags') !!}" type="text" />
                                            @else
                                            <input class="form-control" name="tags" value="{{ $product->tags }}" type="text" />
                                            @endif
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="row">
                                        <div class="control-group col-md-4">
                                            <label class="control-label">Best sell</label>
                                            <div class="controls">
                                                <select class="form-select" name="is_best_sell">
                                                    @if ($errors->any())
                                                    @if (old('is_best_sell') == 1)
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @elseif (old('is_best_sell') == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @endif
                                                    @elseif ($product->is_best_sell == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @else
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @endif
                                                </select>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-4">
                                            <label class="control-label">New</label>
                                            <div class="controls">
                                                <select class="form-select" name="is_new">
                                                    @if ($errors->any())
                                                    @if (old('is_new') == 1)
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @elseif (old('is_new') == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @endif
                                                    @elseif ($product->is_new == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @else
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @endif
                                                </select>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-4">
                                            <label class="control-label">Sort order <span style="color: red;">*</span></label>
                                            <div class="controls">
                                                @if ($errors->any())
                                                <input class="form-control" name="sort_order" value="{!! old('sort_order', 0) !!}" type="number" />
                                                @else
                                                <input type="number" class="form-control" name="sort_order" value="{{ $product->sort_order ?? 0 }}">
                                                @endif
                                                @error ('sort_order')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                                @enderror
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                    </div>

                                    <div class="row">
                                        <div class="control-group col-md-6">
                                            <label class="control-label">Amount </label>
                                            <div class="controls">
                                                @if ($errors->any())
                                                <input class="form-control" name="amount" value="{!! old('amount', 0) !!}" type="number" />
                                                @else
                                                <input class="form-control" name="amount" value="{{ $product->amount ?? 0 }}" type="number" />
                                                @endif
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-6">
                                            <label class="control-label">Active</label>
                                            <div class="controls">
                                                <select class="form-select" name="active">
                                                    @if ($errors->any())
                                                    @if (old('active') == 1)
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @elseif (old('active') == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @endif
                                                    @elseif ($product->active == 0)
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                    @else
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                    @endif
                                                </select>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                    </div>

                                    <div class="row">
                                        <div class="control-group col-md-6">
                                            <label class="control-label">Image</label>
                                            <div class="controls">
                                                <input type="hidden" name="oldImage" value="{{ $product->image_url }}">
                                                <input class="form-control" name="image_url" type="file" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group col-md-6">
                                            <div class="controls">
                                                <img width="150px" src="../images/{{ $product->image_url }}" alt="">
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Description</label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <textarea id="textareaDescription" name="description" class="tinymce-editor">{!! old('description') !!}</textarea>
                                            @else
                                            <textarea id="textareaDescription" name="description" class="tinymce-editor">{{ $product->description }}</textarea>
                                            @endif
                                            @error ('description')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('indexProduct') }}" class="btn btn-danger">Cancel</a>
                                    </div> <!-- /form-actions -->

                                </fieldset>
                            </form>
                            <!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include ('admin.common.footer')
</body>

</html>