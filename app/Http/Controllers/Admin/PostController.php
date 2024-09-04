<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Utility;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\CategoryPostRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postRepository;
    private $categoryPostRepository;

    public function __construct(
        CategoryPostRepository $categoryPostRepository,
        PostRepository $postRepository,
        Utility $utility

    )
    {
        $this->categoryPostRepository = $categoryPostRepository;
        $this->postRepository = $postRepository;
        $this->utility = $utility;

    }

    public function index(Request $request)
    {
        $getCategory = $request->get('category');
        $getSearchName = $request->get('s');
        $listPosts = $this->postRepository->getListPostWithFilter();
        $categoryFilter = [];

        foreach ($listPosts as $post) {
            if (!array_key_exists($post->category->id, $categoryFilter)) {
                $categoryFilter[$post->category->id] = $post->category;
            }
        }

        if (isset($getCategory)) {
            if ($getCategory != 'all') {
                $listPosts = $listPosts->where('category.id', $getCategory);
            }
        }

        if (isset($getSearchName)) {
            if ($getSearchName != '') {
                $listPosts = $listPosts->filter(function ($item) use ($getSearchName) {
                    return strpos($item->name, $getSearchName) !== false;
                });
            }
        }
        $listPosts = $this->utility->paginate($listPosts);

        return view('admin.post.index',compact('categoryFilter', 'listPosts'));
    }

    public function createPost()
    {
        $listCategories = $this->categoryPostRepository->index();
        return view('admin.post.create', compact('listCategories'));
    }

    public function storePost(PostRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $input['slug'] =  Str::slug($input['title']);
        $input['author'] = Auth::user()->id;
        if (isset($input['thumbnail'])) {
            $input['thumbnail']->move(public_path('images/upload/post/'), $input['thumbnail']->getClientOriginalName());
            $path = '/images/upload/post/' . $input['thumbnail']->getClientOriginalName();
            $input['thumbnail'] = $path;
        }
        $this->postRepository->create($input);

        return redirect()->route('admin.post.index')->with('success',  __('Bài viết được thêm thành công'));
    }

    public function editPost( $id)
    {
        $listCategories = $this->categoryPostRepository->index();
        $post = $this->postRepository->show($id);
        if (empty($post)) {
            return redirect('/404');
        }
        return view('admin.post.edit', compact('post','listCategories'));
    }

    public function updatePost(UpdatePostRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['slug'] =  Str::slug($input['title']);
        if (isset($input['thumbnail'])) {
            $input['thumbnail']->move(public_path('images/upload/post/'), $input['thumbnail']->getClientOriginalName());
            $path = '/images/upload/post/' . $input['thumbnail']->getClientOriginalName();
            $input['thumbnail'] = $path;
        }
        $input = $this->postRepository->update($input, $id);

        return redirect()->route('admin.post.index')->with('success',  __('Bài viết được thay đổi thành công'));
    }


    public function deletePost( $id)
    {
        $this->postRepository->destroy($id);
        return back()->with('success', __('Bài viết  được xóa  thành công'));
    }

    public function uploadMedia(Request $request)
    {

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('image/upload/media/'), $fileName);

            $url = asset('image/upload/media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
