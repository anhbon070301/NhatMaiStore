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
                    <li class="breadcrumb-item"><a href="{{route('showBrand')}}">Brand</a></li>
                    <li class="breadcrumb-item active">Add</li>
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
                            <form action="{{ route('storeProduct') }}" method="post" id="edit-profile"
                                class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <fieldset>

                                    <div class="control-group">
                                        <label class="control-label">Category <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            <select class="span3" style="height: 28px;" name="category_id">
                                                <option value="">------</option>
                                                @foreach ($categories as $category)
                                                @if ($errors->any())
                                                @if (old('category_id') == $category->id)
                                                <option selected value="{!! old('category_id') !!}">{{ $category->name }}
                                                </option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error ('category')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Brand <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            <select class="span3" style="height: 28px;" name="brand_id">
                                                <option value="">------</option>
                                                @foreach ($brands as $brand)
                                                @if ($errors->any())
                                                @if (old('brand_id') == $brand->id)
                                                <option selected value="{!! old('brand_id') !!}">{{ $brand->name }}
                                                </option>
                                                @else
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                                @else
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error ('brand')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Product name <span
                                                style="color: red;">*</span></label>
                                        <div class="controls">
                                            <input type="text" class="span3" name="name" value="{!! old('name') !!}">
                                            @error ('name')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Price <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            <input class="span3" name="price" type="text"
                                                value="{!! old('price') !!}" />
                                            @error ('price')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Price old</label>
                                        <div class="controls">
                                            <input class="span3" name="old_price" type="text"
                                                value="{!! old('old_price') !!}" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Tags</label>
                                        <div class="controls">
                                            <input class="span3" name="tags" type="text" value="{!! old('tags') !!}" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Best sell</label>
                                        <div class="controls">
                                            <select class="span3" style="height: 28px;" name="is_best_sell">
                                                @if (old('is_best_sell') == 1)
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @else
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                @endif
                                            </select>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">New</label>
                                        <div class="controls">
                                            <select class="span3" style="height: 28px;" name="is_new">
                                                @if (old('is_new') == 1)
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @else
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                @endif
                                            </select>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Sort order <span
                                                style="color: red;">*</span></label>
                                        <div class="controls">
                                            <input type="number" class="span3" name="sort_order"
                                                value="{!! old('sort_order') !!}">
                                            @error ('sort_order')
                                            <br>
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Amount </label>
                                        <div class="controls">
                                            <input type="number" class="span3" name="amount"
                                                value="{!! old('amount') !!}">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Active</label>
                                        <div class="controls">
                                            <select class="span3" style="height: 28px;" name="active">
                                                @if ($errors->any())
                                                @if (old('active') == 1)
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @elseif (old('active') == 0)
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                                @endif
                                                @else
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                                @endif
                                            </select>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label ">Image</label>
                                        <div class="controls">
                                            <input class="span2" name="image_url" type="file" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Description <span
                                                style="color: red;">*</span></label>
                                        <div class="controls">
                                            <textarea id="textareaDescription" name="description" style="height: 150px;"
                                                class="span10 first">{!! old('description') !!}</textarea>
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