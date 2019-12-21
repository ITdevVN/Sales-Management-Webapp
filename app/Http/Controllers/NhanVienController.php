<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class NhanVienController extends Controller
{
    public function reloadTable($string)
    {
        $list = DB::select('call hienThiDanhSachNhanVien()');
        $output = '
        <div id="alert" class="alert alert-success">' . $string . ' thành công</div>
        ';
        $output .= '<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
        <th scope="col">Mã nhân viên</th>
        <th scope="col">Họ tên</th>
        <th scope="col">CMND</th>
        <th scope="col">Điện thoại</th>
        <th scope="col">Giới tính</th>
        <th scope="col">Ngày sinh</th>
        <th scope="col">email</th>
        <th scope="col">Doanh số</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Mã người quản lý</th>
        <th scope="col">Vai trò</th>

          </tr>
        </thead>
        <tbody>';
        for ($i = 0; $i < count($list); $i++) {
            $output .= '
        <tr>
        <th>
        <input type="checkbox" id="check' . $list[$i]->ma_nhan_vien . '" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >' . $list[$i]->ma_nhan_vien . '</td>
        <td >' . $list[$i]->ho_ten . '</td>
        <td >' . $list[$i]->cmnd . '</td>
        <td >' . $list[$i]->dien_thoai . '</td>
        <td >' . $list[$i]->gioi_tinh . '</td>
        <td >' . $list[$i]->ngay_sinh . '</td>
        <td >' . $list[$i]->email . '</td>
        <td >' . $list[$i]->doanhso . '</td>
        <td >' . $list[$i]->trang_thai . '</td>
        <td >' . $list[$i]->ma_nguoi_quan_ly . '</td>
        <td >' . $list[$i]->ten_loai_tai_khoan . '</td>
        </tr>';
        }
        $output .= '</tbody>
      </table>';
        return $output;
    }

    public function hienThiDanhSachNhanVien()
    {
        $list = DB::select('call hienThiDanhSachNhanVien()');
        $listtaikhoan = DB::select('call hienThiLoaiTaiKhoan()');
        $listquanly = DB::select('call hienThiDanhSachQuanLy()');
        return view('admin/nhanvien', ['list' => $list, 'listtaikhoan' => $listtaikhoan, 'listquanly' => $listquanly]);
    }

    public function themNhanVien(Request $request)
    {
        //Check by Validator
        $validator = Validator::make($request->all(), [
            'them_tennhanvien' => 'required|max:255',
            'them_cmnd' => 'required',
            'them_sodienthoai' => 'required',
            'them_ngaysinh' => 'required',
            'them_gioitinh' => 'required',
            'them_email' => 'required',
            'them_pass' => 'required',
            'them_trangthai' => 'required',
            'them_diachi' => 'required'
        ]);

        if ($validator->passes()) {
            // Lưu xuống cơ sở dữ liệu
            if (strcmp($request->them_manguoiquanly, '') == 0) {
                DB::select('call themNhanVien(?,?,?,?,?,?,?,?,?,?,?,?)', array(
                    $request->them_tennhanvien,
                    $request->them_cmnd,
                    $request->them_sodienthoai,
                    $request->them_gioitinh,
                    $request->them_ngaysinh,
                    $request->them_trangthai,
                    null,
                    $request->them_ghichu,
                    $request->them_diachi,
                    $request->them_email,
                    $request->them_pass,
                    $request->them_loaitaikhoan
                ));
            } else {
                DB::select('call themNhanVien(?,?,?,?,?,?,?,?,?,?,?,?)', array(
                    $request->them_tennhanvien,
                    $request->them_cmnd,
                    $request->them_sodienthoai,
                    $request->them_gioitinh,
                    $request->them_ngaysinh,
                    $request->them_trangthai,
                    $request->them_manguoiquanly,
                    $request->them_ghichu,
                    $request->them_diachi,
                    $request->them_email,
                    $request->them_pass,
                    $request->them_loaitaikhoan
                ));
            }

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






    public function layThongTinNhanVienTheoID(Request $request)
    {

        $chitiet = DB::select('call layThongTinNhanVienTheoID(?)', array($request->ID));
        $output[0] = $chitiet[0]->ma_nhan_vien;
        $output[1] = $chitiet[0]->ho_ten;
        $output[2] = $chitiet[0]->cmnd;
        $output[3] = $chitiet[0]->dien_thoai;
        $output[4] = $chitiet[0]->ngay_sinh;
        $output[5] = $chitiet[0]->gioi_tinh;
        $output[6] = $chitiet[0]->trang_thai;
        $output[7] = $chitiet[0]->ma_nguoi_quan_ly;
        $output[8] = $chitiet[0]->ghi_chu;
        $output[9] = $chitiet[0]->dia_chi;
        $output[10] = $chitiet[0]->email;
        $output[11] = $chitiet[0]->mat_khau;
        $output[12] = $chitiet[0]->ma_loai_tai_khoan;
        $output[13] = $chitiet[0]->doanhso;
        return $output;
    }

    public function suaNhanVien(Request $request)
    {
        //Check by Validator
        $validator = Validator::make($request->all(), [
            'sua_tennhanvien' => 'required|max:255',
            'sua_cmnd' => 'required',
            'sua_sodienthoai' => 'required',
            'sua_ngaysinh' => 'required',
            'sua_gioitinh' => 'required',
            'sua_email' => 'required',
            'sua_pass' => 'required',
            'sua_trangthai' => 'required',
            'sua_diachi' => 'required'
        ]);

        if ($validator->passes()) {
            //   Lưu xuống cơ sở dữ liệu
            // if (strcmp($request->sua_manguoiquanly,'')==0){
            //       DB::select('call suaNhanVien(?,?,?,?,?,?,?,?,?,?,?,?)', array(
            //       $request->sua_tennhanvien,
            //       $request->sua_cmnd,
            //       $request->sua_sodienthoai,
            //       $request->sua_ngaysinh,
            //       $request->sua_gioitinh,                
            //       $request->sua_trangthai,
            //       null,
            //       $request->sua_ghichu,
            //       $request->sua_diachi,
            //       $request->sua_email,
            //       $request->sua_pass,                
            //       $request->sua_loaitaikhoan  
            //   }else{
            DB::select('call suaNhanVien(?,?,?,?,?,?,?,?,?,?,?,?)', array(
                $request->sua_tennhanvien,
                $request->sua_cmnd,
                $request->sua_sodienthoai,
                $request->sua_ngaysinh,
                $request->sua_gioitinh,
                $request->sua_trangthai,
                $request->sua_manguoiquanly,
                $request->sua_ghichu,
                $request->sua_diachi,
                $request->sua_email,
                $request->sua_pass,
                $request->sua_loaitaikhoan
            ));


            $output = $this->reloadTable('Cập nhật');
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




    public function xoaNhanVien(Request $request)
    {
        DB::select('call xoaNhanVien(?)', array($request->ID));
        return $this->reloadTable('Xóa');
    }

    public function xoaTatCaNhanVien()
    {
        DB::select('call xoaTatCaNhanVien()');
        return $this->reloadTable('Xóa');
    }
}
