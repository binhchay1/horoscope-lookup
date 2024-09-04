<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Cache;

class BrandController extends Controller
{
    private $brandRepository;

    public function __construct(
        BrandRepository $brandRepository
    ) {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $listBrands = $this->brandRepository->index();

        return view('admin.brand.index', compact('listBrands'));
    }

    public function createBrand()
    {
        return view('admin.brand.create');
    }

    public function storeBrand(BrandRequest $request)
    {
        $input = $request->except(['_token']);

        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/brand/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/brand/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }
        $this->brandRepository->create($input);
        Cache::store('redis')->forget('menu_homepage');

        return redirect()->route('admin.brand.index')->with('success',  __('Thương hiệu được thêm thành công'));
    }

    public function editBrand($id)
    {
        $brand = $this->brandRepository->show($id);
        if (empty($brand)) {
            return redirect('/404');
        }

        return view('admin.brand.edit', compact('brand'));
    }

    public function updateBrand(UpdateBrandRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/brand/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/brand/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }
        $input = $this->brandRepository->update($input, $id);
        Cache::store('redis')->forget('menu_homepage');

        return redirect()->route('admin.brand.index')->with('success',  __('Thương hiệu được thay đổi thành công'));
    }


    public function deleteBrand($id)
    {
        $this->brandRepository->destroy($id);

        return back()->with('success', __('Thương hiệu  được xóa  thành công'));
    }
}
