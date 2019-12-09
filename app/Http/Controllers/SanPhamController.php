<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class SanPhamController extends Controller
{
    public function reloadTable($string){
        $list=DB::select('call hienThiDanhSachKhuyenMai()');
        $output='
        <div id="alert" class="alert alert-success">'.$string.' thành công</div>
        ';
        $output .='<table id="main-table" class="table table-hover table-striped">
        <thead>
          <tr>
            <th scrope="col">
                <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
            </th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá vốn</th>
            <th scope="col">Giá bán</th>
            <th scope="col">Tồn kho</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Loại sản phẩm</th>
            <th scope="col">Nhóm hàng</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($list);$i++){
        $output .='
        <tr>
        <th>
        <input type="checkbox" id="check'.$list[$i]->ma_san_pham.'" class="checkbox-group" aria-label="Checkbox for following text input">
        </th>
        <td >'.$list[$i]->ma_san_pham.'</td>
        <td ><img src="'.url('/').'/'.$list[$i]->hinh_anh1.'" height="80px"/></td>
        <td >'.$list[$i]->ten_san_pham.'</td>
        <td >'.$list[$i]->gia_von.'</td>
        <td >'.$list[$i]->gia_ban.'</td>
        <td >'.$list[$i]->ton_kho.'</td>
        <td >'.$list[$i]->trang_thai.'</td>
        <td >'.$list[$i]->ten_loai.'</td>
        <td >'.$list[$i]->ten_nhom_hang.'</td>
        </tr>';
        }
       $output .= '</tbody>
      </table>';
      return $output;
    }

    public function hienThiDanhSachSanPham(){
        $list=DB::select('call hienThiDanhSachSanPham()');
        $listLoaiSanPham=DB::select('call hienThiDanhSachLoaiSanPham()');
        return view('admin/sanpham',['list'=>$list,'listLoaiSanPham'=>$listLoaiSanPham]);
    }

    public function themSanPham(Request $request){
        //Check by Validator
        $validator= Validator::make($request->all(),[
            'them_tensanpham'=>'required|max:255',
            'them_maloai'=>'required',
            'them_trangthai'=>'required',
            'them_file1'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'them_giavon'=>'required',
            'them_giaban'=>'required',
            'them_tonkho'=>'required',
            'them_chitietsanpham'=>'required|max:2048'
        ]);


        if($validator->passes()){ //Nếu đã xét Validation thành công thì
            $image1=$request1->file('them_file1');
            $new_name1=rand().'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('client/images/items/'),$new_name1);
            $image2=$request->file('them_file2');
            $new_name2=rand().'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('client/images/items/'),$new_name2);
            $image3=$request->file('them_file3');
            $new_name3=rand().'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('client/images/items/'),$new_name3);

            //Lưu xuống cơ sở dữ liệu
            DB::select('call themSanPham(?,?,?,?,?,?,?,?,?,?)',array(
                $request->them_tensanpham,
                $request->them_chitietsanpham,
                $request->them_giaban,
                $request->them_giavon,
                $request->them_tonkho,
                $request->them_trangthai,
                'client/images/banners/'.$new_name1,
                'client/images/banners/'.$new_name2,
                'client/images/banners/'.$new_name3,
                $request->them_maloai
            ));

                 $output=$this->reloadTable('Thêm');
                return response()->json([
                    'flag' =>1,
                    'output' =>$output
                ]);

        }else{
            return response()->json([
                'flag' =>0,
                'message' => $validator->errors()->all()
            ]);
        }

    }

    public function layThongTinKhuyenMaiTheoID(Request $request){

        $chitiet=DB::select('call layThongTinKhuyenMaiTheoID(?)',array($request->ID));
        $output[0]=$chitiet[0]->ma_khuyen_mai;
        $output[1]=$chitiet[0]->ten_khuyen_mai;
        $output[2]=$chitiet[0]->noi_dung;
        $output[3]=$chitiet[0]->hinh_anh;
        $output[4]=$chitiet[0]->bat_dau;
        $output[5]=$chitiet[0]->ket_thuc;
        $output[6]=$chitiet[0]->ti_le_khuyen_mai;
        $output[7]=$chitiet[0]->ma_loai;
        return $output;
    }

    public function suaThongTinKhuyenMai(Request $request){
        $validator= Validator::make($request->all(),[
            'sua_tenkhuyenmai'=>'required|max:255',
            'sua_noidung'=>'required',
            'sua_file'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sua_batdau'=>'required',
            'sua_ngayketthuc'=>'required',
            'sua_tile'=>'required'
        ]);


        if($validator->passes()){ //Nếu đã xét Validation thành công thì
            $image=$request->file('sua_file');
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('client/images/banners/'),$new_name);

            //Lưu xuống cơ sở dữ liệu
            DB::select('call suaThongTinKhuyenMai(?,?,?,?,?,?,?,?)',array(
                $request->sua_makhuyenmai,
                $request->sua_tenkhuyenmai,
                $request->sua_noidung,
                'client/images/banners/'.$new_name,
                $request->sua_batdau,
                $request->sua_ngayketthuc,
                $request->sua_tile,
                $request->sua_maloai
            ));

                 $output=$this->reloadTable('Cập nhật');
                return response()->json([
                    'flag' =>1,
                    'output' =>$output
                ]);

        }else{
            return response()->json([
                'flag' =>0,
                'message' => $validator->errors()->all()
            ]);
        }

    }

    public function xoaKhuyenMai(Request $request){
        DB::select('call xoaKhuyenMai(?)',array($request->ID));
        return $this->reloadTable('Xóa');
    }

    public function xoaTatCaKhuyenMai(){
        DB::select('call xoaTatCaKhuyenMai()');
        return $this->reloadTable('Xóa');
    }
}
