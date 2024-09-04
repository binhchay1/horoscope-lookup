@extends('layouts.master-admin')

@section('title')
{{ __('Nhập kho hàng') }}
@endsection

@section('content')
<style>
    .select2 {
        width: 100% !important;
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
        border: 1px solid #e2e8f0;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #e2e8f0 !important;
    }

    .text-danger {
        color: red;
    }
</style>
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{ __('Nhập kho hàng') }}</h6>

                <form method="POST" action="{{ route('admin.storage.store-product') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Thể loại') }}</label>
                            <br>
                            <select id="select_page" style="width:200px;" class="operator" name="product_id">
                                <option value="">{{__('Chọn sản phẩm')}}</option>
                                @foreach($listProducts as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product_id'))
                            <span class="text-danger">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">{{ __('Số lượng') }}</label>
                            <input type="text" id="productCodeInput" name="quantity" value="{{ old('quantity') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập số lượng') }}">
                            @if ($errors->has('quantity'))
                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                        <input name="storage_id" value="{{$storage->id}}" type="hidden">

                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __('Xóa toàn bộ') }}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __('Xuất kho hàng') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $("select").select2();
    });
</script>
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endpush
