<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\LayoutRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
{
    private $layoutRepository;

    public function __construct(
        LayoutRepository $layoutRepository
    ) {
        $this->layoutRepository = $layoutRepository;
    }

    public function viewCustomLayout()
    {
        $layout = $this->layoutRepository->getListLayout();
        $listSlide = [];
        $listSlideFooter = [];
        $listFlashSale = [];
        $listHotSale = [];
        if (!empty($layout)) {
            if (isset($layout->slide_thumbnail)) {
                $listSlide = json_decode($layout->slide_thumbnail, true);
            }

            if (isset($layout->footer_slide_thumbnail)) {
                $listSlideFooter = json_decode($layout->footer_slide_thumbnail, true);
            }

            if (isset($layout->hot_sale_list_product_id)) {
                $listHotSale = json_decode($layout->hot_sale_list_product_id, true);
            }
        }

        return view('admin.layout.index', compact('layout', 'listSlide', 'listHotSale', 'listSlideFooter'));
    }

    public function storeLayout(Request $request)
    {
        $input = $request->except(['_token']);
        $getLayout = $this->layoutRepository->getListLayout();

        if (isset($input)) {

            if (isset($input['big_banner_thumbnail'])) {
                $input['big_banner_thumbnail']->move(public_path('images/upload/layout/'), $input['big_banner_thumbnail']->getClientOriginalName());
                $input['big_banner_thumbnail'] = '/images/upload/layout/' . $input['big_banner_thumbnail']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_1'])) {
                $input['small_thumbnail_1']->move(public_path('images/upload/layout/'), $input['small_thumbnail_1']->getClientOriginalName());
                $input['small_thumbnail_1'] = '/images/upload/layout/' . $input['small_thumbnail_1']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_2'])) {
                $input['small_thumbnail_2']->move(public_path('images/upload/layout/'), $input['small_thumbnail_2']->getClientOriginalName());
                $input['small_thumbnail_2'] = '/images/upload/layout/' . $input['small_thumbnail_2']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_3'])) {
                $input['small_thumbnail_3']->move(public_path('images/upload/layout/'), $input['small_thumbnail_3']->getClientOriginalName());
                $input['small_thumbnail_3'] = '/images/upload/layout/' . $input['small_thumbnail_3']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_4'])) {
                $input['small_thumbnail_4']->move(public_path('images/upload/layout/'), $input['small_thumbnail_4']->getClientOriginalName());
                $input['small_thumbnail_4'] = '/images/upload/layout/' . $input['small_thumbnail_4']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_5'])) {
                $input['small_thumbnail_5']->move(public_path('images/upload/layout/'), $input['small_thumbnail_5']->getClientOriginalName());
                $input['small_thumbnail_5'] = '/images/upload/layout/' . $input['small_thumbnail_5']->getClientOriginalName();
            }

            if (isset($input['small_thumbnail_6'])) {
                $input['small_thumbnail_6']->move(public_path('images/upload/layout/'), $input['small_thumbnail_6']->getClientOriginalName());
                $input['small_thumbnail_6'] = '/images/upload/layout/' . $input['small_thumbnail_6']->getClientOriginalName();
            }

            if (isset($input['small_banner_thumbnail_left'])) {
                $input['small_banner_thumbnail_left']->move(public_path('images/upload/layout/'), $input['small_banner_thumbnail_left']->getClientOriginalName());
                $input['small_banner_thumbnail_left'] = '/images/upload/layout/' . $input['small_banner_thumbnail_left']->getClientOriginalName();
            }

            if (isset($input['small_banner_thumbnail_right'])) {
                $input['small_banner_thumbnail_right']->move(public_path('images/upload/layout/'), $input['small_banner_thumbnail_right']->getClientOriginalName());
                $input['small_banner_thumbnail_right'] = '/images/upload/layout/' . $input['small_banner_thumbnail_right']->getClientOriginalName();
            }

            if (isset($input['banner_promotion_thumbnail'])) {
                $input['banner_promotion_thumbnail']->move(public_path('images/upload/layout/'), $input['banner_promotion_thumbnail']->getClientOriginalName());
                $input['banner_promotion_thumbnail'] = '/images/upload/layout/' . $input['banner_promotion_thumbnail']->getClientOriginalName();
            }

            if (isset($input['adv_thumbnail'])) {
                $input['adv_thumbnail']->move(public_path('images/upload/layout/'), $input['adv_thumbnail']->getClientOriginalName());
                $input['adv_thumbnail'] = '/images/upload/layout/' . $input['adv_thumbnail']->getClientOriginalName();
            }

            if (isset($input['build_pc_thumbnail'])) {
                $input['build_pc_thumbnail']->move(public_path('images/upload/layout/'), $input['build_pc_thumbnail']->getClientOriginalName());
                $input['build_pc_thumbnail'] = '/images/upload/layout/' . $input['build_pc_thumbnail']->getClientOriginalName();
            }
        }

        if (!empty($getLayout)) {
            $this->layoutRepository->update($getLayout->id, $input);
        } else {
            $this->layoutRepository->store($input);
        }

        return back()->with('success', __('Ảnh được thêm thành công'));
    }

    public function storeSlide(Request $request)
    {
        $input = $request->except(['_token']);
        if (isset($input['slide_image'])) {
            $input['slide_image']->move(public_path('images/upload/layout/'), $input['slide_image']->getClientOriginalName());
            $getSlide = $this->layoutRepository->getSlide();
            if (empty($getSlide)) {
                $arrSlide[] = [
                    'image' => '/images/upload/layout/' . $input['slide_image']->getClientOriginalName(),
                    'url' => $input['slide_url']
                ];
            } else {
                $arrSlide = json_decode($getSlide->slide_thumbnail, true);
                $arrSlide[] = [
                    'image' => '/images/upload/layout/' . $input['slide_image']->getClientOriginalName(),
                    'url' => $input['slide_url']
                ];
            }

            $data = [
                'slide_thumbnail' => json_encode($arrSlide)
            ];

            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }

        return back()->with('success', __('Ảnh được thêm thành công'));
    }

    public function deleteSlide($index)
    {
        $getSlide = $this->layoutRepository->getSlide();
        $arrSlide = json_decode($getSlide->slide_thumbnail, true);
        if ($arrSlide > 0) {
            foreach ($arrSlide as $key => $value) {
                if ($key == $index) {
                    continue;
                }
                $arrNew[] = $value;
            }

            $data = [
                'slide_thumbnail' => json_encode($arrNew)
            ];
            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }

        return back()->with('success', __('Ảnh được xóa thành công'));
    }

    public function footerSlide(Request $request)
    {
        $input = $request->except(['_token']);
        if (isset($input['slide_image_footer'])) {
            $input['slide_image_footer']->move(public_path('images/upload/layout/'), $input['slide_image_footer']->getClientOriginalName());
            $getSlideFooter = $this->layoutRepository->getSlideFooter();
            if (empty($getSlideFooter)) {
                $arrSlide[] = [
                    'image_footer' => '/images/upload/layout/' . $input['slide_image_footer']->getClientOriginalName(),
                ];
            } else {
                $arrSlide = json_decode($getSlideFooter->footer_slide_thumbnail, true);
                $arrSlide[] = [
                    'image_footer' => '/images/upload/layout/' . $input['slide_image_footer']->getClientOriginalName(),
                ];
            }

            $data = [
                'footer_slide_thumbnail' => json_encode($arrSlide)
            ];

            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }

        return back()->with('success', __('Ảnh được thêm thành công'));
    }

    public function deleteSlideFooter($item)
    {
        $getSlide = $this->layoutRepository->getSlideFooter();
        $arrSlide = json_decode($getSlide->footer_slide_thumbnail, true);

        $arrNew = [];
        if ($arrSlide > 0) {
            foreach ($arrSlide as $key => $value) {
                if ($key == $item) {
                    continue;
                }
                $arrNew[] = $value;
            }

            $data = [
                'footer_slide_thumbnail' => json_encode($arrNew)
            ];
            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }


        return back()->with('success', __('Ảnh được xóa thành công'));
    }

    public function storeHotSale(Request $request)
    {
        $input = $request->except(['_token']);
        $data = [];

        if (array_key_exists('product_id', $input)) {
            $data['hot_sale_list_product_id'] = json_encode($input['product_id']);
        } else {
            $data['hot_sale_list_product_id'] = null;
        }

        if (isset($input['hot_sale_big_thumbnail'])) {
            $input['hot_sale_big_thumbnail']->move(public_path('images/upload/layout/'), $input['hot_sale_big_thumbnail']->getClientOriginalName());
            $data['hot_sale_big_thumbnail'] = '/images/upload/layout/' . $input['hot_sale_big_thumbnail']->getClientOriginalName();
        }

        if (isset($input['permarklink_hot_sale_big_thumbnail'])) {
            $data['permarklink_hot_sale_big_thumbnail'] = $input['permarklink_hot_sale_big_thumbnail'];
        }

        if (!empty($data)) {
            $getLayout = $this->layoutRepository->getListLayout();
            if (!empty($getLayout)) {
                $this->layoutRepository->update($getLayout->id, $data);
            } else {
                $this->layoutRepository->store($data);
            }
        }

        return back()->with('success', __('Hot deal thêm thành công'));
    }

    public function deleteThumbLayout(Request $request)
    {
        $id = $request->get('id');

        if (!isset($id)) {
            abort(404);
        }

        $this->layoutRepository->deleteByIdThumb($id);

        return back()->with('success', __('Xóa ảnh thành công'));
    }
}
