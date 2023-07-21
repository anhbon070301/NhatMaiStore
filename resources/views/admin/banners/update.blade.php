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
                    <li class="breadcrumb-item"><a href="{{route('indexBanners')}}">Banner</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit banner form</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updateBanners', $banner->id) }}" enctype="multipart/form-data" method="post" id="edit-profile" class="form-horizontal">
                                @csrf

                                <fieldset>
                                    <div class="control-group col-md-6">
                                        <label class="control-label">Title <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <input class="form-control" name="title" value="{!! old('title') !!}" type="text" />
                                            @else
                                            <input type="text" class="form-control" name="title" value="{{ $banner->title }}">
                                            @endif
                                            @error ('title')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group col-md-6">
                                        <label class="control-label">Sort order <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <input class="form-control" name="sort_order" value="{!! old('sort_order') !!}" type="text" />
                                            @else
                                            <input type="text" class="form-control" name="sort_order" value="{{ $banner->sort_order }}">
                                            @endif
                                            @error ('sort_order')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
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
                                                @elseif ($banner->active == 0)
                                                <option value="0" selected>No</option>
                                                <option value="1">Yes</option>
                                                @else
                                                <option value="0">No</option>
                                                <option value="1" selected>Yes</option>
                                                @endif
                                            </select>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group col-md-6">
                                        <label class="control-label">Image</label>
                                        <div class="controls">
                                            <input type="hidden" name="imageOld" value="{{ $banner->image_url }}">
                                            <input id="imageInput" value="" class="form-control" name="image_url" type="file" />
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <div class="controls">
                                            <img id="imagePreview" width="150px" src="{{ asset('images/' . $banner->image_url) }}" alt="">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Content <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <textarea id="textareaDescription" name="content" class="tinymce-editor">{!! old('content') !!}</textarea>
                                            @else
                                            <textarea id="textareaDescription" name="content" class="tinymce-editor">{{ $banner->content }}</textarea>
                                            @endif
                                            @error ('content')
                                            <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('indexBanners') }}" class="btn btn-danger">Cancel</a>
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