<?php

namespace App\Driver;

class DuongLichAmLichUtility
{
    private static $LOCAL_TIMEZONE = 7.0; // VIETNAM

    public static function INT($d)
    {
        return floor($d);
    }

    public static function MOD($x, $y)
    {
        $z = $x - (int) ($y * floor((float) $x / $y));
        if ($z == 0) {
            $z = $y;
        }
        return $z;
    }

    public static function UniversalToJD($D, $M, $Y)
    {
        $JD;
        if ($Y > 1582 || ($Y == 1582 && $M > 10) || ($Y == 1582 && $M == 10 && $D > 14)) {
            $JD = 367 * $Y - self::INT(7 * ($Y + self::INT(($M + 9) / 12)) / 4) - self::INT(3 * (self::INT(($Y + ($M - 9) / 7) / 100) + 1) / 4) + self::INT(275 * $M / 9) + $D + 1721028.5;
        } else {
            $JD = 367 * $Y - self::INT(7 * ($Y + 5001 + self::INT(($M - 9) / 7)) / 4) + self::INT(275 * $M / 9) + $D + 1729776.5;
        }
        return $JD;
    }

    public static function UniversalFromJD($JD)
    {
        $Z = self::INT($JD + 0.5);
        $F = ($JD + 0.5) - $Z;
        if ($Z < 2299161) {
            $A = $Z;
        } else {
            $alpha = self::INT(($Z - 1867216.25) / 36524.25);
            $A = $Z + 1 + $alpha - self::INT($alpha / 4);
        }
        $B = $A + 1524;
        $C = self::INT(($B - 122.1) / 365.25);
        $D = self::INT(365.25 * $C);
        $E = self::INT(($B - $D) / 30.6001);
        $dd = self::INT($B - $D - self::INT(30.6001 * $E) + $F);
        if ($E < 14) {
            $mm = $E - 1;
        } else {
            $mm = $E - 13;
        }
        if ($mm < 3) {
            $yyyy = $C - 4715;
        } else {
            $yyyy = $C - 4716;
        }
        return [$dd, $mm, $yyyy];
    }

    public static function LocalFromJD($JD)
    {
        return self::UniversalFromJD($JD + self::$LOCAL_TIMEZONE / 24.0);
    }

    public static function LocalToJD($D, $M, $Y)
    {
        return self::UniversalToJD($D, $M, $Y) - self::$LOCAL_TIMEZONE / 24.0;
    }

    public static function NewMoon($k)
    {
        $T = $k / 1236.85; // Time in Julian centuries from 1900 January 0.5
        $T2 = $T * $T;
        $T3 = $T2 * $T;
        $dr = M_PI / 180;
        $Jd1 = 2415020.75933 + 29.53058868 * $k + 0.0001178 * $T2 - 0.000000155 * $T3;
        $Jd1 = $Jd1 + 0.00033 * sin((166.56 + 132.87 * $T - 0.009173 * $T2) * $dr); // Mean new moon
        $M = 359.2242 + 29.10535608 * $k - 0.0000333 * $T2 - 0.00000347 * $T3; // Sun's mean anomaly
        $Mpr = 306.0253 + 385.81691806 * $k + 0.0107306 * $T2 + 0.00001236 * $T3; // Moon's mean anomaly
        $F = 21.2964 + 390.67050646 * $k - 0.0016528 * $T2 - 0.00000239 * $T3; // Moon's argument of latitude
        $C1 = (0.1734 - 0.000393 * $T) * sin($M * $dr) + 0.0021 * sin(2 * $dr * $M);
        $C1 = $C1 - 0.4068 * sin($Mpr * $dr) + 0.0161 * sin($dr * 2 * $Mpr);
        $C1 = $C1 - 0.0004 * sin($dr * 3 * $Mpr);
        $C1 = $C1 + 0.0104 * sin($dr * 2 * $F) - 0.0051 * sin($dr * ($M + $Mpr));
        $C1 = $C1 - 0.0074 * sin($dr * ($M - $Mpr)) + 0.0004 * sin($dr * (2 * $F + $M));
        $C1 = $C1 - 0.0004 * sin($dr * (2 * $F - $M)) - 0.0006 * sin($dr * (2 * $F + $Mpr));
        $C1 = $C1 + 0.0010 * sin($dr * (2 * $F - $Mpr)) + 0.0005 * sin($dr * (2 * $Mpr + $M));
        $deltat;
        if ($T < -11) {
            $deltat = 0.001 + 0.000839 * $T + 0.0002261 * $T2 - 0.00000845 * $T3 - 0.000000081 * $T * $T3;
        } else {
            $deltat = -0.000278 + 0.000265 * $T + 0.000262 * $T2;
        }

        $JdNew = $Jd1 + $C1 - $deltat;
        return $JdNew;
    }

    public static function SunLongitude($jdn)
    {
        $T = ($jdn - 2451545.0) / 36525; // Time in Julian centuries from 2000-01-01 12:00:00 GMT
        $T2 = $T * $T;
        $dr = M_PI / 180; // degree to radian
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2; // mean anomaly, degree
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2; // mean longitude, degree
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL = $DL + (0.019993 - 0.000101 * $T) * sin($dr * 2 * $M) + 0.000290 * sin($dr * 3 * $M);
        $L = $L0 + $DL; // true longitude, degree
        $L = $L * $dr;
        $L = $L - M_PI * 2 * (self::INT($L / (M_PI * 2))); // Normalize to (0, 2*PI)
        return $L;
    }

    public static function LunarMonth11($Y)
    {
        $off = self::LocalToJD(31, 12, $Y) - 2415021.076998695;
        $k = self::INT($off / 29.530588853);
        $jd = self::NewMoon($k);
        $ret = self::LocalFromJD($jd);
        $sunLong = self::SunLongitude(self::LocalToJD($ret[0], $ret[1], $ret[2])); // sun longitude at local midnight
        if ($sunLong > 3 * M_PI / 2) {
            $jd = self::NewMoon($k - 1);
        }
        return self::LocalFromJD($jd);
    }

    public static $SUNLONG_MAJOR = [
        0,
        M_PI / 6,
        2 * M_PI / 6,
        3 * M_PI / 6,
        4 * M_PI / 6,
        5 * M_PI / 6,
        M_PI,
        7 * M_PI / 6,
        8 * M_PI / 6,
        9 * M_PI / 6,
        10 * M_PI / 6,
        11 * M_PI / 6
    ];

    public static function LunarYear($Y)
    {
        $ret = null;
        $month11A = self::LunarMonth11($Y - 1);
        $jdMonth11A = self::LocalToJD($month11A[0], $month11A[1], $month11A[2]);
        $k = (int) floor(0.5 + ($jdMonth11A - 2415021.076998695) / 29.530588853);
        $month11B = self::LunarMonth11($Y);
        $off = self::LocalToJD($month11B[0], $month11B[1], $month11B[2]) - $jdMonth11A;
        $leap = $off > 365.0;
        if (!$leap) {
            $ret = array_fill(0, 13, [0, 0, 0, 0, 0]);
        } else {
            $ret = array_fill(0, 14, [0, 0, 0, 0, 0]);
        }
        $ret[0] = [$month11A[0], $month11A[1], $month11A[2], 0, 0];
        $ret[count($ret) - 1] = [$month11B[0], $month11B[1], $month11B[2], 0, 0];
        for ($i = 1; $i < count($ret) - 1; $i++) {
            $nm = self::NewMoon($k + $i);
            $a = self::LocalFromJD($nm);
            $ret[$i] = [$a[0], $a[1], $a[2], 0, 0];
        }
        for ($i = 0; $i < count($ret); $i++) {
            $ret[$i][3] = self::MOD($i + 11, 12);
        }
        if ($leap) {
            self::initLeapYear($ret);
        }
        return $ret;
    }

    private static function initLeapYear(&$ret)
    {
        $sunLongitudes = array_fill(0, count($ret), 0);
        for ($i = 0; $i < count($ret); $i++) {
            $a = $ret[$i];
            $jdAtMonthBegin = self::LocalToJD($a[0], $a[1], $a[2]);
            $sunLongitudes[$i] = self::SunLongitude($jdAtMonthBegin);
        }
        $found = false;
        for ($i = 0; $i < count($ret); $i++) {
            if ($found) {
                $ret[$i][3] = self::MOD($i + 10, 12);
                continue;
            }
            $sl1 = $sunLongitudes[$i];
            $sl2 = $sunLongitudes[$i + 1];
            $hasMajorTerm = floor($sl1 / M_PI * 6) != floor($sl2 / M_PI * 6);
            if (!$hasMajorTerm) {
                $found = true;
                $ret[$i][4] = 1;
                $ret[$i][3] = self::MOD($i + 10, 12);
            }
        }
    }

    public static function Solar2Lunar($D, $M, $Y)
    {
        $yy = $Y;
        $ly = self::LunarYear($Y); // Please cache the result of this computation for later use!!!
        $month11 = $ly[count($ly) - 1];
        $jdToday = self::LocalToJD($D, $M, $Y);
        $jdMonth11 = self::LocalToJD($month11[0], $month11[1], $month11[2]);
        if ($jdToday >= $jdMonth11) {
            $ly = self::LunarYear($Y + 1);
            $yy = $Y + 1;
        }
        $i = count($ly) - 1;
        while ($jdToday < self::LocalToJD($ly[$i][0], $ly[$i][1], $ly[$i][2])) {
            $i--;
        }
        $dd = (int) ($jdToday - self::LocalToJD($ly[$i][0], $ly[$i][1], $ly[$i][2])) + 1;
        $mm = $ly[$i][3];
        if ($mm >= 11) {
            $yy--;
        }
        return [$dd, $mm, $yy, $ly[$i][4]];
    }

    public static function calculateThu($D, $M, $Y)
    {
        $X = self::MOD((int) (self::UniversalToJD($D, $M, $Y) + 2.5), 7);
        if ($X == 1) return "Chủ Nhật";
        if ($X == 2) return "Thứ Hai";
        if ($X == 3) return "Thứ Ba";
        if ($X == 4) return "Thứ Tư";
        if ($X == 5) return "Thứ Năm";
        if ($X == 6) return "Thứ Sáu";
        if ($X == 7) return "Thứ Bảy";
        return "";
    }

    public static function defineCanOfYear($y)
    {
        $can = null;
        switch ($y % 10) {
            case 0:
                $can = "Canh";
                break;
            case 1:
                $can = "Tân";
                break;
            case 2:
                $can = "Nhâm";
                break;
            case 3:
                $can = "Quý";
                break;
            case 4:
                $can = "Giáp";
                break;
            case 5:
                $can = "Ất";
                break;
            case 6:
                $can = "Bính";
                break;
            case 7:
                $can = "Đinh";
                break;
            case 8:
                $can = "Mậu";
                break;
            case 9:
                $can = "Kỷ";
                break;
        }
        return $can;
    }

    public static function defineChi($year)
    {
        $lastTwoDigits = (int) substr($year, -2);
        $chi = null;
        switch ($lastTwoDigits % 12) {
            case 0:
                $chi = "Tý";
                break;
            case 1:
                $chi = "Sửu";
                break;
            case 2:
                $chi = "Dần";
                break;
            case 3:
                $chi = "Mão";
                break;
            case 4:
                $chi = "Thìn";
                break;
            case 5:
                $chi = "Tỵ";
                break;
            case 6:
                $chi = "Ngọ";
                break;
            case 7:
                $chi = "Mùi";
                break;
            case 8:
                $chi = "Thân";
                break;
            case 9:
                $chi = "Dậu";
                break;
            case 10:
                $chi = "Tuất";
                break;
            case 11:
                $chi = "Hợi";
                break;
        }
        return $chi;
    }

    public static function defineChiForMonth($m)
    {
        switch ($m) {
            case 11:
                return "Tý";
            case 12:
                return "Sửu";
            case 1:
                return "Dần";
            case 2:
                return "Mão";
            case 3:
                return "Thìn";
            case 4:
                return "Tỵ";
            case 5:
                return "Ngọ";
            case 6:
                return "Mùi";
            case 7:
                return "Thân";
            case 8:
                return "Dậu";
            case 9:
                return "Tuất";
            case 10:
                return "Hợi";
            default:
                return "";
        }
    }

    public static function defineCanOfMonth($Y, $M)
    {
        $X = ($Y * 12 + $M + 3) % 10;
        return self::defineCan($X);
    }

    private static function defineCan($X)
    {
        $can = "";
        if ($X == 0) $can = "Giáp";
        if ($X == 1) $can = "Ất";
        if ($X == 2) $can = "Bính";
        if ($X == 3) $can = "Đinh";
        if ($X == 4) $can = "Mậu";
        if ($X == 5) $can = "Kỷ";
        if ($X == 6) $can = "Canh";
        if ($X == 7) $can = "Tân";
        if ($X == 8) $can = "Nhâm";
        if ($X == 9) $can = "Quý";
        return $can;
    }

    public static function defineLunarHour($h)
    {
        if (23 < $h || $h <= 1) {
            return "Tý";
        }
        if (1 < $h && $h <= 3) {
            return "Sửu";
        }
        if (3 < $h && $h <= 5) {
            return "Dần";
        }
        if (5 < $h && $h <= 7) {
            return "Mão";
        }
        if (7 < $h && $h <= 9) {
            return "Thìn";
        }
        if (9 < $h && $h <= 11) {
            return "Tỵ";
        }
        if (11 < $h && $h <= 13) {
            return "Ngọ";
        }
        if (13 < $h && $h <= 15) {
            return "Mùi";
        }
        if (15 < $h && $h <= 17) {
            return "Thân";
        }
        if (17 < $h && $h <= 19) {
            return "Dậu";
        }
        if (19 < $h && $h <= 21) {
            return "Tuất";
        }
        if (21 < $h && $h <= 23) {
            return "Hợi";
        }
        return "";
    }

    public static function tuoiAmHayDuong($can)
    {
        if ($can == "Giáp" || $can == "Bính" || $can == "Mậu" || $can == "Canh" || $can == "Nhâm") {
            return "Dương";
        } else {
            return "Âm";
        }
    }
}
