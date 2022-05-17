@extends('layouts.frontend')
@section('styles')
<!-- Css Alert -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

@endsection
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
                        <li>Giỏ Hàng</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--- Nav Page end -->

<div class="cart_main_area ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="cart_table">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table data-url="{{ route('update.cart') }}" class="update_cart_url">
                                <thead>
                                    <tr>
                                        <th class="img-thumbnail">Ảnh</th>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng tiền</th>
                                        <th class="product-remove">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; $cartTotal= 0;  @endphp
                                    @if (session()->get('cart') !== null)
                                    @foreach ($carts = session()->get('cart') as $id=>$cart )

                                    <tr data-id="{{ $id }}">
                                        <td class="product-thumbnail"><img src="{{url('/img/products',$cart['image'])}}"
                                                width="70px" height="auto" alt=""></td>
                                        <td class="product-name"><a href="#">{{$cart['name']}}</a></td>
                                        <td class="product-price"><span
                                                class="amount">{{number_format($cart['price'])}}</span></td>
                                        <td data-th="Quantity" class="product-quantity">
                                            <div class="quickview_plus_minus quick_cart">
                                                <div class="quickview_plus_minus_inner">
                                                    <div class="cart-plus-minus cart_page">
                                                        <input type="number" min="1" value="{{ $cart['quantity'] }}"
                                                            class="form-control quantity " />
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                        $total = $cart['price'] * $cart['quantity'];
                                        $cartTotal += $total;
                                        @endphp
                                        <td class="product-subtotal">{{number_format($total)}}</td>
                                        <td class="product-update">
                                            <a href="javascript:" data-id="{{$id}}"
                                                class="badge badge-primary update-cart mr-5">U</a>
                                            <a href="javascript:" data-id="{{$id}}"
                                                class="badge badge-danger remove-from-cart">X</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row table-responsive_bottom">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="buttons-carts">
                                    <a href="{{route('shop.index')}}">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <div class="cart_totals  text-right">
                                    <h2>Tổng đơn hàng</h2>
                                    <div class="cart-subtotal">
                                        <span>Tổng tiền sản phẩm</span>
                                        <span>{{number_format($cartTotal)}}Vnd</span>
                                    </div>
                                    <div class="order-total">
                                        <span><strong>Tổng tiền (phụ phí)</strong> </span>
                                        <span><strong>{{number_format($cartTotal)}}Vnd</strong> </span>
                                    </div>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{route('checkout.cart')}}">Tiến hành Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<!-- JavaScript alert-->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



@endsection
