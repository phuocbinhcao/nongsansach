@extends('layouts.panel')
@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng đơn hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalOrders }}
                            <span><small><a href="{{ route('order.index')}}">(Chi tiết)</a></small></span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Thành viên</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalCustomers }}
                            <span><small><a class="text-success" href="{{route('customers.index')}}">(Chi
                                        tiết)</a></small></span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng sản phẩm
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ $totalProducts}}
                                    <span><small><a class="text-info" href="{{route('products.index')}}">(Chi
                                                tiết)</a></small></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Bình luận khách hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalComments }}
                            <span><small><a class="text-info" href="{{route('comment.index')}}">(Chi
                                        tiết)</a></small></span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thu nhập hàng ngày</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container" data-list-day="{{json_encode($listday)}}"
                        data-money-default={{ json_encode($arrayRevenueOrderMonthDefault)}}
                        data-money-process={{ json_encode($arrayRevenueOrderMonthProcess)}}
                        data-money-cancel={{ json_encode($arrayRevenueOrderMonthCancel)}}
                        data-money={{ json_encode($arrayRevenueOrderMonth)}}>

                    </div>

                </figure>

            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trạng thái đơn hàng</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container2" data-json="{{json_encode($status_order)}}"></div>

                </figure>

            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-8 mb-4">

        <!-- New order -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đơn hàng mới nhất</h6>
            </div>
            <table class="table ml-2">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian đặt hàng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order )
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <ul class="list-unstyled">
                                <li>Tên: {{ $order->order_customer_name }}</li>
                                <li>Địa chỉ: {{ $order->order_customer_address }}</li>
                                <li>Sô đt: {{ $order->order_customer_phone }}</li>
                            </ul>
                        </td>
                        <td> {{$order->order_total_price}}</td>
                        <td> {{ $order->order_status }}</td>
                        <td> {{ $order->created_at }}</td>
                        <td>
                            <a href="{{route('order.show',['id'=>$order->id])}} "><button
                                    class="btn btn-primary btn-sm">Chi
                                    tiết</button></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="ml-2">
                <p><small>
                        {{ $orders->links()}}

                    </small></p>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<!-- script Chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="{{ asset('js/line-chart.js')}}"></script>
<script src="{{ asset('js/pie-chart.js')}}"></script>

@endsection
