<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HoaDon_choxulyController extends Controller
{
    public function hienThiDanhSachHoaDon(){
        $list=DB::select('call hienThiDanhSachHoaDonChoXuLy()');
        return view('admin/hoadon_choxuly',['list'=>$list]);
    }

    public function xuLyChoXuLy_DangGiaoHang(Request $request){
        DB::select('call xuLyChoXuLy_DangGiaoHang(?)',array($request->mahd));
        return redirect()->back();
    }

    public function xuLyHuyDonHang(Request $request){
        DB::select('call xuLyHuyDonHang(?)',array($request->mahd));
        return redirect()->back();
    }
}
