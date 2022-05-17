@extends('layouts.frontend')
@section('content')
<!-- Add your site or application content here -->



<div class="breadcrumb_container container">
    <div class="row">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="{{route('organic.index')}}">Trang chủ ></a>
                    </li>
                    <li>Chúng tôi</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--breadcrumb area end-->


<!--about section area start-->
<div class="container">
    <div class="about_section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 text-center">
                <div class="about_section_one">
                    <h2>Chào mừng đến với của hàng chúng tôi.</h2>
                    <p>Thương hiệu Organic Food của chúng tôi là một trong những thương hiệu xuất khẩu nông sản lớn nhất
                        Việt Nam.
                        Mặt hàng xuất khẩu chủ lực của chúng tôi chính là mặt hàng hoa quả.
                        Công ty cũng đóng góp nhiều cho việc phát triển nông nghiệp vùng Tây Nguyên.


                        Chúng tôi với sứ mệnh là áp dụng công nghệ cao trong nông nghiệp,
                        khai thác tiềm năng đất đai nhằm tạo ra các hàng hóa nông nghiệp hữu ích nhất
                        nhằm để đáp ứng cho ngành công nghiệp chế biến trong và ngoài nước.
                        Thực hiện chế độ đãi ngộ thỏa đáng về vật chất và tinh thần nhằm khuyến khích cán bộ công nhân
                        viên
                        tạo ra nhiều giá trị mới cho khách hàng cổ đông và toàn xã hội.</p>
                </div>
                <div class="about__store__btn">
                    <a href="{{route('contact.us')}}">Liên hệ chúng tôi</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--about section area end-->


<!-- about area start-->
<div class="about_chooseUs_area">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="video__wrape__area" style="background-image:url(assets/img/banner/about1.jpg)">
                    <div class="video__inner">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/i493IC18WvY"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="about_choose_content">
                    <h3>Chọn chúng tôi, vì sao?</h3>
                    <div class="choose_content_inner">
                        <div class="single_choose_us">
                            <div class="choose_us mb-50">
                                <div class="choose_icone">
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                </div>
                                <div class="choose_details">
                                    <h4>Quà Tặng</h4>
                                    <p>Nhiều chính sách quà tặng hấp dẫn.</p>
                                </div>
                            </div>
                            <div class="choose_us">
                                <div class="choose_icone">
                                    <i class="zmdi zmdi-truck"></i>
                                </div>
                                <div class="choose_details">
                                    <h4>Miễn phí vận chuyện</h4>
                                    <p>Không tính phí vận chuyển trong bán kính 10km.</p>
                                </div>
                            </div>
                        </div>
                        <div class="single_choose_us">
                            <div class="choose_us  mb-50">
                                <div class="choose_icone">
                                    <i class="zmdi zmdi-refresh-alt"></i>
                                </div>
                                <div class="choose_details">
                                    <h4>Đổi trả</h4>
                                    <p>Đổi trả sản phẩm hư hỏng, lỗi.</p>
                                </div>
                            </div>
                            <div class="choose_us">
                                <div class="choose_icone"><i class="zmdi zmdi-time"></i> </div>
                                <div class="choose_details">
                                    <h4>Hỗ trợ 24/7</h4>
                                    <p>Nhiệt tính đáp ứng yêu cầu quý khách hàng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- about area end -->


<!--about team area start-->
<div class="about_team_area ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="about_section_title">
                    <h2>Nguồn lực</h2>
                    <p>Các chuyên gia đầu ngành trong sản xuất và cung cấp sản phẩm nông nghiệp</p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single_team">
                    <div class="team__imge">
                        <a href="#"><img src="{{url('organic/assets/img/banner/team1.jpg')}}" alt=""></a>
                    </div>
                    <div class="team_hover_inpo">
                        <div class="team_hover_action">
                            <strong class="text-white">Tiến sĩ nông nghiệp:</strong>
                            <h2><a href="#"> Ngô Khánh Vân</a></h2>
                            <ul>
                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single_team">
                    <div class="team__imge">
                        <a href="#"><img src="assets/img/banner/team2.jpg" alt=""></a>
                    </div>
                    <div class="team_hover_inpo">
                        <div class="team_hover_action">
                            <strong class="text-white">Chuyên gia thực phẩm: </strong>

                            <h2><a href="#"> John Huynh</a></h2>
                            <ul>
                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="single_team team__three">
                    <div class="team__imge">
                        <a href="#"><img src="assets/img/banner/team4.jpg" alt=""></a>
                    </div>
                    <div class="team_hover_inpo">
                        <div class="team_hover_action">
                            <strong class=" text-white">Chuyên viên dinh dưỡng:</strong>
                            <h2><a href="#">Phương Huỳnh Thiên An </a></h2>
                            <ul>
                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--about team area end-->


<!--testimonial area start-->
<div class="container">
    <div class="about_testimonial_area mb-65" style="background-image:url(assets/img/banner/testimonial4.jpg)">
        <div class="about_testimonial_inner">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-12 col-md-12">
                    <div class="testimonial___wrapper owl-carousel">
                        @foreach ($comments as $coms )
                        <div class="single___testimonial text-center">
                            <div class="testimonial__image ">
                                <img src="{{asset('img/users/client.jpg')}}" alt="">
                            </div>
                            <div class="testimonial__details">
                                <p>{{$coms->comment_content}}</p>
                            </div>
                            <div class="testimonial__info">
                                <a href="#">{{$coms->comment_username}}</a>
                                <span>-</span>
                                <span>{{$coms->comment_email}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--testimonial area end-->
@endsection
