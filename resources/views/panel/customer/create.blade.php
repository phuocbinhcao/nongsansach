@extends('layouts.panel')
@section('styles')
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br />
    @endforeach
    <button type="button" class="close" data-miss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
       <a href="{{route('customers.index')}}" class="border border-primary rounded text-decoration-none">Danh sách khách hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Thêm thông tin khách hàng</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-10">
                <input name="customer_name" type="text" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">SĐT</label>
            <div class="col-sm-10">
                <input name="customer_phone" type="text" class="form-control" placeholder="+84123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="customer_email" type="text" class="form-control" placeholder="example@gmail.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input name="customer_address" type="text" class="form-control"
                    placeholder="Phường( Xã)/ Quận( Huyện)/ Thành Phố( Tỉnh)">
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection

