@extends('layouts.panel')
@section('styles')
<link href="{{ asset('css/admin/detailProduct.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('product-type.index')}}" class="border border-primary rounded text-decoration-none">
            Danh sách loại đơn hàng </a>
            <span> <i class="fas fa-chevron-right"></i>Thông tin loại sản phẩm</span>
        </p>
    </div>

    <div class='container-fluid'>
        <div class="card mx-auto col-md-3 col-12 mt-5 pt-4">
            <div class="d-flex sale ">

            </div> <img class='mx-auto img-thumbnail' src="{{url('img/groupgoods', $groupGood->group_image) }}"
                width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class="card-title">
                    <span class="des">Mô tả</span>
                </div>
                <p class="card-text">{{ $productType->product_type_name}}</p>
                <p class="card-text">{{ $productType->product_type_description }}</p>
                <p class="card-text">{{ $groupGood->group_name }}</p>
            </div>
        </div>
    </div>
    @endsection
