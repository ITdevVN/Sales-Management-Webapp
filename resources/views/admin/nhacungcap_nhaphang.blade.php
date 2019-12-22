@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/nhacungcap_nhaphang.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="popup-them" class="hide">

    <div id="popup-them-header">Thêm nhà cung cấp</div>
        <div id="popup-them-body">
        <form id="form">
                @csrf
                <div class="form-group row">
                    <label for="tenNhaCungCapThem" class="col-sm-5 col-form-label" >Tên nhà cung cấp</label>
                    <div class="col-sm-7">
                        <input required type="text" class="form-control" name="tenNhaCungCapThem" id="tenNhaCungCapThem" aria-describedby="emailHelp">
                        <div class="valid-feedback">Vui lòng nhập tên nhà cung cấp </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sodienthoaiThem" class="col-sm-5 col-form-label" >Số điện thoại</label>
                    <div class="col-sm-7">
                        <input type="tel" class="form-control" name="sodienthoaiThem" id="sodienthoaiThem" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailThem" class="col-sm-5 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" name="emailThem" id="emailThem" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="diachiThem" class="col-sm-5 col-form-label">Địa chỉ</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="diaChiThem" id="diaChiThem" aria-describedby="emailHelp">
                    </div>
                </div>

            </form>
        </div>
        <div id="popup-body-button" class="float-right mb-3">
                <button type="button" class="btn btn-success" id="btnLuuThem">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
            </div>


</div>
</br>
</br>
<div id="popup-sua" class="hide">
    <div id="popup-sua-header">Sửa thông tin nhà cung cấp</div>

        <div id="popup-sua-body">
            <form>
                    <div class="form-group row">
                            <label for="maNhaCungCapSua" class="col-sm-5 col-form-label" >Mã nhà cung cấp</label>
                            <div class="col-sm-7">
                            <input disabled type="text" class="form-control" id="maNhaCungCapSua" aria-describedby="emailHelp">
                            </div>
                        </div>
                <div class="form-group row">
                    <label for="tenNhaCungCapSua" class="col-sm-5 col-form-label" >Tên nhà cung cấp</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="tenNhaCungCapSua" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sodienthoaiSua" class="col-sm-5 col-form-label" >Số điện thoại</label>
                    <div class="col-sm-7">
                    <input type="tel" class="form-control" id="sodienthoaiSua" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailSua" class="col-sm-5 col-form-label">Email</label>
                    <div class="col-sm-7">
                    <input type="email" class="form-control" id="emailSua" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="diachiSua" class="col-sm-5 col-form-label">Địa chỉ</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="diachiSua" aria-describedby="emailHelp">
                    </div>
                </div>
            </form>
        </div>
        <div id="popup-body-button" class="float-right mb-3">
            <button type="button" class="btn btn-success" id="btnLuuSua">Lưu</button>
            <button type="button" class="btn btn-danger" id="btnHuySua">Hủy bỏ</button>
        </div>

</div>

</div>


<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Nhà cung cấp</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
            <div class="my-1 col-4 d-inline-block">

                    <select class="custom-select mr-sm-2" id="SelectForm">
                      <option selected value="tennhacungcap">Tên nhà cung cấp</option>
                      <option value="manhacungcap">Mã nhà cung cấp</option>
                      <option value="sodienthoai">Số điện thoại</option>
                      <option value="email">Email</option>
                      <option value="diachi">Địa chỉ</option>
                    </select>
            </div>
        <input type="text" class="form-control col-8 d-inline-block" id="timkiem" aria-describedby="emailHelp" placeholder="Tìm kiếm...">
        {{-- <small id="emailHelp" class="form-text text-muted">Tìm kiếm theo tên nhóm hàng</small> --}}
    </div>
    <div id="buttondiv">
            <button type="button" class="btn btn-success" id="thembutton">Thêm mới</button>
            <button type="button" class="btn btn-warning" id="suabutton">Sửa</button>
            <button type="button" class="btn btn-danger" id="xoabutton">Xóa</button>
    </div>
</div>


<div id="tablediv">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
<table id="main-table" class="table table-hover table-striped">
    <thead>
      <tr>
        <th scrope="col">
            <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
        </th>
        <th scope="col">Mã nhà cung cấp</th>
        <th scope="col">Tên nhà cung cấp</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tổng mua</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($listNhaCungCap);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$i}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td class="ma_nha_cung_cap">{{$listNhaCungCap[$i]->ma_nha_cung_cap}}</td>
        <td class="ten_nha_cung_cap">{{$listNhaCungCap[$i]->ten_nha_cung_cap}}</td>
        <td class="so_dien_thoai">{{$listNhaCungCap[$i]->so_dien_thoai}}</td>
        <td class="email">{{$listNhaCungCap[$i]->email}}</td>
        <td class="dia_chi">{{$listNhaCungCap[$i]->dia_chi}}</td>
        <td class="tong_mua">{{$listNhaCungCap[$i]->tong_mua}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/nhacungcap_nhaphang.js')}}"></script>
@stop

