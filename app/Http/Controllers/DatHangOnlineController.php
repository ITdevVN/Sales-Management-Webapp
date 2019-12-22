<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class DatHangOnlineController extends Controller
{
    public function datHangOnline(Request $request){
        DB::select('call datHangOnline(?,?,?)',array($request->makh,$request->masp,$request->soluong));

        $listGioHang=DB::select('call hienThiDonHangOnlineChuaThanhToan(?)',array($request->makh));
        $tienKhachHangCanThanhToan=DB::select('call hienThiSoTienCanThanhToanCuaKhachHang(?)',array($request->makh));

        if (count($listGioHang)>=1)
        $output[0] ='
						<p class="cart-content-long">'.count($listGioHang).' sản phẩm - </p>
                        <p class="highlighted">'.number_format($tienKhachHangCanThanhToan[0]->khach_can_tra).' VND</p>
        ';
        else
        $output[0] ='
						<p class="cart-content-long">0 sản phẩm - </p>
                        <p class="highlighted">0 VND</p>
        ';
        $output[1]='';
        if (count($listGioHang)>=1){
            for($i=0;$i<count($listGioHang);$i++){
        $output[1] .='

        <!-- CART ITEM -->
        <li class="item clearfix">
            <div class="picture">
                <figure class="liquid">
                    <img src="http://localhost:82/DoAnWeb/public/'.$listGioHang[$i]->hinh_anh1.'" alt="product1">
                </figure>
            </div>
            <div class="description">
                <p class="highlighted category">'.$listGioHang[$i]->ten_loai.'</p>
                <h6>'.$listGioHang[$i]->ten_san_pham.'</h6>
            </div>
            <div class="quantity">
                <h6>'.$listGioHang[$i]->so_luong.'</h6>
            </div>
            <div class="price">
                <p class="highlighted">'.number_format($listGioHang[$i]->thanh_tien+$listGioHang[$i]->so_tien_giam).'</p>
            </div>
            <a class="button-remove" id="masanpham'.$listGioHang[$i]->ma_san_pham.'"><img src="http://localhost:82/DoAnWeb/public/client/images/items/remove.png" alt="remove"></a>
        </li>
        <!-- /CART ITEM -->
        ';
            }
        $output[1] .='<!-- TOTAL -->
        <li class="total clearfix">
            <div>
                <h6>'.number_format($tienKhachHangCanThanhToan[0]->tong_tien_hang).'</h6>
                <h6>'.number_format($tienKhachHangCanThanhToan[0]->so_tien_giam).'</h6>
                <h6>0</h6>
                <p class="highlighted">'.number_format($tienKhachHangCanThanhToan[0]->khach_can_tra).'</p>
            </div>
            <div>
                <h6>Tạm tính</h6>
                <h6>Tiền giảm</h6>
                <h6>Phí vận chuyển</h6>
                <h6>Thành tiền</h6>
            </div>
        </li>
        <!-- /TOTAL -->
        <!-- ORDER -->
        <li class="order clearfix">
            <a id="thanhtoan-client" href="checkout.html" class="button">Thanh toán</a>
            <a href="cart.html" class="button secondary">Chi tiết</a>
        </li>
        <!-- /ORDER -->
        ';
        }else{
        $output[1]='
        <li class="order clearfix">
            <a id="thanhtoan-client" href="checkout.html" class="button">Thanh toán</a>
            <a href="cart.html" class="button secondary">Chi tiết</a>
        </li>
        ';
    }
        return $output;

    }

    public function xoaSanPham(Request $request){
        DB::select('call huySanPhamTuChiTietDatHang(?,?)',array($request->masp,$request->makh));
        $listGioHang=DB::select('call hienThiDonHangOnlineChuaThanhToan(?)',array($request->makh));
        $tienKhachHangCanThanhToan=DB::select('call hienThiSoTienCanThanhToanCuaKhachHang(?)',array($request->makh));

        if (count($listGioHang)>=1)
        $output[0] ='
						<p class="cart-content-long">'.count($listGioHang).' sản phẩm - </p>
                        <p class="highlighted">'.number_format($tienKhachHangCanThanhToan[0]->khach_can_tra).' VND</p>
        ';
        else
        $output[0] ='
						<p class="cart-content-long">0 sản phẩm - </p>
                        <p class="highlighted">0 VND</p>
        ';
        $output[1]='';
        if (count($listGioHang)>=1){
            for($i=0;$i<count($listGioHang);$i++){
        $output[1] .='

        <!-- CART ITEM -->
        <li class="item clearfix">
            <div class="picture">
                <figure class="liquid">
                    <img src="'.url('/').'/'.$listGioHang[$i]->hinh_anh1.'" alt="product1">
                </figure>
            </div>
            <div class="description">
                <p class="highlighted category">'.$listGioHang[$i]->ten_loai.'</p>
                <h6>'.$listGioHang[$i]->ten_san_pham.'</h6>
            </div>
            <div class="quantity">
                <h6>'.$listGioHang[$i]->so_luong.'</h6>
            </div>
            <div class="price">
                <p class="highlighted">'.number_format($listGioHang[$i]->thanh_tien+$listGioHang[$i]->so_tien_giam).'</p>
            </div>
            <a class="button-remove" id="masanpham'.$listGioHang[$i]->ma_san_pham.'"><img src="http://localhost:82/DoAnWeb/public/client/images/items/remove.png" alt="remove"></a>
        </li>
        <!-- /CART ITEM -->
        ';
            }
        $output[1] .='<!-- TOTAL -->
        <li class="total clearfix">
            <div>
                <h6>'.number_format($tienKhachHangCanThanhToan[0]->tong_tien_hang).'</h6>
                <h6>'.number_format($tienKhachHangCanThanhToan[0]->so_tien_giam).'</h6>
                <h6>0</h6>
                <p class="highlighted">'.number_format($tienKhachHangCanThanhToan[0]->khach_can_tra).'</p>
            </div>
            <div>
                <h6>Tạm tính</h6>
                <h6>Tiền giảm</h6>
                <h6>Phí vận chuyển</h6>
                <h6>Thành tiền</h6>
            </div>
        </li>
        <!-- /TOTAL -->
        <!-- ORDER -->
        <li class="order clearfix">
            <a id="thanhtoan-client" href="checkout.html" class="button">Thanh toán</a>
            <a href="cart.html" class="button secondary">Chi tiết</a>
        </li>
        <!-- /ORDER -->
        ';
        }else{
        $output[1]='
        <li class="order clearfix">
            <a id="thanhtoan-client" href="checkout.html" class="button">Thanh toán</a>
            <a href="cart.html" class="button secondary">Chi tiết</a>
        </li>
        ';
    }
        return $output;
    }

    public function hienThiChiTietDonHang(Request $request){
        $thongTinKhachHang=DB::select('call layThongTinKhachHangTheoID(?)',array($request->session()->get('ma_nhan_vien')));
        $listSanPham=DB::select('call hienThiListSanPhamTheoLoaiSanPham(?)',array($request->ma_loai));
        $listGioHang=DB::select('call hienThiDonHangOnlineChuaThanhToan(?)',array($request->session()->get('ma_nhan_vien')));
        $tienKhachHangCanThanhToan=DB::select('call hienThiSoTienCanThanhToanCuaKhachHang(?)',array($request->session()->get('ma_nhan_vien')));
        return view('client/checkout',['thongTinKhachHang'=>$thongTinKhachHang,'listGioHang'=>$listGioHang,'tienKhachHangCanThanhToan'=>$tienKhachHangCanThanhToan,'listSanPham'=>$listSanPham]);
    }
}
