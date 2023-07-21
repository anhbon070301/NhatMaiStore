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
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div id="message">
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
                            <a href="{{ route('createBanners') }}" class="btn btn-primary"><i class="ri-add-fill"></i> </a>

                            <div class="table-responsive">
                                <div class="widget-content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; text-align: center;">No</th>
                                                <th style="width:18%; text-align: center;">Image</th>
                                                <th style="width:40%; text-align: left;">Title</th>
                                                <th style="width:8%; text-align: center;">Active</th>
                                                <th style="width:8%; text-align: center;">Sort</th>
                                                <th style="width:20%; text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $bannerKey => $bannerList)
                                            <tr>
                                                <td style="text-align: center;">{{ $bannerKey + 1 }}</td>
                                                <td style="text-align: center;"><img src="{{ asset('images/' . $bannerList->image_url) }}" style="width: 150px" alt="No Image"></td>
                                                <td style="text-align: left;">{{ $bannerList->title }}</td>
                                                <td style="text-align: center;"><input type="checkbox" class="toggle-position" value="{{ $bannerList->id }}" data-name="{{ $bannerList->title }}" data-url="{{route('activeBanner')}}" data-id="{{ $bannerList->id }}" data-on="Yes" data-off="No" {{ $bannerList->active == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="20" data-height="10"></td>
                                                <td style="text-align: center;">{{ $bannerList->sort_order }}</td>
                                                <td style="text-align: center;">
                                                    <input value="{{ $bannerList->id }}" type="hidden" name="id">
                                                    <a class="btn btn-success" href="{{ route('editBanners', $bannerList->id) }}"><i class="bi bi-pencil-square"></i></a>&emsp;
                                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');" href="{{ route('destroyBanners', $bannerList->id) }}"><i class="bi bi-trash"></i></a>
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
    </main><!-- End #main -->

    @include ('admin.common.footer')
</body>

</html>