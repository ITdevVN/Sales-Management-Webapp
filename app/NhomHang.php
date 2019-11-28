<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomHang extends Model
{
    private $ma_nhom_hang;
    private $ten_nhom_hang;

    /**
     * Get the value of ma_nhom_hang
     */
    public function getMa_nhom_hang()
    {
        return $this->ma_nhom_hang;
    }

    /**
     * Set the value of ma_nhom_hang
     *
     * @return  self
     */
    public function setMa_nhom_hang($ma_nhom_hang)
    {
        $this->ma_nhom_hang = $ma_nhom_hang;

        return $this;
    }

    /**
     * Get the value of ten_nhom_hang
     */
    public function getTen_nhom_hang()
    {
        return $this->ten_nhom_hang;
    }

    /**
     * Set the value of ten_nhom_hang
     *
     * @return  self
     */
    public function setTen_nhom_hang($ten_nhom_hang)
    {
        $this->ten_nhom_hang = $ten_nhom_hang;

        return $this;
    }
}
