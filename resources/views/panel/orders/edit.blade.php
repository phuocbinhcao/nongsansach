@extends('layouts.panel')
@section('styles')

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
 <!-- Default theme -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endsection
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
        <a href="{{route('order.index')}}" class="border border-primary rounded text-decoration-none">
            Danh sách đơn hàng</a>
        <span> <i class="fas fa-chevron-right"></i>Sửa thông tin đơn hàng</span>
    </p>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('order.update',$order->id) }}">
        <div class="mb-3 row text-center">
            <label class="col-sm-1 col-form-label">Tên</label>
            <div class="col-sm-4">
                <input name="order_customer_name" type="text" class="form-control"
                    value="{{$order->order_customer_name}}">
            </div>
            <label class="col-sm-1 col-form-label">SĐT</label>
            <div class="col-sm-4">
                <input name="order_customer_phone" type="text" class="form-control"
                    value="{{$order->order_customer_phone}}">
            </div>
        </div>
        <div class="mb-3 row text-center">
            <label class="col-sm-1 col-form-label">Địa chỉ</label>
            <div class="col-sm-4">
                <input name="order_customer_address" type="text" class="form-control"
                    value="{{$order->order_customer_address}}">
            </div>
            <label class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-4">
                <input name="order_customer_email" type="text" class="form-control"
                    value="{{$order->order_customer_email}}">
            </div>
        </div>
        <div class="mb-3 row text-center">
            <label class="col-sm-1 col-form-label">Ghi chú</label>
            <div class="col-sm-4">
                <textarea name="order_note" type="text" class="form-control"
                    value="{{$order->order_note}}">{{$order->order_note}}</textarea>
            </div>
            <label class="col-sm-1 col-form-label">Trạng thái</label>
            <div class="col-sm-4">
                <select name="order_status" class="form-control">
                    <option value="0">{{$order->order_status}}</option>
                    <option value="Tiếp nhận">Tiếp nhận</option>
                    <option value="Đang giao">Đang giao</option>
                    <option value="Đã giao">Đã giao</option>
                    <option value="Hủy">Hủy</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row text-center">
            <label class="col-sm-1 col-form-label">Chi tiết đơn hàng</label>
            <div class="col-sm-9">
                <table class="table table-hover table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ký hiệu</th>
                            <th>Số lượng (Kg)</th>
                            <th>Giá (VND)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrders as $item )
                        <tr>
                            <td> {{$item->product_name}}</td>
                            <td>{{$item->product_symbol}}</td>
                            <td><input type="number" name="order_detail_quantity" min="1"  class="w-25 quatity"
                                    value="{{$item->order_detail_quantity}}"></td>
                            <td>{{number_format($item->order_detail_price)}}</td>
                            <td>
                                <a href="javascript:" data-id="{{$item->id}}"
                                    data-url="{{route('order.editCart',$item->id)}}"
                                    class="btn-sm btn-primary cart_update">Sửa</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @csrf
        <button class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection
@section('scripts')
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    function cartUpdate(event) {
        event.preventDefault();
        let urlUpdateCart = $(this).data('url');
        let id = $(this).data('id');
        let quatity = $(this).parents('tr').find('input.quatity').val();
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: id,
                quatity: quatity,
            },
            success: function (data) {
                    $('.table').load(' .table');
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('Thay đổi thành công');
            }
        });
    }
    $(function () {
        $(document).on('click', '.cart_update', cartUpdate);
    });
</script>
@endsection
