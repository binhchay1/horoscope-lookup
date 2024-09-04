<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\WarrantyPackageRepository;
use Illuminate\Http\Request;

class WarrantyPackageController extends Controller
{
    private $warrantyPackageRepository;

    public function __construct(
        WarrantyPackageRepository $warrantyPackageRepository
    ) {
        $this->warrantyPackageRepository = $warrantyPackageRepository;
    }

    public function index()
    {
        $listWarrantyPackage = $this->warrantyPackageRepository->index();

        return view('admin.warranty-package.index', compact('listWarrantyPackage'));
    }

    public function createWarrantyPackage()
    {
        $listWarrantyPackage = $this->warrantyPackageRepository->index();

        return view('admin.warranty-package.create', compact('listWarrantyPackage'));
    }

    public function storeWarrantyPackage(Request $request)
    {
        $input = $request->except(['_token']);
        $input['price'] = str_replace('.', '', $input['price']);

        $this->warrantyPackageRepository->create($input);

        return redirect()->route('admin.warranty.package.index')->with('success',  __('Gói bảo hành được thêm thành công'));
    }

    public function editWarrantyPackage($id)
    {
        $warrantyPackage = $this->warrantyPackageRepository->show($id);
        return view('admin.warranty-package.edit', compact('warrantyPackage'));
    }

    public function updateWarrantyPackage(Request $request,  $id)
    {
        $input = $request->except(['_token']);

        $input['price'] = str_replace('.', '', $input['price']);

        $input = $this->warrantyPackageRepository->update($input, $id);

        return redirect()->route('admin.warranty.package.index')->with('success',  __('Gói bảo hành được thay đổi thành công'));
    }

    public function deleteWarrantyPackage($id)
    {
        $this->warrantyPackageRepository->destroy($id);
        return back()->with('success', __('Gói bảo hành  được xóa  thành công'));
    }
}
