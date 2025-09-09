<?php

namespace App\Driver;

class Interpreter
{
    public static function duDoan(DiaBan $diaBan)
    {
        $ketQua = [
            'tong_quan' => [],
            'menh' => [],
            'tai_bach' => [],
            'quan_loc' => [],
            'tinh_duyen' => [],
            'suc_khoe' => [],
            'dien_giai_cac_cung' => [],
            'van_ban' => [
                'tong_quan' => '',
                'menh' => '',
                'tai_bach' => '',
                'quan_loc' => '',
                'tinh_duyen' => '',
                'suc_khoe' => ''
            ]
        ];

        // Mẫu diễn giải rất giản lược: dựa vào chủ tinh tại cung Mệnh và một số sao phụ
        $cungMenh = $diaBan->cungMenh;
        $saoMenh = $diaBan->thapNhiCung[$cungMenh]->cungSao ?? [];
        $tenSaoMenh = array_map(function ($s) { return $s['ten']; }, $saoMenh);

        if (in_array('Tử vi', $tenSaoMenh)) {
            $ketQua['menh'][] = 'Có Tử Vi thủ Mệnh: chủ khí chất lãnh đạo, dễ nắm quyền.';
        }
        if (in_array('Thiên phủ', $tenSaoMenh)) {
            $ketQua['menh'][] = 'Thiên Phủ thủ Mệnh: cẩn trọng, tích lũy tốt, phúc ấm.';
        }

        // Quan Lộc và Tài Bạch: dịch cung từ Mệnh
        $cungQuanLoc = AmDuong::dichCung($cungMenh, 4);
        $cungTaiBach = AmDuong::dichCung($cungMenh, 8);
        $saoQuanLoc = $diaBan->thapNhiCung[$cungQuanLoc]->cungSao ?? [];
        $saoTaiBach = $diaBan->thapNhiCung[$cungTaiBach]->cungSao ?? [];
        $tenSaoQuan = array_map(function ($s) { return $s['ten']; }, $saoQuanLoc);
        $tenSaoTai = array_map(function ($s) { return $s['ten']; }, $saoTaiBach);

        if (in_array('Vũ khúc', $tenSaoQuan)) {
            $ketQua['quan_loc'][] = 'Vũ Khúc ở Quan Lộc: hợp tài chính, kỹ thuật, quản trị.';
        }
        if (in_array('Lộc tồn', $tenSaoTai)) {
            $ketQua['tai_bach'][] = 'Lộc Tồn ở Tài Bạch: tài lộc ổn định, biết tiết kiệm.';
        }

        // Tình duyên (Phu Thê) và Sức khỏe (Tật Ách)
        $cungPhuThe = AmDuong::dichCung($cungMenh, 10);
        $cungTatAch = AmDuong::dichCung($cungMenh, 7);
        $tenSaoPhuThe = array_map(function ($s) { return $s['ten']; }, $diaBan->thapNhiCung[$cungPhuThe]->cungSao ?? []);
        $tenSaoTatAch = array_map(function ($s) { return $s['ten']; }, $diaBan->thapNhiCung[$cungTatAch]->cungSao ?? []);

        if (in_array('Thiên tướng', $tenSaoPhuThe)) {
            $ketQua['tinh_duyen'][] = 'Thiên Tướng ở Phu Thê: phối ngẫu có khí chất, biết nâng đỡ.';
        }
        if (in_array('Cự môn', $tenSaoPhuThe)) {
            $ketQua['tinh_duyen'][] = 'Cự Môn ở Phu Thê: dễ khẩu thiệt, cần thấu hiểu nhau.';
        }

        if (in_array('Thiên cơ', $tenSaoTatAch)) {
            $ketQua['suc_khoe'][] = 'Thiên Cơ ở Tật Ách: nên chú trọng gan mật, điều độ sinh hoạt.';
        }

        // Tổng quan
        $ketQua['tong_quan'][] = 'Bản mệnh và cung sao chỉ là một phần, cần xét đại hạn, tiểu hạn và vận niên.';

        // Diễn giải 12 cung
        for ($i = 1; $i <= 12; $i++) {
            $ketQua['dien_giai_cac_cung'][] = [
                'cung' => $diaBan->thapNhiCung[$i]->cungChu,
                'nhan_dinh' => self::dienGiaiCung($diaBan, $i)
            ];
        }

        // Build narrative text
        $ketQua['van_ban']['menh'] = self::ketNoi($ketQua['menh']);
        $ketQua['van_ban']['tai_bach'] = self::ketNoi($ketQua['tai_bach']);
        $ketQua['van_ban']['quan_loc'] = self::ketNoi($ketQua['quan_loc']);
        $ketQua['van_ban']['tinh_duyen'] = self::ketNoi($ketQua['tinh_duyen']);
        $ketQua['van_ban']['suc_khoe'] = self::ketNoi($ketQua['suc_khoe']);
        $ketQua['van_ban']['tong_quan'] = self::ketNoi($ketQua['tong_quan']);

        return $ketQua;
    }

    private static function dienGiaiCung(DiaBan $db, int $cungSo)
    {
        $sao = $db->thapNhiCung[$cungSo]->cungSao ?? [];
        $ten = array_map(function ($s) { return $s['ten']; }, $sao);
        $out = [];

        $has = function(array $names) use ($ten) {
            foreach ($names as $n) {
                if (in_array($n, $ten)) return true;
            }
            return false;
        };

        if ($has(['Tử vi'])) {
            $out[] = 'Tử Vi: chủ quyền uy, định hướng rõ ràng, có chí tiến thủ.';
        }
        if ($has(['Thiên phủ'])) {
            $out[] = 'Thiên Phủ: cẩn trọng, tích lũy, ổn định, trọng tín nghĩa.';
        }
        if ($has(['Vũ khúc'])) {
            $out[] = 'Vũ Khúc: mạnh về tài chính, kỷ luật, nghề kỹ thuật/tài chính phù hợp.';
        }
        if ($has(['Thiên cơ'])) {
            $out[] = 'Thiên Cơ: mưu lược, thích thay đổi, cần tránh do dự kéo dài.';
        }
        if ($has(['Tham lang'])) {
            $out[] = 'Tham Lang: ưa giao tế, hưởng thụ; nên tiết chế để tránh sa đà.';
        }
        if ($has(['Cự môn'])) {
            $out[] = 'Cự Môn: khẩu thiệt thị phi; cần mềm mỏng trong giao tiếp.';
        }
        if ($has(['Thất sát'])) {
            $out[] = 'Thất Sát: quyết liệt, dễ cực đoan; phù hợp môi trường cạnh tranh.';
        }
        if ($has(['Phá quân'])) {
            $out[] = 'Phá Quân: tinh thần đổi mới, phá cách; nên hướng vào cải tiến tích cực.';
        }
        if ($has(['Thái Dương'])) {
            $out[] = 'Thái Dương: danh tiếng, quý nhân nam; cẩn trọng khi ở hãm địa.';
        }
        if ($has(['Thái âm'])) {
            $out[] = 'Thái Âm: tài khố, quý nhân nữ; hợp nghề tài chính/bất động sản.';
        }
        if ($has(['Lộc tồn', 'Hóa lộc'])) {
            $out[] = 'Lộc: tài lộc thuận, có nguồn thu ổn định/đột biến.';
        }
        if ($has(['Hóa quyền'])) {
            $out[] = 'Quyền: có quyền hạn/ảnh hưởng; hợp vị trí quản lý.';
        }
        if ($has(['Hóa khoa'])) {
            $out[] = 'Khoa: học hành/uy tín, dễ được công nhận.';
        }
        if ($has(['Hóa kỵ'])) {
            $out[] = 'Kỵ: trở ngại, hao tổn; cần kiên nhẫn, tránh nóng vội.';
        }
        if ($has(['Văn xương', 'Văn Khúc'])) {
            $out[] = 'Văn tinh: trí tuệ, học thuật, viết lách, truyền thông thuận.';
        }
        if ($has(['Tả phù', 'Hữu bật'])) {
            $out[] = 'Tả Hữu: được trợ lực, đồng đội tốt, dễ thành công khi hợp tác.';
        }
        if ($has(['Kình dương', 'Đà la'])) {
            $out[] = 'Kình Đà: cạnh tranh, trở lực; cần thận trọng trong quyết định.';
        }
        if ($has(['Địa không', 'Địa kiếp'])) {
            $out[] = 'Không Kiếp: biến động mạnh; nên hành sự thận trọng, tránh đầu cơ.';
        }

        return $out;
    }

    private static function ketNoi(array $lines)
    {
        $lines = array_values(array_filter($lines));
        if (empty($lines)) return '';
        return implode(' ', $lines);
    }
}


