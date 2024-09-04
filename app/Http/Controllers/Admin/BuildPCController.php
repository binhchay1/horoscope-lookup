<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BuildPcRepository;
use App\Enums\Utility;
use App\Http\Requests\BuildPCRequest;
use App\Repositories\BuildPCThemeRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class BuildPCController extends Controller
{
    private $buildPcRepository;
    private $categoryRepository;
    private $buildPcThemeRepository;
    private $utility;

    public function __construct(
        BuildPcRepository $buildPcRepository,
        CategoryRepository $categoryRepository,
        BuildPCThemeRepository $buildPcThemeRepository,
        Utility $utility
    ) {
        $this->buildPcRepository = $buildPcRepository;
        $this->categoryRepository = $categoryRepository;
        $this->buildPcThemeRepository = $buildPcThemeRepository;
        $this->utility = $utility;
    }

    public function index()
    {
        $listBuildPcs = $this->buildPcRepository->index();
        $listBuildPcs = $this->utility->paginate($listBuildPcs, 5);

        return view('admin.build-pc.index', compact('listBuildPcs'));
    }

    public function create()
    {
        $listCategories = $this->categoryRepository->indexOnlyChild();
        return view('admin.build-pc.create', compact('listCategories'));
    }

    public function store(BuildPCRequest $request)
    {
        $input = $request->except(['_token']);

        $input['category_id'] = json_encode($input['category_id'], true);

        $this->buildPcRepository->create($input);

        return redirect()->route('admin.buildPC.index')->with('success',  __('Cấu hình được thêm thành công'));
    }

    public function edit($id)
    {
        $buildPc = $this->buildPcRepository->show($id);
        if (empty($buildPc)) {
            return redirect('/404');
        }
        $listCategories = $this->categoryRepository->indexOnlyChild();

        return view('admin.build-pc.edit', compact('buildPc', 'listCategories'));
    }

    public function update(BuildPCRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input['category_id'] = json_encode($input['category_id'], true);
        $input = $this->buildPcRepository->update($input, $id);

        return redirect()->route('admin.buildPC.index')->with('success',  __('Cấu hình được thay đổi thành công'));
    }

    public function delete($id)
    {
        $this->buildPcRepository->destroy($id);

        return back()->with('success', __('Cấu hình  được xóa  thành công'));
    }

    public function theme()
    {
        $theme = $this->buildPcThemeRepository->index();
        if (isset($theme[0]->youtube)) {
            $arrLinkYoutube = json_decode($theme[0]->youtube, true);
        } else {
            $arrLinkYoutube = [
                'link_youtube_1' => '',
                'link_youtube_2' => '',
                'link_youtube_3' => ''
            ];
        }

        return view('admin.build-pc.theme', compact('theme', 'arrLinkYoutube'));
    }

    public function themeUpdate(Request $request)
    {
        $theme = $this->buildPcThemeRepository->index();
        $arrLinkYoutube = [
            'link_youtube_1' => $request->get('link_youtube_1'),
            'link_youtube_2' => $request->get('link_youtube_2'),
            'link_youtube_3' => $request->get('link_youtube_3')
        ];

        $data = [
            'youtube' => json_encode($arrLinkYoutube),
            'content' => $request->get('content')
        ];

        if (count($theme) == 0) {
            $this->buildPcThemeRepository->create($data);
        } else {
            $this->buildPcThemeRepository->updateItemTheme($data);
        }

        return redirect()->route('admin.buildPC.theme');
    }
}
