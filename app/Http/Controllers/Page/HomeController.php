<?php

namespace App\Http\Controllers\Page;

use App\Driver\TuviDriver;
use App\Enums\Utility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function viewPolicy()
    {
        return view('page.policy');
    }

    public function processLookup(Request $request)
    {
        // dd($request);
        $fullname = $request->get('full_name');
        $yearOfBirth = $request->get('year');
        $monthOfBirth = $request->get('month');
        $dayOfBirth = $request->get('day');
        $hourOfBirth = $request->get('hour');
        $gender = $request->get('gender');

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
