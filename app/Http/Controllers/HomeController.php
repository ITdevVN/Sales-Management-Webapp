<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Admin
    public function getHomeAdmin(){
        return view('admin/homepage');
    }

    //Client
}
