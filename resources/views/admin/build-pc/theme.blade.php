@extends('layouts.master-admin')

@section('title')
{{ __('Giao diện xây dựng cấu hình') }}
@endsection

@section('content')

<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card" id="usersTable">
            <div class="card-body">
                <div class="flex items-center">
                    <h6 class="text-15 grow">{{ __('Giao diện xây dựng cấu hình') }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="-mx-5 -mb-5 overflow-x-auto">
                    <form method="POST" action="{{ route('admin.buildPC.theme.update') }}" enctype="multipart/form-data" style="padding: 20px;">
                        {{ csrf_field() }}
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-12">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Video Youtube') }}</label>
                                <div style="display: flex; justify-content: space-between;">
                                    <input type="text" id="link_youtube_1" name="link_youtube_1" value="{{ $arrLinkYoutube['link_youtube_1'] ?? old('link_youtube_1') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn youtube 1') }}">
                                    <input type="text" id="link_youtube_1" name="link_youtube_2" value="{{ $arrLinkYoutube['link_youtube_2'] ?? old('link_youtube_2') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn youtube 2') }}" style="margin-left: 15px;">
                                    <input type="text" id="link_youtube_1" name="link_youtube_3" value="{{ $arrLinkYoutube['link_youtube_3'] ?? old('link_youtube_3') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn youtube 3') }}" style="margin-left: 15px;">
                                </div>
                            </div>

                            <div class="xl:col-span-12">
                                <label for="editor" class="inline-block mb-2 text-base font-medium">{{__('Nội dung hướng dẫn xây dựng cấu hình')}}
                                </label>
                                @if(count($theme) > 0)
                                <textarea class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="editor" name="content" placeholder="{{__('Nội dung xây dựng cấu hình')}}" rows="5">{{ old('description' , $theme[0]->content) }}</textarea>
                                @else
                                <textarea class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="editor" name="content" placeholder="{{__('Nội dung xây dựng cấu hình')}}" rows="5">{{ old('description') }}</textarea>
                                @endif
                                @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __('Xóa toàn bộ') }}</button>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Sửa giao diện')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);

    ClassicEditor
        .create(document.querySelector('#editor'), {
            height: 500,
            ckfinder: {
                uploadUrl: '<?php route('admin.post.uploadMedia') . '?_token=' . csrf_token() ?>',
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
