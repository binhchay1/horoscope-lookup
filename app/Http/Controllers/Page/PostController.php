<?php

namespace App\Http\Controllers\Page;

use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryPostRepository;
use App\Repositories\LayoutRepository;
use App\Repositories\SocialRepository;
use Cache;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryPostRepository;
    protected $socialRepository;
    protected $layoutRepository;

    public function __construct(
        PostRepository $postRepository,
        CategoryPostRepository $categoryPostRepository,
        LayoutRepository $layoutRepository,
        SocialRepository $socialRepository
    ) {
        $this->postRepository = $postRepository;
        $this->categoryPostRepository = $categoryPostRepository;
        $this->socialRepository = $socialRepository;
        $this->layoutRepository = $layoutRepository;
    }

    public function postDetail($slug)
    {
        if (!isset($slug)) {
            return redirect('/404');
        }
        $firstPosts1 = $this->postRepository->firstPost();
        if (empty($firstPosts1)) {
            return redirect('/404');
        }
        $listPost = $this->postRepository->postHome();
        $postRandom = $listPost->splice(3, 8);
        $postNews = $listPost->splice(1, 3);
        $post = $this->postRepository->detail($slug);
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();

        $post = $this->postRepository->detail($slug);

        $getCategory = $this->categoryPostRepository->show($post->category_id);
        if($getCategory != null) {
            $currentCateID = $getCategory->parent;
            $dataBreadcrumb = [];
            $social = $this->socialRepository->index();

            if ($currentCateID != 0) {
                $endWhile = false;
                while (!$endWhile) {
                    $getParent = $this->categoryPostRepository->show($currentCateID);
                    if ($getParent->parent == 0) {
                        $endWhile = true;
                    }

                    $currentCateID = $getParent->parent;
                    $dataBreadcrumb[$getParent->name] = route('post.category', $getParent->slug);
                }

                $dataBreadcrumb[$getCategory->name] = route('post.category', $getCategory->slug);
            } else {
                $dataBreadcrumb[$getCategory->name] = route('post.category', $getCategory->slug);
            }
            return view('page.post.post-detail', compact('firstPosts1', 'postNews', 'post', 'postRandom', 'listCategory', 'dataBreadcrumb', 'social'));

        }

        return view('page.post.post-detail', compact('firstPosts1', 'postNews', 'post', 'postRandom', 'listCategory', 'dataBreadcrumb', 'social', 'layout'));
    }

    public function postCategory($slug)
    {
        if (!isset($slug)) {
            return redirect('/404');
        }

        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $listCategoryPost = $this->categoryPostRepository->getListCategoryPost();

        $postCategory = $this->categoryPostRepository->getCatePost($slug);
        $dataPostCategory = $this->categoryPostRepository->getCate($slug);
        $getPosts = $postCategory->posts;
        if (count($getPosts) < 0) {
            return redirect('/404');
        }
        $firstPosts1 = $getPosts->splice(0, 1);
        $firstPosts2 = $getPosts->splice(1, 1);
        $postRandom3 = $getPosts->splice(1, 3);
        $postRandom4 = $getPosts->splice(1, 8);
        $layout = $this->layoutRepository->getListLayout();

        $currentCateID = $postCategory->parent;
        $dataBreadcrumb = [];

        if ($currentCateID != 0) {
            $endWhile = false;
            while (!$endWhile) {
                $getParent = $this->categoryPostRepository->show($currentCateID);
                if ($getParent->parent == 0) {
                    $endWhile = true;
                }

                $currentCateID = $getParent->parent;
                $dataBreadcrumb[$getParent->name] = route('post.category', $getParent->slug);
            }

            $dataBreadcrumb[$postCategory->name] = route('post.category', $postCategory->slug);
        }

        return view('page.post.category-post', compact(
            'listCategoryPost',
            'firstPosts1',
            'firstPosts2',
            'postRandom3',
            'postRandom4',
            'postCategory',
            'listCategory',
            'dataPostCategory',
            'dataBreadcrumb',
            'social',
            'layout'
        ));
    }
}
