<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function model()
    {
        return Product::class;
    }

    public function index()
    {
        return $this->model->with('category', 'productImages', 'brands')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function getProductBySearch($search)
    {
        return $this->model->where('name', 'like', '%' . $search . '%')->paginate(5);
    }

    public function getProductBySearchSuggestion($search)
    {
        return $this->model->select('slug', 'name', 'price', 'image')->where('name', 'like', '%' . $search . '%')->orderBy('id', 'DESC')->get();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function show($id)
    {
        return $this->model->with('productImages')->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function destroy($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function productDetail($slug)
    {
        return $this->model->with('productImages', 'ratings', 'category', 'warrantyPackages')->where('slug', $slug)->first();
    }

    public function getProductRelated($category_id, $product_id)
    {
        return $this->model->where('category_id', $category_id)->where('id', '!=', $product_id)->get();
    }

    public function getProductFlashSaleByCode($arrayCode)
    {
        return $this->model->whereIn('code', $arrayCode)->get();
    }

    public function getListProductHotSale($listCode)
    {
        return $this->model->whereIn('code', $listCode)->get();
    }

    public function listProduct($getProductByKey)
    {
        return $this->model->with('category', 'productImages')->whereHas('category', function (Category $category) use ($getProductByKey) {
            $category->whereIn('name', 'like', $getProductByKey);
        })->orderBy('created_at', 'DESC')->get();
    }

    public function getListProductForBuild($arrID)
    {
        $query = $this->model->with('category', 'productImages', 'brands')->whereIn('category_id', $arrID);

        return $query->get();
    }

    public function getListProductForCart($arrID)
    {
        return $this->model->with('category', 'productImages')->whereIn('id', $arrID)->get();
    }

    public function getProductByArrayID($arrID)
    {
        return $this->model->whereIn('id', $arrID)->get();
    }

    public function getProductForStatic()
    {
        return $this->model->with('orderDetails')->paginate(15);
    }

    public function getListProduct()
    {
        return $this->model->get();
    }

    public function getListProductWithFilter()
    {
        return $this->model->with('category', 'productImages', 'brands')->orderBy('created_at', 'DESC')->get();
    }

    public function getProductByArrayCode($listCode)
    {
        return $this->model->whereIn('code', $listCode)->get();
    }
}
