<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    private $ma_nha_cung_cap;
    private $ten_nha_cung_cap;
    private $so_dien_thoai;
    private $email;
    private $diachi;



    /**
     * Get the value of ma_nha_cung_cap
     */
    public function getMa_nha_cung_cap()
    {
        return $this->ma_nha_cung_cap;
    }

    /**
     * Set the value of ma_nha_cung_cap
     *
     * @return  self
     */
    public function setMa_nha_cung_cap($ma_nha_cung_cap)
    {
        $this->ma_nha_cung_cap = $ma_nha_cung_cap;

        return $this;
    }

    /**
     * Get the value of ten_nha_cung_cap
     */
    public function getTen_nha_cung_cap()
    {
        return $this->ten_nha_cung_cap;
    }

    /**
     * Set the value of ten_nha_cung_cap
     *
     * @return  self
     */
    public function setTen_nha_cung_cap($ten_nha_cung_cap)
    {
        $this->ten_nha_cung_cap = $ten_nha_cung_cap;

        return $this;
    }

    /**
     * Get the value of so_dien_thoai
     */
    public function getSo_dien_thoai()
    {
        return $this->so_dien_thoai;
    }

    /**
     * Set the value of so_dien_thoai
     *
     * @return  self
     */
    public function setSo_dien_thoai($so_dien_thoai)
    {
        $this->so_dien_thoai = $so_dien_thoai;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of diachi
     */
    public function getDiachi()
    {
        return $this->diachi;
    }

    /**
     * Set the value of diachi
     *
     * @return  self
     */
    public function setDiachi($diachi)
    {
        $this->diachi = $diachi;

        return $this;
    }
}
