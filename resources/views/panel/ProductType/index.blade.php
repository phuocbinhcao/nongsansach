@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách loại sản phẩm</h6>
    </div>

    <div class="card-body">
        @if (auth()->user()->rolename == 'admin'||auth()->user()->rolename == 'Nhân viên')
        <a class="btn btn-outline-primary mb-3" href="{{ route('product-type.create') }}">Thêm loại sản phẩm</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th width="50%">Mô tả</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th width="50%">Mô tả</th>
                        <th>Công cụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_type_name }}</td>
                        <td>{{ $item->product_type_description }}</td>
                        <td>
                            <a href="{{ route('product-type.edit', $item->id) }}"><button
                                    class="btn btn-primary">Sửa</button></a>
                            <a href=" {{route('product-type.show', $item->id)}}"><button
                                    class="btn btn-primary">Chi tiết</button></a>
                            @if (auth()->user()->rolename == 'admin')

                            <form method="POST" action="{{ route('product-type.destroy',  $item->id) }}"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Xóa</button>
                            </form>
                            @endif
                        </td>
                    </tr>
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
