<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    public function index(int $productId)
    {
        $product = Product::findOrFail($productId);
        $productImages = ProductImage::where('product_id',$productId)->get();
        return view('admin.product-image.index', compact('product','productImages'));
    }

    public function store(Request $request, int $productId)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ],
            [
                'images.*.required' => 'Hình ảnh không được để trống!',
                'images.*.mimes' => 'Hình ảnh không đúng định dạng!',
                'images.*.image' => 'Hình ảnh không phải là mội ảnh!',
                'images.*.max' => 'Hình ảnh có kích thước quá lớn!',
            ]);
        $product = Product::findOrFail($productId);

        $imageData = [];
        if($files = $request->file('images')){
            foreach($files as $key => $file){
                $extension = $file->getClientOriginalExtension();
                $filename = $key.'-'.time(). '.' .$extension;

                $path = "uploads/products/";

                $file->move($path, $filename);

                $imageData[] = [
                    'product_id' => $product->id,
                    'image' => $path.$filename,
                ];
            }
        }

        ProductImage::insert($imageData);

        return redirect()->back()->with('success',  __('Ảnh sản phẩm được thêm thành công'));
    }

    public function destroy(int $productImageId)
    {
        $productImage = ProductImage::findOrFail($productImageId);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('success',  __('Ảnh sản phẩm được xóa thành công'));
    }
}
