<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Admin
    public function adminLogin(){
        return view('login/login');
    }

    //Client
}
