<?php

namespace App\Http\Controllers\Page;

use App\Enums\Utility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;

class HomeController extends Controller
{
    protected $utility;

    public function __construct(
        Utility $utility
    ) {
        $this->utility = $utility;
    }

    public function viewHome()
    {
        return view('page.homepage');
    }
}
