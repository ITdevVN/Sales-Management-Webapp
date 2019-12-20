<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class SanPhamController extends Controller
{
    public function reloadTable($string){
        $list=DB::select('call hienThiDanhSachSanPham()');
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
            'them_file2'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'them_file3'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'them_giavon'=>'required',
            'them_giaban'=>'required',
            'them_tonkho'=>'required',
            'them_chitietsanpham'=>'required|max:2048'
        ]);


        if($validator->passes()){ //Nếu đã xét Validation thành công thì
            $image1=$request->file('them_file1');
            $new_name1=rand().'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('client/images/items/'),$new_name1);
            if ($request->file('them_file2')!=null){
            $image2=$request->file('them_file2');
            $new_name2=rand().'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('client/images/items/'),$new_name2);
            }else{
                $new_name2="";
            }
            if ($request->file('them_file3')!=null){
            $image3=$request->file('them_file3');
            $new_name3=rand().'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('client/images/items/'),$new_name3);
            }else{
                $new_name3="";
            }
            //Lưu xuống cơ sở dữ liệu
            DB::select('call themSanPham(?,?,?,?,?,?,?,?,?,?)',array(
                $request->them_tensanpham,
                $request->them_chitietsanpham,
                $request->them_giaban,
                $request->them_giavon,
                $request->them_tonkho,
                $request->them_trangthai,
                'client/images/items/'.$new_name1,
                'client/images/items/'.$new_name2,
                'client/images/items/'.$new_name3,
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

    public function layThongTinSanPhamTheoID(Request $request){

        $chitiet=DB::select('call layThongTinSanPhamTheoID(?)',array($request->ID));
        $output[0]=$chitiet[0]->ma_san_pham;
        $output[1]=$chitiet[0]->hinh_anh1;
        $output[2]=$chitiet[0]->hinh_anh2;
        $output[3]=$chitiet[0]->hinh_anh3;
        $output[4]=$chitiet[0]->ten_san_pham;
        $output[5]=$chitiet[0]->ten_nhom_hang;
        $output[6]=$chitiet[0]->ma_loai;
        $output[7]=$chitiet[0]->gia_von;
        $output[8]=$chitiet[0]->gia_ban;
        $output[9]=$chitiet[0]->ton_kho;
        $output[10]=$chitiet[0]->trang_thai;
        $output[11]=$chitiet[0]->thong_tin_san_pham;
        return $output;
    }

    public function suaThongTinSanPham(Request $request){
        $validator= Validator::make($request->all(),[
            'sua_tensanpham'=>'required|max:255',
            'sua_maloai'=>'required',
            'sua_file1'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sua_file2'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sua_file3'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sua_trangthai'=>'required',
            'sua_giavon'=>'required',
            'sua_giaban'=>'required',
            'sua_tonkho'=>'required',
            'sua_chitietsanpham'=>'required|max:2048'
        ]);


        if($validator->passes()){ //Nếu đã xét Validation thành công thì
            $listHinhAnh=DB::select('call layThongTinURLHinhAnhSanPham(?)',$request->ID);
            if ($request->file('sua_file3')!=null){
            $image1=$request->file('sua_file1');
            $new_name1=rand().'.'.$image1->getClientOriginalExtension();
            $image1->move(public_path('client/images/items/'),$new_name1);
            }else{
                $new_name1=$listHinhAnh[0]->hinh_anh1;
            }

            if ($request->file('sua_file3')!=null){
            $image2=$request->file('sua_file2');
            $new_name2=rand().'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('client/images/items/'),$new_name2);
        }else{
            $new_name2=$listHinhAnh[0]->hinh_anh2;
        }

            if ($request->file('sua_file3')!=null){
            $image3=$request->file('sua_file3');
            $new_name3=rand().'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('client/images/items/'),$new_name3);
            }else{
                $new_name3=$listHinhAnh[0]->hinh_anh3;
            }
            //Lưu xuống cơ sở dữ liệu
            DB::select('call suaThongTinSanPham(?,?,?,?,?,?,?,?,?,?,?)',array(
                $request->sua_masanpham,
                $request->sua_tensanpham,
                $request->sua_chitietsanpham,
                $request->sua_giaban,
                $request->sua_giavon,
                $request->sua_tonkho,
                $request->sua_trangthai,
                'client/images/items/'.$new_name1,
                'client/images/items/'.$new_name2,
                'client/images/items/'.$new_name3,
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
