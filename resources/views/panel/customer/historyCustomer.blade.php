@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin/detail.css')}}">
@endsection
@section('content')

<!-- Modal Customer -->
<div class="modal fade" id="historyCustomerModal" tabindex="-1" role="dialog"
    aria-labelledby="historyCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  ">
            <div class="modal-header bg-c-lite-green">
                <h5 class="modal-title text-white" id="historyCustomerModalLabel">Lịch sử mua hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h6 class="text-muted f-w-400">Tên khách hàng</h6>
                        <p class="m-b-10 f-w-600">{{$customer->customer_name}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">SĐT</p>
                        <h6 class="text-muted f-w-400">{{$customer->customer_phone}}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table f-s-13 card">
                            <thead class="tbl-bg-color text-white">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Ký hiệu</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Mô tả</th>
                                    <th>Ngày</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataOrders as $order )
                                <tr>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->product_symbol}}</td>
                                    <td>{{$order->order_detail_quantity}}</td>
                                    <td>{{$order->order_detail_price}}</td>
                                    <td>{{$order->product_description}}</td>
                                    <td>{{$order->created_at}}</td>
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

    <!-- Infor Customer -->

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="{{url('img/users/client.jpg')}}" width="100px"
                                            class="img-radius" alt="User-Profile-Image"> </div>
                                    <h6 class="f-w-600">{{$customer->customer_name}}</h6>
                                    <p>Khách hàng</p> <i
                                        class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{$customer->customer_email}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">SĐT</p>
                                            <h6 class="text-muted f-w-400">{{$customer->customer_phone}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Địa chỉ</p>
                                            <h6 class="text-muted f-w-400">{{$customer->customer_address}}</h6>
                                        </div>

                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">User Account</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{$customer->customer_email}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Vai trò</p>
                                            <h6 class="text-muted f-w-400">Khách hàng</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Ngày đăng ký</p>
                                            <h6 class="text-muted f-w-400">{{$customer->created_at}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="" class="badge badge-primary" data-toggle="modal"
                                                data-target="#historyCustomerModal">Lịch sử mua hàng</a>
                                        </div>
                                    </div>
                                    <div class="p-2 text-right">
                                        <a href="{{ route('customers.index') }}" class="badge badge-primary"> Trờ lại </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <!-- Page level plugins -->
    {{-- <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection --}}
