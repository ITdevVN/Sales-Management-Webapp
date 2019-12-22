<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomepageClientController extends Controller
{
    public function hienThiTopSanPhamBanChay(Request $request){
        //Xử lý hiển thị top các sản phẩm bán chạy
        $listKhuyenMai=DB::select('call hienThiDanhSachKhuyenMai()',array());
        $listSanPhamBanChay=DB::select('call hienThiSanPhamBanChay(?)',array(20));
        $listSanPhamMoiNhapVe=DB::select('call hienThiSanPhamMoiNhapve(?)',array(20));
        //Hiển thị list giỏ hàng của khách hàng tương ứng
        $listGioHang=DB::select('call hienThiDonHangOnlineChuaThanhToan(?)',array($request->session()->get('ma_nhan_vien')));
        $tienKhachHangCanThanhToan=DB::select('call hienThiSoTienCanThanhToanCuaKhachHang(?)',array($request->session()->get('ma_nhan_vien')));
        return view('client/homepage',['listKhuyenMai'=>$listKhuyenMai,'listSanPhamMoiNhapVe'=>$listSanPhamMoiNhapVe,'listSanPhamBanChay'=>$listSanPhamBanChay,'listGioHang'=>$listGioHang,'tienKhachHangCanThanhToan'=>$tienKhachHangCanThanhToan]);
    }

    public function hienThiTopSanPhamBanChay_chuaDangNhap(){
        $listSanPhamBanChay=DB::select('call hienThiSanPhamBanChay(?)',array(20));
        return view('client/homepageChuaDangNhap',['listSanPhamBanChay'=>$listSanPhamBanChay]);
    }

    public function dangxuat(Request $request){
        $request->session()->flush();
        return redirect()->route('Client.Homepage');
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
            'thong_tin_san_pham'=>$ChiTietSanPham[0]->thong_tin_san_pham,
            'gia_sau_khi_giam'=>$ChiTietSanPham[0]->gia_sau_khi_giam
        ]);
    }

    public function hienThiChiTietSanPham(){
        return view('client/full-view');
    }

    // public function luuSanPhamKhachHangChonXuongHoaDon(Request $request){
    //     DB::select('call datHangOnline(?,?,?)',array($request->makh,$request->masp,$request->sl));
    //     return redirect()->back();
    // }

    public function xuLyKhachHangNhanThanhToanDonHang(Request $request){
        DB::select('call xuLyKhachHangNhanThanhToanDonHang(?)',array($request->makh));
        return redirect()->route('Client.Homepage')->with('success', 'Đặt hàng thành công');
    }

    // public function xoaSanPham(Request $request){
    //     DB::select('call huySanPhamTuChiTietDatHang(?,?)',array($request->masp,$request->makh));
    //     return redirect()->back();
    // }

}
