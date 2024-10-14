<?php

namespace App\Driver;

class CungDiaBan
{
    public $cungSo;
    public $hanhCung;
    public $cungSao = [];
    public $cungAmDuong;
    public $cungTen;
    public $cungThan = false;
    public $tuanTrung = false;
    public $trietLo = false;

    public function __construct($cungID)
    {
        $hanhCung = [null, "Thủy", "Thổ", "Mộc", "Mộc", "Thổ", "Hỏa", "Hỏa", "Thổ", "Kim", "Kim", "Thổ", "Thủy"];
        $this->cungSo = $cungID;
        $this->hanhCung = $hanhCung[$cungID];
        $this->cungAmDuong = ($cungID % 2 == 0) ? -1 : 1;
        $this->cungTen = DiaChi::getTenChi($cungID);
    }

    public function themSao($sao)
    {
        DacTinhSao::setDacTinh($this->cungSo, $sao);
        $this->cungSao[] = $sao->toArray();
        return $this;
    }

    public function setCungChu($tenCungChu)
    {
        $this->cungChu = $tenCungChu;
        return $this;
    }

    public function setDaiHan($daiHan)
    {
        $this->cungDaiHan = $daiHan;
        return $this;
    }

    public function setTieuHan($tieuHan)
    {
        $this->cungTieuHan = DiaChi::getTenChi($tieuHan + 1);
        return $this;
    }

    public function anCungThan()
    {
        $this->cungThan = true;
    }

    public function anTuan()
    {
        $this->tuanTrung = true;
    }

    public function anTriet()
    {
        $this->trietLo = true;
    }
}

class DiaBan
{
    public $thangSinhAmLich;
    public $gioSinhAmLich;
    public $thapNhiCung = [];

    public function __construct($thangSinhAmLich, $gioSinhAmLich)
    {
        $this->thangSinhAmLich = $thangSinhAmLich;
        $this->gioSinhAmLich = $gioSinhAmLich;
        for ($i = 1; $i <= 12; $i++) {
            $this->thapNhiCung[] = new CungDiaBan($i);
        }
        $this->nhapCungChu();
        $this->nhapCungThan();
    }

    public function cungChu($thangSinhAmLich, $gioSinhAmLich)
    {
        $cungThan = DichCung::getCung(3, $thangSinhAmLich - 1, $gioSinhAmLich - 1);
        $cungMenh = DichCung::getCung(3, $thangSinhAmLich - 1, - ($gioSinhAmLich) + 1);

        $cungChuThapNhiCung = [
            ['cungId' => 1, 'tenCung' => 'Mệnh', 'cungSoDiaBan' => $cungMenh],
            ['cungId' => 2, 'tenCung' => 'Phụ mẫu', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 1)],
            ['cungId' => 3, 'tenCung' => 'Phúc đức', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 2)],
            ['cungId' => 4, 'tenCung' => 'Điền trạch', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 3)],
            ['cungId' => 5, 'tenCung' => 'Quan lộc', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 4)],
            ['cungId' => 6, 'tenCung' => 'Nô bộc', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 5)],
            ['cungId' => 7, 'tenCung' => 'Thiên di', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 6)],
            ['cungId' => 8, 'tenCung' => 'Tật Ách', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 7)],
            ['cungId' => 9, 'tenCung' => 'Tài Bạch', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 8)],
            ['cungId' => 10, 'tenCung' => 'Tử tức', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 9)],
            ['cungId' => 11, 'tenCung' => 'Phu thê', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 10)],
            ['cungId' => 12, 'tenCung' => 'Huynh đệ', 'cungSoDiaBan' => DichCung::getCung($cungMenh, 11)]
        ];

        return $cungChuThapNhiCung;
    }

    public function nhapCungChu()
    {
        foreach ($this->cungChu($this->thangSinhAmLich, $this->gioSinhAmLich) as $cung) {
            $this->thapNhiCung[$cung['cungSoDiaBan']]->setCungChu($cung['tenCung']);
        }
        return $this;
    }

    public function nhapDaiHan($cucSo, $gioiTinh)
    {
        foreach ($this->thapNhiCung as $cung) {
            $khoangCach = KhoangCachCung::getKhoangCach($cung->cungSo, $this->cungMenh, $gioiTinh);
            $cung->setDaiHan($cucSo + $khoangCach * 10);
        }
        return $this;
    }

    public function nhapTieuHan($khoiTieuHan, $gioiTinh, $chiNam)
    {
        $viTriCungTy1 = DichCung::getCung($khoiTieuHan, -$gioiTinh * ($chiNam - 1));

        foreach ($this->thapNhiCung as $cung) {
            $khoangCach = KhoangCachCung::getKhoangCach($cung->cungSo, $viTriCungTy1, $gioiTinh);
            $cung->setTieuHan($khoangCach);
        }
        return $this;
    }

    public function nhapCungThan()
    {
        $this->thapNhiCung[$this->cungThan]->anCungThan();
    }

    public function nhapSao($cungSo, ...$args)
    {
        foreach ($args as $sao) {
            $this->thapNhiCung[$cungSo]->themSao($sao);
        }
        return $this;
    }

    public function nhapTuan(...$args)
    {
        foreach ($args as $cung) {
            $this->thapNhiCung[$cung]->anTuan();
        }
        return $this;
    }

    public function nhapTriet(...$args)
    {
        foreach ($args as $cung) {
            $this->thapNhiCung[$cung]->anTriet();
        }
        return $this;
    }
}

class DacTinhSao
{
    public static function setDacTinh($viTriDiaBan, $sao)
    {
        $maTranDacTinh = [
            1 => ["Tử vi", "B", "Đ", "M", "B", "V", "M", "M", "Đ", "M", "B", "V", "B"],
            2 => ["Tử vi", "M", "V", "V", "Đ", "B", "M", "M", "Đ", "M", "B", "V", "B"],
            3 => ["Tử vi", "M", "M", "Đ", "M", "B", "V", "V", "B", "Đ", "M", "B", "V"],
            4 => ["Tử vi", "V", "M", "B", "M", "Đ", "M", "V", "V", "B", "Đ", "M", "B"],
            5 => ["Tử vi", "Đ", "M", "B", "V", "M", "M", "Đ", "M", "B", "V", "V", "B"],
            6 => ["Tử vi", "M", "M", "Đ", "M", "B", "V", "B", "V", "Đ", "M", "B", "M"],
            7 => ["Tử vi", "M", "M", "V", "V", "M", "B", "B", "Đ", "Đ", "M", "M", "B"],
            8 => ["Tử vi", "V", "M", "M", "B", "M", "V", "Đ", "Đ", "B", "V", "M", "B"],
            9 => ["Tử vi", "V", "M", "B", "V", "M", "B", "Đ", "M", "Đ", "M", "M", "B"],
            10 => ["Tử vi", "M", "V", "M", "Đ", "B", "M", "V", "Đ", "Đ", "M", "B", "B"],
            11 => ["Tử vi", "Đ", "M", "V", "M", "M", "B", "B", "M", "Đ", "M", "M", "V"],
            12 => ["Tử vi", "V", "B", "Đ", "M", "B", "M", "B", "Đ", "M", "B", "M", "V"]
        ];

        if (array_key_exists($sao->saoName, $maTranDacTinh)) {
            $sao->saoDacTinh = $maTranDacTinh[$sao->saoName][$viTriDiaBan];
        }
    }
}
