@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LÔ HÀNG ĐÃ XÓA</h6>
    </div>

    <div class="card-body">
        @if (auth()->user()->rolename == 'admin')
        <a class="btn btn-primary mb-3 text-right" href="{{ route('warehouses.index') }}">Trở lại</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ký hiệu</th>
                        <th>Thời hạn</th>
                        <th>Số lượng</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ký hiệu</th>
                        <th>Thời hạn</th>
                        <th>Số lượng</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        @if (auth()->user()->rolename == 'admin')
                        <th>Công cụ</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($consignments as $item)
                    @if ($item->active == 0)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->consignment_name }}</td>
                        <td>{{ $item->consignment_symbol }}</td>
                        <td>{{ $item->consignment_expiry }}</td>
                        <td>{{ $item->consignment_quantity }}</td>
                        <td>{{ $item->consignment_purchase_price }}</td>
                        <td>{{ $item->consignment_sale_price }}</td>
                        @if (auth()->user()->rolename == 'admin')
                        <td>
                            <form method="POST" action="{{ route('consignment-delete.destroy',  $item->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Kích hoạt</button>
                            </form>
                        </td>
                        @endif
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
