@extends('layouts.frontend')
@section('content')
<!--breadcrumb area start-->
<div class="container">
    <div class="breadcrumb_container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul>
                        <li><a href="{{route('organic.index')}}">Trang chủ</a> ></li>
                        <li>Đăng nhập</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--breadcrumb area end-->



<!--login section start-->
<div class="container">
    <div class="page_login_section">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="login_page_form">
                    @foreach($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    <form method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="email">Email <span>*</span></label>
                                    <input id="email" name="email" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    <label for="password">Mật khẩu <span>*</span></label>
                                    <input id="password" name="password" type="password">
                                </div>
                            </div>
                            @csrf
                            <div class="col-12">
                                <div class="login_submit">
                                    <label class="inline" for="remember_me">
                                        <input id="remember_me" name="remember_me" type="checkbox">
                                        Remember me
                                    </label>
                                </div>
                                <button class="btn btn-primary" name="Login" type="submit">Đăng nhập</button>
                                <br />
                                <p class=" mt-3"><a class="text-primary" href="{{ route('register') }}">Nhấp vào đây
                                    </a> để đăng ký</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--login section end-->
@endsection
