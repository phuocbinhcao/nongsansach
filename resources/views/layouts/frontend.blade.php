<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('organic/assets/img/favicon.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('organic/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('organic/assets/css/responsive.css')}}">
    <script src="{{asset('organic/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- Css Alert -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <!-- Yield styles -->
    @yield('styles')

</head>

<body>
    <!-- Add your site or application content here -->

    <!--organicfood wrapper start-->
    <div class="organic_food_wrapper">

        <header class="header sticky-header">
            <div class="organic_food_wrapper">
                <!--Header start-->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header_wrapper_inner">
                                <div class="logo col-xs-12">
                                    <a href="{{route('organic.index')}}">
                                        <img src="{{url('organic/assets/img/logo/logo.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="main_menu_inner">
                                    <div class="menu">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="{{route('organic.index')}}">Trang ch??? </a>

                                                </li>
                                                <li><a href="{{route('about.us')}}">Ch??ng t??i </a> </li>
                                                <li><a href="{{route('shop.index')}}">C???a h??ng</a> </li>
                                                </li>
                                                <li class="mega_parent"><a href="#">Danh m???c <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="mega_menu">
                                                        <li class="mega_item">
                                                            <ul>
                                                                <li><a href="{{route('shop.index')}}">S???n ph???m</a></li>
                                                                <li><a href="{{route('show.cart')}}">Gi??? h??ng</a></li>
                                                                <li><a href="{{route('checkout.cart')}}">Thanh to??n</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            @if(Auth::user() == null)
                                                            <ul>
                                                                <li><a href="{{route('login')}}">????ng nh???p</a></li>
                                                                <li><a href="{{route('register')}}">????ng k??</a></li>
                                                            </ul>
                                                            @else
                                                            <ul>
                                                                <li><a href="{{route('my-account')}}">T??i kho???n c???a
                                                                        t??i</a></li>
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        <li class="mega_item">
                                                            <ul>
                                                                <li><a href="{{route('contact.us')}}">Li??n h??? </a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @if(Auth::user() == null)
                                                <li class="mega_parent"><a class="text-primary"
                                                        href="{{route('login')}}">????ng Nh???p</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>
                                           <ul>
                                                <li class="active"><a href="{{route('organic.index')}}">Trang ch??? </a>
                                                </li>
                                                <li><a href="{{route('about.us')}}">Ch??ng t??i </a> </li>
                                                <li><a href="{{route('shop.index')}}">C???a h??ng</a> </li>
                                                </li>
                                                <li class="mega_parent"><a href="#">Danh m???c <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="mega_menu">
                                                        <li class="mega_item">
                                                            <ul>
                                                                <li><a href="{{route('shop.index')}}">S???n ph???m</a></li>
                                                                <li><a href="{{route('show.cart')}}">Gi??? h??ng</a></li>
                                                                <li><a href="{{route('checkout.cart')}}">Thanh to??n</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega_item">
                                                            @if(Auth::user() == null)
                                                            <ul>
                                                                <li><a href="{{route('login')}}">????ng nh???p</a></li>
                                                                <li><a href="{{route('register')}}">????ng k??</a></li>
                                                            </ul>
                                                            @else
                                                            <ul>
                                                                <li><a href="{{route('my-account')}}">T??i kho???n c???a
                                                                        t??i</a></li>
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        <li class="mega_item">
                                                            <ul>
                                                                <li><a href="{{route('contact.us')}}">Li??n h??? </a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @if(Auth::user() == null)
                                                <li class="mega_parent"><a class="text-primary"
                                                        href="{{route('login')}}">????ng Nh???p</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="header_right_info d-flex">
                                    <div class="search_box">
                                        <div class="search_inner">
                                            <form action="{{route('search.index')}}">
                                                <input type="text" name="search" placeholder="T??m s???n ph???m">
                                                <button type="submit"><i class="ion-ios-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mini__cart">
                                        <div class="mini_cart_inner">
                                            <div id="cart-icon">

                                                <div class="cart_icon ">
                                                    <a href="#">
                                                        @php $totlalQty = 0 @endphp
                                                        @if(session()->get('cart') != null)
                                                        @foreach ( session('cart') as $id => $cart )
                                                        @php
                                                        $totlalQty +=$cart['quantity'];
                                                        @endphp
                                                        @endforeach
                                                        @endif
                                                        <span class="cart_icon_inner">
                                                            <i class="ion-android-cart"></i>
                                                            <span class="cart_count">{{$totlalQty}}</span>
                                                        </span>

                                                    </a>
                                                </div>
                                            </div>
                                            <!--Mini Cart Box-->
                                            <div class="mini_cart_box cart_box_one">
                                                <div id="change-item-cart">
                                                    @if (session('cart'))
                                                    @php $total = 0 @endphp
                                                    @foreach (session('cart') as $id => $cart )
                                                    <div class="mini_cart_item">
                                                        <div class="mini_cart_img">
                                                            <a href="#">
                                                                <img src="{{url('img/products',$cart['image'])}} "
                                                                    width="50px" height="50px">
                                                                <span class="cart_count">{{$cart['quantity']}} </span>
                                                            </a>
                                                        </div>
                                                        <div class="cart_info">
                                                            <h5><a href="product-details.html">{{$cart['name']}} </a>
                                                            </h5>
                                                            <span
                                                                class="cart_price">{{number_format($cart['price'])}}Vnd
                                                            </span>
                                                        </div>
                                                        <div class="cart_remove">
                                                            <a href="#"><i data-id="{{$id}}"
                                                                    class="zmdi zmdi-delete"></i></a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <div class="price_content">
                                                        @php $total = 0 @endphp
                                                        @foreach ((array) session('cart') as $id => $cart )
                                                        @php
                                                        $total += $cart['price'] * $cart['quantity'];
                                                        @endphp
                                                        @endforeach

                                                        <div class="cart-total-price">
                                                            <span class="label">T???ng ti???n </span>
                                                            <span class="value"> {{number_format($total)}}Vnd</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="min_cart_view">
                                                    <a href="{{route('show.cart')}}">Xem gi??? h??ng</a>
                                                </div>

                                                <div class="min_cart_checkout">
                                                    <a href="{{route('checkout.cart')}}">Thanh To??n</a>
                                                </div>
                                            </div>
                                            <!--Mini Cart Box End -->
                                        </div>
                                    </div>
                                    @if(Auth::user() != null)
                                    <div class="header_account">
                                        <div class="account_inner">
                                            <a href="#"><i class="ion-gear-b"></i></a>
                                        </div>
                                        <div class="content-setting-dropdown">
                                            <div class="user_info_top">
                                                <ul>
                                                    <li><a href="{{route('my-account')}}">T??i kho???n c???a t??i</a></li>
                                                    <li><a href="{{route('checkout.cart')}}">Thanh to??n</a></li>
                                                    <li><a href="{{route('logout')}}">????ng xu???t</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <!--Header end-->

        <!--Main start-->


        @yield('content')

        <!--Main end-->


        <!-- footer start -->
        <footer class="footer pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_logo">
                                    <a href="#"><img src="assets/img/logo/logo_footer.png" alt=""></a>
                                </div>
                                <div class="footer_content">
                                    <p>?????a ch???: 123 T??n ?????c Th???ng, H??a Minh, Tp. ???? N???ng </p>
                                    <p>S??T: +(84) 800 456 789</p>
                                    <p>Email: Contact@gmail.com</p>
                                </div>
                                <div class="footer_social">
                                    <h4>Li??n h??? qua:</h4>
                                    <div class="footer_social_icon">
                                        <a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                                        <a href="https://gmail.com"><i class="fa fa-google-plus"></i></a>
                                        <a href="https://youtube.com"><i class="fa fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Footer-->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="footer_menu_list d-flex justify-content-between">
                            <!--Single Footer-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>S???n Ph???m</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>

                                            <li><a href="{{route('shop.index')}}"> S???n ph???m m???i</a></li>
                                            <li><a href="{{route('shop.index')}}"> S???n ph???m b??n ch???y</a></li>
                                            <li><a href="{{route('contact.us')}}"> Li??n h??? ch??ng t??i</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                @if (Auth::user() == null)
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>????ng nh???p</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="{{route('login')}}"> ????ng nh???p</a></li>
                                            <li><a href="{{route('register')}}"> ????ng k??</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!--Single Footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    @if(Auth::user() != null)
                                    <div class="footer_title">
                                        <h2> T??i kho???n c???a b???n </h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="{{route('my-account')}}">Th??ng tin c?? nh??n</a></li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!--Single Footer end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="copyright_text">
                                <p>B???n quy???n 2021.  <a href="#">Organicfood</a><strong> ???? ????ng k?? B???n quy???n </strong>.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="footer_mastercard text-right">
                                <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- footer end -->
    </div>

    <!-- all js here -->
    <script src="{{asset('organic/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/popper.js')}}"></script>
    <script src="{{asset('organic/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('organic/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/ajax-mail.js')}}"></script>
    <script src="{{asset('organic/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('organic/assets/js/plugins.js')}}"></script>
    <script src="{{asset('organic/assets/js/main.js')}}"></script>
    <script src="{{asset('organic/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    @yield('scripts')

    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    @if(session()->get('cartNull'))
    <script>
        swal({
            title: "Ch?? ??",
            text: '{{session()->get('cartNull')}}',
            icon: "warning",
        });
    </script>
    @endif

    @if(session()->get('changepassword'))
    <script>
        swal({
            title: "Th??ng b??o",
            text: '{{session()->get('changepassword')}}',
            icon: "success",
        });
    </script>
    @endif
    <script src="{{asset('organic/assets/js/cart.js')}}"></script>
</body>
</html>
