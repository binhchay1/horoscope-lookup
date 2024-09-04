<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Repositories\LayoutRepository;
use Cache;

class ErrorController extends Controller
{
    private $layoutRepository;

    public function __construct(
        LayoutRepository $layoutRepository
    ) {
        $this->layoutRepository = $layoutRepository;
    }

    public function view401()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);

        return view('errors.401', compact('listCategory'));
    }

    public function view402()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);

        return view('errors.402', compact('listCategory'));
    }

    public function view403()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.403-now', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function view404()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.404-now', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function view419()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.419-now', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function view429()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);

        return view('errors.429', compact('listCategory'));
    }

    public function view500()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.500-now', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function view503()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.503-now', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function lockAccount()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.lock-account', compact('listCategory', 'listSlideFooter', 'layout'));
    }

    public function viewMaintenance()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        if (isset($layout->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
        } else {
            $listSlideFooter = [];
        }

        return view('errors.maintenance', compact('listCategory', 'listSlideFooter', 'layout'));
    }
}
