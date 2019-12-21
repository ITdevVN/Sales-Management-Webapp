<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý</title>


    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="{{URL::asset('all/js/jquery-3.4.1.min.js')}}"></script> --}}
    <script src="{{URL::asset('all/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('all/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('manager/manager.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('manager/layout.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/fontawesome.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/brands.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/solid.css')}}"/>
    {{-- <link rel="stylesheet" href="{{URL::asset('manager/layout.css')}}"/> --}}
    @yield('head')


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>
<body>

    <div class="container-fluid">
        <div id="background-hienthi" class=" hide d-flex align-items-center justify-content-center">
                <div id="message_hienthi" class="position-absolute hide"></div>
                <div id="popup-them-hienthi" class="hide hide w-75">
                        <div id="popup-them-header-hienthi">Người dùng</div>
                            <form id="formthem_hienthi" data-route="{{route('tongquan.luuThongTinNguoiDung')}}" method="POST">
                                @csrf
                                <div id="popup-them-body-hienthi">
                                    <div class="col-6 d-inline-block" id="div-trai">
                                            <div class="form-group row">
                                                    <label for="manhanvien_hienthi" class="col-4 col-form-label font-weight-bold" >Mã nhân viên</label>
                                                    <div class="col-sm-7">
                                                    <input readonly value="{{ Session::get('ma_nhan_vien')}}" type="text" class="form-control" name="manhanvien_hienthi" id="manhanvien_hienthi" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                    <div class="form-group row">
                                        <label for="hoten_hienthi" class="col-4 col-form-label font-weight-bold" >Họ tên</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="hoten_hienthi" id="hoten_hienthi" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="email_hienthi" class="col-4 col-form-label font-weight-bold" >Email</label>
                                            <div class="col-sm-7">
                                                <input readonly type="text" class="form-control" name="email_hienthi" id="email_hienthi" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div><h5>Đổi mật khẩu</h5></div>
                                        <div class="form-group row">
                                                <label for="matkhaucu_hienthi" class="col-4 col-form-label font-weight-bold" >Mật khẩu cũ</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="matkhaucu_hienthi" id="matkhaucu_hienthi" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </br>
                                            <div class="form-group row">
                                                    <label for="matkhaumoi_hienthi" class="col-4 col-form-label font-weight-bold" >Mật khẩu mới</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="matkhaumoi_hienthi" id="matkhaumoi_hienthi" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </br>
                                    <div class="form-group row">
                                            <label for="matkhaumoilai_hienthi" class="col-4 col-form-label font-weight-bold" >Nhập lại mật khẩu</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="matkhaumoilai_hienthi" id="matkhaumoilai_hienthi" aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                    </br>
                                </div>
                                {{-- Đóng div bên trái --}}
                                <div class="col-6 float-right" id="div-phai">

                                        <div class="form-group row">
                                                <label for="cmnd_hienthi" class="col-4 col-form-label font-weight-bold" >CMND</label>
                                                <div class="col-sm-8">
                                                    <input readonly type="text" class="form-control" name="cmnd_hienthi" id="cmnd_hienthi" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label for="sodienthoai_hienthi" class="col-4 col-form-label font-weight-bold" >Số điện thoại</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="sodienthoai_hienthi" id="sodienthoai_hienthi" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label for="diachi_hienthi" class="col-4 col-form-label font-weight-bold" >Địa chỉ</label>
                                                        <textarea class="form-control" name="diachi_hienthi" id="diachi_hienthi" rows="3"></textarea>
                                                    </div>
                                    <div class="form-group row">
                                            <label for="vaitro_hienthi" class="col-4 col-form-label font-weight-bold">Vai trò</label>
                                            <div class="col-sm-8">
                                                <input readonly type="text" class="form-control" name="vaitro_hienthi" id="vaitro_hienthi" aria-describedby="emailHelp">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="ghichu_hienthi" class="font-weight-bold">Ghi chú</label>
                                            <textarea class="form-control" name="ghichu_hienthi" id="ghichu_hienthi" rows="4"></textarea>
                                    </div>
                                </div>
                                {{-- Đóng div bên phải --}}
                                </div>
                                {{-- Đóng thẻ div của body --}}
                                <div id="popup-body-button-hienthi" class="float-right  mb-3 mt-2">
                                    <button type="submit" class="btn btn-success" id="btnLuu_hienthi">Lưu</button>
                                    <button type="button" class="btn btn-danger" id="btnHuy_hienthi">Hủy bỏ</button>
                                </div>

                            </form>
                        </div>
        </div>


        <div class="row top_header">
            <div class="col-4">
                <img id="logo" src="{{URL::asset('all/img/logo_header.png')}}" alt="Error" height="50px">
            </div>
            <div class="col-8 top_header_right">
                <!-- <div class="div_info"> -->
                        <div class="dropdown div_info">
                            <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Session::get('ho_ten')}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a id="taikhoan_hienthi" class="dropdown-item" href="#">Tài khoản</a>
                                <a class="dropdown-item" href="{{route('logout')}}" id="dangxuat">Đăng xuất</a>
                            </div>
                        </div>
                <!-- </div> -->
                <!-- <div class="div_quanlynguoidung"> -->
                        <div class="dropdown div_quanlynguoidung">
                                <a class="btn" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                      Quản lý người dùng
                                </a>
                            </div>
                <!-- </div> -->
                <!-- <div class="div_hotro"> -->
                        <div class="dropdown div_vaitro">
                                <a class="btn" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                      Quản lý vai trò
                                </a>
                        </div>




                <!-- </div> -->
                <!-- <div class="div_chude"> -->
                        <div class="dropdown div_hotro">
                                <a class="btn" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                      Hỗ trợ
                                </a>
                        </div>
                <!-- </div> -->
            </div>
        </div>

        <div class="row navbar_section">
            <div class="col-12 background-navbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="nav ">
                            <li class="nav-item">
                            <a class="nav-link active" href="{{route('tongquan')}}">Tổng quan</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                              <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('sanpham')}}">Danh mục</a>
                                <a class="dropdown-item" href="#">Thiết lập giá</a>
                              <a class="dropdown-item" href="{{route('nhomsanpham')}}">Nhóm sản phẩm</a>
                                <a class="dropdown-item" href="#">Loại sản phẩm</a>
                                {{-- <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a> --}}
                              </div>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('hoadon')}}">Hóa đơn</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('khuyenmai')}}">Khuyến mãi</a>
                                  </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Đối tác</a>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('nhacungcap')}}">Nhà cung cấp</a>
                                      <a class="dropdown-item" href="#">Nhập hàng</a>
                                      {{-- <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a> --}}
                                    </div>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('khachhang')}}">Khách hàng</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{route('nhanvien')}}">Nhân viên</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Báo cáo</a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Cuối ngày</a>
                                      <a class="dropdown-item" href="#">Hàng hóa</a>
                                      <a class="dropdown-item" href="#">Khách hàng</a>
                                      <a class="dropdown-item" href="#">Nhà cung cấp</a>
                                      <a class="dropdown-item" href="#">Nhân viên</a>
                                      <a class="dropdown-item" href="#">Hóa đơn</a>
                                      {{-- <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a> --}}
                                    </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Đơn hàng Online</a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{route('donhangchoxuly')}}">Đơn hàng chờ xử lý</a>
                                  <a class="dropdown-item" href="{{route('donhangdanggiao')}}">Đơn hàng đang giao</a>
                                </div>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hiển thị trên web</a>
                        </li>


                          </ul>
                          </nav>
            </div>
        </div>

    <div class="row body_section" id="body">
        @yield('body')
    </div>
        <!-- Footer -->
<footer class="page-footer font-small pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Trụ sở chính</h5>
          <p>
            <li>Tầng 5, Tòa nhà Flemington, 182 Lê Đại Hành, P.15, Q.11, Hồ Chí Minh.</li>
            <li>Tổng đài hỗ trợ: 1900.636.099 ( Thứ 2 đến Thứ 6 từ 8h đến 18h; Thứ 7 và Chủ nhật từ 8h00 đến 17h00 )</li>
            <li>Số hỗ trợ ngoài giờ: 0901.866.099</li>
            </p>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> TheCosmo.vn</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


    </div>
    <script src="{{URL::asset('manager/layout.js')}}"></script>
    @yield('footer')
</body>
</html>
