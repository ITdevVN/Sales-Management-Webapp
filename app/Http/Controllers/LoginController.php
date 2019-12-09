<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{
    //Admin
    public function adminLogin(){
        return view('login/login');
    }

    public function PostAdminLogin(Request $request){
        //return dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:32'
        ],[
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email chưa đúng định dạng',
            'password.required'=>'Không được bỏ trống password',
            'password.min'=>'Password phải ít nhất 6 ký tự',
            'password.max'=>'Password không quá 32 ký tự'
        ]);
        $soluong=DB::select('call kiemTraSoLuongTaiKhoan(?,?)',array($request->email,$request->password));
        if ($soluong[0]->so_luong>=1){
        $result=DB::select('call xuLyDangNhap(?,?)',array($request->email,$request->password));
        return "dung roi".$result[0]->email." ".$result[0]->mat_khau;
        }
        else{
            return "loi oi";
        }
    }


    //Client
}
