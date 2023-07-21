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
                    <li class="breadcrumb-item"><a href="{{ route('indexOrder') }}">Order</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-header">

                                    <form action="{{ route('indexOrder') }}" method="get">
                                        <div class="search"> &emsp;

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="control-group col-md-4">
                                                        <label class="control-label">Customer's name</label>
                                                        <div class="controls">
                                                            <input id='searchInput' class="form-control" name="inputName" type='text' placeholder="Customer's name" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group col-md-4">
                                                        <label class="control-label">Phone</label>
                                                        <div class="controls">
                                                            <input class="form-control" name="inputPhone" type='text' placeholder='Phone' />
                                                        </div>
                                                    </div>

                                                    <div class="control-group col-md-4">
                                                        <label class="control-label">Email</label>
                                                        <div class="controls">
                                                            <input class="form-control" name="inputEmail" type='text' placeholder='Email' />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="control-group col-md-6">
                                                        <button class="btn btn-secondary" name="btnSearch" value="btnSearch"><i class="ri-search-2-line"></i></button> &emsp;
                                                        <a href="{{ route('indexOrder') }}" class="btn btn-secondary"><i class="ri-arrow-go-back-line"></i></a>
                                                    </div>
                                                    <div class="control-group col-md-6">
                                                        <form action="{{route('exportOrder')}}" method="get">
                                                            <input type="hidden" name="name">
                                                            <input type="hidden" name="phone">
                                                            <input type="hidden" name="email">
                                                            <input type="hidden" name="status">
                                                            <button type="submit" class="btn btn-primary"><i class="ri-file-excel-2-line"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

                                </div>

                                <div class="widget-content">
                                    <table style="width:100%; margin-top: 20px;" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:5%; text-align: center;">No</th>
                                                <th style="width:15%; text-align: left;">Customer's name</th>
                                                <th style="width:10%; text-align: left;">Email</th>
                                                <th style="width:5%; text-align: center;">Phone</th>
                                                <th style="width:10%; text-align: center;">Total</th>
                                                <th style="width:10%; text-align: center;">Date</th>
                                                <th style="width:25%; text-align: center;">Items</th>
                                                <th style="width:10%; text-align: center;">Status</th>
                                                <th style="width:10%; text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key => $orderList)
                                            <tr>
                                                <td style="text-align: center;">{{ $key+1 }}</td>
                                                <td style="text-align: left;">{{ $orderList->customer_name }}</td>
                                                <td style="text-align: left;">{{ $orderList->customer_email }}</td>
                                                <td style="text-align: center;">{{ $orderList->customer_phone }}</td>
                                                <td style="text-align: right;">${{ number_format($orderList->total_money) }}</td>
                                                <td style="text-align: center;">{{ $orderList->created_date }}</td>
                                                <td style="text-align: left;">
                                                    @foreach ($itemOrder as $items)
                                                    @if ($orderList->id == $items->order_id)
                                                    <p>- {{ $items->product_name }} (<span>{{ $items->product_quantity }}</span>)
                                                    </p>
                                                    @endif
                                                    @endforeach
                                                </td>
                                                @if($orderList->status == 0)
                                                <td style="text-align: center;">Unpaid</td>
                                                @else
                                                <td style="text-align: center;">Paid</td>
                                                @endif
                                                <td style="text-align: center;">
                                                    <a href="{{ route('showbyId', $orderList->id) }}" class="btn btn-primary"><i class="icon-eye-open"></i></a>
                                                    <a class="btn btn-success" href="{{ route('updateOrder', $orderList->id) }}"><i class="icon-eur"></i></a>
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