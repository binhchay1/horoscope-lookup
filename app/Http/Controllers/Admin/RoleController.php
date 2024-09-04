<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $roleRepository;

    public function __construct(
        RoleRepository $roleRepository
    )
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listRoles = $this->roleRepository->index();
        return view('admin.user.role.index', compact('listRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createRole()
    {
        return view('admin.user.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeRole(RoleRequest $request)
    {
        $input = $request->except(['token']);
        $input = $request->all();

        $this->roleRepository->store($input);
        return redirect()->route('admin.role.index')->with('success', __('QUyền người dùng được thêm thành công'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editRole(string $id)
    {
        $role = $this->roleRepository->show($id);
        if (empty($role)) {
            return redirect('/404');
        }
        return view('admin.user.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateRole(RoleRequest $request, string $id)
    {
        $input = $request->except(['_token']);
        $this->roleRepository->update($input, $id);

        return redirect()->route('admin.role.index')->with('success', __('QUyền người dùng được thay đổi thành công'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteRole(string $id)
    {

        $this->roleRepository->destroy($id);

        return back()->with('success', __('Quyền người dùng được xóa thành công'));
    }
}
