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

                        <div class="card-body">
                            <a href="{{ route('createUser') }}" class="btn btn-primary"><i class="ri-add-fill"></i> </a>

                            <div class="table-responsive">
                                <div class="widget-content">
                                    <table style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:45%">User's Name</th>
                                                <th style="width:30%;">Email</th>
                                                <th style="width:15%; text-align: center;">Phone</th>
                                                <th style="width:10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $userData)
                                            @if ($userData->id != Auth::guard("admin")->user()->id)
                                            <tr>
                                                <td>{{ $userData->username }}</td>
                                                <td>{{ $userData->email }}</td>
                                                <td style="text-align: center;">{{ $userData->phone }}</td>
                                                <td style="text-align: center;">
                                                    <a class="btn btn-success" href="{{ route('editUser', $userData->id)  }}"><i class="icon-edit"></i></a>
                                                    @if (Auth::guard("admin")->user()->permission == 0)
                                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff ?');" href="{{ route('destroyUser', $userData->id) }}"> <i class="icon-trash"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
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