<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ URL::asset('all/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('login/login.css')}}"/>

    <link rel="stylesheet" type='text/css' href="{{ URL::asset('all/icon/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{ URL::asset('all/icon/css/fontawesome.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{ URL::asset('all/icon/css/brands.css')}}"/>
    <link rel="stylesheet" type='text/css' href="{{ URL::asset('all/icon/css/solid.css')}}"/>
</head>
<body>
    <div id="background-img"></div>

    <div class="login-container container-fluid d-flex align-items-center justify-content-center" >
        <div class="login-form row">
            <div class="form-main">
                <form>
                    <div class="header">
                        <img class="logo rounded mx-auto d-block" src="{{ URL::asset('all/img/logo_header.png') }}" alt="Error" height="100%">
                    </div>
                    <div class="body">
                            <div class="form-group">
                                    <h3 >Đăng nhập</h3>
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="text" class="form-control rounded-pill" id="username" aria-describedby="emailHelp" placeholder="username">
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control rounded-pill" id="password" placeholder="123456">
                                </div>

                                <div class="option text-center">
                                        <div class="form-group form-check d-inline-block">
                                            <input type="checkbox" class="form-check-input" id="check">
                                            <label class="form-check-label" for="check">Duy trì đăng nhập</label>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <a href="#">Quên mật khẩu</a>
                                </div>

                                <div class="form-group">
                                    <span id="btn_quanly">
                                    <i class="icon_quanly fas fa-user-cog fa-2x" ></i>
                                    <input class="button btn btn-success rounded-pill" type="submit" value="Quản lý" name="quanly">
                                    </span>
                                    <span id="btn_banhang">
                                        <i class="icon_banhang fas fa-shopping-cart fa-2x"></i>
                                        <input class="button btn btn-primary rounded-pill text-right" type="button" value="Bán hàng" name="banghang">
                                    </span>
                                </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer">
            <img src=" {{ URL::asset('login/img/tel_icon.png')}}" atl="Error" width="30px">
                Hỗ trợ: 0377158365
        </div>
    </div>
</body>
</html>
