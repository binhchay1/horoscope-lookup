<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{

    public $commentRepository;

    public function __construct(
        CommentRepository $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $listComments = $this->commentRepository->index();

        return view('admin.comment.index', compact('listComments'));
    }

    public function deleteCustomerReview( $id)
    {
        $this->commentRepository->destroy($id);

        return back()->with('success', __('Bình luận  được xóa  thành công'));
    }
}
