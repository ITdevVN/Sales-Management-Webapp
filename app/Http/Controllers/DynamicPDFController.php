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
	<td>'.$listField[$i]->doanh_thu.'</td>
  </tr>';
  }
$output .='</table>

</body>
</html>

        ';

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        return $pdf->stream();
    }
}
