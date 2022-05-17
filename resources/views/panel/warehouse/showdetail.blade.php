@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <a href="{{route('warehouses.index')}}" class="border border-primary rounded text-decoration-none">
        Danh sách lô hàng</a>
        <span class="m-0 font-weight-bold text-primary"><i class="fas fa-chevron-right"></i>Chi tiết lô hàng</span>
    </div>
    <div class="text-right mr-2">
        <a href="{{route('warehouses.index')}}" class="badge badge-warning">Trở lại</a>
    </div>
    <div class="text-right mr-2">
    </div>

    <div class='container-fluid'>
        <div class="row ">
            <div class="  bg-white  col-lg-12 mt-5 pt-4">
                <div class="card-title">
                    <span class="des">Mô tả</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ký hiệu</th>
                                <th>Tên</th>
                                <th>Thời hạn</th>
                                <th>Giá mua(VND/Kg)</th>
                                <th>Giá bán(VND/Kg)</th>
                                <th>Số lượng (Kg)</th>
                                <th>Đã bán (Kg)</th>
                                <th>Trả lại (Kg)</th>
                                <th>Hiện tại(Kg)</th>
                                <th>Nhà cung cấp</th>
                                <th>Ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data->consignment_symbol}}</td>
                                <td>{{$data->consignment_name}}</td>
                                <td>{{$data->consignment_expiry}}</td>
                                <td>{{number_format($data->consignment_purchase_price)}}</td>
                                <td>{{number_format($data->consignment_sale_price)}}</td>
                                <td>{{$data->consignment_quantity}}</td>
                                <td>{{$data->consignment_saled}}</td>
                                <td>{{$data->consignment_return}}</td>
                                <td>{{$data->consignment_currently}}</td>
                                <td>{{$supplier->supplier_name }}</td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    {{-- @section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection --}}
