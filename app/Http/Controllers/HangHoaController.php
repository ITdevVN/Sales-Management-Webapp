<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Hanghoa;

use Illuminate\Http\Request;

class HangHoaController extends Controller
{
    public function layDanhSachHangHoa(){
        $listHangHoa=DB::select('call layDanhSachSanPham()');
       return view('admin/hanghoa_danhmuc',['listHangHoa'=>$listHangHoa]);
    }

    public function layDanhSachNhomSanPham(){
        $listNhomSanPham=DB::select('CALL layNhomHang()');
        return view('admin/hanghoa_nhomsanpham',['listNhomSanPham'=>$listNhomSanPham]);
    }

    public function themNhomSanPham(Request $request){
        // $check=DB::select('call themNhomHang(?)',array($tensanpham));
        // return $check;
        $a=$request->name;
        return $a;
    }
}
