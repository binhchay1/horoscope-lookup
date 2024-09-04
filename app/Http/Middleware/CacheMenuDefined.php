<?php

namespace App\Http\Middleware;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;
use Cache;

class CacheMenuDefined
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $keyCache = 'menu_homepage';
        $getInfor = Cache::store('redis')->get($keyCache);

        if (empty($getInfor)) {
            $data = [];
            $listBrand = [];
            $listKeyword = [];
            $listCategory = $this->categoryRepository->getListCategoryForCache();

            foreach ($listCategory as $category) {
                if (isset($category->products)) {
                    foreach ($category->products as $product) {
                        if (isset($product->brands)) {
                            if (!array_key_exists($category->name, $listBrand)) {
                                $listBrand[$category->name][] = $product->brands->name;
                            } else {
                                if (!in_array($product->brands->name, $listBrand[$category->name])) {
                                    $listBrand[$category->name][] = $product->brands->name;
                                }
                            }
                        }
                    }
                }

                if (isset($category->categoryFilter)) {
                    foreach ($category->categoryFilter as $filter) {
                        $explodeKeyWord = explode(PHP_EOL, $filter->keyword);
                        foreach ($explodeKeyWord as $explode) {
                            $listKeyword[$category->name][$filter->title][] = $explode;
                        }
                    }
                }
            }

            $data['default'] = $listCategory;
            $data['brand'] = $listBrand;
            $data['keyword'] = $listKeyword;

            Cache::store('redis')->rememberForever($keyCache, function () use ($data) {
                return $data;
            });
        }

        return $next($request);
    }
}
