<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

        $remember= $request->has('remember') ?true:false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)){
            return redirect('/');
        }else{
            return redirect()->back()->with('Thông báo','Đăng nhập thất bại');
        }
    }

    //Client
}
