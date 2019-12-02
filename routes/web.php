<?php
use App\Hanghoa;
namespace App\Http\Controllers;
use DB;
use Route;
use App\Quotation;
use Illuminate\Http\Request;

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

//Group for admin role
Route::prefix('admin')->group(function(){


    Route::get('homepage','HomeController@getHomeAdmin')->name('tongquan');
    //Trang login cho admin
    Route::get('login','LoginController@adminLogin'); //gọi trang login hiển thị lên
    Route::post('login','LoginController@PostAdminLogin'); //xử lý
    //Hàng hóa / Nhóm sản phẩm
    Route::get('hanghoa/danhmuc','HanghoaController@layDanhSachHangHoa');
    Route::get('hanghoa/nhomsanpham','HanghoaController@layDanhSachNhomSanPham')->name('nhomsanpham');
    Route::get('hanghoa/nhomsanpham/them','HangHoaController@themNhomSanPham');
    Route::get('hanghoa/nhomsanpham/xoatatca','HangHoaController@xoaTatCaNhomSanPham');
    Route::get('hanghoa/nhomsanpham/xoa','HangHoaController@XoaNhomSanPham');
    Route::get('hanghoa/nhomsanpham/sua','HangHoaController@suaNhomSanPham');





    //Hàng hóa/ Loại sản phẩm
    Route::get('hanghoa/loaisanpham','HanghoaController@layDanhSachLoaiSanPham');
});

// Route::prefix('admin')->group(function(){

//     Route::get('homepage','HomeController@getHomeAdmin');


// });









