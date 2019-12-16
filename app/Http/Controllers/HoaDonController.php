<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HoaDonController extends Controller
{
    public function hienThiDanhSachHoaDon(){
        $list=DB::select('call hienThiDanhSachHoaDon()');
        return view('admin/hoadon',['list'=>$list]);
    }
}
