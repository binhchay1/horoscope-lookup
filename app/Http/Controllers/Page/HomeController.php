<?php

namespace App\Http\Controllers\Page;

use App\Enums\Role;
use App\Enums\Utility;
use App\Http\Requests\LoginRequest;
use App\Repositories\ProductRepository;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryPostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomContactRepository;
use App\Repositories\LandingPageRepository;
use App\Repositories\LayoutRepository;
use App\Repositories\PostRepository;
use App\Repositories\PromotionRepository;
use Illuminate\Http\Request;
use App\Repositories\BrandRepository;
use App\Repositories\CustomerReviewRepository;
use App\Repositories\SocialRepository;
use App\Repositories\YoutubeChannelRepository;
use Illuminate\Support\Facades\Config;
use Detection\MobileDetect;
use Cache;

class HomeController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $landingPageRepository;
    protected $customContactRepository;
    protected $postRepository;
    protected $layoutRepository;
    protected $promotionRepository;
    protected $categoryPostRepository;
    protected $brandRepository;
    protected $youtubeChannelRepository;
    protected $customerReviewRepository;
    protected $socialRepository;
    protected $utility;

    public function __construct(
        Utility $utility,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        LandingPageRepository $landingPageRepository,
        CustomContactRepository $customContactRepository,
        PostRepository $postRepository,
        LayoutRepository $layoutRepository,
        PromotionRepository $promotionRepository,
        CategoryPostRepository $categoryPostRepository,
        BrandRepository $brandRepository,
        YoutubeChannelRepository $youtubeChannelRepository,
        CustomerReviewRepository $customerReviewRepository,
        SocialRepository $socialRepository
    ) {
        $this->utility = $utility;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->landingPageRepository = $landingPageRepository;
        $this->customContactRepository = $customContactRepository;
        $this->postRepository = $postRepository;
        $this->layoutRepository = $layoutRepository;
        $this->promotionRepository = $promotionRepository;
        $this->categoryPostRepository = $categoryPostRepository;
        $this->brandRepository = $brandRepository;
        $this->youtubeChannelRepository = $youtubeChannelRepository;
        $this->customerReviewRepository = $customerReviewRepository;
        $this->socialRepository = $socialRepository;
    }

    public function changeLocate($locale)
    {
        if ($locale) {
            if (in_array($locale, Config::get('app.locale'))) {
                App::setLocale($locale);
                Session::put('lang', $locale);
                Session::save();

                return redirect()->back()->with('locale', $locale);
            }
        }

        return redirect()->back();
    }

    public function viewPolicy()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.policy', compact('listCategory', 'layout', 'social'));
    }

    public function paymentOnline()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.payment-online', compact('listCategory', 'layout', 'social'));
    }

    public function payment()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.payment', compact('listCategory', 'layout', 'social'));
    }

    public function rules()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.rule', compact('listCategory', 'layout', 'social'));
    }

    public function complaint()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.complaint', compact('listCategory', 'layout', 'social'));
    }

    public function productPolicy()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.product-policy', compact('listCategory', 'layout', 'social'));
    }

    public function businessPolicy()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.business-policy', compact('listCategory', 'layout', 'social'));
    }

    public function electronicBill()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.electronic-bill', compact('listCategory', 'layout', 'social'));
    }

    public function securityCustomer()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.security-customer', compact('listCategory', 'layout', 'social'));
    }

    public function introduction()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.introduction', compact('listCategory', 'layout', 'social'));
    }

    public function contactBusiness()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('page.other.contact-business', compact('listCategory', 'layout', 'social'));
    }

    public function viewThankRegister($slug)
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $social = $this->socialRepository->index();
        $layout = $this->layoutRepository->getListLayout();

        return view('auth.register-success', compact('listCategory', 'layout', 'social'));
    }

    public function viewFlashSale()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $getFlashSale = $this->layoutRepository->getFlashSale();
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();

        if (!empty($getFlashSale)) {

            if (isset($getFlashSale->flash_sale_list_product_id)) {
                $listProductFlashSale = json_decode($getFlashSale->flash_sale_list_product_id, true);
                foreach ($listProductFlashSale as $key => $value) {
                    $arrCodeProduct[] = $key;
                }

                $getProductFlashSale = $this->productRepository->getProductFlashSaleByCode($arrCodeProduct);
                foreach ($getProductFlashSale as $product) {
                    $product->new_price = $listProductFlashSale[$product->code]['new_price'];
                    $product->sale_quantity = $listProductFlashSale[$product->code]['quantity'];
                    $product->stock = $listProductFlashSale[$product->code]['stock'];
                }

                if (count($getProductFlashSale) > 0) {
                    $listFlashSale = [
                        'flash_sale_timer' => $getFlashSale->flash_sale_timer,
                        'flash_sale_list_product_id' => $getProductFlashSale
                    ];
                }
            }
        }

        return view('page.flash-sale', compact('listCategory', 'getFlashSale', 'listFlashSale', 'layout', 'social'));
    }

    public function viewTopSale()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $getTopSale = $this->layoutRepository->listHotSale();
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();
        $listTopSale = [];

        if (!empty($getTopSale)) {
            if (isset($getTopSale->hot_sale_list_product_id)) {
                $listProductTopSale = json_decode($getTopSale->hot_sale_list_product_id, true);

                foreach ($listProductTopSale as $key => $value) {
                    $arrCodeProduct[] = $key;
                }

                $getProductTopSale = $this->productRepository->getProductFlashSaleByCode($arrCodeProduct);

                if (count($getProductTopSale) > 0) {
                    $listTopSale = [
                        'hot_sale_list_product_id' => $getProductTopSale
                    ];
                }
            }
        }

        return view('page.top-sale', compact('listCategory', 'getTopSale', 'listTopSale', 'layout', 'social'));
    }

    public function viewPromotion()
    {
        $listPromotionDESC = $this->promotionRepository->promotionDESC();
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $listCategoryPost = $this->categoryPostRepository->getListCategoryPost();
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();

        return view('page.promotion.index', compact(
            'listPromotionDESC',
            'listCategory',
            'listCategoryPost',
            'layout',
            'social'
        ));
    }

    public function promotionDetail($slug)
    {
        if (!isset($slug)) {
            return redirect('/404');
        }
        $firstPosts1 = $this->postRepository->firstPost();
        $listPost = $this->postRepository->postHome();
        $postRandom = $listPost->splice(3, 8);
        $listPromotion = $this->promotionRepository->promotionHome();
        $promotion = $this->promotionRepository->detail($slug);
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();

        return view('page.promotion.promotion-detail', compact('firstPosts1', 'postRandom', 'promotion', 'listPromotion', 'listCategory', 'layout', 'social'));
    }

    public function viewPost()
    {
        $listPost = $this->postRepository->postHome();
        $firstPosts1 = $this->postRepository->firstPost();
        if (empty($firstPosts1)) {
            return redirect('/404');
        }
        $secondPost = $this->postRepository->secondPost();
        $postRandom3 = $listPost->splice(1, 3);
        $postRandom4 = $listPost->splice(1, 8);
        $postRandom5 = $this->postRepository->postRandom5();
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $listCategoryPost = $this->categoryPostRepository->getListCategoryPost();
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();

        return view('page.post.posts', compact(
            'listPost',
            'firstPosts1',
            'secondPost',
            'postRandom3',
            'postRandom4',
            'postRandom5',
            'listCategory',
            'listCategoryPost',
            'layout',
            'social'
        ));
    }

    public function viewHome()
    {
        $getHotSale = $this->layoutRepository->listHotSale();

        if (empty($getHotSale->hot_sale_list_product_id)) {
            $listHotSale = [];
        } else {
            $listProductHotSale = json_decode($getHotSale->hot_sale_list_product_id, true);
            $getListProductHotSale = $this->productRepository->getListProductHotSale($listProductHotSale);
            $listHotSale = $getListProductHotSale;
        }

        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $listCategoryProduct = $listCategory['default'];
        $listNews = $this->postRepository->getListNewsInHomepage();
        $listPromotion = $this->promotionRepository->getListPromotionHomePage();
        $layout = $this->layoutRepository->getListLayout();
        $getSlide = $this->layoutRepository->getSlide();
        $getSlideFooter = $this->layoutRepository->getSlideFooter();
        $getFlashSale = $this->layoutRepository->getFlashSale();
        $listYoutube = $this->youtubeChannelRepository->getListYoutube();
        $listCustomerReview = $this->customerReviewRepository->getListCustomerReview();
        $social = $this->socialRepository->index();
        $listFlashSale = [];
        $listSlide = [];
        $listSlideFooter = [];

        if (isset($getSlide->slide_thumbnail)) {
            $listSlide = json_decode($getSlide->slide_thumbnail, true);
        }
        if (isset($getSlideFooter->footer_slide_thumbnail)) {
            $listSlideFooter = json_decode($getSlideFooter->footer_slide_thumbnail, true);
        }

        if (!empty($getFlashSale)) {
            if (isset($getFlashSale->flash_sale_list_product_id)) {
                $listProductFlashSale = json_decode($getFlashSale->flash_sale_list_product_id, true);
                foreach ($listProductFlashSale as $key => $value) {
                    $arrCodeProduct[] = $key;
                }

                $getProductFlashSale = $this->productRepository->getProductFlashSaleByCode($arrCodeProduct);
                foreach ($getProductFlashSale as $product) {
                    $product->new_price = $listProductFlashSale[$product->code]['new_price'];
                    $product->sale_quantity = $listProductFlashSale[$product->code]['quantity'];
                    $product->stock = $listProductFlashSale[$product->code]['stock'];
                }

                if (count($getProductFlashSale) > 0) {
                    $listFlashSale = [
                        'flash_sale_timer' => $getFlashSale->flash_sale_timer,
                        'flash_sale_list_product_id' => $getProductFlashSale
                    ];
                }
            }
        }

        $detect = new MobileDetect();
        $isMobile = $detect->isMobile();

        return view('page.homepage', compact(
            'listCategory',
            'listNews',
            'listHotSale',
            'layout',
            'listSlide',
            'listFlashSale',
            'listPromotion',
            'listCategoryProduct',
            'getFlashSale',
            'listYoutube',
            'listCustomerReview',
            'listSlideFooter',
            'isMobile',
            'social'
        ));
    }

    public function viewSearch(Request $request)
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();
        $search = $request->get('q');
        $isList = false;
        $listProducts = [];
        $dataBrand = [];
        if ($search) {
            $listProducts = $this->productRepository->getProductBySearch($search);
            if (count($listProducts) > 0) {
                $isList = true;
            }
        }

        return view('page.search', compact('listProducts', 'search', 'isList', 'listCategory', 'dataBrand', 'layout', 'social'));
    }

    public function viewLandingPage($slug)
    {
        $getLandingPage = $this->landingPageRepository->getBySlug($slug);
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();
        if (!$getLandingPage) {
            return redirect('/404');
        }
        $content = $getLandingPage->content;

        return view('page.landing-page', compact('content', 'layout', 'social'));
    }

    public function storeCustomContact(Request $request)
    {
        if (is_numeric($request) || !filter_var($request, FILTER_VALIDATE_EMAIL)) {
            return redirect('/404');
        }

        $this->customContactRepository->store($request);
    }

    public function staffLogin()
    {
        $layout = $this->layoutRepository->getListLayout();
        $social = $this->socialRepository->index();

        return view('auth.login-staff', compact('layout', 'social'));
    }

    public function postStaffLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            $request->session()->put('email', $credentials['email']);
            if(\Auth::user()->lock_user == null) {

            if (\Auth::user()->role == Role::STAFF || \Auth::user()->role == Role::ADMIN) {
                return redirect()->route('admin.dashboard');
            } else {
                if ($request->get('return_url')) {
                    $return_url = $request->get('return_url');
                    return redirect($return_url);
                }

                return redirect()->route('staff.login')->withErrors([
                    'custom' => __('Bạn không có quyền truy cập!')
                ]);
            }

            } else {
                return redirect('/lock-account');
            }
        } else {
            return back()->withErrors([
                'custom' => __('Email hoặc mật khẩu không chính xác')
            ]);
        }
    }

    public function registerSuccess()
    {
        $key = 'menu_homepage';
        $listCategory = Cache::store('redis')->get($key);
        $layout = $this->layoutRepository->getListLayout();

        return view('auth.register-success', compact('listCategory', 'layout'));
    }

    public function sendMail()
    {
        return view('mail.send-mail-order');
    }
}
