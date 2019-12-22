@extends('layouts/client/layout')

@section('header')
<link rel="stylesheet" href="{{URL::asset('client/css/style.css')}}">
	<!-- favicon -->
	<link rel="icon" href="{{URL::asset('client/favicon.ico')}}">
@stop

@section('body')
	<!-- /MAIN MENU -->

	<!-- SECTION-NAV -->
	<div id="section-nav-wrap">
		<section id="section-nav">
			<p>Home / <a href="#">Chi tiết đơn hàng</a></p>
		</section>
	</div>
	<!-- /SECTION-NAV -->
    @if (Session::has('success'))
    <div class="alert">
        <ul>
            <li>{{Session::get('success') }}</li>
        </ul>
    </div>
@endif

	<!-- SHOP -->
	<div id="shop-wrap">
		<section id="shop" class="right">
			<!-- SIDEBAR CONTROL -->
			<div class="sidebar-control"></div>
			<!-- /SIDEBAR CONTROL -->

			<!-- SHOP SIDEBAR -->
			<aside class="shop-sidebar checkout-cart">
				<!-- SIDEBAR CONTROL -->
				<svg class="svg-plus sidebar-control">
					<use xlink:href="#svg-plus"></use>
				</svg>
				<!-- /SIDEBAR CONTROL -->

				<h3 class="title">Checkout Progress</h3>
				<div class="checkout-progress">
					<h5>
						Billing Adress
						<!-- SVG CHECK -->
						<svg class="svg-check">
							<use xlink:href="#svg-check"></use>
						</svg>
						<!-- /SVG CHECK -->
					</h5>
					<h5>
						Shipping Adress
						<!-- SVG CHECK -->
						<svg class="svg-plus">
							<use xlink:href="#svg-plus"></use>
						</svg>
						<!-- /SVG CHECK -->
					</h5>
					<h5>
						Shipping Method
						<!-- SVG CHECK -->
						<svg class="svg-check">
							<use xlink:href="#svg-check"></use>
						</svg>
						<!-- /SVG CHECK -->
					</h5>
					<h5>Payment Method</h5>
				</div>

				<h3 class="title">Cart Total</h3>
				<!-- CART TOTAL -->
				<div class="cart-total">
					<!-- SUBTOTAL -->
					<div class="subtotal">
						<h5>Cart Subtotal</h5>
						<h5>$361.00</h5>
					</div>
					<!-- /SUBTOTAL -->

					<!-- SUBTOTAL -->
					<div class="subtotal">
						<h5>Shipping</h5>
						<h5>$25.50</h5>
					</div>
					<!-- /SUBTOTAL -->

					<!-- SUBTOTAL -->
					<div class="subtotal">
						<h5>Coupon Code</h5>
						<h5>-$5.00</h5>
					</div>
					<!-- /SUBTOTAL -->

					<!-- TOTAL -->
					<div class="total">
						<h5>Total Order</h5>
						<h5>$381.50</h5>
					</div>
					<!-- /TOTAL -->
				</div>
				<!-- /CART TOTAL -->
			</aside>
			<!-- /SHOP SIDEBAR -->

			<!-- SHOP PRODUCTS -->
			<div class="shop-products">
				<h3 class="title">Chi tiết đơn hàng</h3>
				<!-- PROFILE INFO -->
				<div class="profile-info">

					<!-- PROFILE HEADER -->

					<!-- /PROFILE DATA -->

					<!-- PROFILE HEADER -->
					<h5 class="profile-header">
						<span>01</span>Thông tin giao hàng
						<!-- SVG PLUS -->
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
						<!-- /SVG PLUS -->
					</h5>
					<!-- /PROFILE HEADER -->

					<!-- PROFILE DATA -->
					<div class="profile-data">
						<div class="featured-form">
							<form class="westeros-form" id="checkout-form">
								<div>
									<label class="rl-label required">Họ và tên</label>
									<input readonly type="text" placeholder="" value="{{$thongTinKhachHang[0]->ho_ten}}">
								</div>
								<div>
									<label class="rl-label required">Địa chỉ email</label>
									<input readonly type="text" placeholder="" value="{{$thongTinKhachHang[0]->email}}">
								</div>
								<div>
									<label class="rl-label required">Số điện thoại</label>
									<input readonly type="text" placeholder="" value="{{$thongTinKhachHang[0]->dien_thoai}}">
								</div>
								<div>
									<label class="rl-label required">Địa chỉ</label>
									<input readonly type="text" placeholder="" value="{{$thongTinKhachHang[0]->dia_chi}}">
                                </div>
                                <div class="full-input">
									<label class="rl-label">Địa chỉ giao hàng</label>
									<textarea placeholder="Điền đầy đủ số nhà, quận "></textarea>
								</div>
								<div class="full-input">
									<label class="rl-label">Yêu cầu đặc biệt</label>
									<textarea placeholder="Viết yêu cầu đặc biệt"></textarea>
								</div>
								<div class="full-input"></div>
							</form>
						</div>
					</div>
					<!-- /PROFILE DATA -->

					<!-- PROFILE HEADER -->
					<h5 class="profile-header">
						<span>02</span>Chi phí vận chuyển
						<!-- SVG PLUS -->
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
						<!-- /SVG PLUS -->
					</h5>
					<!-- /PROFILE HEADER -->

					<!-- PROFILE DATA -->
					<div class="profile-data">
						<div class="featured-form">
							<form class="westeros-form">
								<div class="full-input">
									<input checked type="radio" id="free-shipping" name="shipping_method" value="free-shipping">
									<label class="rl-label" for="free-shipping"><span class="radio"><span></span></span>Free ship</label>
									<p>Miễn phí vận chuyển trong nội thành</p>
								</div>

							</form>
						</div>
					</div>
					<!-- /PROFILE DATA -->

					<!-- PROFILE HEADER -->
					<h5 class="profile-header">
						<span>03</span>Hình thức thanh toán
						<!-- SVG PLUS -->
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
						<!-- /SVG PLUS -->
					</h5>
					<!-- /PROFILE HEADER -->

					<!-- PROFILE DATA -->
					<div class="profile-data">
						<div class="featured-form">
							<form class="westeros-form">
								<div class="full-input">
									<input checked type="radio" id="bank" name="payment_method" value="bank">
									<label class="rl-label" for="bank"><span class="radio"><span></span></span>Ship code</label>
									<p>Nhận hàng trực tiếp tại nhà.</p>
								</div>
\
							</form>
						</div>
					</div>
					<!-- /PROFILE DATA -->

					<!-- PROFILE HEADER -->
					<h5 class="profile-header">
						<span>04</span>Chi tiết đơn hàng
						<!-- SVG PLUS -->
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
						<!-- /SVG PLUS -->
					</h5>
					<!-- /PROFILE HEADER -->

					<!-- PROFILE DATA -->
					<div class="profile-data full">
						<!-- SHOPPING CART -->
						<div class="shopping-cart order">
							<!-- ROW -->
							<div class="row header">
								<!-- CELL -->
								<div class="cell">
									<h5>Tên sản phẩm</h5>
								</div>
                                <!-- /CELL -->
                                <div class="cell">
									<h5>Giá sản phẩm</h5>
								</div>

								<!-- CELL -->
								<div class="cell">
									<h5>Số lượng</h5>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<h5>Số tiền giảm</h5>
								</div>
                                <!-- /CELL -->
                                								<!-- CELL -->
								<div class="cell">
									<h5>Tổng cộng</h5>
								</div>
								<!-- /CELL -->
							</div>
							<!-- /ROW -->
@for($i=0;$i<count($listGioHang);$i++)
							<!-- ROW -->
							<div class="row">
								<!-- CELL -->
								<div class="cell cart-item">
									<p class="highlighted">{{$listGioHang[$i]->ten_loai}}</p>
									<h3>{{$listGioHang[$i]->ten_san_pham}}</h3>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($listGioHang[$i]->gia_ban)}}</p>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{$listGioHang[$i]->so_luong}}</p>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($listGioHang[$i]->so_tien_giam)}}</p>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($listGioHang[$i]->thanh_tien)}}</p>
								</div>
								<!-- /CELL -->
                            </div>
                            @endfor
							<!-- /ROW -->
						</div>
						<!-- /SHOPPING-CART -->

						<!-- SHOPPING-CART -->
						<div class="shopping-cart order summary">
							<!-- ROW -->
							<div class="row">
								<!-- CELL -->
								<div class="cell cart-summary">
									<h3>Tạm tính:</h3>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($tienKhachHangCanThanhToan[0]->tong_tien_hang)}}</p>
								</div>
								<!-- /CELL -->
							</div>
							<!-- /ROW -->

							<!-- ROW -->
							<div class="row">
								<!-- CELL -->
								<div class="cell cart-summary">
									<h3>Phí giao hàng:</h3>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">0</p>
								</div>
								<!-- /CELL -->
							</div>
							<!-- /ROW -->

							<!-- ROW -->
							<div class="row">
								<!-- CELL -->
								<div class="cell cart-summary">
									<h3>Tổng tiền giảm</h3>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($tienKhachHangCanThanhToan[0]->so_tien_giam)}}</p>
								</div>
								<!-- /CELL -->
							</div>
							<!-- /ROW -->

							<!-- ROW -->
							<div class="row">
								<!-- CELL -->
								<div class="cell cart-summary">
									<h3>Khách cần trả:</h3>
								</div>
								<!-- /CELL -->

								<!-- CELL -->
								<div class="cell">
									<p class="highlighted">{{number_format($tienKhachHangCanThanhToan[0]->khach_can_tra)}}</p>
								</div>
								<!-- /CELL -->
							</div>
							<!-- /ROW -->
						</div>
						<!-- /SHOPPING-CART -->
					</div>
					<!-- /PROFILE DATA -->
				</div>
				<!-- /PROFILE INFO -->
				<a href="{{route('Client.xuLyThanhtoanGiohang',session()->get('ma_nhan_vien'))}}"><button class="button checkout-button">Đặt hàng ngay</button></a>

            </div>
			<!-- /SHOP PRODUCTS -->
			<div class="clearfix"></div>
		</section>
	</div>
	<!-- /SHOP -->
@stop
	<!-- FOOTER -->
    @section('footer')
    <script src="{{URL::asset('client/js/vendor/jquery-1.11.1.min.js')}}"></script>
<!-- XM Accordion -->
<script src="{{URL::asset('client/js/vendor/jquery.xmaccordion.min.js')}}"></script>
<!-- Owl Carrousel -->
<script src="{{URL::asset('client/js/vendor/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{URL::asset('client/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<!-- imgLiquid -->
<script src="{{URL::asset('client/js/vendor/imgLiquid-min.js')}}"></script>
<!-- Header -->
<script src="{{URL::asset('client/js/header.js')}}"></script>
<!-- Menu -->
<script src="{{URL::asset('client/js/menu.js')}}"></script>
    <!-- Checkout -->
    <script src="{{URL::asset('client/js/profile.js')}}"></script>
    @stop
