@extends('layouts/admin/layout')
@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/khachhang.css')}}"/>
@stop


{{-- thêm khách hàng --}}


@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="messagethem" ></div>
<div id="popup-them" class="hide">
    <div id="messagethem"></div>
    <div id="popup-them-header">Thêm khách hàng</div>
        <form id="formthem" data-route="{{route('khachhang.them')}}" method="POST">
            @csrf
            <div id="popup-them-body">
                <div id="trai" class="col-6 d-inline-block">
                <div class="form-group row">
                    <label for="them_tenkhachhang" class="col-4 col-form-label font-weight-bold" >Tên khách hàng</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="them_tenkhachhang" id="them_tenkhachhang" aria-describedby="emailHelp">
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
                                        <option value="Đang làm">Đã thanh toán</option>
                                        <option value="Nghỉ làm">Chưa thanh toán</option>
                                </select>
                            </div>
                </div>
                     
                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="them_loaikhachhang">Loại khách hàng</label>
                            <div class="col-sm-8">
                                <select name="them_loaikhachhang" class="custom-select mr-sm-2" id="them_loaikhachhang">
                                     @foreach($listloaikhachhang as $item)
                        <option value="{{$item->ma_loai_khach_hang}}">{{$item->ten_loai}}</option>
                        @endforeach   
                                </select>
                            </div>
                </div> 

                <div class="form-group row">
                        <label for="them_ghichu" class="col-4 font-weight-bold">Ghi chú</label>
                        <textarea class="col-8 form-control" name="them_ghichu" id="them_ghichu" rows="6"></textarea>
                </div>  
                </div>       {{--đóng div phải--}}     
                               
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right mb-3">
                <button type="submit" class="btn btn-success" id="btnLuuThem">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
            </div>
        </div>
        </form>
    </div>

{{--Sửa khách hàng--}}

<div id="popup-sua" class="hide">
    <div id="messagesua"></div>
    <div id="popup-sua-header">Thêm khách hàng</div>
        <form id="formsua" data-route="{{route('khachhang.sua')}}" method="POST">
            @csrf
            <div id="popup-sua-body">
                <div id="trai" class="col-6 d-inline-block">

                 <div class="form-group row">
                    <label for="sua_makhachhang" class="col-4 col-form-label font-weight-bold" >Mã khách hàng</label>
                    <div class="col-sm-8">
                        <input readonly type="text" class="form-control" name="sua_makhachhang" id="sua_makhachhang" aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sua_tenkhachhang" class="col-4 col-form-label font-weight-bold" >Tên khách hàng</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sua_tenkhachhang" id="sua_tenkhachhang" aria-describedby="emailHelp">
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

                

                <div class="form-group row">
                    <label for="sua_doanhso" class="col-4 col-form-label font-weight-bold">Doanh số</label>
                    <div class="col-sm-8">
                        <input readonly type="number" class="form-control" name="sua_doanhso" id="sua_doanhso" aria-describedby="emailHelp">
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
                        <label class="col-4 col-form-label font-weight-bold" for="sua_trangthai">Trạng thái</label>
                            <div class="col-sm-8">
                                <select name="sua_trangthai" class="custom-select mr-sm-2" id="sua_trangthai">
                                        <option value="Đang làm">Đã thanh toán</option>
                                        <option value="Nghỉ làm">Chưa thanh toán</option>
                                </select>
                            </div>
                </div>
                     
                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="sua_loaikhachhang">Loại khách hàng</label>
                            <div class="col-sm-8">
                                <select name="sua_loaikhachhang" class="custom-select mr-sm-2" id="sua_loaikhachhang">
                                     @foreach($listloaikhachhang as $item)
                        <option value="{{$item->ma_loai_khach_hang}}">{{$item->ten_loai}}</option>
                        @endforeach   
                                </select>
                            </div>
                </div> 

                <div class="form-group row">
                        <label for="sua_ghichu" class="col-4 font-weight-bold">Ghi chú</label>
                        <textarea class="col-8 form-control" name="sua_ghichu" id="sua_ghichu" rows="6"></textarea>
                </div>  
                </div>       {{--đóng div phải--}}     
                               
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right mb-3">
                <button type="submit" class="btn btn-success" id="btnLuusua">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuysua">Hủy bỏ</button>
            </div>
        </div>
        </form>
    </div>






</div>







{{--thanh công cụ--}}



<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Khách hàng</h2>
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
        <th scope="col">Mã khách hàng</th>
        <th scope="col">Họ tên</th>
        <th scope="col">CMND</th>
        <th scope="col">Điện thoại</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Ngày sinh</th>        
        <th scope="col">Ghi chú</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Loại khách hàng</th>
        <th scope="col">Doanh số</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($list);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$list[$i]->ma_khach_hang}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >{{$list[$i]->ma_khach_hang}}</td>
        <td >{{$list[$i]->ho_ten}}</td>
        <td >{{$list[$i]->cmnd}}</td>
        <td >{{$list[$i]->dien_thoai}}</td>
        <td >{{$list[$i]->gioi_tinh}}</td>
        <td >{{$list[$i]->ngay_sinh}}</td>  
        <td >{{$list[$i]->ghi_chu}}</td> 
        <td >{{$list[$i]->trang_thai}}</td>
        <td >{{$list[$i]->ten_loai}}</td>
        <td >{{$list[$i]->doanhso}}</td>
        </tr>
    @endfor
    </tbody>
  </table>
</div>


 


@stop

@section('footer')
<script src="{{URL::asset('manager/khachhang.js')}}"></script>
@stop
