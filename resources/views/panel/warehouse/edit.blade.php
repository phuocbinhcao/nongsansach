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
        <a href="{{route('warehouses.index')}}" class="border border-primary rounded text-decoration-none">
        Danh sách lô hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Sửa thông tin lô hàng</span>
    </p>
</div>
<div class="card-body  justify-content-center">
    <form method="POST" action="{{ route('warehouses.update', $data->id) }}" class="w-75 mx-auto">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ký hiệu</label>
            <div class="col-sm-4">
                <input name="consignment_symbol" type="text" class="form-control" value="{{$data->consignment_symbol}}" >
            </div>
            <label class="col-sm-2 col-form-label">Tên lô hàng</label>
            <div class="col-sm-4">
                <input name="consignment_name" type="text" class="form-control" value="{{$data->consignment_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Hạn sử dụng</label>
            <div class="col-sm-4">
                <input name="consignment_expiry" type="date" class="form-control" value="{{$data->consignment_expiry}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Giá mua vào</label>
            <div class="col-sm-4 input-group ">
                <input name="consignment_purchase_price" type="text" class="form-control"
                    value="{{$data->consignment_purchase_price}}">
            </div>
            <label class="col-sm-2 col-form-label">Giá bán ra</label>
            <div class="col-sm-4">
                <input name="consignment_sale_price" type="number" class="form-control" value="{{$data->consignment_sale_price}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng nhập</label>
            <div class="col-sm-4">
                <input name="consignment_quantity" type="number" class="form-control" value="{{$data->consignment_quantity}}">
            </div>
            <label class="col-sm-2 col-form-label">Số lượng đã bán</label>
            <div class="col-sm-4">
                <input name="consignment_saled" type="number" class="form-control"value="{{$data->consignment_saled}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số lượng đổi trả</label>
            <div class="col-sm-4">
                <input name="consignment_return" type="number" class="form-control" value="{{$data->consignment_return}}">
            </div>
            <label class="col-sm-2 col-form-label">Số lượng hiện tại</label>
            <div class="col-sm-4">
                <input name="consignment_currently" type="number" class="form-control" value="{{$data->consignment_currently}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="col-sm-5">
                <select name="consignment_status" class="form-control">
                    <option value="{{$data->consignment_status}}">{{$data->consignment_status}}</option>
                    <option value="Hết hàng">Hết hàng</option>
                    <option value="Còn hàng">Còn hàng</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Loại sản phẩm</label>
            <div class="col-sm-5">
                <select name="product_id" class="form-control">
                    <option value="">---</option>
                    @foreach($products as $pro)
                    <option value="{{ $pro->id }}"
                        @if ($pro->id == $data->product_id)
                        selected
                        @endif>{{ $pro->product_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nhà cung cấp</label>
            <div class="col-sm-5">
                <select name="supplier_id" class="form-control">
                    <option value="">---</option>
                    @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}"\
                        @if ($sup->id == $data->supplier_id)
                            selected
                        @endif>{{ $sup->supplier_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @csrf
        @method('put')
        <button class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection
