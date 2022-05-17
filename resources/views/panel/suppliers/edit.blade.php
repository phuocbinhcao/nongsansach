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
       <a href="{{route('suppliers.index')}}" class="border border-primary rounded text-decoration-none">Danh sách nhà cung cấp</a>
        <span> <i class="fas fa-chevron-right"></i>Sửa thông tin nhà cung cấp</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{route('suppliers.update',$supplier->id)}}">
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Nhà cung cấp</label>
            <div class="col-sm-10">
                <input name="supplier_name" type="text" class="form-control" value="{{$supplier->supplier_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input name="supplier_address" type="text" class="form-control" value="{{$supplier->supplier_address}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for=" " class="col-sm-2 col-form-label">SĐT</label>
            <div class="col-sm-10">
                <input name="supplier_phone" type="text" class="form-control" value="{{$supplier->supplier_phone}}">
            </div>
        </div>
        @method('put')
        @csrf
        <button class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection
