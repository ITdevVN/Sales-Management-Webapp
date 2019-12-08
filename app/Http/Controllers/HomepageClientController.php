<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomepageClientController extends Controller
{
    public function hienThiTopSanPhamBanChay(){
        //Xử lý hiển thị top các sản phẩm bán chạy
        $listSanPhamBanChay=DB::select('call hienThiSanPhamBanChay(?)',array(10));
        return view('client/homepage',['listSanPhamBanChay'=>$listSanPhamBanChay]);
    }

    public function layChiTietSanPham(Request $request){
        $ChiTietSanPham=DB::select('call hienThiSanPhamTheoID(?)',array($request->ma_san_pham));
        return response()->json([
            'ma_san_pham' => $ChiTietSanPham[0]->ma_san_pham,
            'hinh_anh1' =>$ChiTietSanPham[0]->hinh_anh1,
            'hinh_anh2'=>$ChiTietSanPham[0]->hinh_anh2,
            'hinh_anh3'=>$ChiTietSanPham[0]->hinh_anh3,
            'ten_san_pham'=>$ChiTietSanPham[0]->ten_san_pham,
            'ten_nhom_hang'=>$ChiTietSanPham[0]->ten_nhom_hang,
            'ten_loai'=>$ChiTietSanPham[0]->ten_loai,
            'gia_von'=>number_format($ChiTietSanPham[0]->gia_von),
            'gia_ban'=>number_format($ChiTietSanPham[0]->gia_ban),
            'ton_kho'=>$ChiTietSanPham[0]->ton_kho,
            'trang_thai'=>$ChiTietSanPham[0]->trang_thai,
            'thong_tin_san_pham'=>$ChiTietSanPham[0]->thong_tin_san_pham
        ]);
    }


}
