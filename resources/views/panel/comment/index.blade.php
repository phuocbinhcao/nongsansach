@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Email</th>
                        <th>Bình luận</th>
                        <th>Thay đổi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comments as $com)
                    @if ($com->active == 1)

                    <tr>
                        <td>{{ $com->created_at }}</td>
                        <td>{{ $com->comment_email }}</td>
                        <td>{{ $com->comment_content }}</td>
                        <td>

                            @if (auth()->user()->rolename == 'admin')

                            <form method="POST" action="{{route('comment.delete',$com->id)}}"
                                class="d-inline-block">
                                @csrf
                                @method('POST')
                                <button class="btn btn-primary">Xóa</button>
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
