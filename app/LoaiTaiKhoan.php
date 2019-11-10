<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LoaiTaiKhoan extends Model
{
    public static function getAll(){
        $value=DB::table('LoaiTaiKhoan')->get();
        return $value;
    }
}
