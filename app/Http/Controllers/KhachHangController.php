<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class KhachHangController extends Controller
{
    public function reloadTable($string)
    {
        $list = DB::select('call hienThiDanhSachKhachHang()');
        $output = '
        <div id="alert" class="alert alert-success">' . $string . ' thành công</div>
        ';
        $output .= '<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
            <th scope="col">Mã khách hàng</th>
            <th scope="col">Họ tên</th>
            <th scope="col">CMND</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Ngày sinh</th>        
            <th scope="col">Ghi chú</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Loại khách hàng</th>
            <th scope="col">Doanh số</th>
          </tr>
        </thead>
        <tbody>';
        for ($i = 0; $i < count($list); $i++) {
            $output .= '
        <tr>
        <th>
        <input type="checkbox" id="check' . $list[$i]->ma_khach_hang . '" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >' . $list[$i]->ma_khach_hang . '</td>
        <td >' . $list[$i]->ho_ten . '</td>
        <td >' . $list[$i]->cmnd . '</td>
        <td >' . $list[$i]->dien_thoai . ' </td>
        <td >' . $list[$i]->gioi_tinh . '</td>
        <td >' . $list[$i]->ngay_sinh . '</td>   
        <td >' . $list[$i]->ghi_chu . '</td>
        <td >' . $list[$i]->trang_thai . '</td>
        <td >' . $list[$i]->ten_loai . '</td>
         <td >' . $list[$i]->doanhso . '</td>
        </tr>';
        }
        $output .= '</tbody>
      </table>';
        return $output;
    }

    public function hienThiDanhSachKhachHang()
    {
        $list = DB::select('call hienThiDanhSachKhachHang()');
        $listloaikhachhang = DB::select('call hienThiLoaiKhachHang()');
        return view('admin/khachhang', ['list' => $list, 'listloaikhachhang' => $listloaikhachhang]);
    }

    public function themKhachHang(Request $request)
    {
        //Check by Validator
        $validator = Validator::make($request->all(), [
            'them_tenkhachhang' => 'required|max:255',
            'them_cmnd' => 'required',
            'them_sodienthoai' => 'required',
            'them_ngaysinh' => 'required',
            'them_diachi' => 'required',
            'them_trangthai' => 'required',
            'them_loaikhachhang' => 'required'
        ]);

        if ($validator->passes()) {
            //Lưu xuống cơ sở dữ liệu
            DB::select('call themKhachHang(?,?,?,?,?,?,?,?,?)', array(
                $request->them_tenkhachhang,
                $request->them_cmnd,
                $request->them_sodienthoai,
                $request->them_gioitinh,
                $request->them_ngaysinh,
                $request->them_trangthai,
                $request->them_diachi,
                $request->them_ghichu,
                $request->them_loaikhachhang
            ));

            $output = $this->reloadTable('Thêm');
            return response()->json([
                'flag' => 1,
                'output' => $output
            ]);
        } else {
            return response()->json([
                'flag' => 0,
                'message' => $validator->errors()->all()
            ]);
        }
    }

    public function layThongTinKhachHangTheoID(Request $request)
    {

        $chitiet = DB::select('call layThongTinKhachHangTheoID(?)', array($request->ID));
        $output[0] = $chitiet[0]->ma_khach_hang;
        $output[1] = $chitiet[0]->ho_ten;
        $output[2] = $chitiet[0]->cmnd;
        $output[3] = $chitiet[0]->dien_thoai;
        $output[4] = $chitiet[0]->gioi_tinh;
        $output[5] = $chitiet[0]->ngay_sinh;
        $output[6] = $chitiet[0]->ghi_chu;
        $output[7] = $chitiet[0]->trang_thai;
        $output[8] = $chitiet[0]->dia_chi;
        $output[9] = $chitiet[0]->ma_loai_khach_hang;
        $output[10] = $chitiet[0]->doanhso;
        return $output;
    }


    public function suaKhachHang(Request $request)
    {
        //Check by Validator
        $validator = Validator::make($request->all(), [
            'sua_tenkhachhang' => 'required|max:255',
            'sua_cmnd' => 'required',
            'sua_sodienthoai' => 'required',
            'sua_ngaysinh' => 'required',
            'sua_diachi' => 'required',
            'sua_trangthai' => 'required',
            'sua_loaikhachhang' => 'required'
        ]);

        if ($validator->passes()) {
            //Lưu xuống cơ sở dữ liệu
            DB::select('call suaKhachHang(?,?,?,?,?,?,?,?,?)', array(
                $request->sua_tenkhachhang,
                $request->sua_cmnd,
                $request->sua_sodienthoai,
                $request->sua_gioitinh,
                $request->sua_ngaysinh,
                $request->sua_trangthai,
                $request->sua_diachi,
                $request->sua_ghichu,
                $request->sua_loaikhachhang
            ));

            $output = $this->reloadTable('Thêm');
            return response()->json([
                'flag' => 1,
                'output' => $output
            ]);
        } else {
            return response()->json([
                'flag' => 0,
                'message' => $validator->errors()->all()
            ]);
        }
    }


    public function xoaKhachHang(Request $request)
    {
        DB::select('call xoaKhachHang(?)', array($request->ID));
        return $this->reloadTable('Xóa');
    }

    public function xoaTatCaKhachHang()
    {
        DB::select('call xoaTatCaKhachHang()');
        return $this->reloadTable('Xóa');
    }
}
