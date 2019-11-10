<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Hell World";
});

Route::get('admin/login','LoginController@managerLogin');

Route::get('admin/getListLoaiTaiKhoan','LoaiTaiKhoanController@getListLoaiTaiKhoan');

Route::get('/admin/homepage',function(){
    return view('manager/manager');
});
