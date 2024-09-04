@extends('layouts.master-admin')

@section('title')
{{ __('Sửa trang đích') }}
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Sửa trang đích')}}</h6>

                <form method="POST" action="{{route('admin.landing.page.update', $landingPage['id'])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="title" class="inline-block mb-2 text-base font-medium">{{ __('Tiêu đề') }}</label>
                            <input type="text" id="title" name="title" value="{{ $landingPage->title ?? old('title') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="slug" class="inline-block mb-2 text-base font-medium">{{ __('Liên kết') }}</label>
                            <input type="text" id="slug" name="slug" value="{{ $landingPage->slug ?? old('slug') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Liên kết') }}" disabled>
                            @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="content" class="inline-block mb-2 text-base font-medium">{{ __('Nội dung') }}
                            </label>
                            <div class="ckeditor-classic text-slate-800">
                                {{ $landingPage->content ?? old('content') }}
                            </div>

                            @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Thêm kho hàng')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
