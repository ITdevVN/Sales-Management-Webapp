<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Validator;

class NhaCungCapController extends Controller
{

    public function reloadTableJQuery($result){
        $listNhaCungCap=DB::select('CALL hienThiDanhSachNhaCungCap()');
        if($result==0){ //không có dòng nào ảnh hưởng
            $output='
            <div class="popup-alert alert alert-danger">
                Thất bại
            </div>';
        }else if($result>=1){
            $output='
            <div class="alert alert-success">
            Thành công
        </div>
            ';
        }
        $output .= '<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
            <th scope="col">Mã nhà cung cấp</th>
        <th scope="col">Tên nhà cung cấp</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tổng mua</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listNhaCungCap);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_nha_cung_cap">'.$listNhaCungCap[$i]->ma_nha_cung_cap.'</td>
                <td class="ten_nha_cung_cap">'.$listNhaCungCap[$i]->ten_nha_cung_cap.'</td>
                <td class="so_dien_thoai">'.$listNhaCungCap[$i]->so_dien_thoai.'</td>
                <td class="email">'.$listNhaCungCap[$i]->email.'</td>
                <td class="dia_chi">'.$listNhaCungCap[$i]->dia_chi.'</td>
                <td class="tong_mua">'.$listNhaCungCap[$i]->tong_mua.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }

    public function reloadKetQuaTimKiem($listNhaCungCap){
        $output='';
        if(count($listNhaCungCap)==0){ //không có dòng nào ảnh hưởng
            $output='
            <div class="popup-alert alert alert-danger">
                Không dòng nào được tìm thấy
            </div>';
        }
        $output .= '<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
            <th scope="col">Mã nhà cung cấp</th>
        <th scope="col">Tên nhà cung cấp</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tổng mua</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listNhaCungCap);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_nha_cung_cap">'.$listNhaCungCap[$i]->ma_nha_cung_cap.'</td>
                <td class="ten_nha_cung_cap">'.$listNhaCungCap[$i]->ten_nha_cung_cap.'</td>
                <td class="so_dien_thoai">'.$listNhaCungCap[$i]->so_dien_thoai.'</td>
                <td class="email">'.$listNhaCungCap[$i]->email.'</td>
                <td class="dia_chi">'.$listNhaCungCap[$i]->dia_chi.'</td>
                <td class="tong_mua">'.$listNhaCungCap[$i]->tong_mua.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }

    public function hienThiDanhSachNhaCungCap(){
        $listNhaCungCap=DB::select('CALL hienThiDanhSachNhaCungCap()');
        return view('admin/nhacungcap',['listNhaCungCap'=>$listNhaCungCap]);
    }

    public function themNhaCungCap(Request $request){
        $check=DB::select('call themNhaCungCap(?,?,?,?)',array($request->tenNhaCungCap,
        $request->soDienThoai, $request->email, $request->diachi));
         $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function suaNhaCungCap(Request $request){
        $check=DB::select('call suaThongTinNhaCungCap(?,?,?,?,?)',array($request->thongTinCanSua[0],$request->thongTinCanSua[1],
        $request->thongTinCanSua[2],$request->thongTinCanSua[3],$request->thongTinCanSua[4]));

        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function xoaNhaCungCap(Request $request){
        for($i=0;$i<count($request->listCheckBoxXoa);$i++){
            $check=DB::select('call xoaNhaCungCap(?)',array($request->listCheckBoxXoa[$i]));
        }
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function xoaTatCaNhaCungCap(){
        $check=DB::select('call xoaTatCaNhaCungCap()');
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function timKiemNhaCungCap(Request $request){
        if (strcmp($request->loaiTimKiem,"tenNhaCungCap")){
            $listNhaCungCap=DB::select('call timKiemNhaCungCapTheoTen(?)',array($request->keyWord));
            return $this->reloadKetQuaTimKiem($listNhaCungCap);
        }

    }

}
