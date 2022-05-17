@extends('layouts.frontend')
@section('styles')

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endsection
@section('content')
<!--breadcrumb area start-->
<div class=" breadcrumb_container container">
    <div class="row">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="{{route('organic.index')}}">Trang chủ ></a>
                    </li>
                    <li>Thông tin sản phẩm</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--breadcrumb area end-->


<!-- primary block area -->
<div class="table_primary_block pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="product-flags">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabone" role="tabpanel">
                            <div class="product_tab_img">
                                <a href="#"><img src="{{url('img/products',$product->product_image1)}}"  alt=""></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                            <div class="product_tab_img">
                                <a href="#"><img src="{{url('img/products',$product->product_image2)}}"  alt=""></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabthree" role="tabpanel">
                            <div class="product_tab_img">
                                <a href="#"><img src="{{url('img/products',$product->product_image3)}}"  alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="products_tab_button">
                        <ul class="nav product_navactive" role="tablist">
                            <li class="product_button_one">
                                <a class="nav-link active" data-toggle="tab" href="#tabone" role="tab"
                                    aria-controls="imgeone" aria-selected="false"><img src="{{url('img/products',$product->product_image1)}}"
                                    height="50px"  width="50px"   alt=""></a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="imgetwo"
                                    aria-selected="false"><img src="{{url('img/products',$product->product_image2)}}" height="50px" width="50px" alt=""></a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="tab" href="#tabthree" role="tab"
                                    aria-controls="imgethree" aria-selected="false"><img src="{{url('img/products',$product->product_image3)}}"
                                    height="50px" width="50px"   alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="product__details_content">
                    <div class="demo_product">
                        <h2>{{$product->product_name}}</h2>
                    </div>
                    <div class="product_comments_block">
                        <div class="comments_note clearfix">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="comments_advices">
                            <ul>
                                <li><a href="#product_tab"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                        Đọc bình luận (<span>{{count($comments)}}</span>)</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="current_price">
                        <span>{{number_format($product->product_price)}} Vnd</span>
                    </div>
                    <div class="product_information">
                        <div id="product_description_short">
                            <p>Sản phẩm được lựa chọn kỹ, cực kỳ chất lượng, đảm bảo an toàn thực phẩm.</p>
                        </div>
                        <div class="product_variants">
                            <div class="quickview_plus_minus">
                                <span class="control_label">Số lượng</span>
                                <div class="quickview_plus_minus_inner">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="1" min="1" name="qtybutton"
                                            class="cart-plus-minus-box quantity-detail">
                                    </div>
                                    <div class="add_button">
                                        <button type="button" id="add__Cart" data-id="{{$product->id}}"> Thêm giỏ
                                            hàng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-availability">
                                <span id="availability">
                                    <i class="zmdi zmdi-check"></i>
                                    Kho Hàng
                                </span>
                            </div>
                            <div class="social-sharing">
                                <span>Chia sẻ</span>
                                <ul>
                                    <li><a href="https://facebook.com"><i class="fa fa-facebook text-primary"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com"><i class="fa fa-twitter text-white bg-primary"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://google.com"><i class="fa fa-google-plus text-danger"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <img src="{{url('organic/assets/img/cart/cart1.png')}}" alt="">
                                        <span>Bảo mật thông tin</span>
                                    </li>
                                    <li>
                                        <img src="{{url('organic/assets/img/cart/cart2.png')}}" alt="">
                                        <span>Giao hàng nhanh</span>
                                    </li>
                                    <li>
                                        <img src="{{url('organic/assets/img/cart/cart3.png')}}" alt="">
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
</div>
<!-- primary block end -->

<!-- product page tab -->

<div class="product_page_tab ptb-100" id="product_tab">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class=" tav_past  " id="home-tab" data-toggle="tab" href="#Description" role="tab"
                                aria-controls="Description" aria-selected="true">Mô tả</a>
                        </li>
                        <li>
                            <a class=" tav_past active" id="contact-tab" data-toggle="tab" href="#Reviews" role="tab"
                                aria-controls="Reviews" aria-selected="false">Đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  " id="Description" role="tabpanel">
                        <div class="product-description">
                            <p>{{$product->product_description}}.  </p>
                        </div>
                    </div>
                    <div class="tab-pane fade show active  " id="Reviews" role="tabpanel">
                        <div class="product_comments_block_tab">
                            <div class="comment_clearfix">
                                <div class="comment_author">
                                    <span>Hạng</span>
                                    <div class="star_content clearfix">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="comment_details col-md-6" >
                                    <h3>Bình luận</h3>
                                    <div class="border border-muted rounded p-2">
                                        @foreach ($comments as $com )
                                        <div class="border-bottom   mb-2">

                                            <strong class=" bg-primary text-white p-1 rounded">{{$com->comment_username}}</strong>
                                            <p>{{$com->comment_content}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="review col-md-6">
                                    <p><strong >Bình luận tại đây</strong></p>
                                    <form action="{{route('comment')}}" method="post" class="form-group ">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @if(Auth::user() == null)
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Tên khách hàng">
                                        <input type="text" name="email" class="form-control mb-3" placeholder="Email">
                                        @endif
                                        <textarea type="text" name="comment" class="form-control mb-3" placeholder="Bình luận"></textarea>
                                        <button type="submit" class="btn btn-primary rounded">Bình luận</button>
                                    </form>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product page tab end -->

<!--Features product area-->
<div class="features_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title text-left">
                    <h3> Sản Phẩm Liên Quan </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related_product_active owl-carousel">

                @foreach ($relatedProduct as $pro )
                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                                <a href="{{route('details.product',$pro->id)}}">
                                    <img src="{{url('img/products',$pro->product_image1)}}" height="170px" alt="">
                                </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="">{{$pro->product_name}}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <input type="hidden" min="1" value="1" name="quantity_modal"
                                            class="cart-plus-minus-box quantity-product-relate">
                                        <p>{{number_format($pro->product_price)}}</p>
                                    </div>
                                </div>
                                <div class="product__hover">
                                    <ul>
                                        <li><a data-id="{{$pro->id}}" href="javascript:" class="add_cart_related"><i
                                                    class="ion-android-cart"></i></a></li>
                                        <li><a class="cart-fore" href="#" data-toggle="modal"
                                                data-target="#my_modal{{$pro->id}}" title="Xem nhanh"><i
                                                    class="ion-android-open"></i></a></li>
                                        <li><a href="{{route('details.product',$pro->id)}}"><i
                                                    class="ion-clipboard"></i></a></li>
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

<!-- modal area start -->

@foreach ($relatedProduct as $pro )


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
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="imgeone" role="tabpanel">
                                        <div class="product_tab_img">
                                            <a href="#"><img src="{{url('img/products',$pro->product_image1)}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="imgetwo" role="tabpanel">
                                        <div class="product_tab_img">
                                            <a href="#"><img src="{{url('img/products',$pro->product_image2)}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="imgethree" role="tabpanel">
                                        <div class="product_tab_img">
                                            <a href="#"><img src="{{url('img/products',$pro->product_image3)}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="products_tab_button  modals">
                                    <ul class="nav product_navactive" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#imgeone" role="tab"
                                                aria-controls="imgeone" aria-selected="false"><img
                                                    src="{{url('img/products',$pro->product_image1)}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab"
                                                aria-controls="imgetwo" aria-selected="false"><img
                                                    src="{{url('img/products',$pro->product_image2)}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#imgethree"
                                                role="tab" aria-controls="imgethree" aria-selected="false"><img
                                                    src="{{url('img/products',$pro->product_image3)}}" alt=""></a>
                                        </li>
                                    </ul>
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
                                        <span class="regular_price">{{number_format($pro->product_price)}}Vnd</span>
                                    </div>
                                    <div class="product_information product_modal">
                                        <div id="product_modal_content">
                                            <p>{{$pro->product_description}}</p>
                                        </div>
                                        <div class="product_variants">
                                            <div class="quickview_plus_minus">
                                                <span class="control_label">Số lượng</span>
                                                <div class="quickview_plus_minus_inner">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="01" min="1" name="qtybutton"
                                                            class="cart-plus-minus-box quantity_product">
                                                    </div>
                                                    <div class="add_button add_modal">
                                                        <button type="button" data-id="{{$pro->id}}"
                                                            class="add_cart_relate"> Thêm giỏ hàng</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cart_description">
                                                <p>{{$pro->product_description}}</p>
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
                                <h3>Chia sẻ sản phẩm này</h3>
                                <ul>
                                    <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://gmail.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
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
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script>
    @if(session()->get('comment'))
    swal({title: "Thành công",
                text: '{{session()->get('comment')}}',
                icon: "success",
        });
    @endif
</script>
@endsection
