<?php

namespace App\Driver;

use App\Models\Cung;
use App\Driver\DuongLichAmLichUtility;
use App\Enums\TuVi;
use App\Models\User;

class TuviDriver
{

    private $cungs = [];
    private $canValues = [];
    private $chiValues = [];
    private $menhValues = [];
    private $user;
    private $congiaps;

    public function __construct()
    {
        $this->congiaps = [
            TuVi::TI,
            TuVi::SUU,
            TuVi::DAN,
            TuVi::MEO,
            TuVi::THIN,
            TuVi::TY,
            TuVi::NGO,
            TuVi::MUI,
            TuVi::THAN,
            TuVi::DAU,
            TuVi::TUAT,
            TuVi::HOI
        ];

        foreach ($this->congiaps as $tuvi) {
            $this->cungs[$tuvi] = new Cung();
        }

        $this->canValues = [
            TuVi::GIAP => 1,
            TuVi::AT => 1,
            TuVi::BINH => 2,
            TuVi::DINH => 2,
            TuVi::MAU => 3,
            TuVi::KY => 3,
            TuVi::CANH => 4,
            TuVi::TAN => 4,
            TuVi::NHAM => 5,
            TuVi::QUY => 5,
        ];

        $this->chiValues = [
            TuVi::TI => 0,
            TuVi::SUU => 0,
            TuVi::NGO => 0,
            TuVi::MUI => 0,
            TuVi::DAN => 1,
            TuVi::MEO => 1,
            TuVi::THAN => 1,
            TuVi::DAU => 1,
            TuVi::THIN => 2,
            TuVi::TY => 2,
            TuVi::TUAT => 2,
            TuVi::HOI => 2,
        ];

        $this->menhValues = [
            1 => TuVi::KIM,
            2 => TuVi::THUY,
            3 => TuVi::HOA,
            4 => TuVi::THO,
            5 => TuVi::MOC,
        ];

        $this->user = new User();
    }

    public function buildUser($fullname, $yearOfBirth, $monthOfBirth, $dayOfBirth, $hourOfBirth, $gender)
    {
        $this->user->setName($fullname);
        $this->user->setGender($gender == 1 ? TuVi::NAM : TuVi::NU);
        $solarToLunar = DuongLichAmLichUtility::Solar2Lunar($dayOfBirth, $monthOfBirth, $yearOfBirth);
        $this->user->setMonthOfBirth($solarToLunar[1]);
        $this->user->setYearOfBirth($solarToLunar[2]);
        $this->user->setDayOfBirth($solarToLunar[0]);
        $this->user->setCan(DuongLichAmLichUtility::defineCanOfYear($this->user->getYearOfBirth()));
        $this->user->setChi(DuongLichAmLichUtility::defineChi($this->user->getYearOfBirth()));
        $this->user->setHourOfBirth(DuongLichAmLichUtility::defineLunarHour($hourOfBirth));
        $this->user->setTuoiAmHayDuong(DuongLichAmLichUtility::tuoiAmHayDuong($this->user->getCan()->toString()));
        $menhInt = $this->canValues[$this->user->getCan()] + $this->chiValues[$this->user->getChi()];
        if ($menhInt > 5) {
            $menhInt -= 5;
        }
        $this->user->setMenh($this->menhValues[$menhInt]->toString());
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setCungMenhAndThan()
    {
        $menhMaps = [];
        $thanMaps = [];
        $menhMaps[1] = [TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO];
        $thanMaps[1] = [TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU];
        $menhMaps[2] = [TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN];
        $thanMaps[2] = [TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN];
        $menhMaps[3] = [TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY];
        $thanMaps[3] = [TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO];
        $menhMaps[4] = [TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO];
        $thanMaps[4] = [TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN];
        $menhMaps[5] = [TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN];
        $thanMaps[5] = [TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MENH, TuVi::THIN, TuVi::TY];
        $menhMaps[6] = [TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN];
        $thanMaps[6] = [TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO];
        $menhMaps[7] = [TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TY, TuVi::HOI, TuVi::TUAT, TuVi::DAU];
        $thanMaps[7] = [TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI];
        $menhMaps[8] = [TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT];
        $thanMaps[8] = [TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN];
        $menhMaps[9] = [TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI, TuVi::HOI];
        $thanMaps[9] = [TuVi::TUAT, TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU];
        $menhMaps[10] = [TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU, TuVi::TI];
        $thanMaps[10] = [TuVi::HOI, TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT];
        $menhMaps[11] = [TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN, TuVi::SUU];
        $thanMaps[11] = [TuVi::TI, TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI];
        $menhMaps[12] = [TuVi::SUU, TuVi::TI, TuVi::HOI, TuVi::TUAT, TuVi::DAU, TuVi::THAN, TuVi::MUI, TuVi::NGO, TuVi::TY, TuVi::THIN, TuVi::MEO, TuVi::DAN];
        $thanMaps[12] = [TuVi::SUU, TuVi::DAN, TuVi::MEO, TuVi::THIN, TuVi::TY, TuVi::NGO, TuVi::MUI, TuVi::THAN, TuVi::DAU, TuVi::TUAT, TuVi::HOI, TuVi::TI];

        $isSetCungMenh = false;
        $isSetCungThan = false;

        foreach ($menhMaps as $key => $value) {
            if ($this->user->getMonthOfBirth() == $key) {
                foreach ($value as $i => $tuvi) {
                    if ($this->isGioSinhMatched($i)) {
                        $this->setCungMenh($tuvi);
                        $isSetCungMenh = true;
                        break;
                    }
                }
            }
            if ($isSetCungMenh) break;
        }

        foreach ($thanMaps as $key => $value) {
            if ($this->user->getMonthOfBirth() == $key) {
                foreach ($value as $i => $tuvi) {
                    if ($this->isGioSinhMatched($i)) {
                        $this->setCungThan($tuvi);
                        $isSetCungThan = true;
                        break;
                    }
                }
            }
            if ($isSetCungThan) break;
        }
    }

    private function setCungMenh($position)
    {
        $this->cungs[$position]->setName(TuVi::MENH);

        return "Cung mệnh: " . $position;
    }

    private function setCungThan($position)
    {
        $this->cungs[$position]->setThanMenhDongCung(true);

        return "Cung thân: " . $position;
    }

    private function isGioSinhMatched($index)
    {
        foreach ($this->congiaps as $i => $congiap) {
            if ($this->user->getHourOfBirth() == $congiap->toString()) {
                return $index == $i;
            }
        }
        return false;
    }

    private function findPositionOfCungByName($name)
    {
        foreach ($this->cungs as $key => $cung) {
            if ($cung->getName() !== null && $cung->getName() == $name) {
                return $key;
            }
        }
        return null;
    }

    private function findIndexByClockWise($currentPosition, $byManyPositions)
    {
        $index = -1;
        foreach ($this->congiaps as $i => $currentCongiap) {
            if ($currentCongiap == $currentPosition) {
                $index = $i;
                break;
            }
        }
        if ($index == -1) {
            throw new RuntimeException("Cannot get the current index of a current position " . $currentPosition);
        }
        $indexClockWise = $index + $byManyPositions;
        if ($indexClockWise >= count($this->congiaps)) {
            $indexClockWise -= count($this->congiaps);
        }
        return $indexClockWise;
    }

    public function setCungPhuMau()
    {
        $positionOfCungMenh = $this->findPositionOfCungByName(TuVi::MENH);
        if ($positionOfCungMenh === null) {
            throw new RuntimeException("Cannot find cung menh!");
        }
        $indexOfCungPhuMau = $this->findIndexByClockWise($positionOfCungMenh, 1);
        $this->cungs[$this->congiaps[$indexOfCungPhuMau]]->setName(TuVi::PHU_MAU);

        return "Cung phụ mẫu: " . $this->congiaps[$indexOfCungPhuMau];
    }

    public function setCungPhucDuc()
    {
        $positionOfCungPhuMau = $this->findPositionOfCungByName(TuVi::PHU_MAU);
        if ($positionOfCungPhuMau === null) {
            throw new RuntimeException("Cannot find cung phu mau!");
        }
        $indexOfCungPhucDuc = $this->findIndexByClockWise($positionOfCungPhuMau, 1);
        $this->cungs[$this->congiaps[$indexOfCungPhucDuc]]->setName(TuVi::PHUC_DUC);

        return "Cung phúc đức: " . $this->congiaps[$indexOfCungPhucDuc];
    }

    public function setCungDienTrach()
    {
        $positionOfCungPhucDuc = $this->findPositionOfCungByName(TuVi::PHUC_DUC);
        if ($positionOfCungPhucDuc === null) {
            throw new RuntimeException("Cannot find cung Phuc duc!");
        }
        $indexOfCungDienTrach = $this->findIndexByClockWise($positionOfCungPhucDuc, 1);
        $this->cungs[$this->congiaps[$indexOfCungDienTrach]]->setName(TuVi::DIEN_TRACH);

        return "Cung điền trạch: " . $this->congiaps[$indexOfCungDienTrach];
    }

    public function setCungQuanLoc()
    {
        $positionOfCungDienTrach = $this->findPositionOfCungByName(TuVi::DIEN_TRACH);
        if ($positionOfCungDienTrach === null) {
            throw new RuntimeException("Cannot find cung Dien trach!");
        }
        $indexOfCungQuanLoc = $this->findIndexByClockWise($positionOfCungDienTrach, 1);
        $this->cungs[$this->congiaps[$indexOfCungQuanLoc]]->setName(TuVi::QUAN_LOC);

        return "Cung quan lộc: " . $this->congiaps[$indexOfCungQuanLoc];
    }

    public function setCungNoBoc()
    {
        $positionOfCungQuanLoc = $this->findPositionOfCungByName(TuVi::QUAN_LOC);
        if ($positionOfCungQuanLoc === null) {
            throw new RuntimeException("Cannot find cung Quan loc!");
        }
        $indexOfCungNoBoc = $this->findIndexByClockWise($positionOfCungQuanLoc, 1);
        $this->cungs[$this->congiaps[$indexOfCungNoBoc]]->setName(TuVi::NO_BOC);

        return "Cung nô bộc: " . $this->congiaps[$indexOfCungNoBoc];
    }

    public function setCungThienDi()
    {
        $positionOfCungNoBoc = $this->findPositionOfCungByName(TuVi::NO_BOC);
        if ($positionOfCungNoBoc === null) {
            throw new RuntimeException("Cannot find cung Thien Di!");
        }
        $indexOfCungThienDi = $this->findIndexByClockWise($positionOfCungNoBoc, 1);
        $this->cungs[$this->congiaps[$indexOfCungThienDi]]->setName(TuVi::THIEN_DI);

        return "Cung thiên di: " . $this->congiaps[$indexOfCungThienDi];
    }

    public function setCungTatAch()
    {
        $positionOfCungThienDi = $this->findPositionOfCungByName(TuVi::THIEN_DI);
        if ($positionOfCungThienDi === null) {
            throw new RuntimeException("Cannot find cung Tat ach!");
        }
        $indexOfCungTatAch = $this->findIndexByClockWise($positionOfCungThienDi, 1);
        $this->cungs[$this->congiaps[$indexOfCungTatAch]]->setName(TuVi::TAT_ACH);

        return "Cung tật ách: " . $this->congiaps[$indexOfCungTatAch];
    }

    public function setCungTaibach()
    {
        $positionOfCungTatAch = $this->findPositionOfCungByName(TuVi::TAT_ACH);
        if ($positionOfCungTatAch === null) {
            throw new RuntimeException("Cannot find cung tai bach!");
        }
        $indexOfCungTaiBach = $this->findIndexByClockWise($positionOfCungTatAch, 1);
        $this->cungs[$this->congiaps[$indexOfCungTaiBach]]->setName(TuVi::TAI_BACH);

        return TuVi::TAI_BACH . ": " . $this->congiaps[$indexOfCungTaiBach];
    }

    public function setCungTuTuc()
    {
        $positionOfCungTaiBach = $this->findPositionOfCungByName(TuVi::TAI_BACH);
        if ($positionOfCungTaiBach === null) {
            throw new RuntimeException("Cannot find cung tai bach!");
        }
        $indexOfCungTuTuc = $this->findIndexByClockWise($positionOfCungTaiBach, 1);
        $this->cungs[$this->congiaps[$indexOfCungTuTuc]]->setName(TuVi::TU_TUC);

        return TuVi::TU_TUC . ": " . $this->congiaps[$indexOfCungTuTuc];
    }

    public function setCungPhuThe()
    {
        $positionOfCungTuTuc = $this->findPositionOfCungByName(TuVi::TU_TUC);
        if ($positionOfCungTuTuc === null) {
            throw new RuntimeException("Cannot find cung tu tuc!");
        }
        $indexOfCungPhuThe = $this->findIndexByClockWise($positionOfCungTuTuc, 1);
        $this->cungs[$this->congiaps[$indexOfCungPhuThe]]->setName(TuVi::PHU_THE);

        return TuVi::PHU_THE . ": " . $this->congiaps[$indexOfCungPhuThe];
    }

    public function setCungHuynhDe()
    {
        $positionOfCungPhuThe = $this->findPositionOfCungByName(TuVi::PHU_THE);
        if ($positionOfCungPhuThe === null) {
            throw new RuntimeException("Cannot find cung phu the!");
        }
        $indexOfCungHuynhDe = $this->findIndexByClockWise($positionOfCungPhuThe, 1);
        $this->cungs[$this->congiaps[$indexOfCungHuynhDe]]->setName(TuVi::HUYNH_DE);

        return TuVi::HUYNH_DE . ": " . $this->congiaps[$indexOfCungHuynhDe];
    }
}
