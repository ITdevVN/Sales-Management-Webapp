<?php
use App\Hanghoa;
namespace App\Http\Controllers;
use DB;
use Route;
use App\Quotation;
use Illuminate\Http\Request;
use Auth;

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



//
Route::group(['prefix'=>'admin'],function(){
    Route::get('login','LoginController@adminLogin')->name('login'); //gọi trang login hiển thị lên
Route::post('login','LoginController@PostAdminLogin')->name('checklogin'); //xử lý
Route::get('logout','LoginController@logOut')->name('logout');
});


Route::group(['prefix' => 'admin','middleware'=>['checkLogin','web']], function() {
    //Route::prefix('admin')->group(function(){

        //Trang chủ admin
        Route::get('homepage','HomeController@getHomeAdmin')->name('tongquan');
        Route::get('homepage/thongtinnguoidung','HomeController@layThongTinNguoiDung')->name('tongquan.thongtinnguoidung');
        Route::post('homepage/luuThongTinNguoiDung','HomeController@luuThongTinNguoiDung')->name('tongquan.luuThongTinNguoiDung');



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
        Route::get('sanpham','SanPhamController@hienThiDanhSachSanPham')->name('sanpham'); //Hoàn thành
        Route::post('sanpham/them','SanPhamController@themSanPham')->name('sanpham.them');
        Route::post('sanpham/sua','SanPhamController@suaSanPham')->name('sanpham.sua');
        Route::get('sanpham/xoa','SanPhamController@xoaSanPham');
        Route::get('sanpham/xoatatca','SanPhamController@xoaTatCaSanPham');
        Route::get('sanpham/timkiem','SanPhamController@timKiemSanPham');
        Route::get('sanpham/laychitietsanpham','SanPhamController@layThongTinSanPhamTheoID');
  //  });

  //Hóa đon
        Route::get('hoadon','HoaDonController@hienThiDanhSachHoaDon')->name('hoadon');
        Route::get('hoadon/setSession','DynamicPDFController@setSession')->name('hoadon.setSession');
        Route::get('hoadon/xuatpdftatca','DynamicPDFController@xuatPDFTatCa')->name('hoadon.xuatpdftatca');

});


// Route::group(['prefix'=>'client'],function(){
//     Route::get('login','LoginRegisterClientController@clientLogin')->name('login.client'); //gọi trang login hiển thị lên
//     Route::post('login','LoginController@PostAdminLogin')->name('checklogin'); //xử lý
//     Route::get('logout','LoginController@logOut')->name('logout');
// });

Route::group(['prefix' => 'client','middleware'=>['checkLoginClient','web']], function() {
    Route::get('homepage','HomepageClientController@hienThiTopSanPhamBanChay')->name('Client.Homepage');
    Route::get('homepage/list-item-popup','HomepageClientController@layChiTietSanPham');
    Route::get('full-view','HomepageClientController@hienThiChiTietSanPham')->name('client.full-view');
    Route::get('dangxuat','HomepageClientController@dangxuat')->name('client.dangxuat');

    //Chuyển đến trang để nhập sản phẩm giỏ hàng của người dùng
    Route::get('homepage/themvaogiohang/{makh}/{masp}/{sl}','HomepageClientController@luuSanPhamKhachHangChonXuongHoaDon')->name('Client.themgiohang');
});


Route::prefix('client')->group(function(){
    Route::get('login','LoginRegisterClientController@clientLogin')->name('ClientLogin'); //Hiển thị form dang ky/dangnhap
    Route::post('register','LoginRegisterClientController@clientRegister')->name('Client.Register'); //dang ky
    Route::post('login/post','LoginRegisterClientController@postLoginClient')->name('Client.login'); //dangnhap
    Route::get('homepage/c','HomepageClientController@hienThiTopSanPhamBanChay_chuaDangNhap')->name('Client.Homepage.chuadangnhap');
    // Route::get('homepage/list-item-popup','HomepageClientController@layChiTietSanPham');
    // Route::get('full-view','HomepageClientController@hienThiChiTietSanPham')->name('client.full-view');
});









