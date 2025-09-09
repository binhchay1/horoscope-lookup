<?php

namespace App\Driver;

class Lich_HND
{
    public static function jdFromDate($dd, $mm, $yy)
    {
        $a = (int)floor((14 - $mm) / 12);
        $y = $yy + 4800 - $a;
        $m = $mm + 12 * $a - 3;
        $jd = $dd + (int)floor((153 * $m + 2) / 5) + 365 * $y + (int)floor($y / 4) - (int)floor($y / 100) + (int)floor($y / 400) - 32045;
        if ($jd < 2299161) {
            $jd = $dd + (int)floor((153 * $m + 2) / 5) + 365 * $y + (int)floor($y / 4) - 32083;
        }
        return $jd;
    }

    public static function jdToDate($jd)
    {
        if ($jd > 2299160) {
            $a = $jd + 32044;
            $b = (int)floor((4 * $a + 3) / 146097);
            $c = $a - (int)floor(($b * 146097) / 4);
        } else {
            $b = 0;
            $c = $jd + 32082;
        }

        $d = (int)floor((4 * $c + 3) / 1461);
        $e = $c - (int)floor((1461 * $d) / 4);
        $m = (int)floor((5 * $e + 2) / 153);
        $day = $e - (int)floor((153 * $m + 2) / 5) + 1;
        $month = $m + 3 - 12 * (int)floor($m / 10);
        $year = $b * 100 + $d - 4800 + (int)floor($m / 10);

        return [$day, $month, $year];
    }

    public static function NewMoon($k)
    {
        $T = $k / 1236.85;
        $T2 = $T * $T;
        $T3 = $T2 * $T;
        $dr = pi() / 180;
        $Jd1 = 2415020.75933 + 29.53058868 * $k + 0.0001178 * $T2 - 0.000000155 * $T3;
        $Jd1 = $Jd1 + 0.00033 * sin((166.56 + 132.87 * $T - 0.009173 * $T2) * $dr);
        $M = 359.2242 + 29.10535608 * $k - 0.0000333 * $T2 - 0.00000347 * $T3;
        $Mpr = 306.0253 + 385.81691806 * $k + 0.0107306 * $T2 + 0.00001236 * $T3;
        $F = 21.2964 + 390.67050646 * $k - 0.0016528 * $T2 - 0.00000239 * $T3;
        $C1 = (0.1734 - 0.000393 * $T) * sin($M * $dr) + 0.0021 * sin(2 * $M * $dr);
        $C1 = $C1 - 0.4068 * sin($Mpr * $dr) + 0.0161 * sin(2 * $Mpr * $dr);
        $C1 = $C1 - 0.0004 * sin(3 * $Mpr * $dr);
        $C1 = $C1 + 0.0104 * sin(2 * $F * $dr) - 0.0051 * sin(($M + $Mpr) * $dr);
        $C1 = $C1 - 0.0074 * sin(($M - $Mpr) * $dr) + 0.0004 * sin((2 * $F + $M) * $dr);
        $C1 = $C1 - 0.0004 * sin((2 * $F - $M) * $dr) - 0.0006 * sin((2 * $F + $Mpr) * $dr);
        $C1 = $C1 + 0.0010 * sin((2 * $F - $Mpr) * $dr) + 0.0005 * sin((2 * $Mpr + $M) * $dr);
        if ($T < -11) {
            $deltat = 0.001 + 0.000839 * $T + 0.0002261 * $T2 - 0.00000845 * $T3 - 0.000000081 * $T * $T3;
        } else {
            $deltat = -0.000278 + 0.000265 * $T + 0.000262 * $T2;
        }
        return $Jd1 + $C1 - $deltat;
    }

    public static function SunLongitude($jdn)
    {
        $T = ($jdn - 2451545.0) / 36525.0;
        $T2 = $T * $T;
        $dr = pi() / 180.0;
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2;
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2;
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL += (0.019993 - 0.000101 * $T) * sin(2 * $dr * $M) + 0.000290 * sin(3 * $dr * $M);
        $L = $L0 + $DL;
        $L = fmod($L, 360);
        return $L * $dr;
    }

    public static function getSunLongitude_OLD($dayNumber, $timeZone)
    {
        $L = Lich_HND::SunLongitude($dayNumber - 0.5 - $timeZone / 24.0);
        return (int)floor($L / pi() * 6);
    }

    public static function getSunLongitude($jdn, $timeZone)
    {
        $T = ($jdn - 2451545.5 - $timeZone / 24.0) / 36525.0;
        $T2 = $T * $T;
        $dr = pi() / 180.0;
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2;
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2;
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL += (0.019993 - 0.000101 * $T) * sin(2 * $dr * $M) + 0.000290 * sin(3 * $dr * $M);
        $L = $L0 + $DL;
        $omega = 125.04 - 1934.136 * $T;
        $L = $L - 0.00569 - 0.00478 * sin($omega * $dr);
        $L = $L * $dr;
        $L = $L - 2 * pi() * floor($L / (2 * pi()));
        return (int)floor($L / pi() * 6);
    }

    public static function getNewMoonDay($k, $timeZone)
    {
        return (int)floor(Lich_HND::NewMoon($k) + 0.5 + $timeZone / 24.0);
    }

    public static function getLunarMonth11($yy, $timeZone)
    {
        $off = Lich_HND::jdFromDate(31, 12, $yy) - 2415021;
        $k = (int)floor($off / 29.530588853);
        $nm = Lich_HND::getNewMoonDay($k, $timeZone);
        $sunLong = Lich_HND::getSunLongitude($nm, $timeZone);
        if ($sunLong >= 9) {
            $nm = Lich_HND::getNewMoonDay($k - 1, $timeZone);
        }
        return $nm;
    }

    public static function getLeapMonthOffset($a11, $timeZone)
    {
        $k = (int)floor(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
        $last = 0;
        $i = 1;
        $arc = Lich_HND::getSunLongitude(Lich_HND::getNewMoonDay($k + $i, $timeZone), $timeZone);
        do {
            $last = $arc;
            $i++;
            $arc = Lich_HND::getSunLongitude(Lich_HND::getNewMoonDay($k + $i, $timeZone), $timeZone);
        } while ($arc != $last && $i < 14);
        return $i - 1;
    }

    public static function S2L($dd, $mm, $yy, $timeZone = 7)
    {
        $dayNumber = Lich_HND::jdFromDate($dd, $mm, $yy);
        $k = (int)floor(($dayNumber - 2415021.076998695) / 29.530588853);
        $monthStart = Lich_HND::getNewMoonDay($k + 1, $timeZone);
        if ($monthStart > $dayNumber) {
            $monthStart = Lich_HND::getNewMoonDay($k, $timeZone);
        }

        $a11 = Lich_HND::getLunarMonth11($yy, $timeZone);
        $b11 = $a11;
        if ($a11 >= $monthStart) {
            $lunarYear = $yy;
            $a11 = Lich_HND::getLunarMonth11($yy - 1, $timeZone);
        } else {
            $lunarYear = $yy + 1;
            $b11 = Lich_HND::getLunarMonth11($yy + 1, $timeZone);
        }

        $lunarDay = $dayNumber - $monthStart + 1;
        $diff = (int)floor(($monthStart - $a11) / 29);

        $lunarLeap = 0;
        $lunarMonth = $diff + 11;

        if ($b11 - $a11 > 365) {
            $leapMonthDiff = Lich_HND::getLeapMonthOffset($a11, $timeZone);
            if ($diff >= $leapMonthDiff) {
                $lunarMonth = $diff + 10;
                if ($diff == $leapMonthDiff) {
                    $lunarLeap = 1;
                }
            }
        }

        if ($lunarMonth > 12) {
            $lunarMonth -= 12;
        }
        if ($lunarMonth >= 11 && $diff < 4) {
            $lunarYear -= 1;
        }
        return [$lunarDay, $lunarMonth, $lunarYear, $lunarLeap];
    }

    public static function L2S($lunarD, $lunarM, $lunarY, $lunarLeap = 0, $tZ = 7)
    {
        if ($lunarM < 11) {
            $a11 = Lich_HND::getLunarMonth11($lunarY - 1, $tZ);
            $b11 = Lich_HND::getLunarMonth11($lunarY, $tZ);
        } else {
            $a11 = Lich_HND::getLunarMonth11($lunarY, $tZ);
            $b11 = Lich_HND::getLunarMonth11($lunarY + 1, $tZ);
        }

        $k = (int)floor(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
        $off = $lunarM - 11;
        if ($off < 0) {
            $off += 12;
        }
        if ($b11 - $a11 > 365) {
            $leapOff = Lich_HND::getLeapMonthOffset($a11, $tZ);
            $leapM = $leapOff - 2;
            if ($leapM < 0) {
                $leapM += 12;
            }
            if ($lunarLeap != 0 && $lunarM != $leapM) {
                return [0, 0, 0];
            } else if ($lunarLeap != 0 || $off >= $leapOff) {
                $off += 1;
            }
        }
        $monthStart = Lich_HND::getNewMoonDay($k + $off, $tZ);
        return Lich_HND::jdToDate($monthStart + $lunarD - 1);
    }
}
