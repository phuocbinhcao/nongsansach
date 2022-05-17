 @extends('layouts.frontend')
 @section('styles')
 <!-- Css Alert -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
 <!-- Default theme -->
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

 <link rel="stylesheet" href="{{asset('organic/assets/css/panigation.css')}}">
 @endsection
 @section('content')


 <!-- Nav Page start-->

 <div class="container mb-2">
     <div class="breadcrumb_container">
         <div class="row">
             <div class="col-12">
                 <nav>
                     <ul>
                         <li>
                             <a href="{{route('organic.index')}}">Trang chủ ></a>
                         </li>
                         <li>Cửa hàng</li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>
 </div>
 <!--- Nav Page end -->

 <!--- shop_wrapper area  -->
 <div class="container">
     <div class="row">
         <div class="col-lg-3 col-md-8 col-12">
             <div class="shop_sidebar">
                 <div class="block_categories">
                     <div class="category_top_menu widget">
                         <div class="widget_title">
                             <h3>Danh mục </h3>
                         </div>
                         @foreach ($categories as $category)
                         <ul class="shop_toggle">

                             <li class="has-sub"><a href="#">{{ $category->group_name}}
                                 </a>
                                 <ul class="categorie_sub">
                                     @foreach($category->getProductType as $getProductType)
                                     <li>
                                         <a href="{{ route('showCategory.index',
                                            ['product_type_name' => $getProductType->product_type_name,
                                             'id' => $getProductType->id]) }}">
                                             {{ $getProductType->product_type_name}}
                                         </a>
                                     </li>
                                     @endforeach
                                 </ul>

                             </li>
                         </ul>
                         @endforeach
                     </div>
                 </div>
                 <div class="search_filters_wrapper">
                     <div class="price_filter widget">
                         <div class="widget_title">
                             <h3>Lọc theo giá</h3>
                         </div>
                         <div class="search_filters widget">
                             <form action="">
                                 <div id="slider-range"></div>
                                 <input type="text" name="text" readonly id="amount" />
                                 <input type="hidden" name="start_price" id="start_price" />
                                 <input type="hidden" name="end_price" id="end_price" /><br>
                                 <input type="submit" name="filter_price" value="Lọc giá"
                                     class="btn btn-sm btn-default">
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-9 col-md-12 col-12">
             <div class="categories_banner">
                 <div class="categories_banner_inner">
                     <img src="{{url('organic/assets/img/banner/shop.jpg')}}" alt="">
                 </div>
                 <h3>Cửa hàng</h3>
             </div>
             <div class="tav_menu_wrapper">
                 <div class="row align-items-center">
                     <div class="col-lg-6 col-md-7 col-sm-6">
                         <div class="tab_menu shop_menu">
                             <div class="tab_menu_inner">
                                 <ul class="nav" role="tablist">
                                     <li><a class="active" data-toggle="tab" href="#shop_active" role="tab"
                                             aria-controls="shop_active" aria-selected="true"><i class="fa fa-th"
                                                 aria-hidden="true"></i></a></li>
                                 </ul>
                             </div>
                             <div class="tab_menu_right">
                                 <p>Hiển thị {{count($products)}} sản phẩm.</p>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-5 col-sm-6">
                         <div class="Relevance">
                             <span>Phân loại:</span>
                             <div class="dropdown dropdown-shop">
                                 <form>
                                     @csrf
                                     <select name="sort" id="sort">
                                         <option value="{{Request::url()}}?sort_by=none">--Săp xếp theo--
                                         </option>
                                         <option value="{{Request::url()}}?sort_by=price_ASC">Giá tăng dần
                                         </option>
                                         <option value="{{Request::url()}}?sort_by=price_DESC">Giá giảm dần
                                         </option>
                                         <option value="{{Request::url()}}?sort_by=kytu_ASC">Lọc theo tên A đến Z
                                         </option>
                                         <option value="{{Request::url()}}?sort_by=kytu_DESC">Lọc theo tên Z đến A
                                         </option>
                                     </select>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="tab_product_wrapper">
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="shop_active">
                         <div class="row product-content">
                             @foreach ($products as $pro )
                             <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 product">
                                 <div class="single__product">
                                     <div class="single_product__inner">
                                         <span class="new_badge">Mới</span>
                                         <span class="discount_price">-5%</span>
                                         <div class="product_img image">
                                             <a href="{{route('details.product',$pro->id)}}">
                                                 <img src="{{url('img/products',$pro->product_image1)}} " height="100px"
                                                     alt="">
                                             </a>
                                         </div>
                                         <div class="product__content text-center">
                                             <div class="produc_desc_info">
                                                 <div class="product_title">
                                                     <h4><a
                                                             href="{{route('details.product',$pro->id)}}">{{$pro->product_name}}</a>
                                                     </h4>
                                                 </div>
                                                 <div class="product_price">
                                                     <input type="hidden" min="1" value="1" name="quantity_modal"
                                                         class="cart-plus-minus-box quantity">
                                                     <p>{{number_format($pro->product_price)}} Vnd</p>
                                                 </div>
                                             </div>
                                             <div class="product__hover">
                                                 <ul>
                                                     <li><a data-id="{{$pro->id}}" href="javascript:" class="add__cart"
                                                             role="button"><i class="ion-android-cart"></i></a>
                                                     </li>
                                                     <li><a class="cart-fore" href="#" data-toggle="modal"
                                                             href="javascript:" data-target="#my_modal{{$pro->id}}"
                                                             title="Xem nhanh"><i class="ion-android-open"></i></a>
                                                     </li>
                                                     <li><a href="{{route('details.product',$pro->id)}}"><i
                                                                 class="ion-clipboard"></i></a>
                                                     </li>
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
             <div class="shop_pagination">
                 <div class="row align-items-center">
                     <div class="col-lg-4 col-md-6 col-sm-6">
                         <div class="total_item_shop">
                             <p>Hiển thị {{count($products)}} sản phẩm.</p>

                         </div>
                     </div>
                     <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                         <div class="page_list_clearfix text-center">
                             <div class="pagination">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--- shop_wrapper area end  -->

 <!-- modal area start -->
 @foreach ($products as  $pro )

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
                                             <a href="#"><img src="{{url('/img/products',$pro->product_image1)}}"
                                                     alt=""></a>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="imgetwo" role="tabpanel">
                                         <div class="product_tab_img">
                                             <a href="#"><img src="{{url('/img/products',$pro->product_image2)}}"
                                                     alt=""></a>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="imgethree" role="tabpanel">
                                         <div class="product_tab_img">
                                             <a href="#"><img src="{{url('/img/products',$pro->product_image3)}}"
                                                     alt=""></a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="products_tab_button  modals">
                                     <ul class="nav product_navactive" role="tablist">
                                         <li class="product_button_one">
                                             <a class="nav-link active" data-toggle="tab" href="#imgeone" role="tab"
                                                 aria-controls="imgeone" aria-selected="false"><img
                                                     src="{{url('/img/products',$pro->product_image1)}}" alt=""></a>

                                         </li>
                                         <li class="product_button_one">
                                             <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab"
                                                 aria-controls="imgetwo" aria-selected="false"><img
                                                     src="{{url('/img/products',$pro->product_image2)}}" alt=""></a>
                                         </li>
                                         <li class="product_button_one">
                                             <a class="nav-link button_three" data-toggle="tab" href="#imgethree"
                                                 role="tab" aria-controls="imgethree" aria-selected="false"><img
                                                     src="{{url('/img/products',$pro->product_image3)}}" alt=""></a>
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
                                         <span class="regular_price">{{number_format($pro->product_price)}} Vnđ</span>
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
                                                         <input type="number" min="1" value="1" name="quantity_modal"
                                                             class="cart-plus-minus-box quantity">
                                                     </div>
                                                     <div class="add_button add_modal">
                                                         <button type="button" class="btn_add_cart"
                                                             data-id="{{$pro->id}}"> Thêm giỏ hàng</button>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="cart_description">
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
 <script src="{{asset('organic/assets/js/panigation.js')}}"></script>
 <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
 <script>
     // Alert successfully ordered
     @if(session()-> get('orders'))
     swal({
         title: "Thành công",
         text: '{{session()->get('orders')}}',
         icon: "success",
     });
     // Alert successfully registered
     @elseif(session()-> get('success'))
     swal({
         title: "Thành công",
         text: '{{session()->get('orders')}}',
         icon: "success",
     });
     @endif
 </script>
 @endsection
