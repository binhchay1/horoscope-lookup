@extends('layouts.master-admin')

@section('title')
{{ __('Thêm danh mục sản phẩm') }}
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Thêm danh mục sản phẩm')}}</h6>

                <form method="POST" action="{{route('admin.categoryProduct.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">

                        <div class="xl:col-span-12">
                            <h3 class="inline-block mb-2 text-base font-medium text-title-area">{{ __('Thông tin chính danh mục') }}</h3>
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên danh mục') }}</label>
                            <input type="text" id="categoryInput" name="name" value="{{old('name')}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tên danh mục')}}">
                            @if ($errors->has('name'))
                            <span class="text-danger" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryParentInput" class="inline-block mb-2 text-base font-medium">{{ __('Danh mục cha') }}</label>
                            <select name="parent" id="categoryParentInput" class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                <option value="0" selected>{{ __('Không') }}</option>
                                @foreach($listCategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="xl:col-span-12">
                            <div class="form-group">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{__('Hình ảnh')}}</label>
                                <div class="">
                                    <div class="" style="display: inline-grid;">
                                        <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                                        <div class=" choose-avatar">
                                            <div id="btnimage">
                                                <img id="showImage" class="show-avatar" src="{{ asset('/images/no-image.jpg') }}" alt="avatar" style="width: 50%; height: auto">
                                            </div>
                                            <div id="button">
                                                <i id="btn_chooseImg" class="fas fa-camera"> {{ __('Chọn hình ảnh') }}</i>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                        <span class="text-danger" style="color: red">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="xl:col-span-12">
                            <hr style="width: 100%;">
                        </div>

                        <div class="xl:col-span-12">
                            <h3 class="inline-block mb-2 text-base font-medium text-title-area">{{ __('SEO profile') }}</h3>
                        </div>

                        <div class="xl:col-span-12">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Tiêu đề') }}</label>
                            <input type="text" id="categoryInput" name="title" value="{{ old('title') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('title'))
                            <span class="text-danger" style="color: red">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Mô tả') }}</label>
                            <textarea type="text" id="categoryKeyWord" name="description" value="{{ old('description') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Mô tả')}}"></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger" style="color: red">{{ $errors->first('description') }}</span>
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
                    </div>
                    <input type="hidden" id="categoryInput" name="status" value="0" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tên danh mục')}}">

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Thêm danh mục')}}</button>
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
