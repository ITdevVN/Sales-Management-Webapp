<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
use Validator;

class SanPhamController extends Controller
{

    public function reloadTableJQuery($result){
        $listSanPham=DB::select('CALL hienThiDanhSachSanPham()');
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
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Nhóm hàng</th>
            <th scope="col">Loại hàng</th>
            <th scope="col">Giá vốn</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Tồn kho</th>
            <th scope="col">Trạng thái</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listSanPham);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_san_pham">'.$listSanPham[$i]->ma_san_pham.'</td>
                <td class="hinh_anh"><img src="http://localhost:82/DoAnWeb/public/'.$listSanPham[$i]->hinh_anh1.'" height="80px"> </td>
                <td class="ten_san_pham">'.$listSanPham[$i]->ten_san_pham.'</td>
                <td class="ten_nhom_hang">'.$listSanPham[$i]->ten_nhom_hang.'</td>
                <td class="ten_loai">'.$listSanPham[$i]->ten_loai.'</td>
                <td class="gia_von">'.number_format($listSanPham[$i]->gia_von).'</td>
                <td class="gia_ban">'.number_format($listSanPham[$i]->gia_ban).'</td>
                <td class="ton_kho">'.$listSanPham[$i]->ton_kho.'</td>
                <td class="trang_thai">'.$listSanPham[$i]->trang_thai.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }

    public function reloadKetQuaTimKiem($listSanPham){
        $output='';
        if(count($listSanPham)==0){ //không có dòng nào ảnh hưởng
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
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Nhóm hàng</th>
            <th scope="col">Loại hàng</th>
            <th scope="col">Giá vốn</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Tồn kho</th>
            <th scope="col">Trạng thái</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($listSanPham);$i++){
            $output .= '<tr>
                <th>
                <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                </th>
                <td class="ma_san_pham">'.$listSanPham[$i]->ma_san_pham.'</td>
                <td class="hinh_anh">'.$listSanPham[$i]->hinh_anh1.'</td>
                <td class="ten_san_pham">'.$listSanPham[$i]->ten_san_pham.'</td>
                <td class="ten_nhom_hang">'.$listSanPham[$i]->ten_nhom_hang.'</td>
                <td class="ten_loai">'.$listSanPham[$i]->ten_loai.'</td>
                <td class="gia_von">'.number_format($listSanPham[$i]->gia_von).'</td>
                <td class="gia_ban">'.number_format($listSanPham[$i]->gia_ban).'</td>
                <td class="ton_kho">'.$listSanPham[$i]->ton_kho.'</td>
                <td class="trang_thai">'.$listSanPham[$i]->trang_thai.'</td>
            </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }

    public function hienThiDanhSachSanPham(){
        $listSanPham=DB::select('CALL hienThiDanhSachSanPham()');
        $listLoaiSanPham=DB::select('call hienThiDanhSachLoaiSanPham()');
        return view('admin/sanpham',['listSanPham'=>$listSanPham,'listLoaiSanPham'=>$listLoaiSanPham]);
    }

    public function layChiTietSanPhamTheoID(Request $request){
        $ChiTietSanPham=DB::select('call hienThiSanPhamTheoID(?)',array($request->masanpham));
        $response[0]=$ChiTietSanPham[0]->ma_san_pham;
        $response[1]=$ChiTietSanPham[0]->hinh_anh1;
        $response[2]=$ChiTietSanPham[0]->hinh_anh2;
        $response[3]=$ChiTietSanPham[0]->hinh_anh3;
        $response[4]=$ChiTietSanPham[0]->ten_san_pham;
        $response[5]=$ChiTietSanPham[0]->ten_nhom_hang;
        $response[6]=$ChiTietSanPham[0]->ten_loai;
        $response[7]=$ChiTietSanPham[0]->gia_von;
        $response[8]=$ChiTietSanPham[0]->gia_ban;
        $response[9]=$ChiTietSanPham[0]->ton_kho;
        $response[10]=$ChiTietSanPham[0]->trang_thai;
        $response[11]=$ChiTietSanPham[0]->thong_tin_san_pham;
        return $response;
    }


    public function themSanPham(Request $request){

        $validation=Validator::make($request->all(),[
            'tenSanPhamThem'=>'required|max:255',
            'file1Them'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file2Them'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'file3Them'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'giavonthem'=>'required',
            'giabanthem'=>'required',
            'tonkhothem'=>'required'
        ]);

        if($validation->passes()){
            $image1=$request->file('file1Them');
            $image2=$request->file('file2Them');
            $image3=$request->file('file3Them');
            $new_name1=$request->tenSanPhamThem.'_'.rand().'.'.$image1->getClientOriginalExtension();
            $new_name2=$request->tenSanPhamThem.'_'.rand().'.'.$image2->getClientOriginalExtension();
            $new_name3=$request->tenSanPhamThem.'_'.rand().'.'.$image3->getClientOriginalExtension();
            $image1->move(public_path('client/images/items'),$new_name1);
            $image2->move(public_path('client/images/items'),$new_name2);
            $image3->move(public_path('client/images/items'),$new_name3);

           // ---------Lưu dữ liệu xuống cơ sở dữ liệu
            $check=DB::select('call themSanPham(?,?,?,?,?,?,?,?,?)',array($request->tenSanPhamThem,
            $request->textareathem, $request->giabanthem, $request->giavonthem,
            $request->trangthaithem,'client/images/items/'.$new_name1,
            'client/images/items/'.$new_name2,
            'client/images/items/'.$new_name3,
            $request->loaiSanPhamThem));
            $result=$check[0]->rows_count;
            //-------Kiểm tra kết quả trả về là 0 hay 1 và hiển thị lên bảng
            $output="";
             $listSanPham=DB::select('CALL hienThiDanhSachSanPham()');
             if($result==0){
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
                <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Nhóm hàng</th>
            <th scope="col">Loại hàng</th>
            <th scope="col">Giá vốn</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Tồn kho</th>
            <th scope="col">Trạng thái</th>
              </tr>
            </thead>
            <tbody>';
            for($i=0;$i<count($listSanPham);$i++){
                $output .= '<tr>
                    <th>
                    <input type="checkbox" id="check'.$i.'" class="checkbox-group" aria-label="Checkbox for following text input">
                    </th>
                    <td class="ma_san_pham">'.$listSanPham[$i]->ma_san_pham.'</td>
                    <td class="hinh_anh"><img src="http://localhost:82/DoAnWeb/public/'.$listSanPham[$i]->hinh_anh1.'" height="80px"> </td>
                    <td class="ten_san_pham">'.$listSanPham[$i]->ten_san_pham.'</td>
                    <td class="ten_nhom_hang">'.$listSanPham[$i]->ten_nhom_hang.'</td>
                    <td class="ten_loai">'.$listSanPham[$i]->ten_loai.'</td>
                    <td class="gia_von">'.number_format($listSanPham[$i]->gia_von).'</td>
                    <td class="gia_ban">'.number_format($listSanPham[$i]->gia_ban).'</td>
                    <td class="ton_kho">'.$listSanPham[$i]->ton_kho.'</td>
                    <td class="trang_thai">'.$listSanPham[$i]->trang_thai.'</td>
                </tr>';
            }
            $output .= '</tbody></table>';

            return response()->json([
                'class_name' => 'alert-success',
                'errors' =>'',
                 'output' =>$output
               //  'result'=>$result
            ]);
        }else{

            return response()->json([
                'errors' => $validation->errors()->all(),
                'class_name' => 'alert-danger',
                 'output' =>$output
              //   'result'=>$result
            ]);
        }

    }


    public function xoaTatCaSanPham(){
        $check=DB::select('call xoaTatCaSanPham()');
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }


    public function xoaSanPham(Request $request){
        for($i=0;$i<count($request->listCheckBoxXoa);$i++){
            $check=DB::select('call xoaSanPham(?)',array($request->listCheckBoxXoa[$i]));
        }
        $result=$check[0]->rows_count;
        return $this->reloadTableJQuery($result);
    }
}
