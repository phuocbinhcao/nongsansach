@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('suppliers.index')}}" class="border border-primary rounded text-decoration-none">Danh sách
                nhà cung cấp</a>
            <span> <i class="fas fa-chevron-right"></i>Thông tin nhà cung cấp</span>
        </p>
    </div>
    <div class="text-right mr-2">
        <a href="{{route('suppliers.index')}}" class="badge badge-warning">Trở lại</a>
    </div>
    <div class='container-fluid'>
        <div class="card mx-auto col-md-3 col-12 mt-5 pt-4">
            <div class="card-body text-center mx-auto">
                <div class="card-title">
                    <span class="des">Mô tả</span>
                </div>
                <p class="card-text">{{ $supplier->supplier_name }}</p>
                <p class="card-text">{{ $supplier->supplier_address }}</p>
                <p class="card-text">SĐT: {{ $supplier->supplier_phone }}</p>

            </div>
        </div>
    </div>
    @endsection
