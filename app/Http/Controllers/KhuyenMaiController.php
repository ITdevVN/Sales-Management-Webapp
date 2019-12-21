<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Validator;

class KhuyenMaiController extends Controller
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
            <th scope="col">Mã khuyến mãi</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên khuyến mãi</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Bắt đầu</th>
            <th scope="col">Kết thúc</th>
            <th scope="col">Tỉ lệ</th>
            <th scope="col">Tên loại sản phẩm</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($list);$i++){
        $output .='
        <tr>
            <th>
            <input type="checkbox" id="check'.$list[$i]->ma_khuyen_mai.'" class="checkbox-group" aria-label="Checkbox for following text input">
            </th>
            <td >'.$list[$i]->ma_khuyen_mai.'</td>
            <td ><img src="'.url('/').'/'.$list[$i]->hinh_anh.'" height="80px"/></td>
            <td >'.$list[$i]->ten_khuyen_mai.'</td>
            <td >'.$list[$i]->noi_dung.'</td>
            <td >'.$list[$i]->bat_dau.'</td>
            <td >'.$list[$i]->ket_thuc.'</td>
            <td >'.$list[$i]->ti_le_khuyen_mai.'</td>
            <td >'.$list[$i]->ten_loai.'</td>
        </tr>';
        }
       $output .= '</tbody>
      </table>';
      return $output;
    }

    public function hienThiDanhSachKhuyenMai(){
        $list=DB::select('call hienThiDanhSachKhuyenMai()');
        $listLoaiSanPham=DB::select('call hienThiDanhSachLoaiSanPham()');
        return view('admin/khuyenmai',['list'=>$list,'listLoaiSanPham'=>$listLoaiSanPham]);
    }

    public function themKhuyenMai(Request $request){
        //Check by Validator
        $validator= Validator::make($request->all(),[
            'them_tenkhuyenmai'=>'required|max:255',
            'them_noidung'=>'required',
            'them_file'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'them_batdau'=>'required',
            'them_ngayketthuc'=>'required',
            'them_file'=>'required'
        ]);


        if($validator->passes()){ //Nếu đã xét Validation thành công thì
            $image=$request->file('them_file');
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('client/images/banners/'),$new_name);

            //Lưu xuống cơ sở dữ liệu
            DB::select('call themKhuyenMai(?,?,?,?,?,?,?)',array(
                $request->them_tenkhuyenmai,
                $request->them_noidung,
                'client/images/banners/'.$new_name,
                $request->them_batdau,
                $request->them_ngayketthuc,
                $request->them_tile,
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
            if ($request->file('sua_file')!=null){
            $image=$request->file('sua_file');
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('client/images/banners/'),$new_name);
            }else{
               $listHinhAnh= DB::select('call getURLHinhAnhKhuyenMai(?)',array($request->sua_makhuyenmai));
                $new_name=substr($listHinhAnh[0]->hinh_anh,22);
            }
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

    // public function timKiem(Rquest $request){
    //     return '$output';
    //     if (strcmp($request->loaiTimKiem,'tenKhuyenmai')==0){
    //         $list=DB::select('call timKiemKhuyenMaiTheoTen(?)',array($request->keyWord));
    //         if(count($list)==0){ //không có dòng nào ảnh hưởng
    //             $output='
    //             <div class="popup-alert alert alert-danger">
    //                 Không tìm thấy dòng nào
    //             </div>';
    //         }else if(count($list)>=1){
    //             $output='
    //             <div class="alert alert-success">
    //             Các dòng tìm thấy
    //         </div>
    //             ';
    //         }
    //         $output .= '<table id="main-table" class="table table-hover table-striped">
    //         <thead>
    //           <tr>
    //           <th scrope="col">
    //           <input type="checkbox" id="checkall" aria-label="Checkbox for following text input">
    //       </th>
    //       <th scope="col">Mã khuyến mãi</th>
    //       <th scope="col">Hình ảnh</th>
    //       <th scope="col">Tên khuyến mãi</th>
    //       <th scope="col">Nội dung</th>
    //       <th scope="col">Bắt đầu</th>
    //       <th scope="col">Kết thúc</th>
    //       <th scope="col">Tỉ lệ</th>
    //       <th scope="col">Tên loại sản phẩm</th>
    //           </tr>
    //         </thead>
    //         <tbody>';
    //         for($i=0;$i<count($list);$i++){
    //             $output .= '<tr>
    //             <th>
    //             <input type="checkbox" id="check'.$list[$i]->ma_khuyen_mai.'" class="checkbox-group" aria-label="Checkbox for following text input">
    //             </th>
    //             <td >'.$list[$i]->ma_khuyen_mai.'</td>
    //             <td ><img src="'.url('/').'/'.$list[$i]->hinh_anh.'" height="80px"/></td>
    //             <td >'.$list[$i]->ten_khuyen_mai.'</td>
    //             <td >'.$list[$i]->noi_dung.'</td>
    //             <td >'.$list[$i]->bat_dau.'</td>
    //             <td >'.$list[$i]->ket_thuc.'</td>
    //             <td >'.$list[$i]->ti_le_khuyen_mai.'</td>
    //             <td >'.$list[$i]->ten_loai.'</td>
    //             </tr>';
    //         }
    //         $output .= '</tbody></table>';
    //         return '$output';
    //     }
    //    // Kết thúc if
 //   }
}
