@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/hanghoa_nhomsanpham.css')}}"/>
@stop

@section('body')
<div id="background-popup" class="hide d-flex align-items-center justify-content-center">

{{-- Các popup Thêm,Sửa --}}
<div id="popup-them" class="hide">
    <div id="popup-them-header">Thêm nhóm hàng hóa</div>

        <div id="popup-them-body">
            <form>
                <div class="form-group">
                    <label for="tenNhomHangthem">Nhập tên nhóm hàng</label>
                    <input type="text" class="form-control" id="tenNhomHangthem" aria-describedby="emailHelp">
                </div>
            </form>
        </div>
        <div id="popup-body-button" class="float-right mb-3">
            <button type="button" class="btn btn-success" id="btnLuuThem">Lưu</button>
            <button type="button" class="btn btn-danger" id="btnHuyThem">Hủy bỏ</button>
        </div>

</div>
<br>
<br>
<div id="popup-sua" class="hide">
        <div id="popup-sua-header">Sửa nhóm hàng hóa</div>
        <div id="popup-sua-body">
                <form>
                    <div class="form-group">
                        <label for="maNhomHangsua">Mã nhóm hàng</label>
                        <input type="text" disabled class="form-control" id="maNhomHangsua" aria-describedby="emailHelp">
                        <label for="tenNhomHangsua">Tên nhóm hàng</label>
                        <input type="text" class="form-control" id="tenNhomHangsua" aria-describedby="emailHelp">
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
        <h2 class="mr-5">Nhóm hàng hóa</h2>
    </div>
    <div class="form-group input-group-text col-lg-6 d-inline-block mr-5">
        <input type="text" class="form-control" id="timkiem" aria-describedby="emailHelp" placeholder="Tìm kiếm...">
        <small id="emailHelp" class="form-text text-muted">Tìm kiếm theo tên nhóm hàng</small>
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
        <th scope="col">ID</th>
        <th scope="col">Tên nhóm hàng</th>
      </tr>
    </thead>
    <tbody>
    @for($i=0;$i<count($listNhomSanPham);$i++)
    <tr>
        <th>
        <input type="checkbox" id="check{{$i}}" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td class="ma_nhom_hang">{{$listNhomSanPham[$i]->ma_nhom_hang}}</td>
        <td class="ten_nhom_hang">{{$listNhomSanPham[$i]->ten_nhom_hang}}</td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop

@section('footer')
<script src="{{URL::asset('manager/hanghoa_nhomsanpham.js')}}"></script>
@stop

{{-- @section('script')
    <script>
        $(document).ready(function(){
            $('#btnLuuThem').click(function(){
            var tenNhomHang=$('#tenNhomHangthem').val(); //lấy giá trị từ textbox người dùng nhập
           // $('#tenNhomHangthem').val(""); //trả giá trị về null cho textbox
            alert("Luu");
            $('#background-popup').addClass('hide'); //ẩn cửa sổ thêm
            $('#popup-them').addClass('hide'); //ẩn cửa sổ thêm
            $.ajax({ //ajax đưa đến controller
                type:"GET",
                url:'nhomsanpham/them',
                data:{'tenNhomHang':tenNhomHang}
            }).done(function(res){
                $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res);
            })
        })
        });
    </script>
@endsection --}}
