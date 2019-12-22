@extends('layouts/client/layout')

@section('header')
<link rel="stylesheet" href="{{URL::asset('client/css/vendor/jquery.range.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/vendor/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{URL::asset('client/css/style.css')}}">
	<!-- favicon -->
    <link rel="icon" href="{{URL::asset('client/favicon.ico')}}">

	<link rel="stylesheet" href="{{URL::asset('client/css/custom.css')}}">
@stop
@section('body')
	<!-- SECTION-NAV -->
	<div id="section-nav-wrap">
		<section id="section-nav">
            @if(count($listSanPham)!=null)
            <p>Home / Shop / <a href="#">{{$listSanPham[0]->ten_nhom_hang}} / {{$listSanPham[0]->ten_loai}}</a></p>
            @endif
		</section>
	</div>
	<!-- /SECTION-NAV -->


	<!-- SHOP -->
	<div id="shop-wrap">
		<section id="shop" class="right expandible-sidebar">
			<!-- SIDEBAR CONTROL -->
			<div class="sidebar-control">
				<!-- SVG GEAR -->
				<svg class="svg-gear">
					<use xlink:href="#svg-gear"></use>
				</svg>
				<!-- /SVG GEAR -->
			</div>
			<!-- /SIDEBAR CONTROL -->

			<!-- SHOP SIDEBAR -->
			<aside class="shop-sidebar">
				<!-- SIDEBAR CONTROL -->
				<svg class="svg-plus sidebar-control">
					<use xlink:href="#svg-plus"></use>
				</svg>
				<!-- /SIDEBAR CONTROL -->
				<!-- ACCORDION -->
				<!-- /ACCORDION -->

				<h3 class="title">Tìm kiếm</h3>
				<form class="westeros-form">
					<input type="text" id="item1" name="item1">
				</form>

				<!-- SHOP BY PRICE -->
				<h3 class="title">Lọc theo giá</h3>
				<form class="westeros-form price-range">
					<input type="hidden" class="range-slider" value="200">
					<button class="button small">Thực hiện</button>
				</form>
				<div class="clearfix"></div>
				<!-- /SHOP BY PRICE -->

				<!-- SHOP BY COLOR -->

				<!-- /SHOP BY COLOR -->

				<!-- TAG CLOUD -->

				<!-- /TAG CLOUD -->

				<!-- WESTEROS POLL -->
				<!-- /WESTEROS POLL -->

				<!-- PRODUCT PREVIEW -->
				<!-- /PRODUCT PREVIEW -->

				<!-- FACEBOOK SOCIAL PLUGIN -->
						<!-- FACEBOOK SOCIAL PLUGIN -->

			</aside>
			<!-- /SHOP SIDEBAR -->

			<!-- SHOP PRODUCTS -->
			<div class="shop-products">
                @if (count($listHinhAnhKhuyenMai)>=1)
                <a href="{{route('Client.xoaSanPham')}}"><h3 class="title">Chương trình khuyến mãi</h3></a>
				<figure class="section-banner">
                    <img src="{{URL::asset($listHinhAnhKhuyenMai[0]->hinh_anh)}}" alt="no-image">
                </figure>
                @endif
				<!-- FILTERS -->
				<div class="filters">
					<h3 class="subtitle">Danh sách sản phẩm</h3>
					<div class="options">
						<form class="westeros-form">
							<label class="select-block" for="show">Hiển thị:
								<select name="show" id="show">
									<option value="1">15 Per Page</option>
									<option value="2">20 Per Page</option>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow select-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
							<label class="select-block" for="sort">Sắp xếp theo giá:
								<select name="sort" id="sort">
									<option value="1">Từ cao tới thấp</option>
									<option value="2">Từ thấp tới cao</option>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow select-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
						</form>
						<!-- VIEW DISPLAY -->
						<ul class="display">
							<li class="grid selected">
								<!-- SVG GRID -->
								<svg class="svg-grid">
									<use xlink:href="#svg-grid"></use>
								</svg>
								<!-- /SVG GRID -->
							</li>
							<li class="list">
								<!-- SVG LIST -->
								<svg class="svg-list">
									<use xlink:href="#svg-list"></use>
								</svg>
								<!-- /SVG LIST -->
							</li>
						</ul>
						<!-- /VIEW DISPLAY -->
					</div>
				</div>
				<!-- /FILTERS -->

				<!-- COMPARE MODAL -->
				<div id="compare-modal" class="compare-modal mfp-with-anim mfp-hide">
					<img src="images/icons/compare-modal-logo.png" alt="logo">
					<h5>The item <span>product name</span></h5>
					<h6>Has been sucessfully added to compare</h6>
					<div class="options">
						<a class="button medium mfp-close">Return to store</a>
						<a href="compare.html" class="button medium compare">Go to compare</a>
					</div>
				</div>
				<!-- /COMPARE MODAL -->

				<!-- PRODUCT LIST -->
                <ul id="owl-f-products" class="product-list grid owl-carousel">

                    {{-- List các sản phẩm --}}




                    @if (count($listSanPham)!=null)

                        @for($i=0;$i<count($listSanPham);$i++)

                        <!-- PRODUCT -->
                    <li id="{{$listSanPham[$i]->ma_san_pham}}" class="list-item">

                        <!-- PIN -->
                            @if ($listSanPham[$i]->phan_tram_giam !=null && date('Y-m-d H:i:s')>=$listSanPham[$i]->bat_dau
                            && date('Y-m-d H:i:s')<=$listSanPham[$i]->ket_thuc)
                            <div class="pin circle" id="giamgia">
                                    <h6>Sale!</h6>
                                    <h6 class="percent important">{{$listSanPham[$i]->phan_tram_giam}}%</h6>
                                    <h6>off</h6>
                                </div>
                                <!-- /PIN -->
                            @endif


                            <!-- ACTIONS -->
                            <div class="actions">
                                <figure class="liquid">
                                    {{-- Đây là hình ảnh hiển thị đầu tiên --}}
                                <img src="{{URL::asset($listSanPham[$i]->hinh_anh1)}}" alt="product1">
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
                                                        {{-- <img src="{{URL::asset($listSanPham[$i]->hinh_anh1)}}" alt="picture-view"> --}}
                                                    </figure>
                                                </li>
                                                <!-- /VIEW -->

                                                <!-- VIEW -->
                                                <li>
                                                    <figure class="liquid" id="hinhanh2_popup">
                                                        {{-- <img src="{{URL::asset($listSanPham[$i]->hinh_anh2)}}" alt="picture-view"> --}}
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
                                            <p class="highlighted previous" id="gia_ban_thay_the_quickview"></p>
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
                                                        <h5 id="laysoluonghomepage">1</h5>
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
                                                {{-- id="cart-add{{$listSanPham[$i]->ma_san_pham}}" --}}
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
                                <a href="#"><p class="highlighted category">{{$listSanPham[$i]->ten_nhom_hang}}</p></a>
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
                                @if ($listSanPham[$i]->phan_tram_giam!=null)
                                </div>
                                <div class="clearfix">
                                    <a href="#"><h6>{{$listSanPham[$i]->ten_san_pham}}</h6></a>
                                    <p class="highlighted previous">{{number_format($listSanPham[$i]->gia_ban)}}</p>
                                </div>
                                <div class="clearfix">
                                <p>{{$listSanPham[$i]->ten_loai}}</p>
                                    {{-- Giá bán hiển thị ở ngoài --}}
                                <p class="highlighted current">{{number_format($listSanPham[$i]->tien_sau_khi_giam)}}</p>

                                </div>
                                @else
                            </div>
                            <div class="clearfix">
                                <a href="#"><h6>{{$listSanPham[$i]->ten_san_pham}}</h6></a>
                                <p class="highlighted previous"></p>
                            </div>

                            <div class="clearfix">
                            <p>{{$listSanPham[$i]->ten_loai}}</p>
                                {{-- Giá bán hiển thị ở ngoài --}}
                            <p class="highlighted current">{{number_format($listSanPham[$i]->gia_ban)}}</p>

                            </div>
                                @endif
                                <!-- CART OPTIONS -->
                                @if ($listSanPham[$i]->ton_kho==0)
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
                                    <a href="#" class="button cart-add popup-buttom-themgiohang" id="cart-add{{$listSanPham[$i]->ma_san_pham}}">
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
@endif


                    </ul>
				<!-- /PRODUCT LIST -->

				<!-- PAGER -->
				<ul class="pager">
					<li>
						<a href="#" class="button prev">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</a>
					</li>
					<li class="selected"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">...</a></li>
					<li><a href="#">17</a></li>
					<li>
						<a href="#" class="button next">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</a>
					</li>
				</ul>
				<!-- /PAGER -->
			</div>
			<!-- /SHOP PRODUCTS -->
			<div class="clearfix"></div>
		</section>
	</div>
    <!-- /SHOP -->

    @stop

    @section('footer')
<!-- jQuery -->
<script src="{{URL::asset('client/js/vendor/jquery-1.11.1.min.js')}}"></script>
    <!-- XM Accordion -->
    <script src="{{URL::asset('client/js/vendor/jquery.xmaccordion.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{URL::asset('client/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <!-- imgLiquid -->
    <script src="{{URL::asset('client/js/vendor/imgLiquid-min.js')}}"></script>
    <!-- JRange -->
    <script src="{{URL::asset('client/js/vendor/jquery.range.min.js')}}"></script>
    <!-- Header -->
    <script src="{{URL::asset('client/js/header.js')}}"></script>
    <!-- Menu -->
    <script src="{{URL::asset('client/js/menu.js')}}"></script>
    <!-- Shop -->
    <script src="{{URL::asset('client/js/shop.js')}}"></script>
    <!-- Home -->
{{-- <script src="{{URL::asset('client/js/home.js')}}"></script> --}}
<!-- Sử lý phần hiển thị popup -->
<script src="{{URL::asset('client/js/quickview-main.js')}}"></script>

    @stop
