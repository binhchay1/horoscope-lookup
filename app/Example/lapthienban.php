<?php

require_once 'lasotuvi/AmDuong.php';
require_once 'lasotuvi/Lich_HND.php';

class lapThienBan {
    private $gioiTinh;
    private $namNu;
    private $chiGioSinh;
    private $canGioSinh;
    private $gioSinh;
    private $timeZone;
    private $today;
    private $ngayDuong;
    private $thangDuong;
    private $namDuong;
    private $ten;
    private $ngayAm;
    private $thangAm;
    private $namAm;
    private $thangNhuan;
    private $canThang;
    private $canNam;
    private $chiNam;
    private $chiThang;
    private $canThangTen;
    private $canNamTen;
    private $chiThangTen;
    private $chiNamTen;
    private $canNgay;
    private $chiNgay;
    private $canNgayTen;
    private $chiNgayTen;
    private $amDuongNamSinh;
    private $amDuongMenh;
    private $hanhCuc;
    private $tenCuc;
    private $menhChu;
    private $thanChu;
    private $menh;
    private $sinhKhac;
    private $banMenh;

    public function __construct($nn, $tt, $nnnn, $gioSinh, $gioiTinh, $ten, $diaBan, $duongLich = true, $timeZone = 7) {
        $this->gioiTinh = $gioiTinh == 1 ? 1 : -1;
        $this->namNu = $gioiTinh == 1 ? "Nam" : "Nữ";

        $chiGioSinh = $diaChi[$gioSinh];
        $canGioSinh = (($jdFromDate($nn, $tt, $nnnn) - 1) * 2 % 10 + $gioSinh) % 10;
        if ($canGioSinh == 0) {
            $canGioSinh = 10;
        }
        $this->chiGioSinh = $chiGioSinh;
        $this->canGioSinh = $canGioSinh;
        $this->gioSinh = $thienCan[$canGioSinh]['tenCan'] . ' ' . $chiGioSinh['tenChi'];

        $this->timeZone = $timeZone;
        $this->today = date("d/m/Y");
        $this->ngayDuong = $nn;
        $this->thangDuong = $tt;
        $this->namDuong = $nnnn;
        $this->ten = $ten;

        if ($duongLich) {
            list($this->ngayAm, $this->thangAm, $this->namAm, $this->thangNhuan) = ngayThangNam($this->ngayDuong, $this->thangDuong, $this->namDuong, true, $this->timeZone);
        } else {
            $this->ngayAm = $this->ngayDuong;
            $this->thangAm = $this->thangDuong;
            $this->namAm = $this->namDuong;
        }

        list($this->canThang, $this->canNam, $this->chiNam) = ngayThangNamCanChi($this->ngayAm, $this->thangAm, $this->namAm, false, $this->timeZone);
        $this->chiThang = $this->thangAm;
        $this->canThangTen = $thienCan[$this->canThang]['tenCan'];
        $this->canNamTen = $thienCan[$this->canNam]['tenCan'];
        $this->chiThangTen = $diaChi[$this->thangAm]['tenChi'];
        $this->chiNamTen = $diaChi[$this->chiNam]['tenChi'];

        list($this->canNgay, $this->chiNgay) = canChiNgay($this->ngayDuong, $this->thangDuong, $this->namDuong, $duongLich, $timeZone);
        $this->canNgayTen = $thienCan[$this->canNgay]['tenCan'];
        $this->chiNgayTen = $diaChi[$this->chiNgay]['tenChi'];

        $cungAmDuong = $diaBan->cungMenh % 2 == 1 ? 1 : -1;
        $this->amDuongNamSinh = $this->chiNam % 2 == 1 ? "Dương" : "Âm";
        if ($cungAmDuong * $this->gioiTinh == 1) {
            $this->amDuongMenh = "Âm dương thuận lý";
        } else {
            $this->amDuongMenh = "Âm dương nghịch lý";
        }

        $cuc = timCuc($diaBan->cungMenh, $this->canNam);
        $this->hanhCuc = nguHanh($cuc)['id'];
        $this->tenCuc = nguHanh($cuc)['tenCuc'];

        $this->menhChu = $diaChi[$this->canNam]['menhChu'];
        $this->thanChu = $diaChi[$this->canNam]['thanChu'];

        $this->menh = nguHanhNapAm($this->chiNam, $this->canNam);
        $menhId = nguHanh($this->menh)['id'];
        $menhCuc = sinhKhac($menhId, $this->hanhCuc);
        if ($menhCuc == 1) {
            $this->sinhKhac = "Bản Mệnh sinh Cục";
        } elseif ($menhCuc == -1) {
            $this->sinhKhac = "Bản Mệnh khắc Cục";
        } elseif ($menhCuc == -1j) {
            $this->sinhKhac = "Cục khắc Bản Mệnh";
        } elseif ($menhCuc == 1j) {
            $this->sinhKhac = "Cục sinh Bản mệnh";
        } else {
            $this->sinhKhac = "Cục hòa Bản Mệnh";
        }

        $this->banMenh = nguHanhNapAm($this->chiNam, $this->canNam, true);
    }
}
?>

