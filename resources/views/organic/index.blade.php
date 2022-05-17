@extends('layouts.frontend')
@section('content')



<!--Slider start-->
<div class="slider_area">
    <div class="slider_list  owl-carousel">
        <div class="single_slide" style="background-image: url(assets/img/banner/slide1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider__content">
                            <p>Giảm giá -10% Chỉ trong tuần này</p>
                            <h2>Tràn đầy <strong>sức sống</strong> với một ly</h2>
                            <h3><strong>nước ép</strong> mỗi ngày</h3>
                            <h6>Giá chỉ<span> {{number_format(25000)}} Vnd</span></h6>
                            <div class="slider_btn">
                                <a href="{{route('shop.index')}}">Mua Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slide" style="background-image: url(assets/img/banner/slide2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider__content">
                            <p>Giảm giá -10% Chỉ trong tuần này</p>
                            <h2>Chúng tôi <strong>cung cấp</strong> sản phẩm </h2>
                            <h3> <strong>tốt nhất </strong> cho bạn</h3>
                            <h6>Giá chỉ <span>{{number_format(35000)}} Vnd</span></h6>
                            <div class="slider_btn">
                                <a href="{{route('shop.index')}}">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Slider end-->


<!--Banner area start-->
<div class="banner_area home1_banner mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/1.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/2.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner banner_three">
                    <a href="#">
                        <img src="assets/img/banner/3.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Banner area end-->

<!--Features product area-->
<div class="features_product pt-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title text-center">
                    <h3> Sản phẩm đặc trưng</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active owl-carousel">
                @foreach ($products as $pro )

                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="new_badge">Mới</span>
                            <div class="product_img">
                                <a href="{{route('details.product',$pro->id)}}">
                                    <img src="{{url('/img/products',$pro->product_image1)}}" height="100px" alt="">
                                </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="#">{{$pro->product_name}}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <p>{{number_format($pro->product_price)}} Vnd</p>
                                    </div>
                                </div>
                                <div class="product__hover">
                                    <ul>
                                        <li><a class="cart-fore" href="#" data-toggle="modal"
                                                data-target="#my_modal{{$pro->id}}" title="Quick View"><i
                                                    class="ion-android-open"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!--Features product end-->

<!--Shipping area start-->
<div class="shipping_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shipping_list d-flex justify-content-between flex-xs-column">
                    <div class="single_shipping_box d-flex">
                        <div class="shipping_icon">
                            <img src="assets/img/ship/1.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Miễn phí giao hàng hóa đơn trên</h6>
                            <p>{{number_format(200000)}} Vnd</p>
                        </div>
                    </div>
                    <div class="single_shipping_box one d-flex">
                        <div class="shipping_icon">
                            <img src="assets/img/ship/2.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Đổi trả</h6>
                            <p>Trả lại đơn hàng trong 3 ngày</p>
                        </div>
                    </div>
                    <div class="single_shipping_box two d-flex">
                        <div class="shipping_icon">
                            <img src="assets/img/ship/3.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Giảm giá cho thành viên</h6>
                        </div>
                    </div>
                    <div class="single_shipping_box three d-flex">
                        <div class="shipping_icon">
                            <img src="assets/img/ship/4.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>Hỗ trợ 24/7</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Shipping area end-->


<!--shop product area start-->
<div class="shop_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop_product_head d-flex justify-content-between mb-30">
                    <div class="section_title space_2 text-left">
                        <h3>Cửa hàng</h3>
                    </div>
                    <div class="home_shop_product text-right">
                        <ul class="product-tab-list nav d-flex flex-wrap justify-content-end" role="tablist">
                            <li><a class="active" href="#fresh" data-toggle="tab" role="tab" aria-selected="true"
                                    aria-controls="fresh">
                                    Rau tươi
                                </a></li>
                            <li><a href="#fruits" data-toggle="tab" role="tab" aria-selected="false"
                                    aria-controls="fruits"> Trái cây </a></li>
                            <li><a href="#rices" data-toggle="tab" role="tab" aria-selected="false"
                                    aria-controls="organics">Gạo </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="shop_larg_product">
                    <div class="single__product_2">
                        <div class="product_img px-auto">
                            <a href="{{route('details.product',$product->id)}}">
                                <img src="{{url('img/products',$product->product_image1)}}" alt="">
                            </a>
                        </div>
                        <div class="product__content text-center">
                            <div class="product_title">
                                <h4><a href="{{route('details.product',$product->id)}}">{{$product->product_name}}</a>
                                </h4>
                            </div>
                            <div class="product_price">
                                <p>{{number_format($product->product_price)}}</p>
                            </div>
                            <div class="product-add-to-cart">
                                <a href="{{route('shop.index')}}">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="fresh" role="tabpanel">
                        <div class="row">
                            <div class="shop-product_list owl-carousel">
                                @foreach ($vegetables1 as $veg )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="{{route('details.product',$veg->id)}}">
                                                        <img src="{{url('img/products',$veg->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$veg->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($veg->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>

                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$veg->id}}"
                                                                    title="Quick View"><i
                                                                        class="ion-android-open"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="shop-product_list owl-carousel">
                                @foreach ($vegetables2 as $veg )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="{{route('details.product',$veg->id)}}">
                                                        <img src="{{url('img/products',$veg->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$veg->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($veg->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>
                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$veg->id}}"
                                                                    title="Quick View"><i
                                                                        class="ion-android-open"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fruits" role="tabpanel">
                        <div class="row">
                            <div class="shop-product_list owl-carousel">
                                @foreach ($flowers2 as $veg )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="{{route('details.product',$veg->id)}}">
                                                        <img src="{{url('img/products',$veg->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$veg->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($veg->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>

                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$veg->id}}" title="Xem nhanh"><i
                                                                        class="ion-android-open"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="shop-product_list owl-carousel">
                                @foreach ($flowers1 as $veg )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="{{route('details.product',$veg->id)}}">
                                                        <img src="{{url('img/products',$veg->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$veg->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($veg->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>

                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$veg->id}}" title="Quick View"><i
                                                                        class="ion-android-open"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rices" role="tabpanel">
                        <div class="row">
                            <div class="shop-product_list owl-carousel">
                                @foreach ($rices2 as $rice )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="#">
                                                        <img src="{{url('img/products',$rice->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$rice->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($rice->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>

                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$rice->id}}" title="Quick View"><i
                                                                        class="ion-android-open"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="shop-product_list owl-carousel">
                                @foreach ($rices1 as $rice )
                                <div class="col-12">
                                    <div class="shop_single_prduct_item">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">Mới</span>
                                                <div class="product_img">
                                                    <a href="#">
                                                        <img src="{{url('img/products',$rice->product_image1)}}"
                                                            height="100px" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a
                                                                    href="#">{{$rice->product_name}}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{number_format($rice->product_price)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="product__hover">
                                                        <ul>

                                                            <li><a class="cart-fore" href="#" data-toggle="modal"
                                                                    data-target="#my_modal{{$rice->id}}" title="Quick View"><i
                                                                        class="ion-android-open"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shop product area end-->

<!--Banner area start-->
<div class="banner_area home1_banner2 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/big-1.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/big-2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Banner area end-->



<!--New product area-->
<div class="new_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>Sản phẩm mới</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active owl-carousel">
                @foreach ($products as $pro )

                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="new_badge">Mới</span>
                            <div class="product_img">
                                <a href="{{route('details.product',$pro->id)}}">
                                    <img src="{{url('/img/products',$pro->product_image1)}}" height="100px" width=""
                                        alt="">
                                </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="#">{{$pro->product_name}}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <p>{{number_format($pro->product_price)}} Vnd</p>
                                    </div>
                                </div>
                                <div class="product__hover">
                                    <ul>

                                        <li><a class="cart-fore" href="#" data-toggle="modal"
                                                data-target="#my_modal{{$pro->id}}" title="Quick View"><i
                                                    class="ion-android-open"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!--new product end-->

<!--Banner area start-->
<div class="banner_area banner_area-2 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-4.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-5.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single_banner">
                    <a href="#">
                        <img src="assets/img/banner/banner-6.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Banner area end-->


<!--Best seller product -->
<div class="best_seller_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3> Sản phẩm bán chạy</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="best_selling_product_list owl-carousel">
                    <div class="best_selling_product">

                        <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$vegetables2[0]->id)}}">
                                    <img src="{{url('img/products',$vegetables2[0]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$vegetables2[0]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($vegetables2[0]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                          <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$vegetables2[1]->id)}}">
                                    <img src="{{url('img/products',$vegetables2[1]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$vegetables2[1]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($vegetables2[1]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="best_selling_product">

                        <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$vegetables2[2]->id)}}">
                                    <img src="{{url('img/products',$vegetables2[2]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$vegetables2[2]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($vegetables2[2]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                          <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$vegetables2[3]->id)}}">
                                    <img src="{{url('img/products',$vegetables2[3]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$vegetables2[3]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($vegetables2[3]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="best_selling_product">

                        <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$flowers2[2]->id)}}">
                                    <img src="{{url('img/products',$flowers2[2]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$flowers2[2]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($flowers2[2]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                          <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$flowers2[3]->id)}}">
                                    <img src="{{url('img/products',$flowers2[3]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$flowers2[3]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($flowers2[3]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="best_selling_product">

                        <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$flowers2[0]->id)}}">
                                    <img src="{{url('img/products',$flowers2[0]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$flowers2[0]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($flowers2[0]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                          <div class="single_small_product mb-30">
                            <div class="product_thumb">
                                <a href="{{route('details.product',$flowers2[1]->id)}}">
                                    <img src="{{url('img/products',$flowers2[1]->product_image1)}}" alt="">
                                </a>
                            </div>
                            <div class="product_content">
                                <h4><a href="#">{{$flowers2[1]->product_name}}</a></h4>
                                <div class="product_ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product_price">
                                    <span class="regular_price">{{number_format($flowers2[1]->product_price)}} Vnd</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Best seller product  end-->

<!--Brand logo start-->
<div class="brand_logo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_list_carousel owl-carousel">
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/1.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/2.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/3.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/4.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/5.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/1.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/2.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/3.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/4.png" alt="brand logo">
                        </a>
                    </div>
                    <div class="single_brand_logo">
                        <a href="#">
                            <img src="assets/img/brand/5.png" alt="brand logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Brand logo end-->

<!-- modal area start -->
@foreach ($products as $pro )


<div class="modal fade mt-5" id="my_modal{{$pro->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body shop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="product-flags madal">
                                <div class="tab-content"  >
                                    <div class="tab-pane   show  active" >
                                        <div class="product_tab_img">
                                            <a href="#"><img src="{{url('img/products',$pro->product_image1)}}"
                                                    alt=""></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="shop_reviews">
                                    <div class="demo_product">
                                        <h2>{{$pro->product_name}}</h2>
                                    </div>
                                    <div class="current_price">
                                        <span class="regular_price">{{number_format($pro->product_price)}}</span>
                                    </div>
                                    <div class="product_information product_modal">
                                        <div id="product_modal_content">
                                            <p>{{$pro->product_description}}</p>
                                        </div>
                                        <div class="product_variants">
                                            <div class="cart_description">
                                                <ul class="text-primary">
                                                    <li>
                                                        <img  src="{{url('organic/assets/img/cart/cart1.png')}}" alt="">
                                                        <span>Bảo mật thông tin</span>
                                                    </li>
                                                    <li>
                                                        <img   src="{{url('organic/assets/img/cart/cart2.png')}}" alt="">
                                                        <span>Giao hàng nhanh</span>
                                                    </li>
                                                    <li>
                                                        <img  src="{{url('organic/assets/img/cart/cart3.png')}}" alt="">
                                                        <span>Đổi trả (Theo yêu cầu từ khách hàng)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="social-share">
                                <h3>Share this product</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- modal area end -->

@endsection
