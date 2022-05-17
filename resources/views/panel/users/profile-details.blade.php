@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/admin/detail.css')}}">
@endsection
@section('content')

{{-- change password modal --}}

<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group card bg-c-lite-green padding">
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                        @endforeach
                    </div>
                    @endif
                    <form action="{{route('change-password.store')}}" method="post" class="w-75 mx-auto">
                        @csrf
                        <div class=" text-white  m-b-10">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" name="password_current" class="form-control "
                                placeholder="  **************">
                        </div>
                        <div class="  text-white m-b-10">
                            <label>Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control " placeholder="  **************">
                        </div>
                        <div class=" text-white m-b-10">
                            <label>Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control  "
                                placeholder="   **************">
                        </div>
                        <div class=" m-t-40">
                            <button type="submit" class="form-control btn-light b-b-default  ">Thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Infor Employee -->


<div class="page-content page-container" id="page-content">

    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">

                    <div class="row m-l-0 m-r-0">

                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{url('img/users',Auth::user()->avatar)}}" width="100px"
                                        class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{Auth::user()->name}}</h6>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                @if (Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{Session::get('success')}}</span>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{Auth::user()->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">SĐT</p>
                                        <h6 class="text-muted f-w-400">{{Auth::user()->phone}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Địa chỉ</p>
                                        <h6 class="text-muted f-w-400">{{Auth::user()->address}}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"> </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Vai trò</p>
                                        <h6 class="text-muted f-w-400">{{Auth::user()->rolename}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">
                                            <a href="#" class="badge badge-warning"
                                                data-toggle="modal" data-target="#changePasswordModal">
                                                 Đổi mật khẩu</a>
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Ngày đăng ký</p>
                                        <h6 class="text-muted f-w-400">{{Auth::user()->created_at}}</h6>
                                    </div>
                                </div>
                                @if (Auth::user()->rolename == 'admin')

                                <div class="p-2 text-right">
                                    <a href="{{ route('users.index') }}" class="badge badge-primary"> Trở lại </a>
                                </div>
                                @elseif (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'Nhân viên')
                                <div class="p-2 text-right">
                                    <a href="{{ route('panel.index') }}" class="badge badge-primary"> Trở lại </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
