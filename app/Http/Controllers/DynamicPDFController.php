<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Session;

class DynamicPDFController extends Controller
{
    function xuatPDFTatCa(Request $request){

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($request->session()->get('tableData'));
        return $pdf->stream();
    }

    function setSession(Request $request){
        Session::put('tableData', $request->tableData);
        return 1;
    }

    //Phần thống kê báo cáo
    function baoCaoDoanhThuCuoiNgay(Request $request){
        $listField=DB::select('call baoCaoDoanhThuCuoiNgay()');
        $tongDoanhThu=DB::select('call tongDoanhThuCuoiNgay()');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('m/d/Y h:i:s a', time());
        $output='
        <!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}
h2 {
    text-align:center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 50px;
}
*{
	font-family: DejaVu Sans;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
th{
	background-color: #2E94DA;
}
</style>
</head>
<body>
<p>Ngày tạo: '.$date.'</p>
<h2>BÁO CÁO CUỐI NGÀY VỀ BÁN HÀNG</h2>

<table>
  <tr>
    <th>Mã hóa đơn</th>
    <th>Thời gian thanh toán</th>
	<th>Số lượng sản phẩm</th>
	<th>Doanh thu</th>
  </tr>';
  for ($i=0;$i<count($listField);$i++){
  $output .='<tr>
    <td>'.$listField[$i]->ma_hoa_don.'</td>
    <td>'.$listField[$i]->time_thanh_toan.'</td>
	<td>'.$listField[$i]->so_luong_san_pham.'</td>
	<td>'.number_format($listField[$i]->doanh_thu).'</td>
  </tr>';
  }
$output .='</table>';
$output .='
<br/>
Tổng doanh thu: '.number_format($tongDoanhThu[0]->tongDoanhThu).'

</body>
</html>';

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();
    }


    function baoCaoDoanhSo(Request $request){
        if ($request->loai=="khachhang"){
        $listField=DB::select('call baoCaoDoanhSoKhachHang(?,?)',array($request->tungay,$request->denngay));
        $tongDoanhThu=DB::select('call tongDoanhSoKhachHang(?,?)',array($request->tungay,$request->denngay));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('m/d/Y h:i:s a', time());
        $output='
        <!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}
h2 {
    text-align:center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 50px;
}
*{
	font-family: DejaVu Sans;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
th{
	background-color: #2E94DA;
}
</style>
</head>
<body>
<p>Ngày tạo: '.$date.'</p>
<h2>BÁO CÁO DOANH SỐ KHÁCH HÀNG TỪ '.$request->tungay.'
đến '.$request->denngay.'</h2>

<table>
  <tr>
    <th>MKH</th>
    <th>Họ tên</th>
	<th>CMND</th>
    <th>Điện thoại</th>
    <th>Địa chỉ</th>
    <th>Giới tính</th>
	<th>Ngày sinh</th>
    <th>Loại</th>
    <th>Doanh số</th>
  </tr>';
  for ($i=0;$i<count($listField);$i++){
  $output .='<tr>
    <td>'.$listField[$i]->ma_khach_hang.'</td>
    <td>'.$listField[$i]->ho_ten.'</td>
	<td>'.$listField[$i]->cmnd.'</td>
    <td>'.$listField[$i]->dien_thoai.'</td>
    <td>'.$listField[$i]->dia_chi.'</td>
    <td>'.$listField[$i]->gioi_tinh.'</td>
	<td>'.$listField[$i]->ngay_sinh.'</td>
    <td>'.$listField[$i]->ten_loai.'</td>
    <td>'.number_format($listField[$i]->doanhso).'</td>
  </tr>';
  }
$output .='</table>';
$output .='
<br/>
Tổng doanh thu: '.number_format($tongDoanhThu[0]->tongDoanhThu).'

</body>
</html>';

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();
    }

    if ($request->loai=="nhanvien"){
        $listField=DB::select('call baoCaoDoanhSoNhanVien(?,?)',array($request->tungay,$request->denngay));
        $tongDoanhThu=DB::select('call tongDoanhSoNhanVien(?,?)',array($request->tungay,$request->denngay));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('m/d/Y h:i:s a', time());
        $output='
        <!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}
h2 {
    text-align:center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 50px;
}
*{
	font-family: DejaVu Sans;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
th{
	background-color: #2E94DA;
}
</style>
</head>
<body>
<p>Ngày tạo: '.$date.'</p>
<h2>BÁO CÁO DOANH SỐ BÁN HÀNG CỦA NHÂN VIÊN TỪ '.$request->tungay.'
đến '.$request->denngay.'</h2>

<table>
  <tr>
    <th>MKH</th>
    <th>Họ tên</th>
	<th>CMND</th>
    <th>Điện thoại</th>
    <th>Địa chỉ</th>
    <th>Giới tính</th>
	<th>Ngày sinh</th>
    <th>Doanh số</th>
  </tr>';
  for ($i=0;$i<count($listField);$i++){
  $output .='<tr>
    <td>'.$listField[$i]->ma_nhan_vien.'</td>
    <td>'.$listField[$i]->ho_ten.'</td>
	<td>'.$listField[$i]->cmnd.'</td>
    <td>'.$listField[$i]->dien_thoai.'</td>
    <td>'.$listField[$i]->dia_chi.'</td>
    <td>'.$listField[$i]->gioi_tinh.'</td>
	<td>'.$listField[$i]->ngay_sinh.'</td>
    <td>'.number_format($listField[$i]->doanhso).'</td>
  </tr>';
  }
$output .='</table>';
$output .='
<br/>
Tổng doanh thu: '.number_format($tongDoanhThu[0]->tongDoanhThu).'

</body>
</html>';

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();
    }

    //if tiếp theo

    }


}
