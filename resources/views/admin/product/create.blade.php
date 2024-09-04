@extends('layouts.master-admin')

@section('title')
{{ __('Thêm sản phẩm') }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/product.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endpush

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Thêm sản phẩm')}}</h6>
                <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-12">
                            <h3 class="inline-block mb-2 text-base font-medium text-title-area">{{ __('Thông tin chính sản phẩm') }}</h3>
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên sản phẩm') }}</label>
                            <input type="text" id="productNameInput" name="name" value="{{ old('name') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tên sản phẩm') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Mã sản phẩm') }}</label>
                            <input type="text" id="productCodeInput" name="code" value="{{ old('code') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã sản phẩm') }}">
                            @if ($errors->has('code'))
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tiêu đề') }}</label>
                            <input type="text" id="productNameInput" name="title" value="{{ old('title') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="key_word" class="inline-block mb-2 text-base font-medium">{{ __('Từ khóa') }}</label>
                            <textarea class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="key_word" name="key_word" placeholder="{{ __('Từ khóa') }}" rows="5">{{ old('key_word') }}</textarea>
                            @if ($errors->has('key_word'))
                            <span class="text-danger">{{ $errors->first('key_word') }}</span><br>
                            @endif
                            <small style="font-style: italic;">{{ __('Mỗi từ khóa tương ứng với 1 dòng') }}</small>
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productShortDescription" class="inline-block mb-2 text-base font-medium"> {{ __('Mô tả ngắn') }}</label>
                            <input type="text" id="productShortDescription" name="short_description" value="{{ old('short_description') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mô tả ngắn') }}">
                            @if ($errors->has('short_description'))
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Danh mục') }}</label>
                            <select style="width: 50%" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                            disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                            dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:
                            border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false id="categorySelect" name="category_id">
                                @foreach($listCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Thương hiệu') }}</label>
                            <select style="width: 50%" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                            disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                            dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:
                            border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false id="brandSelect" name="brand_id">
                                @foreach($listBrands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productPrice" class="inline-block mb-2 text-base font-medium">{{ __('Giá') }}</label>
                            <input type="text" id="productPrice" name="price" value="{{ old('price') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Giá') }}" onkeyup="onlyNumberAmount(this)">
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productNewPrice" class="inline-block mb-2 text-base font-medium">{{ __('Giá mới') }}</label>
                            <input type="text" id="productNewPrice" name="new_price" value="{{ old('new_price') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Giá mới') }}" onkeyup="onlyNumberAmount(this)">
                            @if ($errors->has('new_price'))
                            <span class="text-danger">{{ $errors->first('new_price') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productStatus" class="inline-block mb-2 text-base font-medium">{{ __('Trạng thái') }}</label>
                            <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false id="productStatus" name="status">
                                @foreach($statusProduct as $status => $value)
                                <option value="{{$value}}">{{ \App\Enums\Product::STATUS_TEXT[$value] }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="statusGuarantee" class="inline-block mb-2 text-base font-medium"> {{ __('Bảo hành') }}</label>
                            <div style="display: flex;">
                                <input type="text" name="status_guarantee_month" value="{{ old('status_guarantee_month') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tháng') }}">
                                <input type="text" name="status_guarantee_year" value="{{ old('status_guarantee_year') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Năm') }}">
                                <input type="text" id="statusGuarantee" name="status_guarantee" value="{{ old('status_guarantee') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Bảo hành') }}">
                            </div>

                            @if ($errors->has('status_guarantee'))
                            <span class="text-danger">{{ $errors->first('status_guarantee') }}</span>
                            @endif
                        </div>

                        <div class="lg:col-span-2 xl:col-span-6">
                            <label for="productDescription" class="inline-block mb-2 text-base font-medium">{{ __('Link Youtube') }}</label>
                            <input type="text" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" name="link_youtube" placeholder="{{ __('Link Youtube') }}" rows="5">
                            @if ($errors->has('link_youtube'))
                            <span class="text-danger">{{ $errors->first('link_youtube') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium ">{{ __('Hình ảnh thay đổi') }}</label>
                            <div class="user-image mb-3 text-center">

                                <ul class="imgPreview" id="imgPreview">
                                </ul>
                                <input id="input-review" type="text" name="image_preview" hidden>
                            </div>
                            <div class="form-group">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Hình ảnh') }}</label>
                                <div>
                                    <div style="display: inline-grid;">
                                        <input type="file" name="image[]" class="custom-file-input" id="images" multiple="multiple">
                                        @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="xl:col-span-12">
                            <hr style="width: 100%;">
                        </div>

                        <div class="xl:col-span-12">
                            <h3 class="inline-block mb-2 text-base font-medium text-title-area">{{ __('Thông tin bổ sung sản phẩm') }}</h3>
                        </div>

                        <div class="xl:col-span-12">
                            <div class="xl:col-span-4" style="display: flex; align-items: center;">
                                <input name="hot_status" id="checkboxDefault1" class="size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox">
                                <label for="productNameInput" class="inline-block ml-2 text-base">{{ __('Hot') }}</label><br>
                                <input name="hot_sale_status" id="checkboxDefault1" class="ml-2 size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox">
                                <label for="productNameInput" class="inline-block ml-2 text-base">{{ __('Bán chạy') }}</label>
                            </div>
                        </div>

                        <div class="lg:col-span-2 xl:col-span-12">
                            <label for="productDescription" class="inline-block mb-2 text-base font-medium">{{ __('Mô tả') }}</label>
                            <textarea id="editor" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" name="description" placeholder="{{ __('Mô tả') }}" rows="5">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="lg:col-span-2 xl:col-span-12">
                            <label for="productSaleDescription" class="inline-block mb-2 text-base font-medium">{{ __('Quà tặng kèm') }}</label>
                            <textarea id="editor-gift" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productSaleDescription" name="sale_detail" placeholder="{{ __('Qùa tặng kèm') }}" rows="5">{{ old('sale_detail') }}</textarea>
                            @if ($errors->has('sale_detail'))
                            <span class="text-danger">{{ $errors->first('sale_detail') }}</span>
                            @endif
                        </div>

                        <div class="lg:col-span-2 xl:col-span-12">
                            <div class="lg:col-span-2 xl:col-span-6">
                                <div class="d-flex">
                                    <label for="productDetail" class="inline-block mb-2 text-base font-medium">{{ __('Thông số sản phẩm') }}</label>
                                    <button id="add-detail" type="button" style="padding: 5px 10px;" class="ml-2 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">+</button>
                                </div>

                                <ul class="space-y-5 rounded-md" id="area-detail"></ul>
                            </div>
                        </div>

                        <div class="lg:col-span-2 xl:col-span-12">
                            <div class="lg:col-span-2 xl:col-span-6">
                                <div class="d-flex">
                                    <label for="productDetailTech" class="inline-block mb-2 text-base font-medium">{{ __('Thông số kĩ thuật') }}</label>
                                    <button id="add-detail-tech" type="button" style="padding: 5px 10px;" class="ml-2 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">+</button>
                                </div>

                                <ul class="space-y-5 rounded-md mt-3" id="area-detail-tech"></ul>
                            </div>
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productStatus" class="inline-block mb-2 text-base font-medium">{{ __('Gói bảo hành') }}</label>
                            <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false id="productStatus" name="warranty_package_id">
                                <option value="none">{{ __('Không có') }}</option>
                                @foreach($warrantyPackageProduct as $warranty)
                                <option value="{{ $warranty->id }}">{{ $warranty->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('warranty_package_id'))
                            <span class="text-danger">{{ $errors->first('warranty_package_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            {{ __('Thêm sản phẩm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            height: 500,
            ckfinder: {
                uploadUrl: '<?php route("admin.post.uploadMedia") . '?_token=' . csrf_token(); ?>',
            }
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editor-gift'), {
            height: 500,
            ckfinder: {
                uploadUrl: '<?php route("admin.post.uploadMedia") . '?_token=' . csrf_token(); ?>',
            }
        })
        .catch(error => {
            console.error(error);
        });

    const status_product = 'create';
</script>
<script src="{{ URL::asset('js/admin/product.js') }}"></script>
@endpush
