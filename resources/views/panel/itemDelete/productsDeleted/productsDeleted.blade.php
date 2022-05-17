@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header shadow mb-4">
        <p class="m-0 font-weight-bold text-primary">
            <a href="{{route('products.index')}}" class="border border-primary rounded text-decoration-none">
            Danh sách sản phẩm</a>
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá(Vnd)</th>
                        <th>Mô tả</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá(Vnd)</th>
                        <th>Mô tả</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $pro)
                    @if ($pro->active == 0)

                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->product_name }}</td>
                        <td><img src="{{url('img/products',$pro->product_image )}}" width="50px" alt=""></td>
                        <td>{{ number_format($pro->product_price) }}</td>
                        <td width="30%">{{ $pro->product_description }}</td>
                        <td>

                            <a href="{{route('product.detailDeleted', $pro->id)}} "><button
                                    class="btn btn-primary">Chi tiết</button></a>
                            <form method="POST" action="{{ route('product.restoreProduct', $pro->id) }}"
                                class="d-inline-block">
                                @csrf
                                <button class="btn btn-primary">Kích hoạt</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
