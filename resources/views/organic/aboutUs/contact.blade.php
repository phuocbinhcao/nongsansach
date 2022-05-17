@extends('layouts.frontend')
@section('content')
<!-- Add your site or application content here -->
<!--breadcrumb area start-->
<div class="breadcrumb_container container">
    <div class="row">
        <div class="col-12">
            <nav>
                <ul>
                    <li>
                        <a href="index.html">Trang chủ ></a>
                    </li>
                    <li>Liên hệ</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--breadcrumb area end-->


<!--contact area css satrt-->
<div class="container">
    <div class="contact_area ptb-90">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="contact_map_wrapper">
                    <div class="contact_map mb-40">
                        <!-- Contact Map Start -->
                        <div id="contact-map"></div>
                        <!-- Contact Map End -->
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="contact_info_wrapper">
                    <div class="contact_title">
                        <h4>Thông tin & địa chỉ</h4>
                    </div>
                    <div class="contact_info mb-15">
                        <div class="contact_info_icone">
                            <a href="#"><i class="icofont icofont-location-pin"></i></a>
                        </div>
                        <div class="contact_info_text">
                            <p><span>Địa chỉ:</span> 123 - Nguyễn Lương Bằng<br> Liên Chiểu, TP. Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="contact_info mb-15">
                        <div class="contact_info_icone">
                            <a href="#"><i class="icofont icofont-email"></i></a>
                        </div>
                        <div class="contact_info_text">
                            <p><span>Email: </span> Support@plazathemes.com </p>
                        </div>
                    </div>
                    <div class="contact_info mb-15">
                        <div class="contact_info_icone">
                            <a href="#"><i class="icofont icofont-phone"></i></a>
                        </div>
                        <div class="contact_info_text">
                            <p><span>SĐT:</span> (84) 123 456 789 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<!--contact area css end-->


<!--Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlZPf84AAVt8_FFN7rwQY5nPgB02SlTKs"></script>
<script src="{{asset('organic/assets/js/map.js')}}"></script>
@endsection
