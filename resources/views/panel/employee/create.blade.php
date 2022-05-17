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
       <a href="{{route('employees.index')}}" class="border border-primary rounded text-decoration-none">Danh sách nhân viên </a>
        <span> <i class="fas fa-chevron-right"></i>Thêm thông tin nhân viên</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">SĐT</label>
            <div class="col-sm-10">
                <input name="phone" type="text" class="form-control" placeholder="+84123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" class="form-control" placeholder="example@gmail.com">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" value="123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Xác nhân mật khẩu</label>
            <div class="col-sm-10">
                <input name="password_confirmation" type="password" class="form-control" value="123456789">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ảnh đại diện</label>
            <div class="col-sm-10">
                <input name="avatar" type="file" class="form-control" placeholder="Chọn ảnh">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input name="address" type="text" class="form-control" placeholder="123 Nguyen Van B">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Số CMND</label>
            <div class="col-sm-10">
                <input name="identity" type="text" class="form-control" placeholder=" Số CMND">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Chức danh</label>
            <div class="col-sm-10">
                <select name="rolename" type="text" class="form-control">
                    <option value="Nhân viên" selected>Nhân viên</option>
                    <option value="admin">admin</option>
                </select>
            </div>
        </div>


        @csrf
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
