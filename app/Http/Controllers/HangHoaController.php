<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use App\Hanghoa;
use App\NhomHang;

use Illuminate\Http\Request;

class HangHoaController extends Controller
{
    public function reloadTableJQuery(){
        $listNhomSanPham=DB::select('CALL layNhomHang()');
        $output = '<table id="main-table" class="table table-hover table-striped">
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

    public function themNhomSanPham(Request $request){
        $check=DB::select('call themNhomHang(?)',array($request->tenNhomHang));
        return $this->reloadTableJQuery();
    }


    public function xoaTatCaNhomSanPham(){
        $check=DB::select('call xoaTatCaNhomHang()');
        return $this->reloadTableJQuery();
    }

    public function xoaNhomSanPham(Request $request){
        for($i=0;$i<count($request->listCheckBoxXoa);$i++){
            $check=DB::select('call xoaNhomHang(?)',array($request->listCheckBoxXoa[$i]));
        }
        return $this->reloadTableJQuery();
    }

    public function suaNhomSanPham(Request $request){
        $check=DB::select('call suaNhomHang(?,?)',array($request->thongTinNhomCanXoa[0],$request->thongTinNhomCanXoa[1]));

        return $this->reloadTableJQuery();
    }


    //
    public function layDanhSachHangHoa(){
        $listHangHoa=DB::select('call layDanhSachSanPham()');
       return view('admin/hanghoa_danhmuc',['listHangHoa'=>$listHangHoa]);
    }


}
