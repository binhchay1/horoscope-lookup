<?php

namespace App\Driver;

use Exception;
use App\Driver\Lich_HND;

class AmDuong
{
    const thienCan = [
        [
            "id" => 0,
            "chuCaiDau" => '',
            "tenCan" => '',
            "nguHanh" => '',
            "nguHanhID" => '',
            "vitriDiaBan" => '',
            "amDuong" => ''
        ],
        [
            "id" => 1,
            "chuCaiDau" => "G",
            "tenCan" => "Giáp",
            "nguHanh" => "M",
            "nguHanhID" => 2,
            "vitriDiaBan" => 3,
            'amDuong' => 1
        ],
        [
            "id" => 2,
            "chuCaiDau" => "A",
            "tenCan" => "Ất",
            "nguHanh" => "M",
            "nguHanhID" => 2,
            "vitriDiaBan" => 4,
            'amDuong' => -1
        ],
        [
            "id" => 3,
            "chuCaiDau" => "B",
            "tenCan" => "Bính",
            "nguHanh" => "H",
            "nguHanhID" => 4,
            "vitriDiaBan" => 6,
            'amDuong' => 1
        ],
        [
            "id" => 4,
            "chuCaiDau" => "D",
            "tenCan" => "Đinh",
            "nguHanh" => "H",
            "nguHanhID" => 4,
            "vitriDiaBan" => 7,
            'amDuong' => -1
        ],
        [
            "id" => 5,
            "chuCaiDau" => "M",
            "tenCan" => "Mậu",
            "nguHanh" => "O",
            "nguHanhID" => 5,
            "vitriDiaBan" => 6,
            'amDuong' => 1
        ],
        [
            "id" => 6,
            "chuCaiDau" => "K",
            "tenCan" => "Kỷ",
            "nguHanh" => "O",
            "nguHanhID" => 5,
            "vitriDiaBan" => 7,
            'amDuong' => -1
        ],
        [
            "id" => 7,
            "chuCaiDau" => "C",
            "tenCan" => "Canh",
            "nguHanh" => "K",
            "nguHanhID" => 1,
            "vitriDiaBan" => 9,
            'amDuong' => 1
        ],
        [
            "id" => 8,
            "chuCaiDau" => "T",
            "tenCan" => "Tân",
            "nguHanh" => "K",
            "nguHanhID" => 1,
            "vitriDiaBan" => 10,
            'amDuong' => -1
        ],
        [
            "id" => 9,
            "chuCaiDau" => "N",
            "tenCan" => "Nhâm",
            "nguHanh" => "T",
            "nguHanhID" => 3,
            "vitriDiaBan" => 12,
            'amDuong' => 1
        ],
        [
            "id" => 10,
            "chuCaiDau" => "Q",
            "tenCan" => "Quý",
            "nguHanh" => "T",
            "nguHanhID" => 3,
            "vitriDiaBan" => 1,
            'amDuong' => -1
        ]
    ];

    const diaChi = [
        [
            "id" => 0,
            "tenChi" => "Hem có",
            "tenHanh" => " =>D",
            "amDuong" => 0
        ],
        [
            "id" => 1,
            "tenChi" => "Tý",
            "tenHanh" => "T",
            "menhChu" => "Tham lang",
            "thanChu" => "Linh tinh",
            "amDuong" => 1
        ],
        [
            "id" => 2,
            "tenChi" => "Sửu",
            "tenHanh" => "O",
            "menhChu" => "Cự môn",
            "thanChu" => "Thiên tướng",
            "amDuong" => -1
        ],
        [
            "id" => 3,
            "tenChi" => "Dần",
            "tenHanh" => "M",
            "menhChu" => "Lộc tồn",
            "thanChu" => "Thiên lương",
            "amDuong" => 1
        ],
        [
            "id" => 4,
            "tenChi" => "Mão",
            "tenHanh" => "M",
            "menhChu" => "Văn khúc",
            "thanChu" => "Thiên đồng",
            "amDuong" => -1
        ],
        [
            "id" => 5,
            "tenChi" => "Thìn",
            "tenHanh" => "O",
            "menhChu" => "Liêm trinh",
            "thanChu" => "Văn xương",
            "amDuong" => 1
        ],
        [
            "id" => 6,
            "tenChi" => "Tỵ",
            "tenHanh" => "H",
            "menhChu" => "Vũ khúc",
            "thanChu" => "Thiên cơ",
            "amDuong" => -1
        ],
        [
            "id" => 7,
            "tenChi" => "Ngọ",
            "tenHanh" => "H",
            "menhChu" => "Phá quân",
            "thanChu" => "Hỏa tinh",
            "amDuong" => 1
        ],
        [
            "id" => 8,
            "tenChi" => "Mùi",
            "tenHanh" => "O",
            "menhChu" => "Vũ khúc",
            "thanChu" => "Thiên tướng",
            "amDuong" => -1
        ],
        [
            "id" => 9,
            "tenChi" => "Thân",
            "tenHanh" => "K",
            "menhChu" => "Liêm trinh",
            "thanChu" => "Thiên lương",
            "amDuong" => 1
        ],
        [
            "id" => 10,
            "tenChi" => "Dậu",
            "tenHanh" => "K",
            "menhChu" => "Văn khúc",
            "thanChu" => "Thiên đồng",
            "amDuong" => -1
        ],
        [
            "id" => 11,
            "tenChi" => "Tuất",
            "tenHanh" => "O",
            "menhChu" => "Lộc tồn",
            "thanChu" => "Văn xương",
            "amDuong" => 1
        ],
        [
            "id" => 12,
            "tenChi" => "Hợi",
            "tenHanh" => "T",
            "menhChu" => "Cự môn",
            "thanChu" => "Thiên cơ",
            "amDuong" => -1
        ]
    ];

    public static function ngayThangNam($nn, $tt, $nnn, $duongLich = true, $timeZone = 7)
    {
        $thangNhuan = 0;

        if ($nn > 0 and $nn < 32 and $tt < 13 and $tt > 0) {
            if ($duongLich) {
                $result = Lich_HND::S2L($nn, $tt, $nnn, $timeZone);
                $nn = $result[0];
                $tt = $result[1];
                $nnn = $result[2];
                $thangNhuan = $result[3];

                $return = [$nn, $tt, $nnn, $thangNhuan];

                return $return;
            }
        } else {
            Exception('Ngày, tháng, năm không chính xác.');
        }
    }

    public static function canChiNgay($nn, $tt, $nnnn, $duongLich = true, $timeZone = 7, $thangNhuan = false)
    {
        if (!$duongLich) {
            $result = Lich_HND::L2S($nn, $tt, $nnnn, $thangNhuan, $timeZone);
            $nn = $result[0];
            $tt = $result[1];
            $nnnn = $result[2];
        }

        $jd = Lich_HND::jdFromDate($nn, $tt, $nnnn);
        $canNgay = ($jd + 9) % 10 + 1;
        $chiNgay = ($jd + 1) % 12 + 1;

        return [$canNgay, $chiNgay];
    }

    public static function ngayThangNamCanChi($nn, $tt, $nnnn, $duongLich = true, $timeZone = 7)
    {
        if ($duongLich) {
            $result = AmDuong::ngayThangNam($nn, $tt, $nnnn, $timeZone);
            $nn = $result[0];
            $tt = $result[1];
            $nnnn = $result[2];
        }

        $canThang = ($nnnn * 12 + $tt + 3) % 10 + 1;
        $canNamSinh = ($nnnn + 6) % 10 + 1;
        $chiNam = ($nnnn + 8) % 12 + 1;

        return [$canThang, $canNamSinh, $chiNam];
    }

    public static function nguHanh($tenHanh)
    {
        if ($tenHanh == "Kim" or $tenHanh == "K") {
            return (object) [
                "id" => 1,
                "tenHanh" => "Kim",
                "cuc" => 4,
                "tenCuc" => "Kim tứ Cục",
                "css" => "hanhKim"
            ];
        } else if ($tenHanh == "Moc" or $tenHanh == "M") {
            return (object) [
                "id" => 2,
                "tenHanh" => "Mộc",
                "cuc" => 3,
                "tenCuc" => "Mộc tam Cục",
                "css" => "hanhMoc"
            ];
        } else if ($tenHanh == "Thuy" or $tenHanh == "T") {
            return (object) [
                "id" => 3,
                "tenHanh" => "Thủy",
                "cuc" => 2,
                "tenCuc" => "Thủy nhị Cục",
                "css" => "hanhThuy"
            ];
        } else if ($tenHanh == "Hoa" or $tenHanh == "H") {
            return (object) [
                "id" => 4,
                "tenHanh" => "Hỏa",
                "cuc" => 6,
                "tenCuc" => "Hỏa lục Cục",
                "css" => "hanhHoa"
            ];
        } else if ($tenHanh == "Hoa" or $tenHanh == "H") {
            return (object) [
                "id" => 4,
                "tenHanh" => "Hỏa",
                "cuc" => 6,
                "tenCuc" => "Hỏa lục Cục",
                "css" => "hanhHoa"
            ];
        } else if ($tenHanh == "Tho" or $tenHanh == "O") {
            return (object) [
                "id" => 5,
                "tenHanh" => "Thổ",
                "cuc" => 5,
                "tenCuc" => "Thổ ngũ Cục",
                "css" => "hanhTho"
            ];
        } else {
            Exception("Tên Hành phải thuộc Kim (K), Mộc (M), Thủy (T), Hỏa (H) hoặc Thổ (O)");
        }
    }

    public static function sinhKhac($hanh1, $hanh2)
    {
        $matranSinhKhac = [
            [null, null, null, null, null, null],
            [null, 0, -1, 1, [0, -1], [0, 1]],
            [null, [0, -1], 0, [0, 1], 1, -1],
            [null, [0, 1], 1, 0, 1, [0, -1]],
            [null, -1, [0, 1], [0, -1], 0, 1],
            [null, 1, [0, -1], -1, [0, 1], 0]
        ];
        return $matranSinhKhac[$hanh1][$hanh2];
    }

    public static function nguHanhNapAm($diaChi, $thienCan, $xuatBanMenh = false)
    {
        $banMenh = (object) [
            "K1" => "HẢI TRUNG KIM",
            "T1" => "GIÁNG HẠ THỦY",
            "H1" => "TÍCH LỊCH HỎA",
            "O1" => "BÍCH THƯỢNG THỔ",
            "M1" => "TANG ÐỐ MỘC",
            "T2" => "ÐẠI KHÊ THỦY",
            "H2" => "LƯ TRUNG HỎA",
            "O2" => "THÀNH ÐẦU THỔ",
            "M2" => "TÒNG BÁ MỘC",
            "K2" => "KIM BẠCH KIM",
            "H3" => "PHÚ ÐĂNG HỎA",
            "O3" => "SA TRUNG THỔ",
            "M3" => "ÐẠI LÂM MỘC",
            "K3" => "BẠCH LẠP KIM",
            "T3" => "TRƯỜNG LƯU THỦY",
            "K4" => "SA TRUNG KIM",
            "T4" => "THIÊN HÀ THỦY",
            "H4" => "THIÊN THƯỢNG HỎA",
            "O4" => "LỘ BÀN THỔ",
            "M4" => "DƯƠNG LIỄU MỘC",
            "T5" => "TRUYỀN TRUNG THỦY",
            "H5" => "SƠN HẠ HỎA",
            "O5" => "ÐẠI TRẠCH THỔ",
            "M5" => "THẠCH LỰU MỘC",
            "K5" => "KIẾM PHONG KIM",
            "H6" => "SƠN ÐẦU HỎA",
            "O6" => "ỐC THƯỢNG THỔ",
            "M6" => "BÌNH ÐỊA MỘC",
            "K6" => "XOA XUYẾN KIM",
            "T6" => "ÐẠI HẢI THỦY"
        ];

        $matranNapAm = [
            [0, "G", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "N", "Q"],
            [1, "K1", false, "T1", false, "H1", false, "O1", false, "M1", false],
            [2, false, "K1", false, "T1", false, "H1", false, "O1", false, "M1"],
            [3, "T2", false, "H2", false, "O2", false, "M2", false, "K2", false],
            [4, false, "T2", false, "H2", false, "O2", false, "M2", false, "K2"],
            [5, "H3", false, "O3", false, "M3", false, "K3", false, "T3", false],
            [6, false, "H3", false, "O3", false, "M3", false, "K3", false, "T3"],
            [7, "K4", false, "T4", false, "H4", false, "O4", false, "M4", false],
            [8, false, "K4", false, "T4", false, "H4", false, "O4", false, "M4"],
            [9, "T5", false, "H5", false, "O5", false, "M5", false, "K5", false],
            [10, false, "T5", false, "H5", false, "O5", false, "M5", false, "K5"],
            [11, "H6", false, "O6", false, "M6", false, "K6", false, "T6", false],
            [12, false, "H6", false, "O6", false, "M6", false, "K6", false, "T6"]
        ];

        try {
            $nh = $matranNapAm[$diaChi][$thienCan];
            if (in_array($nh[0], ["K", "M", "T", "H", "O"])) {
                if ($xuatBanMenh) {
                    return $banMenh[$nh];
                } else {
                    return $nh[0];
                }
            }
        } catch (Exception $e) {
            Exception($e);
        }
    }

    public static function dichCung($cungBanDau, ...$args)
    {
        $cungSauKhiDich = int($cungBanDau);
        foreach ($args as $soCungDich) {
            $cungSauKhiDich += int($soCungDich);
        }

        if ($cungSauKhiDich % 12 == 0) {
            return 12;
        }

        return $cungSauKhiDich % 12;
    }

    public static function khoangCachCung($cung1, $cung2, $chieu = 1)
    {
        if ($chieu == 1) {
            return ($cung1 - $cung2 + 12) % 12;
        } else {
            return ($cung2 - $cung1 + 12) % 12;
        }
    }

    public static function timCuc($viTriCungMenhTrenDiaBan, $canNamSinh)
    {
        $canThangGieng = ($canNamSinh * 2 + 1) % 10;
        $canThangMenh = (($viTriCungMenhTrenDiaBan - 3) % 12 + $canThangGieng) % 10;
        if ($canThangMenh == 0) {
            $canThangMenh = 10;
        }

        return AmDuong::nguHanhNapAm($viTriCungMenhTrenDiaBan, $canThangMenh);
    }

    public static function timTuVi($cuc, $ngaySinhAmLich)
    {
        $cungDan = 3;
        $cucBanDau = $cuc;
        if (!in_array($cuc, [2, 3, 4, 5, 6])) {
            Exception("Số cục phải là 2, 3, 4, 5, 6");
        }

        while ($cuc < $ngaySinhAmLich) {
            $cuc += $cucBanDau;
            $cungDan += 1;
        }

        $saiLech = $cuc - $ngaySinhAmLich;
        if ($saiLech % 2 == 1) {
            $saiLech = -$saiLech;
        }

        return AmDuong::dichCung($cungDan, $saiLech);
    }

    public static function timTrangSinh($cucSo)
    {
        if ($cucSo == 6) {
            return 3;
        } else if ($cucSo == 4) {
            return 6;
        } else if ($cucSo == 2 or $cucSo == 5) {
            return 9;
        } else if ($cucSo == 3) {
            return 12;
        } else {
            Exception("Không tìm được cung an sao Trường sinh");
        }
    }

    public static function timHoaLinh($chiNamSinh, $gioSinh, $gioiTinh, $amDuongNamSinh)
    {
        if (in_array($chiNamSinh, [3, 7, 11])) {
            $khoiCungHoaTinh = 2;
            $khoiCungLinhTinh = 4;
        } else if (in_array($chiNamSinh, [1, 5, 9])) {
            $khoiCungHoaTinh = 3;
            $khoiCungLinhTinh = 11;
        } else if (in_array($chiNamSinh, [6, 10, 2])) {
            $khoiCungHoaTinh = 11;
            $khoiCungLinhTinh = 4;
        } else if (in_array($chiNamSinh, [12, 4, 8])) {
            $khoiCungHoaTinh = 10;
            $khoiCungLinhTinh = 11;
        } else {
            Exception("Không thể khởi cung tìm Hỏa-Linh");
        }

        if (($gioiTinh * $amDuongNamSinh) == -1) {
            $viTriHoaTinh = AmDuong::dichCung($khoiCungHoaTinh + 1, (-1) * $gioSinh);
            $viTriLinhTinh = AmDuong::dichCung($khoiCungLinhTinh - 1, $gioSinh);
        } else if (($gioiTinh * $amDuongNamSinh) == 1) {
            $viTriHoaTinh = AmDuong::dichCung($khoiCungHoaTinh - 1, $gioSinh);
            $viTriLinhTinh = AmDuong::dichCung($khoiCungLinhTinh + 1, (-1) * $gioSinh);
        }

        return [$viTriHoaTinh, $viTriLinhTinh];
    }


    public static function timThienKhoi($canNam)
    {
        $khoiViet = [null, 2, 1, 12, 10, 8, 1, 8, 7, 6, 4];

        return $khoiViet[$canNam];
    }

    public static function timThienQuanThienPhuc($canNam)
    {
        $thienQuan = [null, 8, 5, 6, 3, 4, 10, 12, 10, 11, 7];
        $thienPhuc = [null, 10, 9, 1, 12, 4, 3, 7, 6, 7, 6];

        return [$thienQuan[$canNam], $thienPhuc[$canNam]];
    }

    public static function timCoThan($chiNam)
    {
        if (in_array($chiNam, [12, 1, 2])) {
            return 3;
        } else if (in_array($chiNam, [3, 4, 5])) {
            return 6;
        } else if (in_array($chiNam, [6, 7, 8])) {
            return 9;
        } else {
            return 12;
        }
    }

    public static function timThienMa($chiNam)
    {
        $demNghich = $chiNam % 4;
        if ($demNghich == 1) {
            return 3;
        } else if ($demNghich == 2) {
            return 12;
        } else if ($demNghich == 3) {
            return 9;
        } else if ($demNghich == 0) {
            return 6;
        } else {
            Exception("Không tìm được Thiên mã");
        }
    }

    public static function timPhaToai($chiNam)
    {
        $demNghich = $chiNam % 3;
        if ($demNghich == 0) {
            return 6;
        } else if ($demNghich == 1) {
            return 10;
        } else if ($demNghich == 2) {
            return 2;
        } else {
            Exception("Không tìm được Phá toái");
        }
    }

    public static function timTriet($canNam)
    {
        if ((in_array($canNam, [1, 6]))) {
            return [9, 10];
        } else if (in_array($canNam, [2, 7])) {
            return [7, 8];
        } else if (in_array($canNam, [3, 8])) {
            return [5, 6];
        } else if (in_array($canNam, [4, 9])) {
            return [3, 4];
        } else if (in_array($canNam, [5, 10])) {
            return [1, 2];
        } else {
            Exception("Không tìm được Triệt");
        }
    }

    public static function timLuuTru($canNam)
    {
        $maTranLuuHa = [null, 10, 11, 8, 5, 6, 7, 9, 4, 12, 3];
        $maTranThienTru = [null, 6, 7, 1, 6, 7, 9, 3, 7, 10, 11];

        return [$maTranLuuHa[$canNam], $maTranThienTru[$canNam]];
    }
}
