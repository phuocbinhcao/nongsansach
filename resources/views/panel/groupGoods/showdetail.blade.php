@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4  bg-primary">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('groupgoods.index')}}" class="border border-primary rounded text-decoration-none">
                Danh sách nhóm hàng</a>
            <span> <i class="fas fa-chevron-right"></i>Thông tin nhóm hàng</span>
        </p>
    </div>

    <div class="card-body  w-50 mx-auto">
        <div class="card-header">
            Thông tin
        </div>
        <ul class="list-group list-group-flush  ">
            <li class="list-group-item">
                <strong>STT</strong>
                <span>{{ $groupgood->id }}</span>
            </li>
            <li class="list-group-item">
                <strong>Nhóm Hàng: </strong>
                <span>{{ $groupgood->group_name }}</span>
            </li>
            <li class="list-group-item">
                <strong>Ảnh</strong>
                <span class=" d-flex justify-content-center  "><img src="{{url('img/groupgoods', $groupgood->group_image) }}"
                   class="border rounded" width="150px" alt="{{$groupgood->group_image}}"> </span>
            </li>
            <li class="list-group-item">
                <strong>Mô tả</strong>
                <span>{{ $groupgood->group_description }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection
