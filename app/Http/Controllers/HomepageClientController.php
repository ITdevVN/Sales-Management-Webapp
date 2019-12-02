<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomepageClientController extends Controller
{
    public function getHomeClient(){
        //Xử lý hiển thị top các sản phẩm bán chạy
        $listSanPhamBanChay=DB::select('call hienThiSanPhamBanChay(?)',array(3));
        return view('client/homepage',['listSanPhamBanChay'=>$listSanPhamBanChay]);
    }
}
