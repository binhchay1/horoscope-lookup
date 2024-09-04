@extends('layouts.master-admin')

@section('title')
{{ __('Sửa gói bảo hành') }}
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Sửa gói bảo hành')}}</h6>

                <form method="POST" action="{{ route('admin.warranty.package.edit', $warrantyPackage->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tiêu đề') }}</label>
                            <input type="text" id="productNameInput" name="title" value="{{old('title', $warrantyPackage->title)}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tiêu đề')}}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Gía') }}</label>
                            <input type="text" onkeyup="onlyNumberAmount(this)" id="warrantyPrice" name="price" value="{{ old('price', $warrantyPackage->price) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Gía')}}">
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Thiết bị') }}</label>
                            <input type="text" id="productNameInput" name="device" value="{{ old('device', $warrantyPackage->device) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Thiết bị')}}">
                            @if ($errors->has('device'))
                            <span class="text-danger">{{ $errors->first('device') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Loại') }}</label>
                            <input type="text" id="productNameInput" name="type" value="{{ old('type', $warrantyPackage->type) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Loại')}}">
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Thời gian áp dụng') }}</label>
                            <input type="text" id="productNameInput" name="time_on" value="{{ old('time_on', $warrantyPackage->time_on) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Thời gian bảo hành')}}">
                            @if ($errors->has('time_on'))
                            <span class="text-danger">{{ $errors->first('time_on') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Mô tả') }}</label>
                            <textarea type="text" id="productNameInput" name="description" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Mô tả')}}">{{ old('description', $warrantyPackage->description) }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Sửa gói bảo hành')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('js/admin/eventImage.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
<script>
    if ($('#warrantyPrice').val() != null || $('#warrantyPrice').val() != '') {
        let input = document.getElementById('warrantyPrice');
        let v = input.value.replace(/\D+/g, '');
        input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }

    function onlyNumberAmount(input) {
        let v = input.value.replace(/\D+/g, '');
        input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }
</script>
@endpush
