<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý</title>
    @yield('head')

    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{URL::asset('all/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('all/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('manager/manager.css')}}"/>

    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/fontawesome.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/brands.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{URL::asset('all/icon/css/solid.css')}}"/>


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>
<body>
    <div class="container-fluid">
            <div class="background-popup  d-flex align-items-center justify-content-center hide">
                <div class="vaitro_popup">
                    <div class="header-popup align-items-center justify-content-center">
                        <h3 >Quản lý vai trò</h3>
                    </div>
                    {{-- <div class="body-popup">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên loại tài khoản</th>
                                        <th scope="col">Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                        <tr>
                                            <th scope="row">{{$item->ma_loai_tai_khoan}}</th>
                                            <td>{{$item->ten_loai_tai_khoan}}</td>
                                            <td>{{$item->mo_ta}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div> --}}
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
                                  0377158365
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Tài khoản</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
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
                            <a class="nav-link active" href="#">Tổng quan</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hàng hóa</a>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Danh mục</a>
                                <a class="dropdown-item" href="#">Thiết lập giá</a>
                              <a class="dropdown-item" href="{{route('nhomsanpham')}}">Nhóm sản phẩm</a>
                                <a class="dropdown-item" href="#">Loại sản phẩm</a>
                                {{-- <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a> --}}
                              </div>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Hóa đơn</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Đối tác</a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Nhà cung cấp</a>
                                      <a class="dropdown-item" href="#">Nhập hàng</a>
                                      {{-- <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a> --}}
                                    </div>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="#">Khách hàng</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="#">Nhân viên</a>
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

                          </ul>
                          </nav>
            </div>
        </div>

    <div class="row body_section" id="body">
        @yield('body')
    </div>
        <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns to organize your footer content.</p>

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
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
    </div>
    <script src="{{URL::asset('manager/manager.js')}}"></script>
    <script src="{{URL::asset('manager/event.js')}}"></script>
    @yield('footer')
</body>
</html>
