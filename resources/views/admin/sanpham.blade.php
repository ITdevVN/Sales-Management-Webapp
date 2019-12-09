@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/sanpham.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="messagethem" ></div>
<div id="popup-them" class="hide w-75">
    <div id="messagethem"></div>
    <div id="popup-them-header">Thêm sản phẩm</div>
        <form id="formthem" data-route="{{route('sanpham.them')}}" method="POST">
            @csrf
            <div id="popup-them-body">
                <div class="col-6 d-inline-block">
                <div class="form-group row">
                    <label for="them_tensanpham" class="col-4 col-form-label font-weight-bold" >Tên sản phẩm</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="them_tensanpham" id="them_tensanpham" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                        <label class="font-weight-bold col-4" for="them_maloai">Loại sản phẩm</label>
                        <div class="col-8">
                        <select class="custom-select mr-sm-2" id="them_maloai" name="them_maloai">
                            @foreach($listLoaiSanPham as $item)
                            <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                            @endforeach
                        </select>
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-4 font-weight-bold" for="them_trangthai">Trạng thái</label>
                            <div class="col-8">
                                <select name="them_trangthai" class="custom-select mr-sm-2" id="them_trangthai">
                                        <option value="Có thể kinh doanh">Có thể kinh doanh</option>
                                        <option value="Không kinh doanh">Không kinh doanh</option>
                                </select>
                            </div>
                </div>
                <div class="custom-file form-group row" >
                        <input type="file" class="custom-file-input" name="them_file1" id="them_file1">
                        <label class="custom-file-label" for="customFile">Hình ảnh 1</label>
                    </div>
                <br>
                <br>
                <div class="custom-file form-group row" >
                    <input type="file" class="custom-file-input" name="them_file2" id="them_file2">
                    <label class="custom-file-label" for="customFile">Hình ảnh 2</label>
                </div>
            <br>
            <br>
                <div class="custom-file form-group row" >
                        <input type="file" class="custom-file-input" name="them_file3" id="them_file3">
                        <label class="custom-file-label" for="customFile">Hình ảnh 3</label>
                </div>


            </div>
            {{-- Đóng div bên trái --}}
            <div class="col-6 float-right">

                <div class="form-group row">
                    <label for="them_giavon" class="col-4 col-form-label font-weight-bold">Giá vốn</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="them_giavon" id="them_giavon" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="them_giaban" class="col-4 col-form-label font-weight-bold">Giá bán</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="them_giaban" id="them_giaban" aria-describedby="emailHelp">
                        </div>
                </div>
                <div class="form-group row">
                        <label for="them_tonkho" class="col-4 col-form-label font-weight-bold">Tồn kho</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="them_tonkho" id="them_tonkho" aria-describedby="emailHelp">
                        </div>
                </div>
                <div class="form-group row">
                        <label for="them_chitietsanpham" class="font-weight-bold">Chi tiết sản phẩm</label>
                        <textarea class="form-control" name="them_chitietsanpham" id="them_chitietsanpham" rows="4"></textarea>
                </div>
            </div>
            {{-- Đóng div bên phải --}}
            </div>
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right  mb-3 mt-2">
                <button type="submit" class="btn btn-success" id="btnLuuThem">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
            </div>

        </form>
    </div>

    <div id="messagesua"></div>
    <div id="popup-sua" class="hide w-75">
            <div id="messagesua"></div>
            <div id="popup-sua-header">Thêm sản phẩm</div>
                <form id="formsua" data-route="{{route('sanpham.sua')}}" method="POST">
                    @csrf
                    <div id="popup-sua-body">
                        <div class="col-6 d-inline-block">
                                <div class="form-group row">
                                        <label for="sua_masanpham" class="col-4 col-form-label font-weight-bold" >Mã sản phẩm</label>
                                        <div class="col-sm-7">
                                            <input readonly type="text" class="form-control" name="sua_masanpham" id="sua_masanpham" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                        <div class="form-group row">
                            <label for="sua_tensanpham" class="col-4 col-form-label font-weight-bold" >Tên sản phẩm</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="sua_tensanpham" id="sua_tensanpham" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="font-weight-bold col-4" for="sua_maloai">Loại sản phẩm</label>
                                <div class="col-8">
                                <select class="custom-select mr-sm-2" id="sua_maloai" name="sua_maloai">
                                    @foreach($listLoaiSanPham as $item)
                                    <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-4 font-weight-bold" for="sua_trangthai">Trạng thái</label>
                                    <div class="col-8">
                                        <select name="sua_trangthai" class="custom-select mr-sm-2" id="sua_trangthai">
                                                <option value="Được phép kinh doanh">Được phép kinh doanh</option>
                                                <option value="Không kinh doanh">Không kinh doanh</option>
                                        </select>
                                    </div>
                        </div>
                        <div class="custom-file form-group row" >
                                <input type="file" class="custom-file-input" name="sua_file1" id="sua_file1">
                                <label class="custom-file-label" for="customFile">Hình ảnh 1</label>
                            </div>
                            <br>
                <br>
                        <div class="custom-file form-group row" >
                            <input type="file" class="custom-file-input" name="sua_file2" id="sua_file2">
                            <label class="custom-file-label" for="customFile">Hình ảnh 2</label>
                        </div>
                        <br>
                <br>
                        <div class="custom-file form-group row" >
                                <input type="file" class="custom-file-input" name="sua_file3" id="sua_file3">
                                <label class="custom-file-label" for="customFile">Hình ảnh 3</label>
                        </div>


                    </div>
                    {{-- Đóng div bên trái --}}
                    <div class="col-6 float-right">

                        <div class="form-group row">
                            <label for="sua_giavon" class="col-4 col-form-label font-weight-bold">Giá vốn</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sua_giavon" id="sua_giavon" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="sua_giaban" class="col-4 col-form-label font-weight-bold">Giá bán</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sua_giaban" id="sua_giaban" aria-describedby="emailHelp">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="sua_tonkho" class="col-4 col-form-label font-weight-bold">Tồn kho</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sua_tonkho" id="sua_tonkho" aria-describedby="emailHelp">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="sua_chitietsanpham" class="font-weight-bold">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="sua_chitietsanpham" id="sua_chitietsanpham" rows="6"></textarea>
                        </div>
                    </div>
                    {{-- Đóng div bên phải --}}
                    </div>
                    {{-- Đóng thẻ div của body --}}
                    <div id="popup-body-button" class="float-right mb-3 mt-2">
                        <button type="submit" class="btn btn-success" id="btnLuusua">Lưu</button>
                        <button type="button" class="btn btn-danger" id="btnHuysua">Hủy bỏ</button>
                    </div>

                </form>
            </div>

</div>



<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Sản phẩm</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
            <div class="my-1 col-4 d-inline-block">

                    <select class="custom-select mr-sm-2" id="SelectForm">
                      <option selected value="tennhacungcap">Tên sản phẩm</option>
                      <option value="manhacungcap">Mã khuyến mãi</option>
                      <option value="sodienthoai">Nội dung</option>
                      <option value="email">Tỉ lệ</option>
                      <option value="diachi">Tên nhóm hàng</option>
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
<div id="result"></div>
<table id="main-table" class="table table-hover table-striped">
    <thead>
      <tr>
        <th scrope="col">
            <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
        </th>
        <th scope="col">Mã sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá vốn</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Tồn kho</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Loại sản phẩm</th>
        <th scope="col">Nhóm hàng</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($list);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$list[$i]->ma_san_pham}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >{{$list[$i]->ma_san_pham}}</td>
        <td ><img src="{{URL::asset($list[$i]->hinh_anh1)}}" height="80px"/></td>
        <td >{{$list[$i]->ten_san_pham}}</td>
        <td >{{$list[$i]->gia_von}}</td>
        <td >{{$list[$i]->gia_ban}}</td>
        <td >{{$list[$i]->ton_kho}}</td>
        <td >{{$list[$i]->trang_thai}}</td>
        <td >{{$list[$i]->ten_loai}}</td>
        <td >{{$list[$i]->ten_nhom_hang}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/sanpham.js')}}"></script>
@stop

