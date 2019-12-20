<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

use Redirect;

class LoginController extends Controller
{
    //Admin
    public function adminLogin(){
        return view('login/login');
    }

    public function PostAdminLogin(Request $request){

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
        $email=$result[0]->email;
        $mat_khau=$result[0]->mat_khau;
        $ho_ten=$result[0]->ho_ten;
        $ma_nhan_vien=$result[0]->ma_nhan_vien;

        $request->session()->put('email',$email);
        $request->session()->put('mat_khau',$mat_khau);
        $request->session()->put('ho_ten',$ho_ten);
        $request->session()->put('ma_nhan_vien',$ma_nhan_vien);
        }
        else{
            return Redirect::back()->withErrors(['Đăng nhập thất bại']);
        }
        return redirect()->route('tongquan');
    }


    public function logOut(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }
}
