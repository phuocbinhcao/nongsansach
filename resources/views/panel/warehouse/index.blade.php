@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách lô hàng</h6>
    </div>

    <div class="card-body">
        <a class="btn btn-outline-primary mb-3" href="{{ route('warehouses.create') }}">Thêm lô hàng</a>
        @if (auth()->user()->rolename == 'admin')
        <a class="badge badge-danger mb-3" href="{{ route('consignment-delete.index') }}">Lô hàng
            đã xóa</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Thời hạn</th>
                        <th>Tổng(kg)</th>
                        <th>Hiện tại(kg)</th>
                        <th>Giá mua(vnd)</th>
                        <th>Giá bán(vnd)</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Thời hạn</th>
                        <th>Tổng(kg)</th>
                        <th>Hiện tại(kg)</th>
                        <th>Giá mua(vnd)</th>
                        <th>Giá bán(vnd)</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($lists as $item)
                    @if ($item->active == 1)

                    <tr>
                        @if ($item->consignment_currently <100)
                        <td class="text-danger font-weight-bold">{{ $item->consignment_symbol }}</td>
                        <td class="text-danger font-weight-bold">{{ $item->consignment_name }}</td>
                        @else
                        <td>{{ $item->consignment_symbol }}</td>
                        <td>{{ $item->consignment_name }}</td>
                        @endif
                        <td>{{ $item->consignment_expiry }}</td>
                        <td>{{ $item->consignment_quantity }}</td>
                        @if ($item->consignment_currently <100)
                        <td class="text-danger font-weight-bold">{{ $item->consignment_currently }}</td>
                        @else
                        <td>{{ $item->consignment_currently }}</td>

                        @endif
                        <td>{{number_format($item->consignment_purchase_price) }}</td>
                        <td>{{ number_format($item->consignment_sale_price) }}</td>
                        <td>
                            <a href=" {{route('warehouses.show', $item->id)}}"><button
                                    class="btn btn-primary">Chi tiết</button></a>
                                    <a href="{{ route('warehouses.edit', $item->id) }}"><button
                                        class="btn btn-primary">Sửa</button></a>

                            @if (auth()->user()->rolename == 'admin')
                            <form method="POST" action="{{ route('warehouses.destroy',  $item->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Xóa</button>
                            </form>
                            @endif
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
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script>
    @if(session()->get('success'))

   swal({title: "Thành công",
                text: '{{session()->get('success')}}',
                icon: "success",

        });


    @endif
</script>
@endsection
