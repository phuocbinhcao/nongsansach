@extends('layouts.frontend')
@section('content')

<!--breadcrumb area start-->
<div class="breadcrumb_container container">
    <div class=" ">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li><a href="{{route('organic.index')}}">Trang chủ</a> ></li>
                        <li>Tài khoản của tôi</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->

<!-- Start Maincontent  -->
<div class="container">
    <section class="main-content-area my-account ptb-100">
        <div class="account-dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#account-details" data-toggle="tab" class="nav-link active">Chi tiết tài khoản</a>
                        </li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng đã mua</a></li>
                        <li><a href="{{route('logout')}}" class="nav-link">Đăng xuất</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng đã mua</h3>
                            <div class="organic-table-area table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ngày</th>
                                            <th>Tổng tiền (Vnd)</th>
                                            <th>Lịch sử mua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $stt = 1
                                        @endphp
                                        @foreach ($orders as $data )

                                        <tr>
                                            <td>{{$data->created_at}}</td>
                                            <td>{{number_format($data->order_total_price)}}</td>
                                            <td><a href="" data-toggle="modal" data-target="#my_modal{{$data->id}}"
                                                    class="view">view</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="tab-pane fade show active" id="account-details">
                            <h3>Chi tiết tài khoản</h3>
                            <div class="login">

                                {{-- @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach --}}
                                <div class="login-form-container">
                                    <div class="account-login-form">
                                        <form method="POST">
                                            <label>Tên khách hàng</label>
                                            <input type="text" name="name" value="{{ auth()->user()->name }}" readonly>
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ auth()->user()->email }}"
                                                readonly>
                                            <label>Đại chỉ</label>
                                            <input type="text" name="address" value="{{ auth()->user()->address }}"
                                                readonly>
                                            <label>Số điện thoại</label>
                                            <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                                                readonly>
                                            <label>Ngày đăng ký</label>
                                            <input type="text" name="date" value="{{ auth()->user()->created_at }}"
                                                readonly>
                                            @if (session('message'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <span>{{ session('message') }}</span>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            <div class="border p-3">
                                                <h6>Đổi mật khẩu <span class="text-danger">*</span></h6>
                                                <label>Mật khẩu hiên tại</label>
                                                <input type="password" name="old_password">
                                                <label>Mật khẩu mới</label>
                                                <input type="password" name="password">
                                                <label>Nhập lại mật khẩu</label>
                                                <input type="password" name="password_confirmation">
                                            </div>
                                            @csrf
                                            <div class="save-button primary-btn default-button">
                                                <button class="btn btn-primary" onclick="changPassword()">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- End Maincontent  -->


<!-- Modal orders history  -->

@foreach ($orders as $id=> $order )


<div class="modal fade mt-5" id="my_modal{{$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body shop">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền (Vnd)</th>
                                        <th>Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataOrders[$id] as $data )
                                    <tr>
                                        <td>{{$data->created_at}}</td>
                                        <td>{{$data->product_name}}</td>
                                        <td>{{$data->order_detail_quantity}}</td>
                                        <td>{{number_format($data->order_detail_price)}}</td>
                                        <td>{{$data->product_description}}</td>
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
@endforeach

@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
@if(session()->get('changepassword'))
<script>
    function changPassword() {
        swal({
            title: "Thành công",
            text: "Mật khẩu đã được thay đổi",
            icon: "success",
            button: "Quay lại"
        });
    }
</script>
@endif
@endsection
