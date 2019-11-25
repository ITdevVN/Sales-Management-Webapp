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

//view;share dùng chung
Route::get('/hello/{id}', function ($id) {
    return view('welcome',['id' => $id]);
});

// view::share('KhoaHoc','Laravel');

//Group for admin role
Route::group(['prefix'=>'admin'],function(){
    Route::get('login','LoginController@managerLogin');

    Route::get('getListLoaiTaiKhoan','LoaiTaiKhoanController@getListLoaiTaiKhoan');

    Route::get('homepage',function(){
    return view('manager/manager');
});
});




