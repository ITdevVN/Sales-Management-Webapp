@extends('layouts/admin/layout')

@section('head')
<link rel="stylesheet" href="{{URL::asset('manager/hanghoa_danhmuc.css')}}"/>
@stop

@section('body')
<div id="thanhcongcu">
    <h2>Hàng hóa</h2>
    <div id="buttondiv">
        <button type="button" class="btn btn-success thembutton">Thêm mới</button>
        <button type="button" class="btn btn-warning suabutton">Sửa</button>
        <button type="button" class="btn btn-danger xoabutton">Xóa</button>
    </div>
</div>

{{-- <div id="listsanphamdiv">
    @for($i=0;$i<count($hangHoaArray);$i++)
        <div class="sanphamdiv" id='{{$i}}'>

        </div>
    @endfor
</div> --}}
@stop
