<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;

class NhomHangController extends Controller
{
    public function reloadTableJQuery($result){
        $listNhomSanPham=DB::select('CALL layNhomHang()');
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
            <th scope="col">ID</th>
            <th scope="col">Tên nhóm hàng</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listNhomSanPham);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_nhom_hang">'.$listNhomSanPham[$i]->ma_nhom_hang.'</td>
                <td class="ten_nhom_hang">'.$listNhomSanPham[$i]->ten_nhom_hang.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }

    public function layDanhSachNhomSanPham(){
        $listNhomSanPham=DB::select('CALL layNhomHang()');
        return view('admin/hanghoa_nhomsanpham',['listNhomSanPham'=>$listNhomSanPham]);
    }

    //error
    public function themNhomSanPham(Request $request){
         $check=DB::select('call themNhomHang(?)',array($request->tenNhomHang));
         $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }


    public function xoaTatCaNhomSanPham(){
        $check=DB::select('call xoaTatCaNhomHang()');
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function xoaNhomSanPham(Request $request){
        for($i=0;$i<count($request->listCheckBoxXoa);$i++){
            $check=DB::select('call xoaNhomHang(?)',array($request->listCheckBoxXoa[$i]));
        }
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function suaNhomSanPham(Request $request){
        $check=DB::select('call suaNhomHang(?,?)',array($request->thongTinCanSua[0],$request->thongTinCanSua[1]));

        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }

    public function timKiemNhomHangTheoTen(Request $request){
        $listNhomSanPham=DB::select('call timKiemNhomHangTheoTen(?)',array($request->keyWord));
        if(count($listNhomSanPham)==0){ //không có dòng nào ảnh hưởng
            $output='
            <div class="popup-alert alert alert-danger">
                Không tìm thấy dòng nào
            </div>';
        }else if(count($listNhomSanPham)>=1){
            $output='
            <div class="alert alert-success">
            Các dòng tìm thấy
        </div>
            ';
        }
        $output .= '<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
            <th scope="col">ID</th>
            <th scope="col">Tên nhóm hàng</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listNhomSanPham);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_nhom_hang">'.$listNhomSanPham[$i]->ma_nhom_hang.'</td>
                <td class="ten_nhom_hang">'.$listNhomSanPham[$i]->ten_nhom_hang.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }
}
