<?php

namespace App\Driver;

class Lich_HND
{
    public function jdFromDate($dd, $mm, $yy)
    {
        $a = int((14 - $mm) / 12.);
        $y = $yy + 4800 - $a;
        $m = $mm + 12 * $a - 3;
        $jd = $dd + int((153 * $m + 2) / 5.) + 365 * $y + int($y / 4.) - int($y / 100.) + int($y / 400.) - 32045;

        if ($jd < 2299161) {
            $jd = $dd + int((153 * $m + 2) / 5.) + 365 * $y + int($y / 4.) - 32083;
        }

        return $jd;
    }

    public function jdToDate($jd)
    {
        if ($jd > 2299160) {
            $a = $jd + 32044;
            $b = int((4 * $a + 3) / 146097.);
            $c = $a - int(($b * 146097) / 4.);
        } else {
            $b = 0;
            $c = $jd + 32082;
        }

        $d = int((4 * $c + 3) / 1461.);
        $e = $c - int((1461 * $d) / 4.);
        $m = int((5 * $e + 2) / 153.);
        $day = $e - int((153 * $m + 2) / 5.) + 1;
        $month = $m + 3 - 12 * int($m / 10.);
        $year = $b * 100 + $d - 4800 + int($m / 10.);

        $result = [$day, $month, $year];

        return $result;
    }

    public function NewMoon($k)
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
        $$C1 = (0.1734 - 0.000393 * $T) * sin($M * $dr) + 0.0021 * sin(2 * $dr * $M);
        $C1 = $C1 - 0.4068 * sin($Mpr * $dr) + 0.0161 * sin($dr * 2 * $Mpr);
        $C1 = $C1 - 0.0004 * sin($dr * 3 * $Mpr);
        $C1 = $C1 + 0.0104 * sin($dr * 2 * $F) - 0.0051 * sin($dr * ($M + $Mpr));
        $C1 = $C1 - 0.0074 * sin($dr * ($M - $Mpr)) + 0.0004 * sin($dr * (2 * $F + $M));
        $C1 = $C1 - 0.0004 * sin($dr * (2 * $F - $M)) - 0.0006 * sin($dr * (2 * $F + $Mpr));
        $C1 = $C1 + 0.0010 * sin($dr * (2 * $F - $Mpr)) + 0.0005 * sin($dr * (2 * $Mpr + $M));
        if ($T < -11) {
            $deltat = 0.001 + 0.000839 * $T + 0.0002261 * $T2 - 0.00000845 * $T3 - 0.000000081 * $T * $T3;
        } else {
            $deltat = -0.000278 + 0.000265 * $T + 0.000262 * $T2;
        }

        $JdNew = $Jd1 + $C1 - $deltat;

        return $JdNew;
    }

    public function SunLongitude($jdn)
    {
        $T = ($jdn - 2451545.0) / 36525.;
        $T2 = $T * $T;
        $dr = pi() / 180.;
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2;
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2;
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL += (0.019993 - 0.000101 * $T) * sin($dr * 2 * $M) + 0.000290 * sin($dr * 3 * $M);
        $L = $L0 + $DL;
        $L = $L * $dr;
        $L = $L - pi() * 2 * (float($L / (pi() * 2)));

        return $L;
    }

    public function getSunLongitude_OLD($dayNumber, $timeZone)
    {
        return int($this->SunLongitude($dayNumber - 0.5 - $timeZone / 24.) / pi() * 6);
    }

    public function getSunLongitude($jdn, $timeZone)
    {
        $T = ($jdn - 2451545.5 - $timeZone / 24.) / 36525.;
        $T2 = $T ** 2;
        $dr = pi() / 180.;
        $M = 357.52910 + 35999.05030 * $T - 0.0001559 * $T2 - 0.00000048 * $T * $T2;
        $L0 = 280.46645 + 36000.76983 * $T + 0.0003032 * $T2;
        $DL = (1.914600 - 0.004817 * $T - 0.000014 * $T2) * sin($dr * $M);
        $DL = $DL + (0.019993 - 0.000101 * $T) * sin($dr * 2 * $M) + 0.000290 * sin($dr * 3 * $M);
        $L = $L0 + $DL;
        $omega = 125.04 - 1934.136 * $T;
        $L = $L - 0.00569 - 0.00478 * sin($omega * $dr);
        $L = $L * $dr;
        $L = $L - pi() * 2 * (floor(L / (pi() * 2)));
        return int($L / pi() * 6);
    }

    public function getNewMoonDay($k, $timeZone)
    {
        return int($this->NewMoon($k) + 0.5 + $timeZone / 24.);
    }

    public function getLunarMonth11($yy, $timeZone)
    {
        $off = $this->jdFromDate(31, 12, $yy) - 2415021.;
        $k = int($off / 29.530588853);
        $nm = $this->getNewMoonDay($k, $timeZone);
        $sunLong = $this->getSunLongitude($nm, $timeZone);
        if ($sunLong >= 9) {
            $nm = $this->getNewMoonDay($k - 1, $timeZone);
        }

        return $nm;
    }


    public function getLeapMonthOffset($a11, $timeZone)
    {
        $k = int(($a11 - 2415021.076998695) / 29.530588853 + 0.5);
        $last = 0;
        $i = 1;
        $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);
        while (true) {
            $last = $arc;
            $i += 1;
            $arc = $this->getSunLongitude($this->getNewMoonDay($k + $i, $timeZone), $timeZone);

            if (!($arc != $last and $i < 14)) {
                break;
            }
        }

        return $i - 1;
    }

    public function S2L($dd, $mm, $yy, $timeZone = 7)
    {
        $dayNumber = $this->jdFromDate($dd, $mm, $yy);
        $k = int(($dayNumber - 2415021.076998695) / 29.530588853);
        $monthStart = $this->getNewMoonDay($k + 1, $timeZone);
        if ($monthStart > $dayNumber) {
            $monthStart = getNewMoonDay($k, $timeZone);
        }

        $a11 = $this->getLunarMonth11($yy, $timeZone);
        $b11 = $a11;
        if ($a11 >= $monthStart) {
            $lunarYear = $yy;
            $a11 = $this->getLunarMonth11($yy - 1, $timeZone);
        } else {
            $lunarYear = $yy + 1;
            $b11 = $this->getLunarMonth11($yy + 1, $timeZone);
        }

        $lunarDay = $dayNumber - $monthStart + 1;
        $diff = int(($monthStart - $a11) / 29.);

        $lunarLeap = 0;
        $lunarMonth = $diff + 11;

        if ($b11 - $a11 > 365) {
            $leapMonthDiff = $this->getLeapMonthOffset($a11, $timeZone);
        }

        if ($diff >= $leapMonthDiff) {
            $lunarMonth = $diff + 10;
            if ($diff == $leapMonthDiff) {
                $lunarLeap = 1;
            }
        }

        if ($lunarMonth > 12) {
            $lunarMonth = $lunarMonth - 12;
        }

        if ($lunarMonth >= 11 and $diff < 4) {
            $lunarYear -= 1;
        }

        return [$lunarDay, $lunarMonth, $lunarYear, $lunarLeap];
    }


    public function L2S($lunarD, $lunarM, $lunarY, $lunarLeap, $tZ = 7)
    {
        if (lunarM < 11) {
            $a11 = $this->getLunarMonth11($lunarY - 1, $tZ);
            $b11 = $this->getLunarMonth11($lunarY, $tZ);
        } else {
            $a11 = $this->getLunarMonth11($lunarY, $tZ);
            $b11 = $this->getLunarMonth11($lunarY + 1, $tZ);
        }

        $k = int(0.5 + ($a11 - 2415021.076998695) / 29.530588853);
        $off = $lunarM - 11;
        if ($off < 0) {
            $off += 12;
        }

        if ($b11 - $a11 > 365) {
            $leapOff = $this->getLeapMonthOffset($a11, $tZ);
            $leapM = $leapOff - 2;
            if ($leapM < 0) {
                $leapM += 12;
            }

            if ($lunarLeap != 0 and $lunarM != $leapM) {
                return [0, 0, 0];
            } else if (lunarLeap != 0 or off >= leapOff) {
                $off += 1;
            }
        }

        $monthStart = $this->getNewMoonDay($k + $off, $tZ);

        return $this->jdToDate($monthStart + $lunarD - 1);
    }
}
