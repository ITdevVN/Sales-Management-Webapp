@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/hanghoa_nhomsanpham.css')}}"/>
@stop

@section('body')

<div id="thanhcongcu">
    <div id="h2id">
        <h2>Nhóm hàng hóa</h2>
    </div>
        <div id="buttondiv">
            <button type="button" class="btn btn-success thembutton">Thêm mới</button>
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
        <th scope="col">Chỉnh sửa</th>
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
        <td>
            <button type="button" class="btn btn-warning suabutton">Sửa</button>
        </td>
    </tr>
    @endfor
    </tbody>
  </table>
</div>

@stop
