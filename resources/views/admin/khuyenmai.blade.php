@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/khuyenmai.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">
{{-- Các popup Thêm,Sửa --}}
<div id="messagethem" ></div>
<div id="popup-them" class="hide">
    <div id="messagethem"></div>
    <div id="popup-them-header">Thêm chương trình khuyến mãi</div>
        <form id="formthem" data-route="{{route('khuyenmai.them')}}" method="POST">
            @csrf
            <div id="popup-them-body">
                <div class="form-group row">
                    <label for="them_tenkhuyenmai" class="col-form-label font-weight-bold" >Tên khuyến mãi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="them_tenkhuyenmai" id="them_tenkhuyenmai" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="them_noidung" class="font-weight-bold">Nội dung</label>
                        <textarea class="form-control" name="them_noidung" id="them_noidung" rows="3"></textarea>
                      </div>
                <div class="form-group row">
                    <label for="them_batdau" class="col-form-label font-weight-bold">Ngày bắt đầu</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" name="them_batdau" id="them_batdau" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="them_ngayketthuc" class="col-form-label font-weight-bold">Ngày kết thúc</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" name="them_ngayketthuc" id="them_ngayketthuc" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="them_tile" class="col-form-label font-weight-bold">Tỉ lệ khuyến mãi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="them_tile" id="them_tile" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="font-weight-bold" for="them_maloai">Loại sản phẩm</label>
                    <select class="custom-select mr-sm-2" id="them_maloai" name="them_maloai">
                        @foreach($listLoaiSanPham as $item)
                        <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="custom-file form-group row" >
                    <input type="file" class="custom-file-input" name="them_file" id="them_file">
                    <label class="custom-file-label" for="customFile">Chọn tệp hình ảnh</label>
                </div>
            </div>
            {{-- Đóng thẻ div của body --}}
            <div id="popup-body-button" class="float-right mb-3">
                <button type="submit" class="btn btn-success" id="btnLuuThem">Lưu</button>
                <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
            </div>

        </form>
    </div>

    <div id="messagesua"></div>
    <div id="popup-sua" class="hide">
            <div id="popup-sua-header">Sửa thông tin chương trình khuyến mãi</div>
                <form id="formsua" data-route="{{route('khuyenmai.sua')}}" method="POST">
                    @csrf
                    <div id="popup-sua-body">
                        <div class="form-group row">
                                    <label for="sua_makhuyenmai" class="col-form-label font-weight-bold" >Mã khuyến mãi</label>
                                    <div class="col-sm-7">
                                        <input readonly type="text" class="form-control" name="sua_makhuyenmai" id="sua_makhuyenmai" aria-describedby="emailHelp">
                                    </div>
                                </div>
                        <div class="form-group row">
                            <label for="sua_tenkhuyenmai" class="col-form-label font-weight-bold" >Tên khuyến mãi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="sua_tenkhuyenmai" id="sua_tenkhuyenmai" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="sua_noidung" class="font-weight-bold">Nội dung</label>
                                <textarea class="form-control" name="sua_noidung" id="sua_noidung" rows="3"></textarea>
                              </div>
                        <div class="form-group row">
                            <label for="sua_batdau" class="col-form-label">Ngày bắt đầu</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="sua_batdau" id="sua_batdau" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sua_ngayketthuc" class="col-form-label">Ngày kết thúc</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="sua_ngayketthuc" id="sua_ngayketthuc" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sua_tile" class="col-form-label">Tỉ lệ khuyến mãi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="sua_tile" id="sua_tile" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="font-weight-bold" for="inlineFormCustomSelect">Loại sản phẩm</label>
                            <select class="custom-select mr-sm-2" id="sua_maloai" name="sua_maloai">
                                @foreach($listLoaiSanPham as $item)
                                <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-file form-group row" >
                            <input type="file" class="custom-file-input" name="sua_file" id="sua_file">
                            <label class="custom-file-label" for="customFile">Chọn tệp hình ảnh</label>
                        </div>
                    </div>
                    {{-- Đóng thẻ div của body --}}
                    <div id="popup-body-button" class="float-right mb-3">
                        <button type="submit" class="btn btn-success" id="btnLuusua">Lưu</button>
                        <button type="button" class="btn btn-danger" id="btnHuysua">Hủy bỏ</button>
                    </div>

                </form>
    </div>


</div>



<div id="thanhcongcu" class="d-flex align-items-center justify-content-center">
    <div class="d-inline-block ">
        <h2 class="mr-5">Khuyến mãi</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
            <div class="my-1 col-4 d-inline-block">

                    <select class="custom-select mr-sm-2" id="SelectForm">
                      <option selected value="tenkhuyenmai">Tên khuyến mãi</option>
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
        <th scope="col">Mã khuyến mãi</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Tên khuyến mãi</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Bắt đầu</th>
        <th scope="col">Kết thúc</th>
        <th scope="col">Tỉ lệ</th>
        <th scope="col">Tên loại sản phẩm</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($list);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$list[$i]->ma_khuyen_mai}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >{{$list[$i]->ma_khuyen_mai}}</td>
        <td ><img src="{{URL::asset($list[$i]->hinh_anh)}}" height="80px"/></td>
        <td >{{$list[$i]->ten_khuyen_mai}}</td>
        <td >{{$list[$i]->noi_dung}}</td>
        <td >{{$list[$i]->bat_dau}}</td>
        <td >{{$list[$i]->ket_thuc}}</td>
        <td >{{$list[$i]->ti_le_khuyen_mai}}</td>
        <td >{{$list[$i]->ten_loai}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/khuyenmai.js')}}"></script>
@stop

