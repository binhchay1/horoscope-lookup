<?php

namespace App\Http\Controllers\Page;

use App\Driver\DiaBan;
use App\Driver\Utils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $utils;
    protected $diaBan;
    protected $thienBan;

    public function __construct(
        Utils $utils,
        DiaBan $diaBan,
        ThienBan $thienBan
    ) {
        $this->utils = $utils;
        $this->diaBan = $diaBan;
        $this->thienBan = $thienBan;
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
        $hoTen = $request->get('full_name');
        $namSinh = $request->get('year');
        $thangSinh = $request->get('month');
        $ngaySinh = $request->get('day');
        $gioSinh = $request->get('hour');
        $gioiTinh = $request->get('gender');

        $db = $this->utils->lapDiaBan($this->diaBan, $ngaySinh, $thangSinh, $namSinh, $gioSinh, $gioiTinh, $duongLich, $timeZone);
        $thienBan = $this->thienBan->lapThienBan($ngaySinh, $thangSinh, $namSinh, $gioSinh, $gioiTinh, $hoTen, $db);

        $laso = [
            'thienBan' => $thienBan,
            'thapNhiCung' => $db->thapNhiCung
        ];

        return response()->json($laso);
    }
}
