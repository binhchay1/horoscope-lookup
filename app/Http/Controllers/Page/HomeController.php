<?php

namespace App\Http\Controllers\Page;

use App\Driver\TuviDriver;
use App\Enums\Utility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;

class HomeController extends Controller
{
    protected $utility;
    protected $tuViDriver;

    public function __construct(
        Utility $utility,
        TuviDriver $tuViDriver,
    ) {
        $this->utility = $utility;
        $this->tuViDriver = $tuViDriver;
    }

    public function viewHome()
    {
        return view('page.homepage');
    }

    public function processLookup(Request $request)
    {
        $fullname = $request->get('fullname');
        $yearOfBirth = $request->get('yearOfBirth');
        $monthOfBirth = $request->get('monthOfBirth');
        $dayOfBirth = $request->get('dayOfBirth');
        $hourOfBirth = $request->get('hourOfBirth');
        $gender = $this->get('gender');

        $this->tuViDriver->buildUser($fullname, $yearOfBirth, $monthOfBirth, $dayOfBirth, $hourOfBirth, $gender);
        $this->tuViDriver->setCungMenhAndThan();
        $this->tuViDriver->setCungPhuMau();
        $this->tuViDriver->setCungPhucDuc();
        $this->tuViDriver->setCungDienTrach();
        $this->tuViDriver->setCungQuanLoc();
        $this->tuViDriver->setCungNoBoc();
        $this->tuViDriver->setCungThienDi();
        $this->tuViDriver->setCungTatAch();
        $this->tuViDriver->setCungTaibach();
        $this->tuViDriver->setCungTuTuc();
        $this->tuViDriver->setCungPhuThe();
        $this->tuViDriver->setCungHuynhDe();
    }
}
