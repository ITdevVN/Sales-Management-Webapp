<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class HomeController extends Controller
{
    //Admin
    public function getHomeAdmin(){
        $doanh_thu_thuan=DB::select('call doanhthuthuantrongngay()');
        $tile=DB::select('call doanhThuSoVoiThangTruoc()');
        return view('admin/homepage',['doanh_thu_thuan'=>$doanh_thu_thuan,'tile'=>$tile]);
    }

    public function layThongTinNguoiDung(Request $request){

        $chitietnhanvien=DB::select('call hienThiThongTinNhanVienTrangChuAdmin(?)',array($request->session()->get('ma_nhan_vien')));
        $list[0]=$chitietnhanvien[0]->ho_ten;
        $list[1]=$chitietnhanvien[0]->email;
        $list[2]=$chitietnhanvien[0]->cmnd;
        $list[3]=$chitietnhanvien[0]->dien_thoai;
        $list[4]=$chitietnhanvien[0]->ten_loai_tai_khoan;
        $list[5]=$chitietnhanvien[0]->ghi_chu;
        $list[6]=$chitietnhanvien[0]->dia_chi;
        return $list;
    }

    public function luuThongTinNguoiDung(Request $request){

        $validator= Validator::make($request->all(),[
            'hoten_hienthi'=>'required',
            'sodienthoai_hienthi'=>'required|digits:10',
            'diachi_hienthi'=>'required|max:255'
        ],[
            'hoten_hienthi.required'=>'Họ tên là bắt buột',
            'sodienthoai_hienthi.required'=>'Số điện thoại là bắt buột',
            'sodienthoai_hienthi.digits'=>'Số điện thoại 10 số',
            'diachi_hienthi.required'=>'Địa chỉ là bắt buột',
            'diachi_hienthi.max'=>'Địa chỉ tối đa 255 kí tự'
        ]);
        if($validator->passes()){
        DB::select('call capNhatThongTinNhanVien(?,?,?,?,?)',array(
            $request->manhanvien_hienthi,
            $request->hoten_hienthi,
            $request->sodienthoai_hienthi,
            $request->diachi_hienthi,
            $request->ghichu_hienthi
        ));
        return response()->json([
            'flag' =>1
        ]);
    }else{
        return response()->json([
            'flag' =>0,
            'message' =>$validator->errors()->all()
        ]);
    }
    }

}
