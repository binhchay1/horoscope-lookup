<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\promotionRequest;
use App\Http\Requests\PromotionUpdateRequest;
use App\Repositories\PromotionRepository;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    private $promotionRepository;

    public function __construct(
        PromotionRepository $promotionRepository
    )
    {
        $this->promotionRepository = $promotionRepository;
    }

    public function index()
    {
        $listPromotions = $this->promotionRepository->index();

        return view('admin.promotion.index',compact('listPromotions'));
    }

    public function createPromotion()
    {
        return view('admin.promotion.create');
    }

    public function storePromotion(PromotionRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $input['slug'] =  Str::slug($input['title']);
        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/promotion/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/promotion/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }
        $this->promotionRepository->create($input);

        return redirect()->route('admin.promotion.index')->with('success',  __('Bài quảng cáo được thêm thành công'));
    }

    public function editPromotion( $id)
    {
        $promotion = $this->promotionRepository->show($id);
        if (empty($promotion)) {
            return redirect('/404');
        }
        return view('admin.promotion.edit', compact('promotion'));
    }

    public function updatePromotion(PromotionUpdateRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['slug'] =  Str::slug($input['title']);
        if (isset($input['image'])) {
            $input['image']->move(public_path('images/upload/promotion/'), $input['image']->getClientOriginalName());
            $path = '/images/upload/promotion/' . $input['image']->getClientOriginalName();
            $input['image'] = $path;
        }

        $input = $this->promotionRepository->update($input, $id);

        return redirect()->route('admin.promotion.index')->with('success', __('Bài quảng cáo được thay đổi thành công'));
    }

    public function deletePromotion( $id)
    {
        $this->promotionRepository->destroy($id);
        return back()->with('success',  __('Bài quảng cáo được xóa thành công'));
    }
}
