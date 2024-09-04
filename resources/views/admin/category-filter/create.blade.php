@extends('layouts.master-admin')

@section('title')
{{ __('Thêm bộ lọc danh mục sản phẩm') }}
@endsection

@section('content')
<style>
    .overflow-x-auto {
        border: 2px solid #ccc;
        height: 500px;
        overflow-y: scroll;
    }

    .text-danger {
        color: red;
    }
</style>
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Thêm bộ lọc danh mục sản phẩm')}}</h6>
                <form method="POST" action="{{ route('admin.category-filter.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên') }}</label>
                            <input type="text" id="productNameInput" name="title" value="{{ old('title') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tên')}}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
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
                            <label for="keyword" class="inline-block mb-2 text-base font-medium">{{ __('Từ khóa') }}</label>
                            <textarea class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="keyword" name="keyword" placeholder="{{ __('Từ khóa') }}" rows="5"></textarea>
                            @if ($errors->has('keyword'))
                            <span class="text-danger">{{ $errors->first('keyword') }}</span><br>
                            @endif
                            <small style="font-style: italic;">{{ __('Mỗi từ khóa tương ứng với 1 dòng') }}</small>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Thêm bộ lọc')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
