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


    Route::get('hanghoa/danhmuc','NhomHangController@layDanhSachHangHoa');
    //Hàng hóa / Nhóm sản phẩm
    Route::get('hanghoa/nhomsanpham','NhomHangController@layDanhSachNhomSanPham')->name('nhomsanpham');
    Route::get('hanghoa/nhomsanpham/them','NhomHangController@themNhomSanPham');
    Route::get('hanghoa/nhomsanpham/xoatatca','NhomHangController@xoaTatCaNhomSanPham');
    Route::get('hanghoa/nhomsanpham/xoa','NhomHangController@XoaNhomSanPham');
    Route::get('hanghoa/nhomsanpham/sua','NhomHangController@suaNhomSanPham');
    Route::get('hanghoa/nhomsanpham/timkiem','NhomHangController@timKiemNhomHangTheoTen');

    //Nhà cung cấp
    Route::get('nhacungcap','NhaCungCapController@hienThiDanhSachNhaCungCap')->name('nhacungcap');
    Route::get('nhacungcap/them','NhaCungCapController@themNhaCungCap');
    Route::get('nhacungcap/sua','NhaCungCapController@suaNhaCungCap');
    Route::get('nhacungcap/xoa','NhaCungCapController@xoaNhaCungCap');
    Route::get('nhacungcap/xoatatca','NhaCungCapController@xoaTatCaNhaCungCap');
    Route::get('nhacungcap/timkiem','NhaCungCapController@timKiemNhaCungCap');

    //Hàng hóa/ Loại sản phẩm
    Route::get('hanghoa/loaisanpham','HanghoaController@layDanhSachLoaiSanPham');

    //Quản lý khuyến mãi
    Route::get('khuyenmai','KhuyenMaiController@hienThiDanhSachKhuyenMai')->name('khuyenmai'); //Hoàn thành
    Route::POST('khuyenmai/them','KhuyenMaiController@themKhuyenMai')->name('khuyenmai.them'); //Hoàn thành
    Route::post('khuyenmai/sua','KhuyenMaiController@suaThongTinKhuyenMai')->name('khuyenmai.sua');
    Route::get('khuyenmai/xoa','KhuyenMaiController@xoaKhuyenMai'); // Hoàn thành
    Route::get('khuyenmai/xoatatca','KhuyenMaiController@xoaTatCaKhuyenMai'); //HOàn thành
    Route::get('khuyenmai/timkiem','KhuyenMaiController@timKiem');
    Route::get('khuyenmai/laytheoid','KhuyenMaiController@layThongTinKhuyenMaiTheoID')->name('khuyenmai.layID');// Hoàn thành

    //Sản phẩm
    Route::get('sanpham','SanPhamController@hienThiDanhSachSanPham')->name('sanpham');
    Route::post('sanpham/them','SanPhamController@themSanPham')->name('sanpham.them');
    Route::post('sanpham/sua','SanPhamController@suaSanPham');
    Route::get('sanpham/xoa','SanPhamController@xoaSanPham');
    Route::get('sanpham/xoatatca','SanPhamController@xoaTatCaSanPham');
    Route::get('sanpham/timkiem','SanPhamController@timKiemSanPham');
    Route::get('sanpham/laychitietsanpham','SanPhamController@layChiTietSanPhamTheoID');

});



Route::prefix('client')->group(function(){

    Route::get('homepage','HomepageClientController@hienThiTopSanPhamBanChay');
    Route::get('homepage/list-item-popup','HomepageClientController@layChiTietSanPham');

});









