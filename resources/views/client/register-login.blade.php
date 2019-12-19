@extends('layouts/client/layoutChuaDangNhap')
@section('header')
<link rel="stylesheet" href="{{URL::asset('client/css/vendor/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/style.css')}}">
	<!-- favicon -->
    <link rel="icon" href="{{URL::asset('client/favicon.ico')}}">
    <link rel="stylesheet" href="{{URL::asset('all/css/bootstrap.min.css')}}">
@stop

@section('body')
<!-- SECTION-NAV -->
<div id="section-nav-wrap">
    <section id="section-nav">
        <p>Trang chủ / <a href="{{route('ClientLogin')}}">Đăng ký và đăng nhập</a></p>
    </section>
</div>
<!-- /SECTION-NAV -->

<!-- REGISTER-LOGIN -->
<div id="register-login-wrap">
    <section id="register-login">
        @if ($errors->any())
                    <div id="thongbaodangnhap" class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{$err}} </li>
                        @endforeach
                    </div>
                @endif
                @if(session('Thông báo'))
                    <div class="alert alert-success">
                        {{session('Thông báo')}}
                    </div>
                @endif
                @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{Session::get('success') }}</li>
        </ul>
    </div>
@endif
        <div class="featured-form">
            <h3>Đăng ký tài khoản mới</h3>
            <form id="form-register" action="{{route('Client.Register')}}" method="POST" class="westeros-form">
                @csrf
                <label class="rl-label">Họ và tên</label>
                <input name="hoten" type="text" placeholder="Nhập tên đầy đủ của bạn...">
                <label class="rl-label required">Email</label>
                <input name="email" type="text" placeholder="Nhập email...">
                <label class="rl-label required">Mật khẩu</label>
                <input name="matkhau" type="password" placeholder="Nhập mật khẩu...">
                <label class="rl-label required">CMND</label>
                <input name="cmnd" type="text" placeholder="Nhập cmnd...">
                <label class="rl-label required">Điện thoại</label>
                <input name="dienthoai" type="text" placeholder="Nhập số điện thoại...">
                <label class="rl-label required">Địa chỉ</label>
                <input name="diachi" type="text" placeholder="Nhập địa chỉ...">
                <label class="rl-label required">Ngày sinh</label>
                <input name="ngaysinh" type="date" placeholder="Nhập ngày sinh...">
                <div class="gender">
                    <label class="rl-label">Giới tính</label>
                    <input type="radio" id="male" name="gender" value="Nam" checked>
                    <label for="male"><span class="radio"><span></span></span>Nam</label>
                    <input type="radio" id="female" name="gender" value="Nữ">
                    <label for="female"><span class="radio"><span></span></span>Nữ</label>
                </div>

                <button class="button register">Tạo tài khoản</button>
            </form>
        </div>

        <div class="featured-form">
            <h3>Đăng nhập vào tài khoản</h3>
            <form id="form-login" action="{{route('Client.login')}}" method="POST" class="westeros-form">
                @csrf
                <label class="rl-label">Email</label>
                <input name="email" type="email" placeholder="abc@gmail.com">
                <label class="rl-label">Mật khẩu</label>
                <input name="matkhau" type="password" placeholder="Nhập mật khẩu...">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember"><span class="checkbox"><span></span></span>Ghi nhớ tên đăng nhập và mật khẩu</label>
                <a href="#" class="fp-msg">Quên mật khẩu</a>
                <button class="button login">Đăng nhập</button>
            </form>
        </div>
    </section>
</div>
<!-- /REGISTER-LOGIN -->

<!-- ADVERTISING -->
<div id="advertising-wrap">
    <section id="advertising" class="short">
        <div class="ad-box clearfix">
            <a href="#">
                <img src="images/banners/banner1.png" alt="banner1">
            </a>
            <a href="#">
                <img src="images/banners/banner2.png" alt="banner2">
            </a>
        </div>
    </section>
</div>
<!-- /ADVERTISING -->

<!-- BRANDS -->
<div id="brands-wrap">
    <section id="brands">
        <h3 class="title">Thương hiệu</h3>
        <div class="slidable">
            <!-- SLIDE CONTROLS -->
            <ul class="slide-controls">
                <!-- LEFT CONTROL -->
                <li>
                    <a href="#" class="button prev">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </a>
                </li>
                <!-- /LEFT CONTROL -->

                <!-- RIGHT CONTROL -->
                <li>
                    <a href="#" class="button next">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </a>
                </li>
                <!-- /RIGHT CONTROL -->
            </ul>
            <!-- /SLIDE CONTROLS -->

            <!-- BRANDS LIST -->
            <ul id="owl-brands" class="brands-list owl-carousel">
                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/gr.png" alt="brand-normal">
                        <img src="images/brands/gr-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/tf.png" alt="brand-normal">
                        <img src="images/brands/tf-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/aj.png" alt="brand-normal">
                        <img src="images/brands/aj-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/vh.png" alt="brand-normal">
                        <img src="images/brands/vh-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/pd.png" alt="brand-normal">
                        <img src="images/brands/pd-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/gr.png" alt="brand-normal">
                        <img src="images/brands/gr-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->

                <!-- BRAND -->
                <li>
                    <a href="#">
                        <img src="images/brands/tf.png" alt="brand-normal">
                        <img src="images/brands/tf-over.png" alt="brand-over">
                    </a>
                </li>
                <!-- /BRAND -->
            </ul>
            <!-- /BRANDS LIST -->
        </div>
    </section>
</div>
<!-- /BRANDS -->

@stop

@section('footer')
{{-- <!-- jQuery -->
<script src="{{URL::asset('client/js/vendor/jquery-1.11.1.min.js')}}"></script> --}}
<!-- Owl Carrousel -->
<script src="{{URL::asset('client/js/vendor/owl.carousel.min.js')}}"></script>
<!-- imgLiquid -->
<script src="{{URL::asset('client/js/vendor/imgLiquid-min.js')}}"></script>
<!-- Header -->
<script src="{{URL::asset('client/js/header.js')}}"></script>
<!-- Menu -->
<script src="{{URL::asset('client/js/menu.js')}}"></script>
<!-- Register-Login -->
<script src="{{URL::asset('client/js/register-login.js')}}"></script>
<script src="{{URL::asset('client/js/register-login-add.js')}}"></script>
@stop
