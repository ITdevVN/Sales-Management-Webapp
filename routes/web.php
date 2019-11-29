<?php
use App\Hanghoa;
namespace App\Http\Controllers;
use DB;
use App\Quotation;
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
// Route::get('/hello/{id}', function ($id) {
//     return view('welcome',['id' => $id]);
// });

// view::share('KhoaHoc','Laravel');

//Group for admin role
Route::prefix('admin')->group(function(){

    Route::get('homepage','HomeController@getHomeAdmin')->name('tongquan');
    Route::get('login','LoginController@adminLogin');
    //Hàng hóa / Nhóm sản phẩm
    Route::get('hanghoa/danhmuc','HanghoaController@layDanhSachHangHoa');
    Route::get('hanghoa/nhomsanpham','HanghoaController@layDanhSachNhomSanPham')->name('nhomsanpham');
    Route::get('hanghoa/nhomsanpham/them/{name}',function(){
        $nhomsanpham=new NhomHang();
        return $nhomsanpham->ten_nhom_hang;
    })->name('nhomsanpham.them');

    //Hàng hóa/ Loại sản phẩm
    Route::get('hanghoa/loaisanpham','HanghoaController@layDanhSachLoaiSanPham');
});

Route::prefix('admin')->group(function(){

    Route::get('homepage','HomeController@getHomeAdmin');


});









