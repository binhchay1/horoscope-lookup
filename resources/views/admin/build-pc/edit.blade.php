@extends('layouts.master-admin')

@section('title')
{{ __('Thêm cấu hình') }}
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
                <h6 class="mb-4 text-15">{{__('Thêm cấu hình')}}</h6>
                <form method="POST" action="{{ route('admin.buildPC.update', $buildPc['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên') }}</label>
                            <input type="text" id="productNameInput" name="name" value="{{ $buildPc->name }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Cấu hình')}}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Khuyến mãi') }}</label>
                            <input type="text" id="productNameInput" name="offers" value="{{ $buildPc->offers ?? "Chưa có khuyến mãi" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Khuyến mãi')}}">
                            @if ($errors->has('offers'))
                            <span class="text-danger">{{ $errors->first('offers') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <div class="card-body">
                                <div class="-mx-5 -mb-5 overflow-x-auto">
                                    <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                                        <thead class="text-left">
                                            <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="user-id">
                                                    {{ __('Loại sản phẩm') }}
                                                </th>
                                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="location">{{ __('Chọn') }}
                                                </th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach($listCategories as $category)
                                            @if($category->parent != 0)
                                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                    <div class="flex items-center gap-2">
                                                        <div class="grow">
                                                            <h6 class="mb-1">{{$category->name}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 checkbox-cate">
                                                    <div class="flex items-center gap-2">
                                                        <input type="checkbox" name="category_id[]" value="{{$category->id}}" {{ in_array($category->id, json_decode($buildPc->category_id)) ? 'checked' : '' }} class="checkbox">
                                                    </div>

                                                </td>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Sửa cấu hình')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('js/admin/eventImage.js') }}"></script>
@endpush
