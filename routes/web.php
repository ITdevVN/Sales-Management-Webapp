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
        Route::post('sanpham/sua','SanPhamController@suaThongTinSanPham')->name('sanpham.sua');
        Route::get('sanpham/xoa','SanPhamController@xoaSanPham');
        Route::get('sanpham/xoatatca','SanPhamController@xoaTatCaSanPham');
        Route::get('sanpham/timkiem','SanPhamController@timKiemSanPham');
        Route::get('sanpham/laychitietsanpham','SanPhamController@layThongTinSanPhamTheoID');
  //  });

  //Hóa đon
        Route::get('hoadon','HoaDonController@hienThiDanhSachHoaDon')->name('hoadon');
        Route::get('hoadon/setSession','DynamicPDFController@setSession')->name('hoadon.setSession');
        Route::get('hoadon/xuatpdftatca','DynamicPDFController@xuatPDFTatCa')->name('hoadon.xuatpdftatca');
        //Đơn hàng chờ xử lý
        Route::get('hoadon/hienthixuly','HoaDon_choxulyController@hienThiDanhSachHoaDon')->name('donhangchoxuly');
        //Đơn hàng đang giao
        Route::get('hoadon/hienthidanggiao','HoaDon_danggiaoController@hienThiDanhSachHoaDon')->name('donhangdanggiao');

        Route::group(['prefix'=>'hoadon'],function(){
     //Chuyển trang thái đơn hàng của khách hàng từ Chưa thanh toán sang Chờ xử lý
     Route::get('hienthixuly/chuyentrangthai-choxuly/{mahd}','HoaDon_choxulyController@xuLyChoXuLy_DangGiaoHang')->name('admin.choxuly');
     //Xử lý hủy đơn hàng khi đang xử lý
     Route::get('hienthixuly/huydonhang/{mahd}','HoaDon_choxulyController@xuLyHuyDonHang')->name('admin.huydonhang');
        });

        Route::group(['prefix'=>'hoadon'],function(){
            //Chuyển trang thái đơn hàng của khách hàng từ xử lý sang giao hàng
            Route::get('hienthidanggiao/chuyentrangthai-thanhtoan/{mahd}','HoaDon_danggiaoController@xuLyDangGiaoHang_ThanhToan')->name('admin.choxuly');
            //Xử lý hủy đơn hàng khi đang giao
            Route::get('hienthidanggiao/huydonhang/{mahd}','HoaDon_danggiaoController@xuLyHuyDonHang')->name('admin.huydonhang');
               });


        //nhân viên
    Route::get('nhanvien', 'NhanVienController@hienThiDanhSachNhanVien')->name('nhanvien');
    Route::POST('nhanvien/them', 'NhanVienController@themNhanVien')->name('nhanvien.them');
    Route::post('nhanvien/sua', 'NhanVienController@suaNhanVien')->name('nhanvien.sua');
    Route::get('nhanvien/xoa', 'NhanVienController@xoaNhanVien');
    Route::get('nhanvien/xoatatca', 'NhanVienController@xoaTatCaNhanVien');
    Route::get('nhanvien/timkiem', 'NhanVienController@timKiem');
    Route::get('nhanvien/laychitietnhanvien', 'NhanVienController@layThongTinNhanVienTheoID')->name('nhanvien.layID');
    //khách hàng
    Route::get('khachhang', 'KhachHangController@hienThiDanhSachKhachHang')->name('khachhang');
    Route::POST('khachhang/them', 'KhachHangController@themKhachHang')->name('khachhang.them');
    Route::get('khachhang/laychitietkhachhang', 'KhachHangController@layThongTinKhachHangTheoID')->name('khachhang.layID');
    Route::post('khachhang/sua', 'KhachHangController@suaKhachHang')->name('khachhang.sua');
    Route::get('khachhang/xoa', 'KhachHangController@xoaKhachHang');
    Route::get('khachhang/xoatatca', 'KhachHangController@xoaTatCaKhachHang');
    Route::get('khachhang/timkiem', 'KhachHangController@timKiem');
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
    // Route::get('homepage/themvaogiohang/{makh}/{masp}/{sl}','HomepageClientController@luuSanPhamKhachHangChonXuongHoaDon')->name('Client.themgiohang');
    Route::get('homepage/xoasanpham','DatHangOnlineController@xoaSanPham')->name('Client.xoaSanPham');
    Route::get('homepage/thanhtoan/{makh}','HomepageClientController@xuLyKhachHangNhanThanhToanDonHang')->name('Client.xuLyThanhtoanGiohang');

    //Dat hang Online dung chung cho cac trang con lai
    Route::get('homepage/themvaogio','DatHangOnlineController@datHangOnline');

});


Route::prefix('client')->group(function(){
    Route::get('login','LoginRegisterClientController@clientLogin')->name('ClientLogin'); //Hiển thị form dang ky/dangnhap
    Route::post('register','LoginRegisterClientController@clientRegister')->name('Client.Register'); //dang ky
    Route::post('login/post','LoginRegisterClientController@postLoginClient')->name('Client.login'); //dangnhap
    Route::get('homepage/c','HomepageClientController@hienThiTopSanPhamBanChay_chuaDangNhap')->name('Client.Homepage.chuadangnhap');

});









