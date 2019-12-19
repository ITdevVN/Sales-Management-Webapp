<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HoaDon_danggiaoController extends Controller
{
    public function hienThiDanhSachHoaDon(){
        $list=DB::select('call hienThiDanhSachHoaDonDangGiao()');
        return view('admin/hoadon_danggiao',['list'=>$list]);
    }

    public function xuLyDangGiaoHang_ThanhToan(Request $request){
        DB::select('call xuLyDangGiaoHang_ThanhToan(?)',array($request->mahd));
        return redirect()->back();
    }

    public function xuLyHuyDonHang(Request $request){
        DB::select('call xuLyHuyDonHang(?)',array($request->mahd));
        return redirect()->back();
    }
}
