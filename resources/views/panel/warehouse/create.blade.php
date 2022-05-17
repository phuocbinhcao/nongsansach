@extends('layouts.panel')
@section('content')

<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
        <a href="{{route('warehouses.index')}}" class="border border-primary rounded text-decoration-none">
        Danh sách lô hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Thêm lô hàng</span>
    </p>
</div>
<div class="card-body  justify-content-center  ">
    <form method="POST" action="{{ route('warehouses.store') }}" class="w-75 mx-auto">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ký hiệu</label>
            <div class="col-sm-4">
                <input name="consignment_symbol" type="text" class="form-control" placeholder="Ký hiệu lô hàng">
                @error('consignment_symbol')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Tên lô hàng</label>
            <div class="col-sm-4">
                <input name="consignment_name" type="text" class="form-control" placeholder="Ký hiệu lô hàng">
                @error('consignment_name')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Hạn sử dụng</label>
            <div class="col-sm-4">
                <input name="consignment_expiry" type="date" class="form-control" placeholder="Ngày tháng">
                @error('consignment_expiry')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Giá mua vào (Vnd)</label>
            <div class="col-sm-4 ">
                <input name="consignment_purchase_price" type="text" class="form-control"
                    placeholder="Giá mua vào  ">
                @error('consignment_purchase_price')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Giá bán ra (Vnd)</label>
            <div class="col-sm-4">
                <input name="consignment_sale_price" type="text" class="form-control" placeholder="Giá bán ra  ">
                @error('consignment_sale_price')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng nhập (Kg)</label>
            <div class="col-sm-4">
                <input name="consignment_quantity" type="number" class="form-control" placeholder="Số lượng nhập">
                @error('consignment_quantity')
                    <div class="alert alert-warning">
                        <span class="text-danger"><strong>{{$message}}</strong></span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Sản phẩm</label>
            <div class="col-sm-6">
                <select name="product_id" class="form-control">
                    <option value="">---</option>
                    @foreach($products as $pro)
                    <option value="{{ $pro->id }}">{{ $pro->product_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nhà cung cấp</label>
            <div class="col-sm-6">
                <select name="supplier_id" class="form-control">
                    <option value="">---</option>
                    @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}">{{ $sup->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
