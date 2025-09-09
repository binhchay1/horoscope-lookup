<?php

namespace App\Driver;

class ThienBan
{
    public static function lapThienBan($nn, $tt, $nnnn, $gioSinh, $gioiTinh, $ten, $diaBan, $duongLich = true, $timeZone = 7)
    {
        if ($duongLich) {
            [$nn, $tt, $nnnn] = AmDuong::ngayThangNam($nn, $tt, $nnnn, true, $timeZone);
        }

        [$canThang, $canNam, $chiNam] = AmDuong::ngayThangNamCanChi($nn, $tt, $nnnn, false, $timeZone);
        [$canNgay, $chiNgay] = AmDuong::canChiNgay($nn, $tt, $nnnn, false, $timeZone);

        $gioStr = self::tenGio($gioSinh);
        $gioiTinhStr = ((int)$gioiTinh === 1) ? 'Nam' : 'Nữ';

        return [
            'ho_ten' => $ten,
            'am_lich' => [
                'ngay' => $nn,
                'thang' => $tt,
                'nam' => $nnnn,
            ],
            'can_chi' => [
                'can_nam' => $canNam,
                'chi_nam' => $chiNam,
                'can_thang' => $canThang,
                'can_ngay' => $canNgay,
                'chi_ngay' => $chiNgay,
            ],
            'gio_sinh' => $gioStr,
            'gioi_tinh' => $gioiTinhStr,
            'cuc' => AmDuong::nguHanh(AmDuong::timCuc($diaBan->cungMenh, $canNam))->tenCuc,
            'cung_menh' => $diaBan->cungMenh,
            'cung_than' => $diaBan->cungThan,
        ];
    }

    private static function tenGio($gio)
    {
        $arr = [
            1 => 'Tý', 2 => 'Sửu', 3 => 'Dần', 4 => 'Mão', 5 => 'Thìn', 6 => 'Tỵ',
            7 => 'Ngọ', 8 => 'Mùi', 9 => 'Thân', 10 => 'Dậu', 11 => 'Tuất', 12 => 'Hợi'
        ];
        return $arr[$gio] ?? '';
    }
}
