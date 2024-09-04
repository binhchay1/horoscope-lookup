<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CustomerReviewRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerReviewRequest;
use App\Http\Requests\CustomerReviewUpdateRequest;

class CustomerReviewController extends Controller
{
    private $customerReviewRepository;

    public function __construct(
        CustomerReviewRepository $customerReviewRepository
    ) {
        $this->customerReviewRepository = $customerReviewRepository;
    }

    public function index()
    {
        $listCustomerReview = $this->customerReviewRepository->index();

        return view('admin.customer-review.index', compact('listCustomerReview'));
    }

    public function createCustomerReview()
    {
        return view('admin.customer-review.create');
    }

    public function storeCustomerReview(CustomerReviewRequest $request)
    {
        $input = $request->except(['_token']);
        if ($request->hasfile('thumbnail')) {
            if (isset($input['thumbnail'])) {
                $input['thumbnail']->move(public_path('images/upload/customer-review/'), $input['thumbnail']->getClientOriginalName());
                $input['thumbnail'] = '/images/upload/customer-review/' . $input['thumbnail']->getClientOriginalName();
            }
        }
        $this->customerReviewRepository->create($input);

        return redirect()->route('admin.customer.review.index')->with('success', __('Đánh giá khách hàng thêm thành công'));
    }

    public function editCustomerReview($id)
    {
        $customerReview = $this->customerReviewRepository->show($id);
        return view('admin.customer-review.edit', compact('customerReview'));
    }

    public function updateCustomerReview(CustomerReviewUpdateRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        if ($request->hasfile('thumbnail')) {
            if (isset($input['thumbnail'])) {
                $input['thumbnail']->move(public_path('images/upload/customer-review/'), $input['thumbnail']->getClientOriginalName());
                $input['thumbnail'] = '/images/upload/customer-review/' . $input['thumbnail']->getClientOriginalName();
            }
        }
        $input = $this->customerReviewRepository->update($input, $id);

        return redirect()->route('admin.customer.review.index')->with('success', __('Đánh giá khách hàng cập nhật thành công'));
    }

    public function deleteCustomerReview($id)
    {
        $customerReview = $this->customerReviewRepository->destroy($id);
        if (empty($customerReview)) {
            return redirect('/404');
        }

        return back()->with('success', __('Đánh giá khách hàng xóa thành công'));
    }
}
