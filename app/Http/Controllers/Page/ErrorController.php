<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function view401()
    {
        return view('errors.401');
    }

    public function view402()
    {
        return view('errors.402');
    }

    public function view403()
    {
        return view('errors.403');
    }

    public function view404()
    {
        return view('errors.404');
    }

    public function view419()
    {
        return view('errors.419');
    }

    public function view429()
    {
        return view('errors.429');
    }

    public function view500()
    {
        return view('errors.500');
    }

    public function view503()
    {
        return view('errors.503');
    }
}
