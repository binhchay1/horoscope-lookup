<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Enums\Product;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\BuildPcRepository;
use App\Repositories\SessionBuildPCRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportBuildPC;
use App\Repositories\BuildPCThemeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\LayoutRepository;
use Cart;
use Cache;

class BuildPCController extends Controller
{
    private $productRepository;
    private $buildPcRepository;
    private $sessionBuildPcRepository;
    private $buildPcThemeRepository;
    private $categoryRepository;
    private $layoutRepository;

    public function __construct(
        ProductRepository $productRepository,
        BuildPcRepository $buildPcRepository,
        SessionBuildPCRepository $sessionBuildPcRepository,
        BuildPCThemeRepository $buildPcThemeRepository,
        CategoryRepository $categoryRepository,
        LayoutRepository $layoutRepository
    ) {
        $this->productRepository = $productRepository;
        $this->buildPcRepository = $buildPcRepository;
        $this->sessionBuildPcRepository = $sessionBuildPcRepository;
        $this->buildPcThemeRepository = $buildPcThemeRepository;
        $this->categoryRepository = $categoryRepository;
        $this->layoutRepository = $layoutRepository;
    }

    public function buildPC(Request $request)
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $getProductByKey = $request->get('key');
        $menu = $this->buildPcRepository->index();
        $getSessionBuildPC = $request->session()->get('buildID');
        $theme = $this->buildPcThemeRepository->index();
        $layout = $this->layoutRepository->getListLayout();
        $dataBuild = [];
        $dataListMenu = [
            'listArea1' => [
                'menu' => [],
                'data' => [],
                'price' => 0,
            ],
            'listArea2' => [
                'menu' => [],
                'data' => [],
                'price' => 0,
            ],
        ];

        if (count($menu) > 0) {
            $dataListMenu['listArea1']['menu'] = $menu;
            $dataListMenu['listArea2']['menu'] = $menu;

            for ($i = 0; $i < count($menu); $i++) {
                $dataListMenu['listArea1']['data'][$i] = null;
                $dataListMenu['listArea2']['data'][$i] = null;
            }
        }

        if ($getSessionBuildPC != null) {
            $getDataBySessionBuildPC = $this->sessionBuildPcRepository->getDataByBuildID($getSessionBuildPC);

            if (isset($getDataBySessionBuildPC->data_build)) {
                $dataBuildBySession = json_decode($getDataBySessionBuildPC->data_build, true);
                $dataListMenu['listArea1']['data'] = $dataBuildBySession['listArea1'];
                $dataListMenu['listArea2']['data'] = $dataBuildBySession['listArea2'];
            }
        }

        if (isset($theme[0]->youtube)) {
            $arrLinkYoutube = json_decode($theme[0]->youtube, true);
            $hasYoutubeLink = true;
        } else {
            $arrLinkYoutube = [
                'link_youtube_1' => '',
                'link_youtube_2' => '',
                'link_youtube_3' => ''
            ];
            $hasYoutubeLink = false;
        }

        $arrProductID = [
            'listArea1' => [],
            'listArea1' => []
        ];

        $dataProductBuild = [
            'listArea1' => $dataListMenu['listArea1']['data'],
            'listArea2' => $dataListMenu['listArea2']['data'],
        ];

        foreach ($dataListMenu as $keyArea => $value) {
            foreach ($value['data'] as $productID) {
                if ($productID != null) {
                    $arrProductID[$keyArea][] = $productID;
                }
            }

            if (!empty($arrProductID[$keyArea])) {
                $getProduct = $this->productRepository->getProductByArrayID($arrProductID[$keyArea]);

                foreach ($getProduct as $product) {
                    $keyProduct = array_search((string) $product->id, $dataListMenu[$keyArea]['data']);
                    $dataListMenu[$keyArea]['data'][$keyProduct] = $product;

                    if ($product->new_price != null) {
                        $priceProduct = str_replace('.', '', $product->new_price);
                    } else {
                        $priceProduct = str_replace('.', '', $product->price);
                    }

                    $dataListMenu[$keyArea]['price'] += intval($priceProduct);
                }
            }
        }

        $countMenuBuildPC = $this->buildPcRepository->countTotalListBuildPC();
        $dataListMenu['listArea1']['price-format'] = number_format($dataListMenu['listArea1']['price'], 0, ',', '.');
        $dataListMenu['listArea2']['price-format'] = number_format($dataListMenu['listArea2']['price'], 0, ',', '.');

        return view('page.build-pc.build-pc', compact(
            'listCategory',
            'dataListMenu',
            'arrLinkYoutube',
            'theme',
            'layout',
            'countMenuBuildPC',
            'hasYoutubeLink',
            'dataProductBuild'
        ));
    }

    public function handleSessionBuildPC(Request $request)
    {
        $data = $request->get('data');
        $getSession = $request->session()->get('buildID');

        if (empty($getSession)) {
            $buildID = bin2hex(date('Y-m-d H:i:s'));
            $request->session()->put('buildID', $buildID);
            $dataSessionBuild = [
                'build_id' => $buildID,
                'data_build' => json_encode($data)
            ];

            $this->sessionBuildPcRepository->store($dataSessionBuild);
        } else {
            $dataSessionBuild = [
                'data_build' => json_encode($data)
            ];

            $this->sessionBuildPcRepository->updateByBuildID($getSession, $dataSessionBuild);
        }

        return 'success';
    }

    public function getProduct(Request $request)
    {
        $getProductByKey = $request->get('key');
        if (!isset($getProductByKey)) {
            return redirect('/404');
        }

        $explode = explode('-', $getProductByKey);
        $buildId = $explode[2];
        $arrID = [];

        $getListCategory = $this->buildPcRepository->getListCategory($buildId);
        $decode = json_decode($getListCategory->category_id, true);
        foreach ($decode as $category) {
            $arrID[] = $category;
        }

        $getParent = $this->getTopParent($this->categoryRepository->getParentWithKeyword($arrID[0]));
        $listFilter = $getParent->categoryFilter;
        $listKeyWord = [];
        foreach ($listFilter as $filter) {
            $explodeKeyWord = explode(PHP_EOL, $filter->keyword);
            $listKeyWord[$filter->title] = $explodeKeyWord;
        }

        $sort = $request->get('sort');
        $price = $request->get('price');
        $brand = $request->get('brand');

        $products = $this->productRepository->getListProductForBuild($arrID);

        if (isset($price)) {
            $listRangePrice = Product::RANGE_PRICE_BUILD_PC;
            if (array_key_exists($price, $listRangePrice)) {
                $rangePrice = $listRangePrice[$price];
                $fromPrice = $rangePrice['from'];
                $toPrice = $rangePrice['to'];

                foreach ($products as $key => $productPrice) {
                    if (isset($productPrice->new_price)) {
                        $priceForCheck = str_replace('.', '', $productPrice->new_price);
                    } else {
                        $priceForCheck = str_replace('.', '', $productPrice->price);
                    }

                    $convertPrice = intval($priceForCheck);
                    if ($convertPrice < $fromPrice or $convertPrice > $toPrice) {
                        $products->forget($key);
                    }
                }
            }
        }

        if (isset($brand)) {
            foreach ($products as $index => $productBrand) {
                if ($productBrand->brands->name != $brand) {
                    $products->forget($index);
                }
            }
        }

        if (isset($sort)) {
            if ($sort == 'newest') {
                $products = $products->sortByDesc('created_at');
            }

            if ($sort == 'price-asc' or $sort == 'price-desc') {
                foreach ($products as $productSort) {
                    if ($productSort->new_price != null) {
                        $currentPrice = (int) str_replace('.', '', $productSort->new_price);
                    } else {
                        $currentPrice = (int) str_replace('.', '', $productSort->price);
                    }

                    $productSort->current_price = $currentPrice;
                }

                if ($sort == 'price-asc') {
                    $products = $products->sortBy('current_price')->values();
                }

                if ($sort == 'price-desc') {
                    $products = $products->sortByDesc('current_price')->values();
                }
            }
        }

        $data = [
            'products' => $products,
            'menu' => $getProductByKey,
            'keyword' => $listKeyWord
        ];

        return \response()->json($data);
    }

    public function getListMenu()
    {
        $menu = $this->buildPcRepository->index();

        return response()->json($menu);
    }

    public function addToCartBuildPC(Request $request)
    {
        $data = $request->get('data');
        $dataProduct = $this->productRepository->getProductByArrayID($data);

        foreach ($dataProduct as $product) {
            if ($product->new_price != null) {
                $priceCart = str_replace('.', '', $product->new_price);
            } else {
                $priceCart = str_replace('.', '', $product->price);
            }

            Cart::add(
                $product->id,
                $product->name,
                $priceCart,
                1,
                ['image' => $product->image]
            );
        }

        return 'success';
    }

    public function exportExcelBuildPC(Request $request)
    {
        $area = $request->get('a');

        if (empty($area)) {
            abort(404);
        }

        if ($area != '1' and $area != '2') {
            abort(404);
        }

        $getSessionBuildPC = $request->session()->get('buildID');
        $getDataBySessionBuildPC = $this->sessionBuildPcRepository->getDataByBuildID($getSessionBuildPC);
        $dataBuild = json_decode($getDataBySessionBuildPC->data_build, true);
        if ($area == 1) {
            foreach ($dataBuild['listArea1'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        } else {
            foreach ($dataBuild['listArea2'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        }

        $getProduct = $this->productRepository->getProductByArrayID($arrProductID);
        $nameFile = 'buildpc_' . date('d-m-Y') . '_' . $getSessionBuildPC . '.xlsx';
        $total = 0;
        foreach ($getProduct as $product) {
            if ($product->new_price != null) {
                $total += (int) str_replace('.', '', $product->new_price);
            } else {
                $total += (int) str_replace('.', '', $product->price);
            }
        }

        return Excel::download(new ExportBuildPC($getProduct, $total), $nameFile);
    }

    public function exportImageBuildPC(Request $request)
    {
        $area = $request->get('a');

        if (empty($area)) {
            abort(404);
        }

        if ($area != '1' and $area != '2') {
            abort(404);
        }

        $getSessionBuildPC = $request->session()->get('buildID');
        $getDataBySessionBuildPC = $this->sessionBuildPcRepository->getDataByBuildID($getSessionBuildPC);
        $dataBuild = json_decode($getDataBySessionBuildPC->data_build, true);
        $arrProductID = [];

        if ($area == 1) {
            foreach ($dataBuild['listArea1'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        } else {
            foreach ($dataBuild['listArea2'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        }

        $getProduct = $this->productRepository->getProductByArrayID($arrProductID);

        return view('page.exports.build-pc-image', compact('getProduct'))->render();
    }

    public function printBuildPC(Request $request)
    {
        $area = $request->get('a');

        if (empty($area)) {
            abort(404);
        }

        if ($area != '1' and $area != '2') {
            abort(404);
        }

        $getSessionBuildPC = $request->session()->get('buildID');
        $getDataBySessionBuildPC = $this->sessionBuildPcRepository->getDataByBuildID($getSessionBuildPC);
        $dataBuild = json_decode($getDataBySessionBuildPC->data_build, true);

        if ($area == 1) {
            foreach ($dataBuild['listArea1'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        } else {
            foreach ($dataBuild['listArea2'] as $data) {
                if ($data != null) {
                    $arrProductID[] = $data;
                }
            }
        }

        $getProduct = $this->productRepository->getProductByArrayID($arrProductID);
        $total = 0;
        foreach ($getProduct as $product) {
            if ($product->new_price != null) {
                $total += (int) str_replace('.', '', $product->new_price);
            } else {
                $total += (int) str_replace('.', '', $product->price);
            }
        }

        return view('page.build-pc.print', compact('getProduct', 'total'));
    }

    function getTopParent($category)
    {
        if ($category->parent === 0) {
            return $category;
        }

        return $this->getTopParent($this->categoryRepository->getParentWithKeyword($category->parent));
    }
}
