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
        <a href="{{route('groupgoods.index')}}" class="border border-primary rounded text-decoration-none">
            Danh sách nhóm hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Thêm thông tin nhóm hàng</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" enctype="multipart/form-data" action="{{ route('groupgoods.store') }}">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tên nhóm hàng</label>
            <div class="col-sm-10">
                <input name="group_name" type="text" class="form-control" placeholder="Tên nhóm hàng">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ản</label>
            <div class="col-sm-10">
                <input name="group_image" type="file" class="form-control" placeholder="Ảnh">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <input name="group_description" type="text" class="form-control" placeholder="Mô tả nhóm hàng">
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
