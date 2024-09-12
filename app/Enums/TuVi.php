<?php

namespace App\Enums;

class TuVi
{
    const TI = "Tí";
    const SUU = "Sửu";
    const DAN = "Dần";
    const MEO = "Mẹo";
    const THIN = "Thìn";
    const TY = "Tỵ";
    const NGO = "Ngọ";
    const MUI = "Mùi";
    const THAN = "Thân";
    const DAU = "Dậu";
    const TUAT = "Tuất";
    const HOI = "Hợi";

    const CANH = "Canh";
    const TAN = "Tân";
    const NHAM = "Nhâm";
    const QUY = "Quý";
    const GIAP = "Giáp";
    const AT = "Át";
    const BINH = "Bính";
    const DINH = "Đinh";
    const MAU = "Mậu";
    const KY = "Kỷ";

    const CHU_NHAT = "Chủ nhật";
    const THU_HAI = "Thứ hai";
    const THU_BA = "Thứ ba";
    const THU_TU = "Thứ tư";
    const THU_NAM = "Thứ năm";
    const THU_SAU = "Thứ sáu";
    const THU_BAY = "Thứ bảy";

    const DUONG = "Dương";
    const AM = "Âm";

    const NAM = "Nam";
    const NU = "Nữ";

    const KIM = "Kim";
    const MOC = "Mộc";
    const THUY = "Thuỷ";
    const HOA = "Hoả";
    const THO = "Thổ";

    const MENH = "Mệnh";
    const PHU_MAU = "Phụ mẫu";
    const PHUC_DUC = "Phúc đức";
    const DIEN_TRACH = "Điền trạch";
    const QUAN_LOC = "Quan lộc";
    const NO_BOC = "Nô bộc";
    const THIEN_DI = "Thiên di";
    const TAT_ACH = "Tật ách";
    const TAI_BACH = "Tài bạch";
    const TU_TUC = "Tử tức";
    const PHU_THE = "Phu thê";
    const HUYNH_DE = "Huynh đệ";

    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function equalsName($otherName)
    {
        return $this->name === $otherName;
    }

    public static function getConstant($constantName)
    {
        return new self(constant("self::" . $constantName));
    }
}
