<?php

namespace App\Driver;

use App\Driver\AmDuong;
use App\Driver\Sao;
use App\Driver\DiaBan;

class App
{
    private $amDuong;
    private $sao;
    private $diaBan;

    public function __construct(AmDuong $amDuong, Sao $sao, DiaBan $diaBan)
    {
        $this->amDuong = $amDuong;
        $this->sao = $sao;
        $this->diaBan = $diaBan;
    }

    public function lapDiaBan($diaBanInput, $nn, $tt, $nnnn, $gioSinh, $gioiTinh, $duongLich, $timeZone)
    {
        if ($duongLich) {
            $ngayThangNam = $this->amDuong->ngayThangNam($nn, $tt, $nnnn, $duongLich, $timeZone);

            $nn = $ngayThangNam[0];
            $tt = $ngayThangNam[1];
            $nnnn = $ngayThangNam[2];
            $thangNhuan = $ngayThangNam[3];
        }

        $ngayThangNamCanChi = $this->amDuong->ngayThangNamCanChi($nn, $tt, $nnnn, false, $timeZone);
        $canThang = $ngayThangNamCanChi[0];
            $canNam = $ngayThangNamCanChi[0];
            $chiNam = $ngayThangNamCanChi[0];


        $diaBanInput = diaBan($tt, $gioSinh);

    $amDuongNamSinh = $thienCan[$canNam]["amDuong"];
    $amDuongChiNamSinh = $diaChi[$chiNam]["amDuong"];

    $hanhCuc = $this->amDuong->timCuc($diaBan.cungMenh, $canNam);
    $cuc = $this->amDuong->nguHanh($hanhCuc);
    $$cucSo = $cuc['cuc'];

    $diaBan = $this->diaBan->nhapDaiHan($cucSo, $gioiTinh * $amDuongChiNamSinh);

    $khoiHan = $this->amDuong->dichCung(11, -3 * ($chiNam - 1));
    $diaBan = $this->diaBan->nhapTieuHan($khoiHan, $gioiTinh, $chiNam);
    $viTriTuVi = $this->amDuong->timTuVi($cucSo, $nn);
    $this->diaBan->nhapSao($viTriTuVi, $saoTuVi);

    $viTriLiemTrinh = $this->amDuong->dichCung($viTriTuVi, 4);
    $this->diaBan->nhapSao($viTriLiemTrinh, $saoLiemTrinh);

    $viTriThienDong = $this->amDuong->dichCung($viTriTuVi, 7);
    $this->diaBan->nhapSao($viTriThienDong, $saoThienDong);

    $viTriVuKhuc = $this->amDuong->dichCung($viTriTuVi, 8);
    $this->diaBan->nhapSao($viTriVuKhuc, $saoVuKhuc);

    $vitriThaiDuong = $this->amDuong->dichCung($viTriTuVi, 9);
    $this->diaBan->nhapSao($vitriThaiDuong, $saoThaiDuong);

    $viTriThienCo = $this->amDuong->dichCung($viTriTuVi, 11);
    $this->diaBan->nhapSao($viTriThienCo, $saoThienCo);

    $viTriThienPhu = $this->amDuong->dichCung(3, 3 - $viTriTuVi);
    $this->diaBan->nhapSao($viTriThienPhu, $saoThienPhu);

    $viTriThaiAm = $this->amDuong->dichCung($viTriThienPhu, 1);
    $this->diaBan->nhapSao($viTriThaiAm, $saoThaiAm);

    $viTriThamLang = $this->amDuong->dichCung($viTriThienPhu, 2);
    $this->diaBan->nhapSao($viTriThamLang, $saoThamLang);

    $viTriCuMon = $this->amDuong->dichCung($viTriThienPhu, 3);
    $this->diaBan->nhapSao($viTriCuMon, $saoCuMon);

    $viTriThienTuong = $this->amDuong->dichCung($viTriThienPhu, 4);
    $this->diaBan->nhapSao($viTriThienTuong, $saoThienTuong);

    $viTriThienLuong = $this->amDuong->dichCung($viTriThienPhu, 5);
    $this->diaBan->nhapSao($viTriThienLuong, $saoThienLuong);

    $viTriThatSat = $this->amDuong->dichCung($viTriThienPhu, 6);
    $this->diaBan->nhapSao($viTriThatSat, $saoThatSat);

    $viTriPhaQuan = $this->amDuong->dichCung($viTriThienPhu, 10);
    $this->diaBan->nhapSao($viTriPhaQuan, $saoPhaQuan);

    $viTriLocTon = $thienCan[$canNam]['vitriDiaBan'];
    $this->diaBan->nhapSao($viTriLocTon, $saoLocTon, $saoBacSy);

    $amDuongNamNu = $gioiTinh * $amDuongNamSinh;
    $viTriLucSi = $this->amDuong->dichCung($viTriLocTon, 1 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriLucSi, $saoLucSi);

    $viTriThanhLong = $this->amDuong->dichCung($viTriLocTon, 2 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriThanhLong, $saoThanhLong);

    $viTriTieuHao = $this->amDuong->dichCung($viTriLocTon, 3 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriTieuHao, $saoTieuHao);

    $viTriTuongQuan = $this->amDuong->dichCung($viTriLocTon, 4 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriTuongQuan, $saoTuongQuan);

    $viTriTauThu = $this->amDuong->dichCung($viTriLocTon, 5 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriTauThu, $saoTauThu);

    $viTriPhiLiem = $this->amDuong->dichCung($viTriLocTon, 6 * $amDuongNamNu);
    $this->diaBan->nhapSao($viTriPhiLiem, $saoPhiLiem);

    $viTriHyThan = $this->amDuong->dichCung($viTriLocTon, 7 * $amDuongNamNu);
    $this->diaBan->nhapSao(viTriHyThan, saoHyThan);

    $viTriBenhPhu = $this->amDuong->dichCung($viTriLocTon, 8 * $amDuongNamNu);
    $this->diaBan->nhapSao(viTriBenhPhu, saoBenhPhu);

    viTriDaiHao = $this->amDuong->dichCung(viTriLocTon, 9 * amDuongNamNu);
    $this->diaBan->nhapSao(viTriDaiHao, saoDaiHao);

    viTriPhucBinh = $this->amDuong->dichCung(viTriLocTon, 10 * amDuongNamNu);
    $this->diaBan->nhapSao(viTriPhucBinh, saoPhucBinh);

    viTriQuanPhu2 = $this->amDuong->dichCung(viTriLocTon, 11 * amDuongNamNu);
    $this->diaBan->nhapSao(viTriQuanPhu2, saoQuanPhu2);

    viTriThaiTue = chiNam;
    $this->diaBan->nhapSao(viTriThaiTue, saoThaiTue);

    viTriThieuDuong = $this->amDuong->dichCung(viTriThaiTue, 1);
    $this->diaBan->nhapSao(viTriThieuDuong, saoThieuDuong, saoThienKhong);

    viTriTangMon = $this->amDuong->dichCung(viTriThaiTue, 2);
    $this->diaBan->nhapSao(viTriTangMon, saoTangMon);

    viTriThieuAm = $this->amDuong->dichCung(viTriThaiTue, 3);
    $this->diaBan->nhapSao(viTriThieuAm, saoThieuAm);

    viTriQuanPhu3 = $this->amDuong->dichCung(viTriThaiTue, 4);
    $this->diaBan->nhapSao(viTriQuanPhu3, saoQuanPhu3);

    viTriTuPhu = $this->amDuong->dichCung(viTriThaiTue, 5);
    $this->diaBan->nhapSao(viTriTuPhu, saoTuPhu, saoNguyetDuc);

    viTriTuePha = $this->amDuong->dichCung(viTriThaiTue, 6);
    $this->diaBan->nhapSao(viTriTuePha, saoTuePha);

    viTriLongDuc = $this->amDuong->dichCung(viTriThaiTue, 7);
    $this->diaBan->nhapSao(viTriLongDuc, saoLongDuc);

    viTriBachHo = $this->amDuong->dichCung(viTriThaiTue, 8);
    $this->diaBan->nhapSao(viTriBachHo, saoBachHo);

    viTriPhucDuc = $this->amDuong->dichCung(viTriThaiTue, 9);
    $this->diaBan->nhapSao(viTriPhucDuc, saoPhucDuc, saoThienDuc);

    viTriDieuKhach = $this->amDuong->dichCung(viTriThaiTue, 10);
    $this->diaBan->nhapSao(viTriDieuKhach, saoDieuKhach);

    viTriTrucPhu = $this->amDuong->dichCung(viTriThaiTue, 11);
    $this->diaBan->nhapSao(viTriTrucPhu, saoTrucPhu);

    viTriTrangSinh = timTrangSinh($cucSo);
    $this->diaBan->nhapSao(viTriTrangSinh, saoTrangSinh);

    viTriMocDuc = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 1);
    $this->diaBan->nhapSao(viTriMocDuc, saoMocDuc);

    viTriQuanDoi = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 2);
    $this->diaBan->nhapSao(viTriQuanDoi, saoQuanDoi);

    viTriLamQuan = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 3);
    $this->diaBan->nhapSao(viTriLamQuan, saoLamQuan);

    viTriDeVuong = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 4);
    $this->diaBan->nhapSao(viTriDeVuong, saoDeVuong);

    viTriSuy = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 5);
    $this->diaBan->nhapSao(viTriSuy, saoSuy);

    viTriBenh = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 6);
    $this->diaBan->nhapSao(viTriBenh, saoBenh);

    viTriTu = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 7);
    $this->diaBan->nhapSao(viTriTu, saoTu);

    viTriMo = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 8)
    $this->diaBan->nhapSao(viTriMo, saoMo);

    viTriTuyet = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * 9);
    $this->diaBan->nhapSao(viTriTuyet, saoTuyet);

    viTriThai = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * (-1));
    $this->diaBan->nhapSao(viTriThai, saoThai);

    viTriDuong = $this->amDuong->dichCung(viTriTrangSinh, amDuongNamNu * (-2));
    $this->diaBan->nhapSao(viTriDuong, saoDuong);

    viTriDaLa = $this->amDuong->dichCung(viTriLocTon, -1);
    $this->diaBan->nhapSao(viTriDaLa, saoDaLa);

    viTriKinhDuong = $this->amDuong->dichCung(viTriLocTon, 1);
    $this->diaBan->nhapSao(viTriKinhDuong, saoKinhDuong);

    viTriDiaKiep = $this->amDuong->dichCung(11, gioSinh);
    $this->diaBan->nhapSao(viTriDiaKiep, saoDiaKiep);

    viTriDiaKhong = $this->amDuong->dichCung(12, 12 - viTriDiaKiep);
    $this->diaBan->nhapSao(viTriDiaKhong, saoDiaKhong);

    $viTriHoaTinh, $viTriLinhTinh = timHoaLinh(chiNam, gioSinh, gioiTinh, amDuongNamSinh);
    $this->diaBan->nhapSao(viTriHoaTinh, saoHoaTinh);
    $this->diaBan->nhapSao(viTriLinhTinh, saoLinhTinh);
    viTriLongTri = $this->amDuong->dichCung(5, chiNam - 1);
    $this->diaBan->nhapSao(viTriLongTri, saoLongTri);
    viTriPhuongCac = $this->amDuong->dichCung(2, 2 - viTriLongTri);
    $this->diaBan->nhapSao(viTriPhuongCac, saoPhuongCac, saoGiaiThan);
    viTriTaPhu = $this->amDuong->dichCung(5, tt - 1);
    $this->diaBan->nhapSao(viTriTaPhu, saoTaPhu);
    viTriHuuBat = $this->amDuong->dichCung(2, 2 - viTriTaPhu);
    $this->diaBan->nhapSao(viTriHuuBat, saoHuuBat);
    viTriVanKhuc = $this->amDuong->dichCung(5, gioSinh - 1);
    $this->diaBan->nhapSao(viTriVanKhuc, saoVanKhuc);
    viTriVanXuong = $this->amDuong->dichCung(2, 2 - viTriVanKhuc);
    $this->diaBan->nhapSao(viTriVanXuong, saoVanXuong);
    viTriTamThai = $this->amDuong->dichCung(5, tt + nn - 2);
    $this->diaBan->nhapSao(viTriTamThai, saoTamThai);
    viTriBatToa = $this->amDuong->dichCung(2, 2 - viTriTamThai);
    $this->diaBan->nhapSao(viTriBatToa, saoBatToa);
    viTriAnQuang = $this->amDuong->dichCung(viTriVanXuong, nn - 2);
    $this->diaBan->nhapSao(viTriAnQuang, saoAnQuang);
    viTriThienQuy = $this->amDuong->dichCung(2, 2 - viTriAnQuang);
    $this->diaBan->nhapSao(viTriThienQuy, saoThienQuy);
    viTriThienKhoi = timThienKhoi(canNam);
    $this->diaBan->nhapSao(viTriThienKhoi, saoThienKhoi);
    viTriThienViet = $this->amDuong->dichCung(5, 5 - viTriThienKhoi);
    $this->diaBan->nhapSao(viTriThienViet, saoThienViet);
    viTriThienHu = $this->amDuong->dichCung(7, chiNam - 1);
    $this->diaBan->nhapSao(viTriThienHu, saoThienHu);
    viTriThienKhoc = $this->amDuong->dichCung(7, -chiNam + 1);
    $this->diaBan->nhapSao(viTriThienKhoc, saoThienKhoc);
    viTriThienTai = $this->amDuong->dichCung(diaBan.cungMenh, chiNam - 1);
    $this->diaBan->nhapSao(viTriThienTai, saoThienTai);
    viTriThienTho = $this->amDuong->dichCung(diaBan.cungThan, chiNam - 1);
    $this->diaBan->nhapSao(viTriThienTho, saoThienTho);
    viTriHongLoan = $this->amDuong->dichCung(4, -chiNam + 1);
    $this->diaBan->nhapSao(viTriHongLoan, saoHongLoan);
    viTriThienHy = $this->amDuong->dichCung(viTriHongLoan, 6);
    $this->diaBan->nhapSao(viTriThienHy, saoThienHy);
    viTriThienQuan, viTriThienPhuc = timThienQuanThienPhuc(canNam);
    $this->diaBan->nhapSao(viTriThienQuan, saoThienQuan);
    $this->diaBan->nhapSao(viTriThienPhuc, saoThienPhuc);
    viTriThienHinh = $this->amDuong->dichCung(10, tt - 1);
    $this->diaBan->nhapSao(viTriThienHinh, saoThienHinh);
    viTriThienRieu = $this->amDuong->dichCung(viTriThienHinh, 4);
    $this->diaBan->nhapSao(viTriThienRieu, saoThienRieu, saoThienY);
    viTriCoThan = timCoThan(chiNam);
    $this->diaBan->nhapSao(viTriCoThan, saoCoThan);
    viTriQuaTu = $this->amDuong->dichCung(viTriCoThan, -4);
    $this->diaBan->nhapSao(viTriQuaTu, saoQuaTu);
    viTriVanTinh = $this->amDuong->dichCung(viTriKinhDuong, 2);
    $this->diaBan->nhapSao(viTriVanTinh, saoVanTinh);
    viTriDuongPhu = $this->amDuong->dichCung(viTriVanTinh, 2);
    $this->diaBan->nhapSao(viTriDuongPhu, saoDuongPhu);
    viTriQuocAn = $this->amDuong->dichCung(viTriDuongPhu, 3);
    $this->diaBan->nhapSao(viTriQuocAn, saoQuocAn);
    viTriThaiPhu = $this->amDuong->dichCung(viTriVanKhuc, 2);
    $this->diaBan->nhapSao(viTriThaiPhu, saoThaiPhu);
    viTriPhongCao = $this->amDuong->dichCung(viTriVanKhuc, -2);
    $this->diaBan->nhapSao(viTriPhongCao, saoPhongCao);
    viTriThienGiai = $this->amDuong->dichCung(9, (2 * tt) - 2);
    $this->diaBan->nhapSao(viTriThienGiai, saoThienGiai);
    viTriDiaGiai = $this->amDuong->dichCung(viTriTaPhu, 3);
    $this->diaBan->nhapSao(viTriDiaGiai, saoDiaGiai);
    viTriThienLa = 5;
    $this->diaBan->nhapSao(viTriThienLa, saoThienLa);
    viTriDiaVong = 11;
    $this->diaBan->nhapSao(viTriDiaVong, saoDiaVong);
    viTriThienThuong = diaBan.cungNoboc;
    $this->diaBan->nhapSao(viTriThienThuong, saoThienThuong);
    viTriThienSu = diaBan.cungTatAch;
    $this->diaBan->nhapSao(viTriThienSu, saoThienSu);
    viTriThienMa = timThienMa(chiNam);
    $this->diaBan->nhapSao(viTriThienMa, saoThienMa);
    viTriHoaCai = $this->amDuong->dichCung(viTriThienMa, 2);
    $this->diaBan->nhapSao(viTriHoaCai, saoHoaCai);
    viTriKiepSat = $this->amDuong->dichCung(viTriThienMa, 3);
    $this->diaBan->nhapSao(viTriKiepSat, saoKiepSat);
    viTriDaoHoa = $this->amDuong->dichCung(viTriKiepSat, 4);
    $this->diaBan->nhapSao(viTriDaoHoa, saoDaoHoa);
    viTriPhaToai = timPhaToai(chiNam);
    $this->diaBan->nhapSao(viTriPhaToai, saoPhaToai);
    viTriDauQuan = $this->amDuong->dichCung(chiNam, -tt + gioSinh);
    $this->diaBan->nhapSao(viTriDauQuan, saoDauQuan);

    if canNam == 1:
        $viTriHoaLoc = $viTriLiemTrinh
        $viTriHoaQuyen = $viTriPhaQuan
        viTriHoaKhoa = viTriVuKhuc
        viTriHoaKy = vitriThaiDuong
    elif canNam == 2:
        viTriHoaLoc = viTriThienCo
        viTriHoaQuyen = viTriThienLuong
        viTriHoaKhoa = $viTriTuVi
        viTriHoaKy = viTriThaiAm
    elif canNam == 3:
        viTriHoaLoc = viTriThienDong
        viTriHoaQuyen = viTriThienCo
        viTriHoaKhoa = viTriVanXuong
        viTriHoaKy = viTriLiemTrinh
    elif canNam == 4:
        viTriHoaLoc = viTriThaiAm
        viTriHoaQuyen = viTriThienDong
        viTriHoaKhoa = viTriThienCo
        viTriHoaKy = viTriCuMon
    elif canNam == 5:
        viTriHoaLoc = viTriThamLang
        viTriHoaQuyen = viTriThaiAm
        viTriHoaKhoa = viTriHuuBat
        viTriHoaKy = viTriThienCo
    elif canNam == 6:
        viTriHoaLoc = viTriVuKhuc
        viTriHoaQuyen = viTriThamLang
        viTriHoaKhoa = viTriThienLuong
        viTriHoaKy = viTriVanKhuc
    elif canNam == 7:
        viTriHoaLoc = vitriThaiDuong
        viTriHoaQuyen = viTriVuKhuc
        viTriHoaKhoa = viTriThienDong
        viTriHoaKy = viTriThaiAm
    elif canNam == 8:
        viTriHoaLoc = viTriCuMon
        viTriHoaQuyen = vitriThaiDuong
        viTriHoaKhoa = viTriVanKhuc
        viTriHoaKy = viTriVanXuong
    elif canNam == 9:
        viTriHoaLoc = viTriThienLuong
        viTriHoaQuyen = $viTriTuVi
        viTriHoaKhoa = viTriThienPhu
        viTriHoaKy = viTriVuKhuc
    elif canNam == 10:
        viTriHoaLoc = viTriPhaQuan
        viTriHoaQuyen = viTriCuMon
        viTriHoaKhoa = viTriThaiAm
        viTriHoaKy = viTriThamLang

    $this->diaBan->nhapSao(viTriHoaLoc, saoHoaLoc)
    $this->diaBan->nhapSao(viTriHoaQuyen, saoHoaQuyen)
    $this->diaBan->nhapSao(viTriHoaKhoa, saoHoaKhoa)
    $this->diaBan->nhapSao(viTriHoaKy, saoHoaKy)

    #  An Lưu Hà - Thiên Trù
    # Sách cụ Thiên Lương không đề cập đến 2 sao này
    # Mong mọi người kiểm chứng
    viTriLuuHa, viTriThienTru = timLuuTru(canNam)
    $this->diaBan->nhapSao(viTriLuuHa, saoLuuHa)
    $this->diaBan->nhapSao(viTriThienTru, saoThienTru)

    # An Tuần, Triệt
    ketThucTuan = $this->amDuong->dichCung(chiNam, 10 - canNam)
    viTriTuan1 = $this->amDuong->dichCung(ketThucTuan, 1)
    viTriTuan2 = $this->amDuong->dichCung(viTriTuan1, 1)
    diaBan.nhapTuan(viTriTuan1, viTriTuan2)

    viTriTriet1, viTriTriet2 = timTriet(canNam)
    diaBan.nhapTriet(viTriTriet1, viTriTriet2)
    return (diaBan)
    }
}
