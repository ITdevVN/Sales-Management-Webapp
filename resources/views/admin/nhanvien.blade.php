@extends('layouts/admin/layout')
@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/nhanvien.css')}}"/>
@stop


{{-- thêm nhân viên --}}


@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="messagethem" ></div>
<div id="popup-them" class="hide">
    <div id="messagethem"></div>
    <div id="popup-them-header">Thêm nhân viên</div>
        <form id="formthem" data-route="{{route('nhanvien.them')}}" method="POST">
            @csrf
            <div id="popup-them-body">
                <div id="trai" class="col-6 d-inline-block">
                <div class="form-group row">
                    <label for="them_tennhanvien" class="col-4 col-form-label font-weight-bold" >Tên nhân viên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="them_tennhanvien" id="them_tennhanvien" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="them_cmnd" class="col-4 col-form-label font-weight-bold" >CMND</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="them_cmnd" id="them_cmnd" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="them_sodienthoai" class="col-4 col-form-label font-weight-bold">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="them_sodienthoai" id="them_sodienthoai" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="them_ngaysinh" class="col-4 col-form-label font-weight-bold">Ngày sinh</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="them_ngaysinh" id="them_ngaysinh" aria-describedby="emailHelp">
                    </div>
                </div>

				<div class="form-group row">
                        <label class="col-4 font-weight-bold" for="them_gioitinh">Giới tính</label>
                            <div class="col-sm-8">
                                <select name="them_gioitinh" class="custom-select mr-sm-2" id="them_gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                </div>
                {{--Tạo tài khoản--}}
                <div><b>Tạo tài khoản</b></div><br>
                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="them_loaitaikhoan">Loại tài khoản</label>
                            <div class="col-sm-8">
                                <select name="them_loaitaikhoan" class="custom-select mr-sm-2" id="them_loaitaikhoan">
                                     @foreach($listtaikhoan as $item)
                        <option value="{{$item->ma_loai_tai_khoan}}">{{$item->ten_loai_tai_khoan}}</option>
                        @endforeach   
                                </select>
                            </div>
                </div>
                <div class="form-group row">
                    <label for="them_email" class="col-4 col-form-label font-weight-bold" >Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="them_email" id="them_email" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="them_pass" class="col-4 col-form-label font-weight-bold" >Mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" value="123456" class="form-control" name="them_pass" id="them_pass" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            {{--đóng div trái--}}
            
            <div id="phai" class="col-6 d-inline-block float-right">
                <div class="form-group row">
                    <label for="them_diachi" class="col-4 col-form-label font-weight-bold" >Địa chỉ</label>
                    <div class="col-sm-8">
                        <input type="textarea" class="form-control" name="them_diachi" id="them_diachi" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-4 col-form-label font-weight-bold" for="them_trangthai">Trạng thái</label>
                            <div class="col-sm-8">
                                <select name="them_trangthai" class="custom-select mr-sm-2" id="them_trangthai">
                                        <option value="Đang làm">Đang làm</option>
                                        <option value="Nghỉ làm">Nghỉ làm</option>
                                </select>
                            </div>
                </div>
				<div class="form-group row">
                    <label class="col-4 col-form-label font-weight-bold" for="them_manguoiquanly">Mã người quản lý</label>
                    <div class="col-sm-8">
                    <select class="custom-select mr-sm-2" id="them_manguoiquanly" name="them_manguoiquanly">
                        <option value=""></option>
                        @foreach($listquanly as $item)
                        <option value="{{$item->ma_nhan_vien}}">{{$item->ho_ten."+".$item->cmnd}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>								 
				<div class="form-group row">
                        <label for="them_ghichu" class="col-4 font-weight-bold">Ghi chú</label>
                        <textarea class="col-8 form-control" name="them_ghichu" id="them_ghichu" rows="6"></textarea>
                </div>  
                </div>            
                               
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right mb-3">
                <button type="submit" class="btn btn-success" id="btnLuuThem">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
            </div>
        </div>
        </form>
    </div>








{{--Sửa thông tin nhân viên--}}

<div id="messagesua" ></div>
<div id="popup-sua" class="hide">
    <div id="messagesua"></div>
    <div id="popup-sua-header">Sửa nhân viên</div>
        <form id="formsua" data-route="{{route('nhanvien.sua')}}" method="POST">
            @csrf
            <div id="popup-sua-body">
                <div id="trai" class="col-6 d-inline-block">
                    <div class="form-group row">
                    <label for="sua_manhanvien" class="col-4 col-form-label font-weight-bold" >Mã nhân viên</label>
                    <div class="col-sm-8">
                        <input readonly type="text" class="form-control" name="sua_manhanvien" id="sua_manhanvien" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sua_tennhanvien" class="col-4 col-form-label font-weight-bold" >Tên nhân viên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sua_tennhanvien" id="sua_tennhanvien" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sua_cmnd" class="col-4 col-form-label font-weight-bold" >CMND</label>
                    <div class="col-sm-8">
                        <input readonly type="number" class="form-control" name="sua_cmnd" id="sua_cmnd" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sua_sodienthoai" class="col-4 col-form-label font-weight-bold">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sua_sodienthoai" id="sua_sodienthoai" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sua_ngaysinh" class="col-4 col-form-label font-weight-bold">Ngày sinh</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="sua_ngaysinh" id="sua_ngaysinh" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="sua_gioitinh">Giới tính</label>
                            <div class="col-sm-8">
                                <select name="sua_gioitinh" class="custom-select mr-sm-2" id="sua_gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                </div>
                {{--Tạo tài khoản--}}
                <div><b>Tạo tài khoản</b></div><br>
                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="sua_loaitaikhoan">Loại tài khoản</label>
                            <div class="col-sm-8">
                                <select name="sua_loaitaikhoan" class="custom-select mr-sm-2" id="sua_loaitaikhoan">
                                     @foreach($listtaikhoan as $item)
                        <option value="{{$item->ma_loai_tai_khoan}}">{{$item->ten_loai_tai_khoan}}</option>
                        @endforeach   
                                </select>
                            </div>
                </div>
                <div class="form-group row">
                    <label for="sua_email" class="col-4 col-form-label font-weight-bold" >Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sua_email" id="sua_email" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sua_pass" class="col-4 col-form-label font-weight-bold" >Mật khẩu mới</label>
                    <div class="col-sm-8">
                        <input type="password" value="123456" class="form-control" name="sua_pass" id="sua_pass" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            {{--đóng div trái--}}
            
            <div id="phai" class="col-6 d-inline-block float-right">
                <div class="form-group row">
                    <label for="sua_diachi" class="col-4 col-form-label font-weight-bold" >Địa chỉ</label>
                    <div class="col-sm-8">
                        <input type="textarea" class="form-control" name="sua_diachi" id="sua_diachi" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sua_doanhso" class="col-4 col-form-label font-weight-bold" >Doanh số</label>
                    <div class="col-sm-8">
                        <input readonly type="text" class="form-control" name="sua_doanhso" id="sua_doanhso" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-4 col-form-label font-weight-bold" for="sua_trangthai">Trạng thái</label>
                            <div class="col-sm-8">
                                <select name="sua_trangthai" class="custom-select mr-sm-2" id="sua_trangthai">
                                        <option value="Đang làm">Đang làm</option>
                                        <option value="Nghỉ làm">Nghỉ làm</option>
                                </select>
                            </div>
                </div>
                <div class="form-group row">
                    <label class="col-4 col-form-label font-weight-bold" for="sua_manguoiquanly">Mã người quản lý</label>
                    <div class="col-sm-8">
                    <select class="custom-select mr-sm-2" id="sua_manguoiquanly" name="sua_manguoiquanly">
                        <option value=""></option>
                        @foreach($listquanly as $item)
                        <option value="{{$item->ma_nhan_vien}}">{{$item->ho_ten."+".$item->cmnd}}</option>
                        @endforeach
                    </select>
                </div>
                </div>                               
                <div class="form-group row">
                        <label for="sua_ghichu" class="col-4 font-weight-bold">Ghi chú</label>
                        <textarea class="col-8 form-control" name="sua_ghichu" id="sua_ghichu" rows="6"></textarea>
                </div>  
                </div>            
                               
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right mb-3">
                <button type="submit" class="btn btn-success" id="btnLuusua">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuysua">Hủy bỏ</button>
            </div>
        </div>
        </form>
    </div>
</div>
{{--Thanh công cụ--}}

<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Nhân viên</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
            <div class="my-1 col-4 d-inline-block">

                    <select class="custom-select mr-sm-2" id="SelectForm">
                      <option selected value="hoten">Họ tên</option>
                      <option value="cmnd">CMND</option>
                      <option value="sodienthoai">Số điện thoại</option>
                      <option value="diachi">Địa chỉ</option>
                    </select>
            </div>
        <input type="text" class="form-control col-8 d-inline-block" id="timkiem" aria-describedby="emailHelp" placeholder="Tìm kiếm...">
        {{--<small id="emailHelp" class="form-text text-muted">Tìm kiếm theo tên nhóm hàng</small> --}}
    </div>
    <div id="buttondiv">
            <button type="button" class="btn btn-success" id="thembutton">Thêm mới</button>
            <button type="button" class="btn btn-warning" id="suabutton">Sửa</button>
            <button type="button" class="btn btn-danger" id="xoabutton">Xóa</button>
    </div>
</div>


<div id="tablediv">
<div id="result"></div>
<table id="main-table" class="table table-hover table-striped">
    <thead>
      <tr>
        <th scrope="col">
            <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
        </th>
        <th scope="col">Mã nhân viên</th>
        <th scope="col">Họ tên</th>
        <th scope="col">CMND</th>
        <th scope="col">Điện thoại</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">Email</th>
        <th scope="col">Doanh số</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Mã người quản lý</th>
        <th scope="col">Vai trò</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($list);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$list[$i]->ma_nhan_vien}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >{{$list[$i]->ma_nhan_vien}}</td>
        <td >{{$list[$i]->ho_ten}}</td>
        <td >{{$list[$i]->cmnd}}</td>
        <td >{{$list[$i]->dien_thoai}}</td>
        <td >{{$list[$i]->gioi_tinh}}</td>
        <td >{{$list[$i]->ngay_sinh}}</td>       
        <td >{{$list[$i]->email}}</td>  
        <td >{{$list[$i]->doanhso}}</td>
        <td >{{$list[$i]->trang_thai}}</td>
        <td >{{$list[$i]->ma_nguoi_quan_ly}}</td>
        <td >{{$list[$i]->ten_loai_tai_khoan}}</td>
        </tr>
    @endfor
    </tbody>
  </table>
</div>






@stop

@section('footer')
<script src="{{URL::asset('manager/nhanvien.js')}}"></script>
@stop
