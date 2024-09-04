@extends('layouts.master-admin')

@section('title')
{{ __('Sửa đánh giá khách hàng') }}
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Sửa đánh giá khách hàng')}}</h6>

                <form method="POST" action="{{route('admin.customer.review.update', $customerReview['id'])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="title" class="inline-block mb-2 text-base font-medium">{{ __('Tên khách hàng') }}</label>
                            <input type="text" id="customer_name" name="customer_name" value="{{ $customerReview->customer_name ?? old('customer_name') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tên khách hàng') }}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="slug" class="inline-block mb-2 text-base font-medium">{{ __('Nội dung đánh giá') }}</label>
                            <input type="text" id="customer_review" name="customer_review" value="{{ $customerReview->customer_review ?? old('customer_review') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nội dung đánh giá') }}">
                            @if ($errors->has('customer_review'))
                            <span class="text-danger">{{ $errors->first('customer_review') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <div class="form-group">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{__('Hình ảnh')}}</label>
                                <div class="">
                                    <div class="" style="display: inline-grid;">
                                        <input value="" type="file" class="border-0 bg-light pl-0" name="thumbnail" id="image" hidden>
                                        <div class=" choose-avatar">
                                            <div id="btnimage">
                                                <img id="showImage" class="show-avatar" src="{{ asset($customerReview->thumbnail ?? '/images/product.png') }}" alt="avatar">
                                            </div>
                                            <div id="button">
                                                <i id="btn_chooseImg" class="fas fa-camera"> {{ __('Chọn hình ảnh') }}</i>
                                            </div>
                                        </div>
                                        @if ($errors->has('thumbnail'))
                                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Sửa đánh giá')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script>
<script src="{{ URL::asset('js/admin/eventImage.js') }}"></script>
@endpush
