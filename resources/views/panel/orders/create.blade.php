@extends('layouts.panel')
@section('styles')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
 <!-- Default theme -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />


@endsection
@section('content')


<div class="card-header py-3">
    <p class="m-0 font-weight-bold text-primary">
        <a href="{{route('order.index')}}" class="border border-primary rounded text-decoration-none">
           Danh sách đơn hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Thêm đơn hàng</span>
    </p>
</div>
<div class="container">
    <div class="card-body ">
        <form method="POST" action="{{ route('order.store') }}">

            <!--Form Orders  -->
            <div class="mb-3 row">
                <div class="col-10 ">
                    <div class="table">
                        <table class="table table-bordered table-product" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    @if (auth()->user()->rolename == 'admin')
                                    <th>Chức năng</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    @if (auth()->user()->rolename == 'admin')
                                    <th>Chức năng</th>
                                    @endif
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $pro)
                                @if ($pro->active == 1)
                                <tr>
                                    <td>{{ $pro->id }}</td>
                                    <td>{{ $pro->product_name }}</td>
                                    <td>{{ number_format($pro->product_price) }}</td>
                                    @if (auth()->user()->rolename == 'admin')
                                    <td>
                                        <a href="javascript:" data-url="{{route('addToCart', $pro->id)}}"
                                            class="add_order btn-sm btn-primary">Thêm</a>
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
            <a class="btn-sm btn-warning" href="{{route('showCart')}}">👋Hiển thị đơn hàng</a>
            @csrf
        </form>
    </div>
</div>

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- Script -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>







<!-- Script code  -->
<script type="text/javascript">
    // CSRF Token,  Autocomplete
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".add_order").on('click', function (e) {
         e.preventDefault();
         let urlCart = $(this).data('url');
          console.log(urlCart);
         $.ajax({
             type: "GET",
             url: urlCart,
             dataType: "json",
             success: function (data) {
                console.log(data);
                 alertify.set('notifier', 'position', 'top-center');
                 alertify.success('Đã thêm sản phẩm!');
             }
         });
     });


    // <script type="text/javascript">
    // $(document).ready(function() {
    // $('select[name="product"]').on('change', function () {
    //     var productID = $(this).val();
    //     if (productID) {
    //         $.ajax({
    //             url: '/panel/orders/create/' + productID,
    //             type: "GET",
    //             dataType: "json",
    //             success: function (data) {
    //                 console.log(data);
    //                 $('tr[name="product_info"]').empty();
    //                 $.each(data, function () {
    //                     $('tr[name="product_info"]').html(

    //                         '<td width="5%">' +  data.id + '</td>\
    //                         <td width="50%">' +  data.product_name + '</td>\
    //                         <td width="30%">' +  data.product_price + '</td>\
    //                         <th><a data-url="{{route('addToCart',['id'=>'1'])}}" class="add btn-sm btn-primary" >add</a></th>'
    //                     );
    //                 });




</script>
@endsection
@endsection
