<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Hanghoa;
use App\NhomHang;

use Illuminate\Http\Request;

class HangHoaController extends Controller
{
    //
    public function layDanhSachHangHoa(){
        $listHangHoa=DB::select('call layDanhSachSanPham()');
       return view('admin/hanghoa_danhmuc',['listHangHoa'=>$listHangHoa]);
    }

}
