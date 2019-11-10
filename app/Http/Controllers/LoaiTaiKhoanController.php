<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoaiTaiKhoan;

class LoaiTaiKhoanController extends Controller
{
    public function getListLoaiTaiKhoan(){
        $listLoaiTaiKhoan=LoaiTaiKhoan::getAll();
        return view('manager/manager',['list' => $listLoaiTaiKhoan]);
    }
}
