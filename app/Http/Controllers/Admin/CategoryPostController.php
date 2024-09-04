<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryPostRequest;
use App\Repositories\CategoryPostRepository;
use Illuminate\Support\Str;

class CategoryPostController extends Controller
{
    private $categoryPostRepository;

    public function __construct(
        CategoryPostRepository $categoryPostRepository
    ) {
        $this->categoryPostRepository = $categoryPostRepository;
    }

    public function index()
    {
        $listCategory = $this->categoryPostRepository->getListWithSortParent();

        return view('admin.category-post.index', compact('listCategory'));
    }

    public function createCategory()
    {
        $listCategory = $this->categoryPostRepository->index();

        return view('admin.category-post.create', compact('listCategory'));
    }

    public function storeCategory(CategoryRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $input['slug'] =  Str::slug($input['name']);
        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/category-post/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/category-post/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }
        $this->categoryPostRepository->create($input);

        return redirect()->route('admin.categoryPost.index')->with('success',  __('Danh mục sản phẩm được thêm thành công'));
    }

    public function editCategory($id)
    {
        $categoryPost = $this->categoryPostRepository->show($id);
        $listCategory = $this->categoryPostRepository->getListCategoryExcludeId($id);
        if (empty($categoryPost)) {
            return redirect('/404');
        }
        return view('admin.category-post.edit', compact('categoryPost', 'listCategory'));
    }

    public function updateCategory(CategoryPostRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['slug'] =  Str::slug($input['name']);
        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/category-post/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/category-post/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }

        $input = $this->categoryPostRepository->update($input, $id);

        return redirect()->route('admin.categoryPost.index')->with('success',  __('Danh mục sản phẩm được thay đổi thành công'));
    }

    public function deleteCategory($id)
    {
        $this->categoryPostRepository->destroy($id);
        return back()->with('success', __('Danh mục sản phẩm  được xóa  thành công'));
    }
}
