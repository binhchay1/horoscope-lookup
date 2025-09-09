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
            [$nn, $tt, $nnnn, $thangNhuan] = AmDuong::ngayThangNam($nn, $tt, $nnnn, true, $timeZone);
        }

        $diaBan = new DiaBan($tt, $gioSinh);

        [$canThang, $canNam, $chiNam] = AmDuong::ngayThangNamCanChi($nn, $tt, $nnnn, false, $timeZone);
        $amDuongNamSinh = AmDuong::THIEN_CAN[$canNam]['amDuong'];
        $amDuongChiNamSinh = AmDuong::DIA_CHI[$chiNam]['amDuong'];

        $hanhCuc = AmDuong::timCuc($diaBan->cungMenh, $canNam);
        $cuc = AmDuong::nguHanh($hanhCuc);
        $cucSo = $cuc->cuc;

        $diaBan->nhapDaiHan($cucSo, $gioiTinh * $amDuongChiNamSinh);
        $khoiHan = AmDuong::dichCung(11, -3 * ($chiNam - 1));
        $diaBan->nhapTieuHan($khoiHan, $gioiTinh, $chiNam);

        $s = SaoCatalog::all();

        $viTriTuVi = AmDuong::timTuVi($cucSo, $nn);
        $diaBan->nhapSao($viTriTuVi, $s['tu_vi']);

        $viTriThienPhu = AmDuong::dichCung(3, 3 - $viTriTuVi);
        $diaBan->nhapSao($viTriThienPhu, $s['thien_phu']);

        $viTriLiemTrinh = AmDuong::dichCung($viTriTuVi, 4);
        $diaBan->nhapSao($viTriLiemTrinh, $s['liem_trinh']);
        $viTriThienDong = AmDuong::dichCung($viTriTuVi, 7);
        $diaBan->nhapSao($viTriThienDong, $s['thien_dong']);
        $viTriVuKhuc = AmDuong::dichCung($viTriTuVi, 8);
        $diaBan->nhapSao($viTriVuKhuc, $s['vu_khuc']);
        $viTriThaiDuong = AmDuong::dichCung($viTriTuVi, 9);
        $diaBan->nhapSao($viTriThaiDuong, $s['thai_duong']);
        $viTriThienCo = AmDuong::dichCung($viTriTuVi, 11);
        $diaBan->nhapSao($viTriThienCo, $s['thien_co']);
        $viTriThaiAm = AmDuong::dichCung($viTriThienPhu, 1);
        $diaBan->nhapSao($viTriThaiAm, $s['thai_am']);
        $viTriThamLang = AmDuong::dichCung($viTriThienPhu, 2);
        $diaBan->nhapSao($viTriThamLang, $s['tham_lang']);
        $viTriCuMon = AmDuong::dichCung($viTriThienPhu, 3);
        $diaBan->nhapSao($viTriCuMon, $s['cu_mon']);
        $viTriThienTuong = AmDuong::dichCung($viTriThienPhu, 4);
        $diaBan->nhapSao($viTriThienTuong, $s['thien_tuong']);
        $viTriThienLuong = AmDuong::dichCung($viTriThienPhu, 5);
        $diaBan->nhapSao($viTriThienLuong, $s['thien_luong']);
        $viTriThatSat = AmDuong::dichCung($viTriThienPhu, 6);
        $diaBan->nhapSao($viTriThatSat, $s['that_sat']);
        $viTriPhaQuan = AmDuong::dichCung($viTriThienPhu, 10);
        $diaBan->nhapSao($viTriPhaQuan, $s['pha_quan']);

        $viTriLocTon = AmDuong::THIEN_CAN[$canNam]['vitriDiaBan'] ?? null;
        if (!empty($viTriLocTon)) {
            $diaBan->nhapSao($viTriLocTon, $s['loc_ton'], $s['bac_sy']);
            $diaBan->nhapSao(AmDuong::dichCung($viTriLocTon, -1), $s['da_la']);
            $diaBan->nhapSao(AmDuong::dichCung($viTriLocTon, 1), $s['kinh_duong']);
        }

        $viTriVanKhuc = AmDuong::dichCung(5, $gioSinh - 1);
        $diaBan->nhapSao($viTriVanKhuc, $s['van_khuc']);
        $viTriVanXuong = AmDuong::dichCung(2, 2 - $viTriVanKhuc);
        $diaBan->nhapSao($viTriVanXuong, $s['van_xuong']);

        $viTriTaPhu = AmDuong::dichCung(5, $tt - 1);
        $diaBan->nhapSao($viTriTaPhu, $s['ta_phu']);
        $viTriHuuBat = AmDuong::dichCung(2, 2 - $viTriTaPhu);
        $diaBan->nhapSao($viTriHuuBat, $s['huu_bat']);

        $hoa = self::hoaTinhTheoCan($canNam, $viTriTuVi, $viTriThienPhu, $viTriVanKhuc, $viTriVanXuong);
        if ($hoa['loc']) $diaBan->nhapSao($hoa['loc'], $s['hoa_loc']);
        if ($hoa['quyen']) $diaBan->nhapSao($hoa['quyen'], $s['hoa_quyen']);
        if ($hoa['khoa']) $diaBan->nhapSao($hoa['khoa'], $s['hoa_khoa']);
        if ($hoa['ky']) $diaBan->nhapSao($hoa['ky'], $s['hoa_ky']);

        $viTriThaiTue = $chiNam;
        $diaBan->nhapSao($viTriThaiTue, $s['thai_tue']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 1), $s['thieu_duong'], $s['thien_khong']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 2), $s['tang_mon']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 3), $s['thieu_am']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 4), $s['quan_phu']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 5), $s['tu_phu'], $s['nguyet_duc']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 6), $s['tue_pha']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 7), $s['long_duc']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 8), $s['bach_ho']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 9), $s['phuc_duc'], $s['thien_duc']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 10), $s['dieu_khach']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThaiTue, 11), $s['truc_phu']);

        $viTriTrangSinh = AmDuong::timTrangSinh($cucSo);
        $diaBan->nhapSao($viTriTrangSinh, $s['trang_sinh']);
        $amDuongNamNu = $gioiTinh * $amDuongNamSinh;
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 1), $s['moc_duc']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 2), $s['quan_doi']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 3), $s['lam_quan']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 4), $s['de_vuong']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 5), $s['suy']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 6), $s['benh']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 7), $s['tu']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 8), $s['mo']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * 9), $s['tuyet']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * (-1)), $s['thai']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriTrangSinh, $amDuongNamNu * (-2)), $s['duong']);

        $viTriDiaKiep = AmDuong::dichCung(11, $gioSinh);
        $diaBan->nhapSao($viTriDiaKiep, $s['dia_kiep']);
        $diaBan->nhapSao(AmDuong::dichCung(12, 12 - $viTriDiaKiep), $s['dia_khong']);

        [$viTriHoaTinh, $viTriLinhTinh] = AmDuong::timHoaLinh($chiNam, $gioSinh, $gioiTinh, $amDuongNamSinh);
        $diaBan->nhapSao($viTriHoaTinh, $s['hoa_tinh']);
        $diaBan->nhapSao($viTriLinhTinh, $s['linh_tinh']);

        $viTriLongTri = AmDuong::dichCung(5, $chiNam - 1);
        $diaBan->nhapSao($viTriLongTri, $s['long_tri']);
        $diaBan->nhapSao(AmDuong::dichCung(2, 2 - $viTriLongTri), $s['phuong_cac'], $s['giai_than']);

        $viTriTamThai = AmDuong::dichCung(5, $tt + $nn - 2);
        $diaBan->nhapSao($viTriTamThai, $s['tam_thai']);
        $diaBan->nhapSao(AmDuong::dichCung(2, 2 - $viTriTamThai), $s['bat_toa']);

        $viTriAnQuang = AmDuong::dichCung($viTriVanXuong, $nn - 2);
        $diaBan->nhapSao($viTriAnQuang, $s['an_quang']);
        $diaBan->nhapSao(AmDuong::dichCung(2, 2 - $viTriAnQuang), $s['thien_quy']);

        $viTriThienKhoi = AmDuong::timThienKhoi($canNam);
        $diaBan->nhapSao($viTriThienKhoi, $s['thien_khoi']);
        $diaBan->nhapSao(AmDuong::dichCung(5, 5 - $viTriThienKhoi), $s['thien_viet']);

        $diaBan->nhapSao(AmDuong::dichCung(7, $chiNam - 1), $s['thien_hu']);
        $diaBan->nhapSao(AmDuong::dichCung(7, -$chiNam + 1), $s['thien_khoc']);

        $viTriHongLoan = AmDuong::dichCung(4, -$chiNam + 1);
        $diaBan->nhapSao($viTriHongLoan, $s['hong_loan']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriHongLoan, 6), $s['thien_hy']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriHongLoan, 4), $s['dao_hoa']);

        [$viTriThienQuan, $viTriThienPhuc] = AmDuong::timThienQuanThienPhuc($canNam);
        $diaBan->nhapSao($viTriThienQuan, $s['thien_quan']);
        $diaBan->nhapSao($viTriThienPhuc, $s['thien_phuc']);

        $viTriThienHinh = AmDuong::dichCung(10, $tt - 1);
        $diaBan->nhapSao($viTriThienHinh, $s['thien_hinh']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriThienHinh, 4), $s['thien_rieu'], $s['thien_y']);

        $diaBan->nhapSao(AmDuong::timCoThan($chiNam), $s['co_than']);
        $diaBan->nhapSao(AmDuong::dichCung(AmDuong::timCoThan($chiNam), -4), $s['qua_tu']);

        $viTriVanTinh2 = AmDuong::dichCung(AmDuong::dichCung($viTriLocTon ?? 3, 1), 1);
        $diaBan->nhapSao($viTriVanTinh2, $s['van_tinh']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriVanTinh2, 2), $s['duong_phu']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriVanTinh2, 3), $s['quoc_an']);
        $diaBan->nhapSao($viTriVanKhuc, $s['thai_phu']);
        $diaBan->nhapSao(AmDuong::dichCung($viTriVanKhuc, -2), $s['phong_cao']);

        return $diaBan;
    }

    private static function hoaTinhTheoCan($canNam, $viTriTuVi, $viTriThienPhu, $viTriVanKhuc, $viTriVanXuong)
    {
        $loc = $quyen = $khoa = $ky = null;
        switch ($canNam) {
            case 1: // Giáp
                $loc = AmDuong::dichCung($viTriThienPhu, -1); // giả lập
                $quyen = $viTriThienPhu;
                $khoa = $viTriVanKhuc;
                $ky = $viTriVanXuong;
                break;
            case 2: // Ất
                $loc = $viTriThienPhu;
                $quyen = AmDuong::dichCung($viTriTuVi, 1);
                $khoa = $viTriTuVi;
                $ky = AmDuong::dichCung($viTriThienPhu, 1);
                break;
            default:
                $loc = $viTriTuVi;
                $quyen = AmDuong::dichCung($viTriTuVi, 4);
                $khoa = $viTriVanKhuc;
                $ky = $viTriVanXuong;
        }
        return ['loc' => $loc, 'quyen' => $quyen, 'khoa' => $khoa, 'ky' => $ky];
    }
}
