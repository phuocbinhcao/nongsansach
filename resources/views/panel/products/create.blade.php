@extends('layouts.panel')
@section('content')
@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
</div>
@endif
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
        <a href="{{route('products.index')}}" class="border border-primary rounded text-decoration-none">
             Danh sách sản phẩm  </a>
        <span> <i class="fas fa-chevron-right"></i>Thêm sản thông tin phẩm</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label ">Tên sản phẩm</label>
            <div class="col-sm-4">
                <input name="product_name" type="text" class="form-control" placeholder="Tên sản phẩm">
            </div>

            <label for=" " class="col-sm-1 col-form-label">Ký hiệu</label>
            <div class="col-sm-4">
                <input name="product_symbol" type="text" class="form-control" placeholder="G0000">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-4">
                <select name="product_type_id" class="form-control">
                    @foreach($productTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->product_type_name }}</option>
                    @endforeach
                </select>
            </div>
            <label for=" " class="col-sm-1 col-form-label">Giá</label>
            <div class="col-sm-4 d-flex">
                <input name="product_price" type="text" class="form-control" placeholder="0">
                <div class="input-group-append">
                    <span class="input-group-text">VND</span>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Ảnh</label>
            <div class="col-sm-3">
                <input name="product_image1" type="file" class="form-control">
            </div>
            <div class="col-sm-3">
                <input name="product_image2" type="file" class="form-control">
            </div>
            <div class="col-sm-3">
                <input name="product_image3" type="file" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <input name="product_description" type="text" class="form-control" placeholder="Mô tả sản phẩm">
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
