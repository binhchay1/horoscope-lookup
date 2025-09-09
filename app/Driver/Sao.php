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
        $this->cssSao = AmDuong::nguHanh($saoNguHanh)->css;
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

class SaoCatalog
{
    public static function all()
    {
        return [
            'tu_vi' => new Sao(1, "Tử vi", "O", 1, "Đế tinh", 1, 0),
            'liem_trinh' => new Sao(2, "Liêm trinh", "H", 1, "Bắc đẩu tinh", 1, 0),
            'thien_dong' => new Sao(3, "Thiên đồng", "T", 1, "Bắc đẩu tinh", 1, 0),
            'vu_khuc' => new Sao(4, "Vũ khúc", "K", 1, "Bắc đẩu tinh", -1, 0),
            'thai_duong' => new Sao(5, "Thái Dương", "H", 1, "Nam đẩu tinh", 1, 0),
            'thien_co' => new Sao(6, "Thiên cơ", "M", 1, "Nam đẩu tinh", -1, 0),
            'thien_phu' => new Sao(7, "Thiên phủ", "O", 1, "Nam đẩu tinh", 1, 0),
            'thai_am' => new Sao(8, "Thái âm", "T", 1, "Bắc đẩu tinh", -1, 0),
            'tham_lang' => new Sao(9, "Tham lang", "T", 1, "Bắc đẩu tinh", -1, 0),
            'cu_mon' => new Sao(10, "Cự môn", "T", 1, "Bắc đẩu tinh", -1, 0),
            'thien_tuong' => new Sao(11, "Thiên tướng", "T", 1, "Nam đẩu tinh", 1, 0),
            'thien_luong' => new Sao(12, "Thiên lương", "M", 1, "Nam đẩu tinh", -1, 0),
            'that_sat' => new Sao(13, "Thất sát", "K", 1, "Nam đẩu tinh", 1, 0),
            'pha_quan' => new Sao(14, "Phá quân", "T", 1, "Bắc đẩu tinh", -1, 0),
            // Thai Tue series
            'thai_tue' => new Sao(15, "Thái tuế", "H", 15, "", 0),
            'thieu_duong' => new Sao(16, "Thiếu dương", "H", 5),
            'tang_mon' => new Sao(17, "Tang môn", "M", 12),
            'thieu_am' => new Sao(18, "Thiếu âm", "T", 5),
            'quan_phu' => new Sao(19, "Quan phù", "H", 12),
            'tu_phu' => new Sao(20, "Tử phù", "K", 12),
            'tue_pha' => new Sao(21, "Tuế phá", "H", 12),
            'long_duc' => new Sao(22, "Long đức", "T", 5),
            'bach_ho' => new Sao(23, "Bạch hổ", "K", 12),
            'phuc_duc' => new Sao(24, "Phúc đức", "O", 5),
            'dieu_khach' => new Sao(25, "Điếu khách", "H", 12),
            'truc_phu' => new Sao(26, "Trực phù", "K", 16),
            // Trang Sinh cycle
            'loc_ton' => new Sao(27, "Lộc tồn", "O", 3, "Bắc đẩu tinh"),
            'luc_si' => new Sao(28, "Lực sĩ", "H", 2),
            'thanh_long' => new Sao(29, "Thanh long", "T", 5),
            'tieu_hao' => new Sao(30, "Tiểu hao", "H", 12),
            'tuong_quan' => new Sao(31, "Tướng quân", "M", 4),
            'tau_thu' => new Sao(32, "Tấu thư", "K", 3),
            'phi_liem' => new Sao(33, "Phi liêm", "H", 2),
            'hy_than' => new Sao(34, "Hỷ thần", "H", 5),
            'benh_phu' => new Sao(35, "Bệnh phù", "O", 12),
            'dai_hao' => new Sao(36, "Đại hao", "H", 12),
            'phuc_binh' => new Sao(37, "Phục binh", "H", 13),
            'quan_phu2' => new Sao(38, "Quan phù", "H", 12),
            'trang_sinh' => new Sao(39, "Tràng sinh", "T", 5, "", 0, 1),
            'moc_duc' => new Sao(40, "Mộc dục", "T", 14, "", 0, 1),
            'quan_doi' => new Sao(41, "Quan đới", "K", 4, "", 0, 1),
            'lam_quan' => new Sao(42, "Lâm quan", "K", 7, "", 0, 1),
            'de_vuong' => new Sao(43, "Đế vượng", "K", 5, "", 0, 1),
            'suy' => new Sao(44, "Suy", "T", 12, "", 0, 1),
            'benh' => new Sao(45, "Bệnh", "H", 12, "", 0, 1),
            'tu' => new Sao(46, "Tử", "H", 12, "", 0, 1),
            'mo' => new Sao(47, "Mộ", "O", 2, "", 0, 1),
            'tuyet' => new Sao(48, "Tuyệt", "O", 12, "", 0, 1),
            'thai' => new Sao(49, "Thai", "O", 14, "", 0, 1),
            'duong' => new Sao(50, "Dưỡng", "M", 2, "", 0, 1),
            // Sát tinh/Không Kiếp
            'da_la' => new Sao(51, "Đà la", "K", 11),
            'kinh_duong' => new Sao(52, "Kình dương", "K", 11),
            'dia_khong' => new Sao(53, "Địa không", "H", 11),
            'dia_kiep' => new Sao(54, "Địa kiếp", "H", 11),
            'linh_tinh' => new Sao(55, "Linh tinh", "H", 11),
            'hoa_tinh' => new Sao(56, "Hỏa tinh", "H", 11),
            // Văn tinh
            'van_xuong' => new Sao(57, "Văn xương", "K", 6),
            'van_khuc' => new Sao(58, "Văn Khúc", "T", 6),
            // Quý tinh
            'thien_khoi' => new Sao(59, "Thiên khôi", "H", 6),
            'thien_viet' => new Sao(60, "Thiên việt", "H", 6),
            'ta_phu' => new Sao(61, "Tả phù", "O", 2),
            'huu_bat' => new Sao(62, "Hữu bật", "O", 2),
            'long_tri' => new Sao(63, "Long trì", "T", 3),
            'phuong_cac' => new Sao(64, "Phượng các", "O", 3),
            'tam_thai' => new Sao(65, "Tam thai", "M", 7),
            'bat_toa' => new Sao(66, "Bát tọa", "T", 7),
            'an_quang' => new Sao(67, "Ân quang", "M", 3),
            'thien_quy' => new Sao(68, "Thiên quý", "O", 3),
            'thien_khoc' => new Sao(69, "Thiên khốc", "T", 12),
            'thien_hu' => new Sao(70, "Thiên hư", "T", 12),
            'thien_duc' => new Sao(71, "Thiên đức", "H", 5),
            'nguyet_duc' => new Sao(72, "Nguyệt đức", "H", 5),
            'thien_hinh' => new Sao(73, "Thiên hình", "H", 15),
            'thien_rieu' => new Sao(74, "Thiên riêu", "T", 13),
            'thien_y' => new Sao(75, "Thiên y", "T", 5),
            'quoc_an' => new Sao(76, "Quốc ấn", "O", 6),
            'duong_phu' => new Sao(77, "Đường phù", "M", 4),
            'dao_hoa' => new Sao(78, "Đào hoa", "M", 8),
            'hong_loan' => new Sao(79, "Hồng loan", "T", 8),
            'thien_hy' => new Sao(80, "Thiên hỷ", "T", 5),
            'thien_giai' => new Sao(81, "Thiên giải", "H", 5),
            'dia_giai' => new Sao(82, "Địa giải", "O", 5),
            'giai_than' => new Sao(83, "Giải thần", "M", 5),
            'thai_phu' => new Sao(84, "Thai phụ", "K", 6),
            'phong_cao' => new Sao(85, "Phong cáo", "O", 4),
            'thien_tai' => new Sao(86, "Thiên tài", "O", 2),
            'thien_tho' => new Sao(87, "Thiên thọ", "O", 5),
            'thien_thuong' => new Sao(88, "Thiên thương", "O", 12),
            'thien_su' => new Sao(89, "Thiên sứ", "T", 12),
            'thien_la' => new Sao(90, "Thiên la", "O", 12),
            'dia_vong' => new Sao(91, "Địa võng", "O", 12),
            'hoa_khoa' => new Sao(92, "Hóa khoa", "T", 5),
            'hoa_quyen' => new Sao(93, "Hóa quyền", "T", 4),
            'hoa_loc' => new Sao(94, "Hóa lộc", "M", 3),
            'hoa_ky' => new Sao(95, "Hóa kỵ", "T", 13),
            'co_than' => new Sao(96, "Cô thần", "O", 13),
            'qua_tu' => new Sao(97, "Quả tú", "O", 13),
            'thien_ma' => new Sao(98, "Thiên mã", "H", 3),
            'pha_toai' => new Sao(99, "Phá toái", "H", 12),
            'thien_quan' => new Sao(100, "Thiên quan", "H", 5),
            'thien_phuc' => new Sao(101, "Thiên phúc", "H", 5),
            'luu_ha' => new Sao(102, "Lưu hà", "T", 12),
            'thien_tru' => new Sao(103, "Thiên trù", "O", 5),
            'kiep_sat' => new Sao(104, "Kiếp sát", "H", 11),
            'hoa_cai' => new Sao(105, "Hoa cái", "K", 14),
            'van_tinh' => new Sao(106, "Văn tinh", "H", 6),
            'dau_quan' => new Sao(107, "Đẩu quân", "H", 5),
            'thien_khong' => new Sao(108, "Thiên không", "T", 11),
            'bac_sy' => new Sao(109, "Bác sỹ", "T", 5),
        ];
    }
}
