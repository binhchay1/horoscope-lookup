<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RatingRepository;
use App\Enums\Utility;

class RatingController extends Controller
{

    public $rattingRepository;
    public $utility;

    public function __construct(
        RatingRepository $rattingRepository,
        Utility $utility
    ) {
        $this->rattingRepository = $rattingRepository;
        $this->utility = $utility;
    }

    public function index()
    {
        $listRatings = $this->rattingRepository->listRatings();

        $products = [];
        foreach ($listRatings as $item) {
            if (isset($item->product->code)) {
                if (array_key_exists($item->product->code, $products)) {
                    $products[$item->product->code]['name'] = $item->product->name;
                    $products[$item->product->code]['total_rating'] = $products[$item->product->code]['total_rating'] + $item->rating_product;
                    $products[$item->product->code]['total_vote'] = $products[$item->product->code]['total_vote'] + 1;
                } else {
                    $products[$item->product->code]['name'] = $item->product->name;
                    $products[$item->product->code]['total_rating'] = $item->rating_product;
                    $products[$item->product->code]['total_vote'] = 1;
                }
            }
        }

        $products = $this->utility->paginate($products);

        return view('admin.rating.index', compact('products'));
    }

    public function deleteRatting($id)
    {
        $this->rattingRepository->destroy($id);

        return back()->with('success', __('Bình luận  được xóa  thành công'));
    }
}
