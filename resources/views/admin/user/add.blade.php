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
                            <form action="{{ route('storeUser') }}" method="post" id="edit-profile" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <fieldset>

                                    <div class="control-group">
                                        <label class="control-label">User's name <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                                <input type="text" class="span3" name="username" value="{!! old('username') !!}">
                                            @else
                                                @if (isset($staff->username))
                                                    <input type="text" class="span3" name="username" value="{{ $staff->username }}">
                                                @else
                                                    <input type="text" class="span3" name="username" value="{!! old('username') !!}">
                                                @endif
                                            @endif

                                            @error ('username')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Phone <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                                <input type="text" class="span3" name="phone" value="{!! old('phone') !!}">
                                            @else
                                                @if (isset($staff->username))
                                                    <input type="text" class="span3" name="phone" value="{{ $staff->phone }}">
                                                @else
                                                    <input type="text" class="span3" name="phone" value="{!! old('phone') !!}">
                                                @endif
                                            @endif
                                            
                                            @error ('phone')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Email <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                            <input type="text" class="span3" name="email" value="{!! old('email') !!}">
                                            @else
                                                @if (isset($staff->username))
                                                    <input type="text" class="span3" name="email" value="{{ $staff->email }}">
                                                @else
                                                    <input type="text" class="span3" name="email" value="{!! old('email') !!}">
                                                @endif
                                            @endif
                                            
                                            @error ('email')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    @if (Request::route()->getName() == "createUser")
                                    <div class="control-group">
                                        <label class="control-label">Password <span style="color: red;">*</span></label>
                                        <div class="controls">
                                            @if ($errors->any())
                                                <input type="password" class="span3" name="password" value="{!! old('password') !!}">
                                            @else
                                                @if (isset($staff->username))
                                                    <input type="password" class="span3" name="password" value="{{ $staff->password }}">
                                                @else
                                                    <input type="password" class="span3" name="password" value="{!! old('password') !!}">
                                                @endif
                                            @endif
                            
                                            @error ('password')
                                                <br>
                                                <label class="error">{{ $message }}</label>
                                            @enderror
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    @endif

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('indexUser') }}" class="btn btn-danger">Cancel</a>
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