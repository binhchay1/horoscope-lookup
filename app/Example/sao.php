<?php

require_once 'lasotuvi/AmDuong.php';

class Sao
{
    private $saoID;
    private $saoTen;
    private $saoNguHanh;
    private $saoLoai;
    private $saoPhuongVi;
    private $saoAmDuong;
    private $vongTrangSinh;
    private $cssSao;
    private $saoDacTinh;

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

// Tử vi tinh hệ
$saoTuVi = new Sao(1, "Tử vi", "O", 1, "Đế tinh", 1, 0);
$saoLiemTrinh = new Sao(2, "Liêm trinh", "H", 1, "Bắc đẩu tinh", 1, 0);
$saoThienDong = new Sao(3, "Thiên đồng", "T", 1, "Bắc đẩu tinh", 1, 0);
$saoVuKhuc = new Sao(4, "Vũ khúc", "K", 1, "Bắc đẩu tinh", -1, 0);
$saoThaiDuong = new Sao(5, "Thái Dương", "H", 1, "Nam đẩu tinh", 1, 0);
$saoThienCo = new Sao(6, "Thiên cơ", "M", 1, "Nam đẩu tinh", -1, 0);

// Thiên phủ tinh hệ
$saoThienPhu = new Sao(7, "Thiên phủ", "O", 1, "Nam đẩu tinh", 1, 0);
$saoThaiAm = new Sao(8, "Thái âm", "T", 1, "Bắc đẩu tinh", -1, 0);
$saoThamLang = new Sao(9, "Tham lang", "T", 1, "Bắc đẩu tinh", -1, 0);
$saoCuMon = new Sao(10, "Cự môn", "T", 1, "Bắc đẩu tinh", -1, 0);
$saoThienTuong = new Sao(11, "Thiên tướng", "T", 1, "Nam đẩu tinh", 1, 0);
$saoThienLuong = new Sao(12, "Thiên lương", "M", 1, "Nam đẩu tinh", -1, 0);
$saoThatSat = new Sao(13, "Thất sát", "K", 1, "Nam đẩu tinh", 1, 0);
$saoPhaQuan = new Sao(14, "Phá quân", "T", 1, "Bắc đẩu tinh", -1, 0);

// Vòng Địa chi - Thái tuế
$saoThaiTue = new Sao(15, "Thái tuế", "H", 15, "", 0);
$saoThieuDuong = new Sao(16, "Thiếu dương", "H", 5);
$saoTangMon = new Sao(17, "Tang môn", "M", 12);
$saoThieuAm = new Sao(18, "Thiếu âm", "T", 5);
$saoQuanPhu3 = new Sao(19, "Quan phù", "H", 12);
$saoTuPhu = new Sao(20, "Tử phù", "K", 12);
$saoTuePha = new Sao(21, "Tuế phá", "H", 12);
$saoLongDuc = new Sao(22, "Long đức", "T", 5);
$saoBachHo = new Sao(23, "Bạch hổ", "K", 12);
$saoPhucDuc = new Sao(24, "Phúc đức", "O", 5);
$saoDieuKhach = new Sao(25, "Điếu khách", "H", 12);
$saoTrucPhu = new Sao(26, "Trực phù", "K", 16);

//  Vòng Thiên can - Lộc tồn
$saoLocTon = new Sao(27, "Lộc tồn", "O", 3, "Bắc đẩu tinh");
$saoBacSy = new Sao(109, "Bác sỹ", "T", 5);
$saoLucSi = new Sao(28, "Lực sĩ", "H", 2);
$saoThanhLong = new Sao(29, "Thanh long", "T", 5);
$saoTieuHao = new Sao(30, "Tiểu hao", "H", 12);
$saoTuongQuan = new Sao(31, "Tướng quân", "M", 4);
$saoTauThu = new Sao(32, "Tấu thư", "K", 3);
$saoPhiLiem = new Sao(33, "Phi liêm", "H", 2);
$saoHyThan = new Sao(34, "Hỷ thần", "H", 5);
$saoBenhPhu = new Sao(35, "Bệnh phù", "O", 12);
$saoDaiHao = new Sao(36, "Đại hao", "H", 12);
$saoPhucBinh = new Sao(37, "Phục binh", "H", 13);
$saoQuanPhu2 = new Sao(38, "Quan phù", "H", 12);

// Vòng Tràng sinh
$saoTrangSinh = new Sao(39, "Tràng sinh", "T", 5, 1);
$saoMocDuc = new Sao(40, "Mộc dục", "T", 14, 1);
$saoQuanDoi = new Sao(41, "Quan đới", "K", 4, 1);
$saoLamQuan = new Sao(42, "Lâm quan", "K", 7, 1);
$saoDeVuong = new Sao(43, "Đế vượng", "K", 5, 1);
$saoSuy = new Sao(44, "Suy", "T", 12, 1);
$saoBenh = new Sao(45, "Bệnh", "H", 12, 1);
$saoTu = new Sao(46, "Tử", "H", 12, 1);
$saoMo = new Sao(47, "Mộ", "O", 1);
$saoTuyet = new Sao(48, "Tuyệt", "O", 12, 1);
$saoThai = new Sao(49, "Thai", "O", 14, 1);
$saoDuong = new Sao(50, "Dưỡng", "M", 2, 1);

// Lục sát
//    Kình dương đà la
$saoDaLa = new Sao(51, "Đà la", "K", 11);
$saoKinhDuong = new Sao(52, "Kình dương", "K", 11);

//    Địa không - Địa kiếp
$saoDiaKhong = new Sao(53, "Địa không", "H", 11);
$saoDiaKiep = new Sao(54, "Địa kiếp", "H", 11);

//    Hỏa tinh - Linh tinh
$saoLinhTinh = new Sao(55, "Linh tinh", "H", 11);
$saoHoaTinh = new Sao(56, "Hỏa tinh", "H", 11);

// Sao Âm Dương
//    Văn xương - Văn khúc
$saoVanXuong = new Sao(57, "Văn xương", "K", 6);
$saoVanKhuc = new Sao(58, "Văn Khúc", "T", 6);

//    Thiên khôi - Thiên Việt
$saoThienKhoi = new Sao(59, "Thiên khôi", "H", 6);
$saoThienViet = new Sao(60, "Thiên việt", "H", 6);

//    Tả phù - Hữu bật
$saoTaPhu = new Sao(61, "Tả phù", "O", 2);
$saoHuuBat = new Sao(62, "Hữu bật", "O", 2);

//    Long trì - Phượng các
$saoLongTri = new Sao(63, "Long trì", "T", 3);
$saoPhuongCac = new Sao(64, "Phượng các", "O", 3);

//    Tam thai - Bát tọa
$saoTamThai = new Sao(65, "Tam thai", "M", 7);
$saoBatToa = new Sao(66, "Bát tọa", "T", 7);

//    Ân quang - Thiên quý
$saoAnQuang = new Sao(67, "Ân quang", "M", 3);
$saoThienQuy = new Sao(68, "Thiên quý", "O", 3);

// Sao đôi khác
$saoThienKhoc = new Sao(69, "Thiên khốc", "T", 12);
$saoThienHu = new Sao(70, "Thiên hư", "T", 12);
$saoThienDuc = new Sao(71, "Thiên đức", "H", 5);
$saoNguyetDuc = new Sao(72, "Nguyệt đức", "H", 5);
$saoThienHinh = new Sao(73, "Thiên hình", "H", 15);
$saoThienRieu = new Sao(74, "Thiên riêu", "T", 13);
$saoThienY = new Sao(75, "Thiên y", "T", 5);
$saoQuocAn = new Sao(76, "Quốc ấn", "O", 6);
$saoDuongPhu = new Sao(77, "Đường phù", "M", 4);
$saoDaoHoa = new Sao(78, "Đào hoa", "M", 8);
$saoHongLoan = new Sao(79, "Hồng loan", "T", 8);
$saoThienHy = new Sao(80, "Thiên hỷ", "T", 5);
$saoThienGiai = new Sao(81, "Thiên giải", "H", 5);
$saoDiaGiai = new Sao(82, "Địa giải", "O", 5);
$saoGiaiThan = new Sao(83, "Giải thần", "M", 5);
$saoThaiPhu = new Sao(84, "Thai phụ", "K", 6);
$saoPhongCao = new Sao(85, "Phong cáo", "O", 4);
$saoThienTai = new Sao(86, "Thiên tài", "O", 2);
$saoThienTho = new Sao(87, "Thiên thọ", "O", 5);
$saoThienThuong = new Sao(88, "Thiên thương", "O", 12);
$saoThienSu = new Sao(89, "Thiên sứ", "T", 12);
$saoThienLa = new Sao(90, "Thiên la", "O", 12);
$saoDiaVong = new Sao(91, "Địa võng", "O", 12);
$saoHoaKhoa = new Sao(92, "Hóa khoa", "T", 5);
$saoHoaQuyen = new Sao(93, "Hóa quyền", "T", 4);
$saoHoaLoc = new Sao(94, "Hóa lộc", "M", 3);
$saoHoaKy = new Sao(95, "Hóa kỵ", "T", 13);
$saoCoThan = new Sao(96, "Cô thần", "O", 13);
$saoQuaTu = new Sao(97, "Quả tú", "O", 13);
$saoThienMa = new Sao(98, "Thiên mã", "H", 3);
$saoPhaToai = new Sao(99, "Phá toái", "H", 12);
$saoThienQuan = new Sao(100, "Thiên quan", "H", 5);
$saoThienPhuc = new Sao(101, "Thiên phúc", "H", 5);
$saoLuuHa = new Sao(102, "Lưu hà", "T", 12);
$saoThienTru = new Sao(103, "Thiên trù", "O", 5);
$saoKiepSat = new Sao(104, "Kiếp sát", "H", 11);
$saoHoaCai = new Sao(105, "Hoa cái", "K", 14);
$saoVanTinh = new Sao(106, "Văn tinh", "H", 6);
$saoDauQuan = new Sao(107, "Đẩu quân", "H", 5);
$saoThienKhong = new Sao(108, "Thiên không", "T", 11);
