<?php

namespace App\Driver;

use App\Driver\AmDuong;
use App\Driver\Sao;
use App\Driver\DiaBan;

class Utils
{
    public function lapDiaBan($diaBan, $nn, $tt, $nnnn, $gioSinh, $gioiTinh, $duongLich, $timeZone)
    {
        if ($duongLich) {
            $ngayThangNam = AmDuong::ngayThangNam($nn, $tt, $nnnn, $duongLich, $timeZone);

            $nn = $ngayThangNam[0];
            $tt = $ngayThangNam[1];
            $nnnn = $ngayThangNam[2];
            $thangNhuan = $ngayThangNam[3];
        }

        $diaBan = diaBan($tt, $gioSinh);

        $amDuongNamSinh = $thienCan[$canNam]["amDuong"];
        $amDuongChiNamSinh = $diaChi[$chiNam]["amDuong"];

        $hanhCuc = AmDuong::timCuc($this->diaBan->cungMenh, $canNam);
        $cuc = AmDuong::nguHanh($hanhCuc);
        $cucSo = $cuc['cuc'];

        $diaBan = $this->diaBan->nhapDaiHan($cucSo, $gioiTinh * $amDuongChiNamSinh);

        $khoiHan = AmDuong::dichCung(11, -3 * ($chiNam - 1));
        $diaBan = $this->diaBan->nhapTieuHan($khoiHan, $gioiTinh, $chiNam);
        $viTriTuVi = AmDuong::timTuVi($cucSo, $nn);
        $this->diaBan->nhapSao($viTriTuVi, $saoTuVi);

        $viTriLiemTrinh = AmDuong::dichCung($$viTriTuVi, 4);
        $this->diaBan->nhapSao($viTriLiemTrinh, $saoLiemTrinh);

        $viTriThienDong = AmDuong::dichCung($$viTriTuVi, 7);
        $this->diaBan->nhapSao($viTriThienDong, $saoThienDong);

        $viTriVuKhuc = AmDuong::dichCung($$viTriTuVi, 8);
        $this->diaBan->nhapSao($viTriVuKhuc, $saoVuKhuc);

        $vitriThaiDuong = AmDuong::dichCung($$viTriTuVi, 9);
        $this->diaBan->nhapSao($vitriThaiDuong, $saoThaiDuong);

        $viTriThienCo = AmDuong::dichCung($$viTriTuVi, 11);
        $this->diaBan->nhapSao($viTriThienCo, $saoThienCo);

        $viTriThienPhu = AmDuong::dichCung(3, 3 - $$viTriTuVi);
        $this->diaBan->nhapSao($viTriThienPhu, $saoThienPhu);

        $viTriThaiAm = AmDuong::dichCung($$viTriThienPhu, 1);
        $this->diaBan->nhapSao($viTriThaiAm, $saoThaiAm);

        $viTriThamLang = AmDuong::dichCung($$viTriThienPhu, 2);
        $this->diaBan->nhapSao($viTriThamLang, $saoThamLang);

        $viTriCuMon = AmDuong::dichCung($$viTriThienPhu, 3);
        $this->diaBan->nhapSao($viTriCuMon, $saoCuMon);

        $viTriThienTuong = AmDuong::dichCung($$viTriThienPhu, 4);
        $this->diaBan->nhapSao($viTriThienTuong, $saoThienTuong);

        $viTriThienLuong = AmDuong::dichCung($$viTriThienPhu, 5);
        $this->diaBan->nhapSao($viTriThienLuong, $saoThienLuong);

        $viTriThatSat = AmDuong::dichCung($$viTriThienPhu, 6);
        $this->diaBan->nhapSao($viTriThatSat, $saoThatSat);

        $viTriPhaQuan = AmDuong::dichCung($$viTriThienPhu, 10);
        $this->diaBan->nhapSao($viTriPhaQuan, $saoPhaQuan);

        $viTriLocTon = $thienCan[$canNam]['vitriDiaBan'];
        $this->diaBan->nhapSao($viTriLocTon, $saoLocTon, $saoBacSy);

        $amDuongNamNu = $gioiTinh * $amDuongNamSinh;
        $viTriLucSi = AmDuong::dichCung($$viTriLocTon, 1 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriLucSi, $saoLucSi);

        $viTriThanhLong = AmDuong::dichCung($$viTriLocTon, 2 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriThanhLong, $saoThanhLong);

        $viTriTieuHao = AmDuong::dichCung($$viTriLocTon, 3 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriTieuHao, $saoTieuHao);

        $viTriTuongQuan = AmDuong::dichCung($$viTriLocTon, 4 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriTuongQuan, $saoTuongQuan);

        $viTriTauThu = AmDuong::dichCung($$viTriLocTon, 5 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriTauThu, $saoTauThu);

        $viTriPhiLiem = AmDuong::dichCung($$viTriLocTon, 6 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriPhiLiem, $saoPhiLiem);

        $viTriHyThan = AmDuong::dichCung($$viTriLocTon, 7 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriHyThan, $saoHyThan);

        $viTriBenhPhu = AmDuong::dichCung($$viTriLocTon, 8 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriBenhPhu, $saoBenhPhu);

        $viTriDaiHao = AmDuong::dichCung($$viTriLocTon, 9 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriDaiHao, $saoDaiHao);

        $viTriPhucBinh = AmDuong::dichCung($$viTriLocTon, 10 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriPhucBinh, $saoPhucBinh);

        $viTriQuanPhu2 = AmDuong::dichCung($$viTriLocTon, 11 * $amDuongNamNu);
        $this->diaBan->nhapSao($viTriQuanPhu2, $saoQuanPhu2);

        $viTriThaiTue = $chiNam;
        $this->diaBan->nhapSao($viTriThaiTue, $saoThaiTue);

        $viTriThieuDuong = AmDuong::dichCung($$viTriThaiTue, 1);
        $this->diaBan->nhapSao($viTriThieuDuong, $saoThieuDuong, $saoThienKhong);

        $viTriTangMon = AmDuong::dichCung($$viTriThaiTue, 2);
        $this->diaBan->nhapSao($viTriTangMon, $saoTangMon);

        $viTriThieuAm = AmDuong::dichCung($$viTriThaiTue, 3);
        $this->diaBan->nhapSao($viTriThieuAm, $saoThieuAm);

        $viTriQuanPhu3 = AmDuong::dichCung($$viTriThaiTue, 4);
        $this->diaBan->nhapSao($viTriQuanPhu3, $saoQuanPhu3);

        $viTriTuPhu = AmDuong::dichCung($$viTriThaiTue, 5);
        $this->diaBan->nhapSao($viTriTuPhu, $saoTuPhu, $saoNguyetDuc);

        $viTriTuePha = AmDuong::dichCung($$viTriThaiTue, 6);
        $this->diaBan->nhapSao($viTriTuePha, $saoTuePha);

        $viTriLongDuc = AmDuong::dichCung($viTriThaiTue, 7);
        $this->diaBan->nhapSao($viTriLongDuc, $saoLongDuc);

        $viTriBachHo = AmDuong::dichCung($viTriThaiTue, 8);
        $this->diaBan->nhapSao($viTriBachHo, $saoBachHo);

        $viTriPhucDuc = AmDuong::dichCung($viTriThaiTue, 9);
        $this->diaBan->nhapSao($viTriPhucDuc, $saoPhucDuc, $saoThienDuc);

        $viTriDieuKhach = AmDuong::dichCung($viTriThaiTue, 10);
        $this->diaBan->nhapSao($viTriDieuKhach, $saoDieuKhach);

        $viTriTrucPhu = AmDuong::dichCung($viTriThaiTue, 11);
        $this->diaBan->nhapSao($viTriTrucPhu, $saoTrucPhu);

        $viTriTrangSinh = timTrangSinh($cucSo);
        $this->diaBan->nhapSao($viTriTrangSinh, $saoTrangSinh);

        $viTriMocDuc = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 1);
        $this->diaBan->nhapSao($viTriMocDuc, $saoMocDuc);

        $viTriQuanDoi = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 2);
        $this->diaBan->nhapSao($viTriQuanDoi, $saoQuanDoi);

        $viTriLamQuan = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 3);
        $this->diaBan->nhapSao($viTriLamQuan, $saoLamQuan);

        $viTriDeVuong = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 4);
        $this->diaBan->nhapSao($viTriDeVuong, $saoDeVuong);

        $viTriSuy = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 5);
        $this->diaBan->nhapSao($viTriSuy, $saoSuy);

        $viTriBenh = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 6);
        $this->diaBan->nhapSao($viTriBenh, $saoBenh);

        $viTriTu = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 7);
        $this->diaBan->nhapSao($viTriTu, $saoTu);

        $viTriMo = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 8);
        $this->diaBan->nhapSao($viTriMo, $saoMo);

        $viTriTuyet = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 9);
        $this->diaBan->nhapSao($viTriTuyet, $saoTuyet);

        $viTriThai = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * (-1));
        $this->diaBan->nhapSao($viTriThai, $saoThai);

        $viTriDuong = AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * (-2));
        $this->diaBan->nhapSao($viTriDuong, $saoDuong);

        $viTriDaLa = AmDuong::dichCung($viTriLocTon, -1);
        $this->diaBan->nhapSao($viTriDaLa, $saoDaLa);

        $viTriKinhDuong = AmDuong::dichCung($viTriLocTon, 1);
        $this->diaBan->nhapSao($viTriKinhDuong, $saoKinhDuong);

        $viTriDiaKiep = AmDuong::dichCung(11, $gioSinh);
        $this->diaBan->nhapSao($viTriDiaKiep, $saoDiaKiep);

        $viTriDiaKhong = AmDuong::dichCung(12, 12 - $viTriDiaKiep);
        $this->diaBan->nhapSao($viTriDiaKhong, $saoDiaKhong);

        $viTriLinhTinh = $this->diaBan->timHoaLinh($chiNam, $gioSinh, $gioiTinh, $amDuongNamSinh);
        $viTriHoaTinh = $this->diaBan->timHoaLinh($chiNam, $gioSinh, $gioiTinh, $amDuongNamSinh);
        $this->diaBan->nhapSao($viTriHoaTinh, $saoHoaTinh);
        $this->diaBan->nhapSao($viTriLinhTinh, $saoLinhTinh);
        $viTriLongTri = AmDuong::dichCung(5, $chiNam - 1);
        $this->diaBan->nhapSao($viTriLongTri, $saoLongTri);
        $viTriPhuongCac = AmDuong::dichCung(2, 2 - $viTriLongTri);
        $this->diaBan->nhapSao($viTriPhuongCac, $saoPhuongCac, $saoGiaiThan);
        $viTriTaPhu = AmDuong::dichCung(5, $tt - 1);
        $this->diaBan->nhapSao($viTriTaPhu, $saoTaPhu);
        $viTriHuuBat = AmDuong::dichCung(2, 2 - $viTriTaPhu);
        $this->diaBan->nhapSao($viTriHuuBat, $saoHuuBat);
        $viTriVanKhuc = AmDuong::dichCung(5, $gioSinh - 1);
        $this->diaBan->nhapSao($viTriVanKhuc, $saoVanKhuc);
        $viTriVanXuong = AmDuong::dichCung(2, 2 - $viTriVanKhuc);
        $this->diaBan->nhapSao($viTriVanXuong, $saoVanXuong);
        $viTriTamThai = AmDuong::dichCung(5, $tt + $nn - 2);
        $this->diaBan->nhapSao($viTriTamThai, $saoTamThai);
        $viTriBatToa = AmDuong::dichCung(2, 2 - $viTriTamThai);
        $this->diaBan->nhapSao($viTriBatToa, $saoBatToa);
        $viTriAnQuang = AmDuong::dichCung($viTriVanXuong, $nn - 2);
        $this->diaBan->nhapSao($viTriAnQuang, $saoAnQuang);
        $viTriThienQuy = AmDuong::dichCung(2, 2 - $viTriAnQuang);
        $this->diaBan->nhapSao($viTriThienQuy, $saoThienQuy);
        $viTriThienKhoi = timThienKhoi($canNam);
        $this->diaBan->nhapSao($viTriThienKhoi, $saoThienKhoi);
        $viTriThienViet = AmDuong::dichCung(5, 5 - $viTriThienKhoi);
        $this->diaBan->nhapSao($viTriThienViet, $saoThienViet);
        $viTriThienHu = AmDuong::dichCung(7, $chiNam - 1);
        $this->diaBan->nhapSao($viTriThienHu, $saoThienHu);
        $viTriThienKhoc = AmDuong::dichCung(7, -$chiNam + 1);
        $this->diaBan->nhapSao($viTriThienKhoc, $saoThienKhoc);
        $viTriThienTai = AmDuong::dichCung(diaBan . cungMenh, $chiNam - 1);
        $this->diaBan->nhapSao($viTriThienTai, saoThienTai);
        $viTriThienTho = AmDuong::dichCung(diaBan . cungThan, $chiNam - 1);
        $this->diaBan->nhapSao($viTriThienTho, $saoThienTho);
        $viTriHongLoan = AmDuong::dichCung(4, -$chiNam + 1);
        $this->diaBan->nhapSao($viTriHongLoan, $saoHongLoan);
        $viTriThienHy = AmDuong::dichCung($viTriHongLoan, 6);
        $this->diaBan->nhapSao($viTriThienHy, $saoThienHy);
        $viTriThienPhuc = timThienQuanThienPhuc($canNam);
        $viTriThienQuan = timThienQuanThienPhuc($canNam);
        $this->diaBan->nhapSao($viTriThienQuan, $saoThienQuan);
        $this->diaBan->nhapSao($viTriThienPhuc, $saoThienPhuc);
        $viTriThienHinh = AmDuong::dichCung(10, $tt - 1);
        $this->diaBan->nhapSao($viTriThienHinh, $saoThienHinh);
        $viTriThienRieu = AmDuong::dichCung($viTriThienHinh, 4);
        $this->diaBan->nhapSao($viTriThienRieu, $saoThienRieu, $saoThienY);
        $viTriCoThan = timCoThan($chiNam);
        $this->diaBan->nhapSao($viTriCoThan, $saoCoThan);
        $viTriQuaTu = AmDuong::dichCung($viTriCoThan, -4);
        $this->diaBan->nhapSao($viTriQuaTu, $saoQuaTu);
        $viTriVanTinh = AmDuong::dichCung($viTriKinhDuong, 2);
        $this->diaBan->nhapSao($viTriVanTinh, $saoVanTinh);
        $viTriDuongPhu = AmDuong::dichCung($viTriVanTinh, 2);
        $this->diaBan->nhapSao($viTriDuongPhu, $saoDuongPhu);
        $viTriQuocAn = AmDuong::dichCung($viTriDuongPhu, 3);
        $this->diaBan->nhapSao($viTriQuocAn, $saoQuocAn);
        $viTriThaiPhu = AmDuong::dichCung($viTriVanKhuc, 2);
        $this->diaBan->nhapSao($viTriThaiPhu, $saoThaiPhu);
        $viTriPhongCao = AmDuong::dichCung($viTriVanKhuc, -2);
        $this->diaBan->nhapSao($viTriPhongCao, $saoPhongCao);
        $viTriThienGiai = AmDuong::dichCung(9, (2 * tt) - 2);
        $this->diaBan->nhapSao($viTriThienGiai, saoThienGiai);
        $viTriDiaGiai = AmDuong::dichCung($viTriTaPhu, 3);
        $this->diaBan->nhapSao($viTriDiaGiai, $saoDiaGiai);
        $viTriThienLa = 5;
        $this->diaBan->nhapSao($viTriThienLa, $saoThienLa);
        $viTriDiaVong = 11;
        $this->diaBan->nhapSao($viTriDiaVong, $saoDiaVong);
        $viTriThienThuong = diaBan . cungNoboc;
        $this->diaBan->nhapSao($viTriThienThuong, $saoThienThuong);
        $viTriThienSu = diaBan . cungTatAch;
        $this->diaBan->nhapSao($viTriThienSu, $saoThienSu);
        $viTriThienMa = timThienMa(chiNam);
        $this->diaBan->nhapSao($viTriThienMa, $saoThienMa);
        $viTriHoaCai = AmDuong::dichCung($viTriThienMa, 2);
        $this->diaBan->nhapSao($viTriHoaCai, $saoHoaCai);
        $viTriKiepSat = AmDuong::dichCung($viTriThienMa, 3);
        $this->diaBan->nhapSao($viTriKiepSat, $saoKiepSat);
        $viTriDaoHoa = AmDuong::dichCung($viTriKiepSat, 4);
        $this->diaBan->nhapSao($viTriDaoHoa, $saoDaoHoa);
        $viTriPhaToai = timPhaToai($chiNam);
        $this->diaBan->nhapSao($viTriPhaToai, $saoPhaToai);
        $viTriDauQuan = AmDuong::dichCung($chiNam, -$tt + $gioSinh);
        $this->diaBan->nhapSao($viTriDauQuan, $saoDauQuan);

        if ($canNam == 1) {
            $viTriHoaLoc = $viTriLiemTrinh;
            $$viTriHoaQuyen = $$viTriPhaQuan;
            $viTriHoaKhoa = $viTriVuKhuc;
            $viTriHoaKy = $vitriThaiDuong;
        } else if ($canNam == 2) {
            $viTriHoaLoc = $viTriThienCo;
            $viTriHoaQuyen = $viTriThienLuong;
            $viTriHoaKhoa = $$viTriTuVi;
            $viTriHoaKy = $viTriThaiAm;
        } else if ($canNam == 3) {
            $viTriHoaLoc = $viTriThienDong;
            $viTriHoaQuyen = $viTriThienCo;
            $viTriHoaKhoa = $viTriVanXuong;
            $viTriHoaKy = $viTriLiemTrinh;
        } else if ($canNam == 4) {
            $viTriHoaLoc = $viTriThaiAm;
            $viTriHoaQuyen = $viTriThienDong;
            $viTriHoaKhoa = $viTriThienCo;
            $viTriHoaKy = $viTriCuMon;
        } else if ($canNam == 5) {
            $viTriHoaLoc = $viTriThamLang;
            $viTriHoaQuyen = $viTriThaiAm;
            $viTriHoaKhoa = $viTriHuuBat;
            $viTriHoaKy = $viTriThienCo;
        } else if ($canNam == 6) {
            $viTriHoaLoc = $viTriVuKhuc;
            $viTriHoaQuyen = $viTriThamLang;
            $viTriHoaKhoa = $viTriThienLuong;
            $viTriHoaKy = $viTriVanKhuc;
        } else if ($canNam == 7) {
            $viTriHoaLoc = $vitriThaiDuong;
            $viTriHoaQuyen = $viTriVuKhuc;
            $viTriHoaKhoa = $viTriThienDong;
            $viTriHoaKy = $viTriThaiAm;
        } else if ($canNam == 8) {
            $viTriHoaLoc = $viTriCuMon;
            $viTriHoaQuyen = $vitriThaiDuong;
            $viTriHoaKhoa = $viTriVanKhuc;
            $viTriHoaKy = $viTriVanXuong;
        } else if ($canNam == 9) {
            $viTriHoaLoc = $viTriThienLuong;
            $viTriHoaQuyen = $viTriTuVi;
            $viTriHoaKhoa = $viTriThienPhu;
            $viTriHoaKy = $viTriVuKhuc;
        } else if ($canNam == 10) {
            $viTriHoaLoc = $viTriPhaQuan;
            $viTriHoaQuyen = $viTriCuMon;
            $viTriHoaKhoa = $viTriThaiAm;
            $viTriHoaKy = $viTriThamLang;
        }

        $this->diaBan->nhapSao($viTriHoaLoc, $saoHoaLoc);
        $this->diaBan->nhapSao($viTriHoaQuyen, $saoHoaQuyen);
        $this->diaBan->nhapSao($viTriHoaKhoa, $saoHoaKhoa);
        $this->diaBan->nhapSao($viTriHoaKy, $saoHoaKy);

        $viTriThienTru = timLuuTru($canNam);
        $viTriLuuHa = timLuuTru($canNam);
        $this->diaBan->nhapSao($viTriLuuHa, $saoLuuHa);
        $this->diaBan->nhapSao($viTriThienTru, $saoThienTru);

        $ketThucTuan = AmDuong::dichCung($chiNam, 10 - $canNam);
        $viTriTuan1 = AmDuong::dichCung($ketThucTuan, 1);
        $viTriTuan2 = AmDuong::dichCung($viTriTuan1, 1);
        $this->diaBan->nhapTuan($viTriTuan1, $viTriTuan2);

        $viTriTriet2 = timTriet($canNam);
        $viTriTriet1 = timTriet($canNam);
        $this->diaBan->nhapTriet($viTriTriet1, $viTriTriet2);

        return $this->diaBan;
    }
}
