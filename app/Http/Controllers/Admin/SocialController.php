<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SocialRepository;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    private $socialRepository;

    public function __construct(
        SocialRepository $socialRepository
    ) {
        $this->socialRepository = $socialRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->index();

        return view('admin.social.index', compact('social'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();

        $this->socialRepository->create($input);

        return redirect()->route('admin.social.index')->with('success',  __('Mạng xã hội được thêm thành công'));
    }

    public function edit( $id)
    {
        $social = $this->socialRepository->show($id);
        if (empty($social)) {
            return redirect('/404');
        }
        return view('admin.social.edit', compact('social'));
    }

    public function update(Request $request,  $id)
    {
        $input = $request->except(['_token']);
        $input = $this->socialRepository->update($input, $id);

        return redirect()->route('admin.social.index')->with('success', __('Mạng xã hội được thay đổi thành công'));
    }

    public function delete( Request $request)
    {
        $id = $request->get('id');
        if (!isset($id)) {
            abort(404);
        }
    
        $this->socialRepository->deleteByIdThumb($id);
        return back()->with('success',  __('Mạng xã hội được xóa thành công'));
    }
}
