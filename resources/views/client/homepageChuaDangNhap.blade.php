@extends('layouts/client/layoutChuaDangNhap')

@section('header')
<link rel="stylesheet" href="{{URL::asset('client/css/vendor/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/vendor/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/custom.css')}}">



@stop

@section('body')
<!-- BANNER -->
<div id="banner-wrap">
		<section id="banner">
			<div class="main-promo">
				<h2>Chào mừng đến với<br><span>TheCosmo</span></h2>
				<p>Mua sắm thỏa ga không lo về giá</p>
				<a href="women-shop.html" class="button secondary">Xem gian hàng</a>
			</div>
			<div id="banner-monster">
				<!-- <div class="speech-bubble">
					<h4>Hi!</h4>
				</div> -->
				<!-- <div class="moustache-shadow"></div> -->
				<div class="moustache-monster">
					<img src="{{URL::asset('client/images/moustache-monster.png')}}" alt="monster">
				</div>
				<div id="stars">
					<div class="star small"></div>
					<div class="star medium"></div>
					<div class="star large"></div>
				</div>
			</div>
		</section>
	</div>
	<!-- <div class="container">
		<div class="row">
			<div class="col-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<img class="d-block w-100" src="./images/SlideShow/1.jpg" alt="First slide">
					  </div>
					  <div class="carousel-item">
						<img class="d-block w-100" src="./images/SlideShow/5.jpg" alt="Second slide">
					  </div>
					  <div class="carousel-item">
						<img class="d-block w-100" src="./images/SlideShow/3.jpg" alt="Third slide">
					  </div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="sr-only">Next</span>
					</a>
				  </div>
			</div>
		</div>
	</div> -->
	<section class="product-showcase">
			<style>
					* {box-sizing: border-box;}
					body {font-family: Verdana, sans-serif;}
					.mySlides {display: none;}
					img {vertical-align: middle;}

					/* Slideshow container */
					.slideshow-container {
					  max-width: 1000px;
					  position: relative;
					  margin: auto;
					}

					/* Caption text */
					.text {
					  color: #f2f2f2;
					  font-size: 15px;
					  padding: 8px 12px;
					  position: absolute;
					  bottom: 8px;
					  width: 100%;
					  text-align: center;
					}

					/* Number text (1/3 etc) */
					.numbertext {
					  color: #f2f2f2;
					  font-size: 12px;
					  padding: 8px 12px;
					  position: absolute;
					  top: 0;
					}

					/* The dots/bullets/indicators */
					.dot {
					  height: 15px;
					  width: 15px;
					  margin: 0 2px;
					  background-color: #bbb;
					  border-radius: 50%;
					  display: inline-block;
					  transition: background-color 0.6s ease;
					}

					.active {
					  background-color: #717171;
					}

					/* Fading animation */
					.fade {
					  -webkit-animation-name: fade;
					  -webkit-animation-duration: 1.5s;
					  animation-name: fade;
					  animation-duration: 1.5s;
					}

					@-webkit-keyframes fade {
					  from {opacity: .4}
					  to {opacity: 1}
					}

					@keyframes fade {
					  from {opacity: .4}
					  to {opacity: 1}
					}

					/* On smaller screens, decrease text size */
					@media only screen and (max-width: 300px) {
					  .text {font-size: 11px}
					}
					</style>
					</br>
					<h3 class="title">Các chương trình khuyến mãi</h3>
				</br>
					<div class="slideshow-container">
					<div class="mySlides fade">
					  <div class="numbertext">1 / 5</div>
					  <img src="{{URL::asset('client/images/SlideShow/1.jpg')}}" style="width:100%">
					  <!-- <div class="text">Caption Text</div> -->
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 5</div>
					  <img src="{{URL::asset('client/images/SlideShow/2.png')}}" style="width:100%">
					  <!-- <div class="text">Caption Two</div> -->
					</div>

					<div class="mySlides fade">
						<div class="numbertext">3 / 5</div>
						<img src="./images/SlideShow/3.png" style="width:100%">
						<!-- <div class="text">Caption Two</div> -->
					  </div>

					  <div class="mySlides fade">
						<div class="numbertext">4 / 5</div>
						<img src="./images/SlideShow/4.png" style="width:100%">
						<!-- <div class="text">Caption Two</div> -->
					  </div>

					<div class="mySlides fade">
					  <div class="numbertext">5 / 5</div>
					  <img src="./images/SlideShow/5.jpg" style="width:100%">
					  <!-- <div class="text">Caption Three</div> -->
					</div>

					</div>
					<br>

					<div style="text-align:center">
					  <span class="dot"></span>
					  <span class="dot"></span>
					  <span class="dot"></span>
					  <span class="dot"></span>
					  <span class="dot"></span>
					</div>

					<script>
					var slideIndex = 0;
					showSlides();

					function showSlides() {
					  var i;
					  var slides = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("dot");
					  for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";
					  }
					  slideIndex++;
					  if (slideIndex > slides.length) {slideIndex = 1}
					  for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";
					  dots[slideIndex-1].className += " active";
					  setTimeout(showSlides, 3000); // Change image every 2 seconds
					}
					</script>
	</section>


	<!-- /BANNER -->

	<!-- ADVERTISING -->
	<div id="advertising-wrap">
		<section id="advertising">
			<div class="ad-box clearfix">
				<a href="#">
					<img src="images/banners/banner1.png" alt="banner1">
				</a>
				<a href="#">
					<img src="images/banners/banner2.png" alt="banner2">
				</a>
			</div>
			<a href="#">
				<img src="images/banners/banner3.png" alt="banner3">
			</a>
		</section>
	</div>
	<!-- /ADVERTISING -->

	<!-- PRODUCT SHOWCASE -->
	<div class="product-showcase-wrap">
		<section class="product-showcase">
			<h3 class="title">Sản phẩm bán chạy</h3>
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

			<!-- COMPARE MODAL -->
			{{-- <div id="compare-modal" class="compare-modal mfp-with-anim mfp-hide">
				<img src="images/icons/compare-modal-logo.png" alt="logo">
				<h5>The item <span>product name</span></h5>
				<h6>Has been sucessfully added to compare</h6>
				<div class="options">
					<a class="button medium mfp-close">Return to store</a>
					<a href="compare.html" class="button medium compare">Go to compare</a>
				</div>
			</div> --}}
			<!-- /COMPARE MODAL -->

			<!-- PRODUCT LIST -->
			<ul id="owl-f-products" class="product-list grid owl-carousel">

            {{-- List các sản phẩm --}}






                @for($i=0;$i<count($listSanPhamBanChay);$i++)

				<!-- PRODUCT -->
            <li id="{{$listSanPhamBanChay[$i]->ma_san_pham}}" class="list-item">

                <!-- PIN -->
					<div class="pin circle" id="giamgia">
                            <h6>Sale!</h6>
                            <h6 class="percent important">20%</h6>
                            <h6>off</h6>
                        </div>
                        <!-- /PIN -->


					<!-- ACTIONS -->
					<div class="actions">
						<figure class="liquid">
                            {{-- Đây là hình ảnh hiển thị đầu tiên --}}
                        <img src="{{URL::asset($listSanPhamBanChay[$i]->hinh_anh1)}}" alt="product1">
						</figure>
						<div>
							<a href="#qv-p1" class="button quick-view" data-effect="mfp-3d-unfold">
								<!-- SVG QUICKVIEW -->
								<svg class="svg-quickview">
									<use xlink:href="#svg-quickview"></use>
								</svg>
								<!-- /SVG QUICKVIEW -->
                            </a>
























							<!-- QUICK VIEW POPUP -->
							<div id="qv-p1" class="product-quick-view mfp-with-anim mfp-hide">
								<!-- PRODUCT PICTURES -->
								<div class="product-pictures">
									<div class="product-photo">
										<figure  class="liquid" id="hinhanh1_figure">
                                            {{-- Đây là hình ảnh hiển thị đầu tiên --}}
											<img id="hinhanh1_popup" src="#" alt="product-image">
										</figure>
									</div>
									<ul class="picture-views">
                                        {{-- Hình ảnh hiển thị thêm --}}
										<!-- VIEW -->
										<li class="selected">
											<figure class="liquid" id="hinhanh1_popup1">
												{{-- <img src="{{URL::asset($listSanPhamBanChay[$i]->hinh_anh1)}}" alt="picture-view"> --}}
											</figure>
										</li>
										<!-- /VIEW -->

										<!-- VIEW -->
										<li>
											<figure class="liquid" id="hinhanh2_popup">
												{{-- <img src="{{URL::asset($listSanPhamBanChay[$i]->hinh_anh2)}}" alt="picture-view"> --}}
											</figure>
										</li>
										<!-- /VIEW -->
									</ul>
								</div>
								<!-- /PRODUCT PICTURES -->

								<!-- PRODUCT DESCRIPTION -->
								<div class="product-description">
                                <a href="#"><p class="highlighted category" id="tennhomhang_quickview"></p></a>
                                    {{-- Đây là tiêu đề cửa sổ hiển thị lên --}}
                                <a href="#"><h6 id="tensanpham_quickview"></h6></a>
									<!-- RATING -->
									<ul class="rating big">
										<li class="filled">
											<!-- SVG STAR -->
											<svg class="svg-star">
												<use xlink:href="#svg-star"></use>
											</svg>
											<!-- /SVG STAR -->
										</li>
										<li class="filled">
											<!-- SVG STAR -->
											<svg class="svg-star">
												<use xlink:href="#svg-star"></use>
											</svg>
											<!-- /SVG STAR -->
										</li>
										<li class="filled">
											<!-- SVG STAR -->
											<svg class="svg-star">
												<use xlink:href="#svg-star"></use>
											</svg>
											<!-- /SVG STAR -->
										</li>
										<li class="filled">
											<!-- SVG STAR -->
											<svg class="svg-star">
												<use xlink:href="#svg-star"></use>
											</svg>
											<!-- /SVG STAR -->
										</li>
										<li>
											<!-- SVG STAR -->
											{{-- <svg class="svg-star">
												<use xlink:href="#svg-star"></use>
											</svg> --}}
											<!-- /SVG STAR -->
										</li>
									</ul>
									<!-- /RATING -->
                                <p id="thongtinsanpham_quickview"></p>
                                <p class="highlighted current" id="giaban_quickview"></p>
									<p class="highlighted previous">90.25</p>
									<h5 id="tonkho_quickview" class="stock">

									</h5>
									{{-- <h5>Select Size:</h5>
									<form class="westeros-form">
										<input id="small1" type="radio" name="size" value="small">
										<label for="small1"><span class="radio"><span></span></span>Small</label>

										<input id="medium1" type="radio" name="size" value="medium">
										<label for="medium1"><span class="radio"><span></span></span>Medium</label>

										<input id="large1" type="radio" name="size" value="large" checked>
										<label for="large1"><span class="radio"><span></span></span>Large</label>

										<input id="extralarge1" type="radio" name="size" value="extralarge">
										<label for="extralarge1"><span class="radio"><span></span></span>Extra Large</label>
									</form> --}}
									{{-- <div class="color-selection">
										<h5>Select Base Color:</h5>
										<!-- COLORPICKER -->
										<ul class="colorpicker">
											<li><span data-color="#008fbe"></span></li>
											<li class="selected"><span data-color="#17ccac"></span></li>
											<li><span data-color="#4c4cab"></span></li>
											<li><span data-color="#252525"></span></li>
										</ul>
										<!-- /COLORPICKER -->
									</div> --}}
									<div>
										<h5>Số lượng:</h5>
										<!-- COUNTER -->
										<div class="counter">
											<div class="control left"></div>
											<div class="value">
												<h5>0</h5>
											</div>
											<div class="control right"></div>
										</div>
										<!-- /COUNTER -->
									</div>
									<div class="options">
										<a href="#" class="button medium fb"></a>
										<a href="#" class="button medium twt"></a>
										{{-- <a href="#compare-modal" class="button medium compare cmp-popup" data-effect="mfp-3d-unfold">
											<!-- SVG COMPARE -->
											<svg class="svg-compare">
												<use xlink:href="#svg-compare"></use>
											</svg>
											<!-- /SVG COMPARE -->
										</a> --}}
										<a href="#" class="button medium wishlist">
											<!-- SVG WISHLIST -->
											<svg class="svg-wishlist">
												<use xlink:href="#svg-wishlist"></use>
											</svg>
											<!-- /SVG WISHLIST -->
                                        </a>
                                        {{-- id="cart-add{{$listSanPhamBanChay[$i]->ma_san_pham}}" --}}
										<a href="#" class="themgiohang_hethang_quickview">

                                        </a>

									</div>
								</div>
								<!-- /PRODUCT DESCRIPTION -->
							</div>
                            <!-- /QUICK VIEW POPUP -->












							<a href="full-view.html" class="button full-view">
								<!-- SVG FULLVIEW -->
								<svg class="svg-fullview">
									<use xlink:href="#svg-fullview"></use>
								</svg>
								<!-- /SVG FULLVIEW -->
							</a>
							{{-- <a href="#compare-modal" class="button compare cmp-popup" data-effect="mfp-3d-unfold">
								<!-- SVG COMPARE -->
								<svg class="svg-compare">
									<use xlink:href="#svg-compare"></use>
								</svg>
								<!-- /SVG COMPARE -->
							</a> --}}
						</div>
					</div>
					<!-- /ACTIONS -->

					<!-- DESCRIPTION -->
					<div class="description">
						<div class="clearfix">
                            {{-- Ở đây là nhóm sản phẩm --}}
                        <a href="#"><p class="highlighted category">{{$listSanPhamBanChay[$i]->ten_nhom_hang}}</p></a>
							<!-- RATING -->
							{{-- <ul class="rating">
								<li class="filled">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="filled">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="filled">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li class="filled">
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
								<li>
									<!-- SVG STAR -->
									<svg class="svg-star">
										<use xlink:href="#svg-star"></use>
									</svg>
									<!-- /SVG STAR -->
								</li>
							</ul> --}}
							<!-- /RATING -->
						</div>
						<div class="clearfix">
                            <a href="#"><h6>{{$listSanPhamBanChay[$i]->ten_san_pham}}</h6></a>
                            <p class="highlighted previous">{{number_format(5000)}}</p>
						</div>
						<div class="clearfix">
                        <p>{{$listSanPhamBanChay[$i]->ten_loai}}</p>
                            {{-- Giá bán hiển thị ở ngoài --}}
                        <p class="highlighted current">{{number_format($listSanPhamBanChay[$i]->gia_ban)}}</p>

						</div>

                        <!-- CART OPTIONS -->
                        @if ($listSanPhamBanChay[$i]->ton_kho==0)
                        <div class="cart-options">
                                <a href="#" class="button medium wishlist">
                                    <!-- SVG WISHLIST -->
                                    <svg class="svg-wishlist">
                                        <use xlink:href="#svg-wishlist"></use>
                                    </svg>
                                    <!-- /SVG WISHLIST -->
                                </a>
                                <a href="#" class="button no-stock">
                                    <!-- SVG PLUS -->
                                    <svg class="svg-plus">
                                        <use xlink:href="#svg-plus"></use>
                                    </svg>
                                    <!-- /SVG PLUS -->
                                    Hết hàng
                                </a>
                            </div>
                        @else
						<div class="cart-options">
							<a href="#" class="button medium wishlist">
								<!-- SVG WISHLIST -->
								<svg class="svg-wishlist">
									<use xlink:href="#svg-wishlist"></use>
								</svg>
								<!-- /SVG WISHLIST -->
							</a>
							<a href="#" class="button cart-add" id="cart-add{{$listSanPhamBanChay[$i]->ma_san_pham}}">
								<!-- SVG PLUS -->
								<svg class="svg-plus">
									<use xlink:href="#svg-plus"></use>
								</svg>
								<!-- /SVG PLUS -->
								Thêm vào giỏ
							</a>
                        </div>
                        @endif
						<!-- /CART OPTIONS -->
					</div>
					<!-- /DESCRIPTION -->
				</li>
				<!-- /PRODUCT -->

                @endfor



			</ul>
			<!-- /PRODUCT LIST -->
		</section>
    </div>



































	<!-- /PRODUCT SHOWCASE -->

	<!-- PRODUCT SHOWCASE -->
	<div class="product-showcase-wrap">
		<section class="product-showcase">
			<h3 class="title">Sản phẩm bán chạy</h3>
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

			{{-- Chỗ này thêm List product --}}
		</section>
	</div>
	<!-- /PRODUCT SHOWCASE -->


	<!-- INSTITUTIONAL -->
	<div id="institutional-wrap">
		<section id="institutional">
			<h3 class="title">Tại sao nên chọn TheCosmo?</h3>
			<!-- BULLETS -->
			<ul class="bullets">
				<!-- BULLET -->
				<li>
					<!-- SVG GLOBE -->
					<svg class="svg-globe">
						<use xlink:href="#svg-globe"></use>
					</svg>
					<!-- /SVG GLOBE -->
					<h6>Giao hàng toàn quốc</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->

				<!-- BULLET -->
				<li>
					<!-- SVG TRUCK -->
					<svg class="svg-truck">
						<use xlink:href="#svg-truck"></use>
					</svg>
					<!-- /SVG TRUCK -->
					<h6>Giao hàng tốc hành</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->

				<!-- BULLET -->
				<li>
					<!-- SVG RIBBON -->
					<svg class="svg-ribbon">
						<use xlink:href="#svg-ribbon"></use>
					</svg>
					<!-- /SVG RIBBON -->
					<h6>Sản phẩm chất lượng</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->

				<!-- BULLET -->
				<li>
					<!-- SVG PIGGY -->
					<svg class="svg-piggy">
						<use xlink:href="#svg-piggy"></use>
					</svg>
					<!-- /SVG PIGGY -->
					<h6>Đổi trả dễ dàng</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->

				<!-- BULLET -->
				<li>
					<!-- SVG CUSTOMER SERVICE -->
					<svg class="svg-customer-service">
						<use xlink:href="#svg-customer-service"></use>
					</svg>
					<!-- /SVG CUSTOMER SERVICE -->
					<h6>Hỗ trợ 24/7</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->

				<!-- BULLET -->
				<li>
					<!-- SVG CHAT -->
					<svg class="svg-chat">
						<use xlink:href="#svg-chat"></use>
					</svg>
					<!-- /SVG CHAT -->
					<h6>Hỗ trợ chat trực tuyến</h6>
					<p>Lorem ipsum dolor sit amet, edurnere erudum consectetur adipisicing elit. Lorem ipsum dol sit amet, edurnere consectetur adipisicing.</p>
				</li>
				<!-- /BULLET -->
			</ul>
			<!-- /BULLETS -->
		</section>
	</div>
	<!-- /INSTITUTIONAL -->

	<!-- BILLBOARD -->
	<div id="billboard-wrap">
		<section id="billboard">
			<h3 class="title">Hướng dẫn</h3>
			<!-- ACCORDION -->
			<ul class="accordion">
				<!--ACCORDION ITEM-->
				<li>
					<a href="#">
						<h6>Lịch sử TheCosmo?</h6>
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
					</a>
					<ul class="sub-items">
						<li>
							<p>Nội dung</p>
						</li>
					</ul>
				</li>
				<!--/ACCORDION ITEM-->

				<!--ACCORDION ITEM-->
				<li>
					<a href="#">
						<h6>Tạo tài khoản</h6>
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
					</a>
					<ul class="sub-items">
						<li>
							<p>Nội dung</p>
						</li>
					</ul>
				</li>
				<!--/ACCORDION ITEM-->

				<!--ACCORDION ITEM-->
				<li>
					<a href="#">
						<h6>Cách mua sản phẩm</h6>
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
					</a>
					<ul class="sub-items">
						<li>
							<p>Nội dung</p>
						</li>
					</ul>
				</li>
				<!--/ACCORDION ITEM-->

				<!--ACCORDION ITEM-->
				<li>
					<a href="#">
						<h6>Vận chuyển và phương thức thanh toán</h6>
						<svg class="plus">
							<rect class="vertical" x="4" width="4" height="12"/>
							<rect y="4" width="12" height="4"/>
						</svg>
					</a>
					<ul class="sub-items">
						<li>
							<p>Nội dung</p>
						</li>
					</ul>
				</li>
				<!--/ACCORDION ITEM-->
			</ul>
			<!-- /ACCORDION -->

			<div class="sale-promo">
				<div class="speech-bubble">
					<h4>Khuyến mãi</h4>
					<h4 class="remark">20/11</h4>
				</div>
				<img src="{{URL::asset('client/images/bunny-monster.png')}}" alt="bunny-monster">
				<div id="bubbles">
					<div class="bubble small"></div>
					<div class="bubble small x1"></div>
					<div class="bubble medium"></div>
					<div class="bubble large"></div>
				</div>
			</div>
		</section>
	</div>
	<!-- /BILLBOARD -->

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
            <img src="{{URL::asset('client/images/brands/gr.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/gr-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/tf.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/tf-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/aj.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/aj-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/vh.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/vh-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/pd.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/pd-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/gr.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/gr-over.png')}}" alt="brand-over">
        </a>
    </li>
    <!-- /BRAND -->

    <!-- BRAND -->
    <li>
        <a href="#">
            <img src="{{URL::asset('client/images/brands/tf.png')}}" alt="brand-normal">
            <img src="{{URL::asset('client/images/brands/tf-over.png')}}" alt="brand-over">
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
<!-- jQuery -->
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
<!-- Home -->
<script src="{{URL::asset('client/js/home.js')}}"></script>
<!-- Sử lý phần hiển thị popup -->
<script src="{{URL::asset('client/js/quickview.js')}}"></script>

@stop
