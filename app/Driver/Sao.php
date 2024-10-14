<?php

namespace App\Driver;

class Sao
{
    public $saoID;
    public $saoTen;
    public $saoNguHanh;
    public $saoLoai;
    public $saoPhuongVi;
    public $saoAmDuong;
    public $vongTrangSinh;
    public $cssSao;
    public $saoDacTinh;

    public function __construct($saoID, $saoTen, $saoNguHanh, $saoLoai = 2, $saoPhuongVi = "", $saoAmDuong = "", $vongTrangSinh = 0)
    {
        $this->saoID = $saoID;
        $this->saoTen = $saoTen;
        $this->saoNguHanh = $saoNguHanh;
        $this->saoLoai = $saoLoai;
        $this->saoPhuongVi = $saoPhuongVi;
        $this->saoAmDuong = $saoAmDuong;
        $this->vongTrangSinh = $vongTrangSinh;
        $this->cssSao = nguHanh($saoNguHanh)['css'];
        $this->saoDacTinh = null;
    }

    public function anDacTinh($dacTinh)
    {
        $dt = [
            "V" => "vuongDia",
            "M" => "mieuDia",
            "Đ" => "dacDia",
            "B" => "binhHoa",
            "H" => "hamDia",
        ];
        $this->saoDacTinh = $dacTinh;

        return $this;
    }

    public function anCung($saoViTriCung)
    {
        $this->saoViTriCung = $saoViTriCung;
        return $this;
    }
}
