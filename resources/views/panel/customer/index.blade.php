 @extends('layouts.panel')
 @section('styles')
 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
 @endsection
 @section('content')
 <!-- DataTales Example -->

 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
     </div>
     <div class=" mb-0 text-gray-600 pt-3">
         <a href="{{route('customers.create')}}" class="btn btn-outline-primary">Khách hàng mới</a>
         @if (auth()->user()->rolename == 'admin')
        <a href="{{route('customer.deleted')}}" class="badge badge-danger ">Khách hàng đã xóa</a>
        @endif
     </div>

     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Tên</th>
                         <th>SĐT</th>
                         <th>Địa chỉ</th>
                         <th>Email</th>
                         <th>Công cụ</th>
                     </tr>
                 </thead>
                 <tfoot>
                     <tr>
                         <th>STT</th>
                         <th>Tên</th>
                         <th>SĐT</th>
                         <th>Địa chỉ</th>
                         <th>Email</th>
                         <th>Công cụ</th>
                     </tr>
                 </tfoot>
                 <tbody>
                     @foreach ($customers as $cus)
                     @if ($cus->active == 1)

                     <tr>
                         <td>{{ $cus->id }}</td>
                         <td>{{ $cus->customer_name }}</td>
                         <td>{{ $cus->customer_phone }}</td>
                         <td>{{ $cus->customer_address }}</td>
                         <td>{{ $cus->customer_email }}</td>
                         <td>
                             <a href="{{ route('customers.edit', $cus->id) }}"><button
                                     class="btn btn-primary">Sửa</button></a>
                             <a href="{{route('customers.show',$cus->id)}}"><button class="btn btn-primary">Chi
                                     tiết</button></a>
                             @if (Auth::user()->rolename == 'admin')

                             <form method="POST" action="{{ route('customers.destroy', ['customer' => $cus->id]) }}"
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

     swal({
         title: "Thành công",
         text: '{{session()->get('success')}}',
         icon: "success",

     });


     @endif
 </script>
 @endsection
