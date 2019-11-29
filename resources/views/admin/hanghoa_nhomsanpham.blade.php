@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/hanghoa_nhomsanpham.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">

<div id="popup-them" class="hide">
    <div id="popup-them-header">Thêm nhóm hàng hóa</div>

        <div id="popup-them-body">
            <form>
                <div class="form-group">
                    <label for="tenNhomHang">Nhập tên nhóm hàng</label>
                    <input type="text" class="form-control" id="tenNhomHang" aria-describedby="emailHelp">
                </div>
            </form>
        </div>
        <div id="popup-body-button" class="float-right mb-3">
            <button type="button" class="btn btn-success btnLuu">Lưu</button>
            <button type="button" class="btn btn-danger btnHuy">Hủy bỏ</button>
        </div>

</div>
</br>
</br>
<div id="popup-sua" class="hide">
        <div id="popup-sua-header">Sửa nhóm hàng hóa</div>
        <div id="popup-sua-body">
                <form>
                    <div class="form-group">
                        <label for="tenNhomHang">Nhập tên nhóm hàng</label>
                        <input type="text" class="form-control" id="tenNhomHang" aria-describedby="emailHelp">
                          </div>
                </form>
            </div>
                <div id="popup-body-button" class="float-right mb-3">
                <button type="button" class="btn btn-success btnLuu">Lưu</button>
                <button type="button" class="btn btn-danger btnHuy">Hủy bỏ</button>
                </div>

    </div>
</div>


<div id="thanhcongcu">
    <div id="h2id">
        <h2>Nhóm hàng hóa</h2>
    </div>
        <div id="buttondiv">
            <button type="button" class="btn btn-success thembutton">Thêm mới</button>
            <button type="button" class="btn btn-warning suabutton">Sửa</button>
            <button type="button" class="btn btn-danger xoabutton">Xóa</button>
        </div>
</div>

<div id="tablediv">
<table class="table table-hover table-striped">
    <thead>
      <tr>
        <th scrope="col">
            <input type="checkbox" aria-label="Checkbox for following text input">
        </th>
        <th scope="col">ID</th>
        <th scope="col">Tên nhóm hàng</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($listNhomSanPham);$i++)
    <tr>
        <th>
        <input type="checkbox" aria-label="Checkbox for following text input">
        </th>
        <td>{{$listNhomSanPham[$i]->ma_nhom_hang}}</td>
        <td>{{$listNhomSanPham[$i]->ten_nhom_hang}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/hanghoa_nhomsanpham.js')}}"></script>
@stop
