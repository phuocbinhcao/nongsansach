@extends('layouts.frontend')
@section('content')
<!-- Nav Page start-->

 <div class="container">
     <div class="breadcrumb_container">
         <div class="row">
             <div class="col-12">
                 <nav>
                     <ul>
                         <li>
                             <a href="{{route('organic.index')}}">Trang chủ ></a>
                         </li>
                         <li>Thanh toán</li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>
 </div>
 <!--- Nav Page end -->

<!--Checkout page section-->
<div class="container">
<div class="Checkout_page_section">
        <div class="row">
            <div class="col-12">
                <div class="customer-login mb-40">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Trở thành thành viên?
                        <a class="Returning text-success" href="{{route('register')}}">Nhấp vào đây để đăng ký</a>

                    </h3>
                </div>
            </div>
        </div>
        <div class="checkout-form">
            <form action="{{route('paybycash.cart')}}" method="POST">
            <div class="row">
                @if(Auth::user() == null)
                    <div class="col-lg-6 col-md-6">
                        @csrf
                        <h3>Chi tiết đơn hàng</h3>
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 mb-30">
                                <label for="b_name">Tên khách hàng<span>*</span></label>
                                <input id="b_name" type="text" name="name">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Địa chỉ <span>*</span></label>
                                <input placeholder="Tên đường( Thôn)/ Phường( Xã)/ Quận( Huyện)/ Thành phố (Tỉnh)" type="text" name="address">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label for="b_email">Địa chỉ Email<span>*</span></label>
                                <input id="b_email" type="text" name="email" placeholder="a@google.com">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Số điện thoại <span>*</span></label>
                                <input placeholder="Phone Number" type="text" name="phone">
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Ghi chú</label>
                                    <textarea id="order_note" name="customer_name"
                                        placeholder="Ghi chú thông tin cần thiết về đơn hàng của bạn, quan trọng cho việc giao hàng."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                    <div class="col-lg-6 col-md-6">
                        <div class="order-wrapper">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="order-table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-total">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total= 0
                                        @endphp
                                        @foreach ($carts = Session::get('cart') as $id => $cart )

                                        <tr>
                                            <td class="product-name">{{$cart['name']}} x <strong class="bordered rounded text-white bg-danger px-1">
                                                    {{$cart['quantity']}}</strong></td>
                                            <td class="amount">{{number_format($cart['price']*$cart['quantity'])}}Vnd
                                            </td>
                                        </tr>
                                        @php
                                        $total += $cart['price']*$cart['quantity']
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng tiền giỏ hàng</th>
                                            <td>{{number_format($total)}}Vnd</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền đơn hàng (phụ phí)</th>
                                            <td><strong>{{number_format($total*1.05)}} Vnd(VAT: 5%)</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method d-flex justify-content-center">
                                <form action="{{route('paybycash.cart')}}" method="POST">
                                    @csrf
                                    <div class="order-button1 mr-2">
                                        <button type="submit">Đặt hàng</button>
                                    </div>
                                </form>
                                <form action="{{route('payonline.cart')}}" method="get">
                                    @csrf
                                    <div class="order-button1  ">
                                        <button  type="submit" class="bg-primary">Thanh toán Online </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script>
    @if(session()->get('payOnline'))

    swal({
        title: "Chú ý",
        text: '{{session()->get('payOnline')}}',
        icon: "warning",
    });
    @endif
</script>
@endsection
