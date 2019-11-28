<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hanghoa extends Model
{
    private $ma_san_pham;
    private $ten_san_pham;
    private $gia_ban;
    private $gia_von;
    private $ton_kho;
    private $trang_thai;
    private $ten_nhom_hang;
    private $ten_loai;
    private $hinh_anh;


    /**
     * Get the value of ma_san_pham
     */
    public function getMa_san_pham()
    {
        return $this->ma_san_pham;
    }

    /**
     * Set the value of ma_san_pham
     *
     * @return  self
     */
    public function setMa_san_pham($ma_san_pham)
    {
        $this->ma_san_pham = $ma_san_pham;

        return $this;
    }

    /**
     * Get the value of ten_san_pham
     */
    public function getTen_san_pham()
    {
        return $this->ten_san_pham;
    }

    /**
     * Set the value of ten_san_pham
     *
     * @return  self
     */
    public function setTen_san_pham($ten_san_pham)
    {
        $this->ten_san_pham = $ten_san_pham;

        return $this;
    }

    /**
     * Get the value of gia_ban
     */
    public function getGia_ban()
    {
        return $this->gia_ban;
    }

    /**
     * Set the value of gia_ban
     *
     * @return  self
     */
    public function setGia_ban($gia_ban)
    {
        $this->gia_ban = $gia_ban;

        return $this;
    }

    /**
     * Get the value of gia_von
     */
    public function getGia_von()
    {
        return $this->gia_von;
    }

    /**
     * Set the value of gia_von
     *
     * @return  self
     */
    public function setGia_von($gia_von)
    {
        $this->gia_von = $gia_von;

        return $this;
    }

    /**
     * Get the value of ton_kho
     */
    public function getTon_kho()
    {
        return $this->ton_kho;
    }

    /**
     * Set the value of ton_kho
     *
     * @return  self
     */
    public function setTon_kho($ton_kho)
    {
        $this->ton_kho = $ton_kho;

        return $this;
    }

    /**
     * Get the value of trang_thai
     */
    public function getTrang_thai()
    {
        return $this->trang_thai;
    }

    /**
     * Set the value of trang_thai
     *
     * @return  self
     */
    public function setTrang_thai($trang_thai)
    {
        $this->trang_thai = $trang_thai;

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

    /**
     * Get the value of ten_loai
     */
    public function getTen_loai()
    {
        return $this->ten_loai;
    }

    /**
     * Set the value of ten_loai
     *
     * @return  self
     */
    public function setTen_loai($ten_loai)
    {
        $this->ten_loai = $ten_loai;

        return $this;
    }

    /**
     * Get the value of hinh_anh
     */
    public function getHinh_anh()
    {
        return $this->hinh_anh;
    }

    /**
     * Set the value of hinh_anh
     *
     * @return  self
     */
    public function setHinh_anh($hinh_anh)
    {
        $this->hinh_anh = $hinh_anh;

        return $this;
    }
}
