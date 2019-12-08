@extends('layouts/admin/layout')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<link rel="stylesheet" href="{{URL::asset('manager/sanpham.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="popup-them" class="hide ScrollStyle" >
    <div id="errors"></div>
    <div id="popup-them-header">Thêm sản phẩm</div>
        <div id="popup-them-body" class="mr-5">
            <form id="form" method="post" data-route="{{route('sanpham.them')}}">
                @csrf
                        <div id="content-left" class="col-6 d-inline-block">
                                        <div class="form-group row">
                                            <label for="tenSanPhamThem" class="col-sm-5 col-form-label font-weight-bold" >Tên sản phẩm</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="tenSanPhamThem" id="tenSanPhamThem">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bold" for="loaiSanPham">Loại sản phẩm</label>
                                                <div class="col-sm-7">
                                                        <select name="loaiSanPhamThem" class="custom-select mr-sm-2" id="loaiSanPhamthem">
                                                            @foreach($listLoaiSanPham as $item)
                                                        <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bold" for="inlineFormCustomSelect">Trạng thái</label>
                                                <div class="col-sm-7">
                                                        <select name="trangthaithem" class="custom-select mr-sm-2" id="trangthaithem">
                                                                <option value="Có thể kinh doanh">Có thể kinh doanh</option>
                                                                <option value="Không kinh doanh">Không kinh doanh</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="file1Them" class="col-sm-5 col-form-label font-weight-bold">Hình ảnh 1</label>
                                            <input name="file1Them" type="file" class="form-control-file col-sm-7" id="file1Them">
                                        </div>

                                        <div class="form-group row">
                                                <label for="file2Them" class="col-sm-5 col-form-label font-weight-bold">Hình ảnh 2</label>
                                                <input name="file2Them" type="file" class="form-control-file col-sm-7" id="file2Them">
                                        </div>
                                        <div class="form-group row">
                                                <label for="file3Them" class="col-sm-5 col-form-label font-weight-bold">Hình ảnh 3</label>
                                                <input name="file3Them" type="file" class="form-control-file col-sm-7" id="file3Them">
                                        </div>
                        </div>


                        <div id="content-right" class="col-6 float-right">
                                        <div class="form-group row ml-4">
                                            <label for="giavonthem" class="col-sm-6 col-form-label font-weight-bold" >Giá vốn</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="giavonthem" id="giavonthem" >
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="giabanthem" class="col-sm-6 col-form-label font-weight-bold" >Giá bán</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="giabanthem" id="giabanthem">
                                            </div>
                                        </div>
                                        <div class="form-group row ml-4">
                                            <label for="tonkhothem" class="col-sm-6 col-form-label font-weight-bold">Tồn kho</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="tonkhothem" id="tonkhothem" >
                                            </div>
                                        </div>
                                        <div class="form-group row ml-5">
                                            <label for="textareathem" class="font-weight-bold">Nhập thông tin chi tiết của sản phẩm</label>
                                            <textarea name="textareathem" class="form-control" id="textareathem" rows="4" cols="25"></textarea>
                                        </div>
                        </div>

                         <div id="popup-body-button" class="float-right mb-3">
                            <button type="submit" class="btn btn-success" id="btnLuuThem">Lưu</button>
                            <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
                        </div>
            </form>
        </div>
</div>



</div>


<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Sản phẩm</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
            <div class="my-1 col-4 d-inline-block">

                    <select class="custom-select mr-sm-2" id="SelectForm">
                      <option selected value="tensanpham">Tên sản phẩm</option>
                      <option value="masanpham">Mã sản phẩm</option>
                      <option value="nhomhang">Nhóm hàng</option>
                      <option value="loaihang">Loại hàng</option>
                      <option value="trangthai">Trạng thái</option>
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
<table id="main-table" class="table table-hover table-striped">
    <thead>
      <tr>
        <th scrope="col">
            <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
        </th>
        <th scope="col">Mã sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Nhóm hàng</th>
        <th scope="col">Loại hàng</th>
        <th scope="col">Giá vốn</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Tồn kho</th>
        <th scope="col">Trạng thái</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($listSanPham);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$i}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td class="ma_san_pham">{{$listSanPham[$i]->ma_san_pham}}</td>
        <td class="hinh_anh">
            <img src="{{URL::asset($listSanPham[$i]->hinh_anh1)}}" height="80px">
        </td>
        <td class="ten_san_pham">{{$listSanPham[$i]->ten_san_pham}}</td>
        <td class="ten_nhom_hang">{{$listSanPham[$i]->ten_nhom_hang}}</td>
        <td class="ten_loai">{{$listSanPham[$i]->ten_loai}}</td>
        <td class="gia_von">{{number_format($listSanPham[$i]->gia_von)}}</td>
        <td class="gia_ban">{{number_format($listSanPham[$i]->gia_ban)}}</td>
        <td class="ton_kho">{{$listSanPham[$i]->ton_kho}}</td>
        <td class="trang_thai">{{$listSanPham[$i]->trang_thai}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/sanpham.js')}}"></script>
@stop

