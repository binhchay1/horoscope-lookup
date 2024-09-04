<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Utility;
use App\Exports\ExportStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorageProductRequest;
use App\Http\Requests\StorageRequest;
use App\Repositories\ProductRepository;
use App\Repositories\StorageProductRepository;
use App\Repositories\StoryStorageRepository;
use App\Repositories\StorageRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StorageController extends Controller
{
    private $storageRepository;
    private $productRepository;
    private $storageProductRepository;
    private $storyStorageRepository;
    private $utility;

    public function __construct(
        StorageRepository $storageRepository,
        ProductRepository $productRepository,
        StorageProductRepository $storageProductRepository,
        StoryStorageRepository $storyStorageRepository,
        Utility $utility
    ) {
        $this->storageRepository = $storageRepository;
        $this->productRepository = $productRepository;
        $this->storageProductRepository = $storageProductRepository;
        $this->storyStorageRepository = $storyStorageRepository;
        $this->utility = $utility;
    }

    public function index()
    {
        $listStorages = $this->storageRepository->index();

        return view('admin.storage.index', compact('listStorages'));
    }

    public function createStorage()
    {
        return view('admin.storage.create');
    }

    public function storeStorage(StorageRequest $request)
    {
        $input = $request->except(['_token']);
        $input = $request->all();
        $this->storageRepository->create($input);

        return redirect()->route('admin.storage.index')->with('success', __('Kho hàng được thêm thành công'));
    }

    public function editStorage($id)
    {
        $storage = $this->storageRepository->show($id);
        if (empty($storage)) {
            return redirect('/404');
        }

        return view('admin.storage.edit', compact('storage'));
    }

    public function updateStorage(StorageRequest $request,  $id)
    {
        $input = $request->except(['_token']);
        $input = $this->storageRepository->update($input, $id);

        return redirect()->route('admin.storage.index')->with('success', __('Kho hàng được thay đổi thành công'));
    }

    public function deleteStorage($id)
    {
        $this->storageRepository->destroy($id);

        return back()->with('success', __('Kho hàng được xóa thành công'));
    }

    public function import($id)
    {
        $storage = $this->storageRepository->show($id);
        $listProducts = $this->productRepository->index();
        return view('admin.storage.import', compact('storage', 'listProducts'));
    }

    public function storeImportProduct(StorageProductRequest $request)
    {
        $input = $request->except(['_token']);
        $getP = $this->storageProductRepository->getByProductAndStorage($input['product_id'], $input['storage_id']);
        if (empty($getP)) {
            $this->storageProductRepository->create($input);
        } else {
            $currentQuantity = $getP->quantity;
            $newQuantity = $currentQuantity + $input['quantity'];
            $dataQuantity = [
                'quantity' => $newQuantity,
            ];
            $this->storageProductRepository->updateQuantity($input['product_id'], $input['storage_id'], $dataQuantity);
        }

        $dataStory = [
            'product_id' => $input['product_id'],
            'user_id' => Auth::id(),
            'storage_id' => $input['storage_id'],
            'quantity' => $input['quantity'],
            'note' => $input['note'],
            'code' => base64_encode(date('Y-m-d H:i:s')),
            'type' => 'import',
        ];

        $this->storyStorageRepository->create($dataStory);

        return redirect()->route('admin.storage.index')->with('success', __('Nhập kho hàng thành công'));
    }

    public function listProduct($id)
    {
        $listProductOfStorage = $this->storageProductRepository->getListProductById($id);
        $listID = [];
        foreach ($listProductOfStorage as $storage) {
            $listID[] = $storage->product_id;
        }

        $listProducts = $this->productRepository->getProductByArrayID($listID);

        foreach ($listProducts as $product) {
            foreach ($listProductOfStorage as $productStorage) {
                if ($product->id == $productStorage->id) {
                    $product->quantity = $productStorage->quantity;
                }
            }
        }

        $listProducts = $this->utility->paginate($listProducts);

        return view('admin.storage.listProduct', compact('listProducts'));
    }

    public function export($id)
    {
        $storage = $this->storageRepository->show($id);
        $listProducts = $this->productRepository->index();

        return view('admin.storage.import', compact('storage', 'listProducts'));
    }

    public function exportImportProduct(StorageProductRequest $request)
    {
        $input = $request->except(['_token']);
        $getP = $this->storageProductRepository->getByProductAndStorage($input['product_id'], $input['storage_id']);
        if (empty($getP)) {
            return redirect()->route('admin.storage.index')->with('success', __('Sản phẩm không chưa tồn tại trong kho'));
        } else {
            $currentQuantity = $getP->quantity;
            $newQuantity = $currentQuantity - $input['quantity'];
            if ($newQuantity < 0) {
                return redirect()->route('admin.storage.index')->with('success', __('Không thể xuất kho vượt quá số lượng đang có trong kho. Số lượng trong kho : ' . $currentQuantity));
            }
            $dataQuantity = [
                'quantity' => $newQuantity,
            ];
            $this->storageProductRepository->updateQuantity($input['product_id'], $input['storage_id'], $dataQuantity);
        }

        $this->storageProductRepository->create($input);

        $dataStory = [
            'product_id' => $input['product_id'],
            'user_id' => Auth::id(),
            'storage_id' => $input['storage_id'],
            'quantity' => $input['quantity'],
            'note' => $input['note'],
            'code' => base64_encode(date('Y-m-d H:i:s')),
            'type' => 'export',
        ];

        $this->storyStorageRepository->create($dataStory);

        return redirect()->route('admin.storage.index')->with('success', __('Xuất kho hàng thành công'));
    }

    public function getDetailImportExportHandle(Request $request)
    {
        $id = $request->get('id');

        $getHistory = $this->storyStorageRepository->getStoryProduct($id);

        return response()->json($getHistory);
    }

    public function exportExcel(Request $request)
    {
        $storage = $this->storyStorageRepository->getStoryProduct($request->get('id'));
        return Excel::download(new ExportStorage($storage), 'storage.xlsx');
    }
}
