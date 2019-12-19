<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class LoginRegisterClientController extends Controller
{
    public function clientLogin(){

        return view('client/register-login');
    }

    public function clientRegister(Request $request){
        $request->validate([
            'email' => 'required|email',
            'matkhau' => 'required|min:6|max:32',
            'hoten' =>'required',
            'cmnd' =>'required|digits_between:1,12',
            'dienthoai'=>'required|digits_between:1,10',
            'diachi'=>'required',
            'ngaysinh'=>'required',
            'gender'=>'required'
        ],[
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email chưa đúng định dạng',
            'matkhau.required'=>'Không được bỏ trống password',
            'matkhau.min'=>'Password phải ít nhất 6 ký tự',
            'matkhau.max'=>'Password không quá 32 ký tự',
            'hoten.required'=>'Họ tên không được bỏ trống',
            'cmnd.required'=>'Chứng minh nhân dân không được bỏ trống',
            'dienthoai.required'=>'Điện thoại không được bỏ trống',
            'diachi.required'=>'Địa chỉ không được bỏ trống',
            'ngaysinh.required'=>'Ngày sinh không được bỏ trống',
            'gender.required'=>'Không được bỏ trống'
        ]);
        //Lưu tài khoản khách hàng
        DB::select('call dangKyTaiKhoanKhachHang(?,?,?,?,?,?,?,?)',array(
            $request->hoten,
            $request->cmnd,
            $request->dienthoai,
            $request->gender,
            $request->ngaysinh,
            $request->diachi,
            $request->email,
            $request->matkhau
        ));
        // return Redirect::back()->withErrors(['Đăng nhập thất bại']);
        return redirect()->back()->with('success', 'Đăng ký thành công');
    }

    public function postLoginClient(Request $request){
        $request->validate([
            'email' => 'required|email',
            'matkhau' => 'required|min:6|max:32'
        ],[
            'email.required'=>'Không được bỏ trống email',
            'email.email'=>'Email chưa đúng định dạng',
            'matkhau.required'=>'Không được bỏ trống password',
            'matkhau.min'=>'Password phải ít nhất 6 ký tự',
            'matkhau.max'=>'Password không quá 32 ký tự'
        ]);

        $soluong=DB::select('call kiemTraSoLuongTaiKhoanKhachHang(?,?)',array($request->email,$request->matkhau));
        if ($soluong[0]->so_luong>=1){
        $result=DB::select('call xuLyDangNhapKhachHang(?,?)',array($request->email,$request->matkhau));
        $email=$result[0]->email;
        $mat_khau=$result[0]->mat_khau;
        $ho_ten=$result[0]->ho_ten;
        $ma_khach_hang=$result[0]->ma_khach_hang;

        $request->session()->put('email',$email);
        $request->session()->put('mat_khau',$mat_khau);
        $request->session()->put('ho_ten',$ho_ten);
        $request->session()->put('ma_nhan_vien',$ma_khach_hang);

        }
        else{
            return Redirect::back()->withErrors(['Đăng nhập thất bại']);
        }
        return redirect()->route('Client.Homepage');
    }
}

