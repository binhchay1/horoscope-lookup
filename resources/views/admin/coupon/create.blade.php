@extends('layouts.master-admin')

@section('title')
{{ __('Thêm mã khuyến mãi') }}
@endsection

<style>
    .hide {
        display: none;
    }

    .show {
        display: block;
    }
</style>

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{ __('Thêm mã khuyến mãi') }}</h6>

                <form method="POST" action="{{route('admin.coupon.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Mã khuyến mãi') }}</label>
                            <input type="text" id="categoryInput" name="code" value="{{ old('code') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã khuyến mãi') }}">
                            @if ($errors->has('code'))
                            <span class="text-danger" style="color: red">{{ $errors->first('code') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Thời gian kết thúc') }}</label>
                            <input type="date" id="categoryInput" name="time_end" value="{{ old('time_end') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã khuyến mãi') }}">
                            @if ($errors->has('time_end'))
                            <span class="text-danger" style="color: red">{{ $errors->first('time_end') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Loại') }}</label>
                            <select id="filter-category" onchange="handleType($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="type">
                                <option value="percent" selected>{{ __('Giảm giá theo %') }}</option>
                                <option value="number">{{ __('Giảm giá trừ thẳng') }}</option>
                            </select>
                        </div>

                        <div class="xl:col-span-6 d-none" id="discount-by-percent">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Tỉ lệ giảm giá') }}</label>
                            <span style="display: flex; align-items: center;">
                                <input type="number" min="1" id="discount_amount" name="discount_amount_percent" onkeyup="onlyNumberAmount(this)" value="{{ old('discount_amount') }}" class="form-input input-element border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" min="1" max="100" placeholder="{{ __('Tỉ lệ giảm giá') }}">
                                <span style="font-weight: bold; margin-left: 15px;">%</span>
                            </span>
                        </div>

                        <div class="xl:col-span-6" id="discount-by-number">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Số tiền giảm giá') }}</label>
                            <span style="display: flex; align-items: center;">
                                <input type="number" min="1" id="discount_amount" name="discount_amount_number" onkeyup="onlyNumberAmount(this)" value="{{ old('discount_amount') }}" class="form-input input-element border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Số tiền giảm giá') }}">
                                <span style="font-weight: bold; margin-left: 15px;">đ</span>
                            </span>
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Số lượng') }}</label>
                            <input type="number" min="1" id="categoryInput" onkeyup="onlyNumberAmount(this)" name="total_amount" value="{{ old('total_amount') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập số lượng') }}">
                            @if ($errors->has('total_amount'))
                            <span class="text-danger" style="color: red">{{ $errors->first('total_amount') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Số lượng mỗi khách hàng được sử dụng') }}</label>
                            <input type="number" min="1" id="categoryInput" onkeyup="onlyNumberAmount(this)" name="use_by_user_amount" value="{{ old('use_by_user_amount') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập số lượng mỗi khách được sử dụng') }}">
                            @if ($errors->has('use_by_user_amount'))
                            <span class="text-danger" style="color: red">{{ $errors->first('use_by_user_amount') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-6">
                            <div style="display: flex;">
                                <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Không hiển thị công khai') }} <span style="font-style: italic; font-size: 12px">{{ __('( không hiển thị ở ngoài phần mã khuyến mãi trong giỏ hàng)') }}</span></label>
                                <span style="margin-left: 15px; margin-top: 5px;">
                                    <input type="checkbox" id="private_status" onclick="handlePrivateStatus()" class="form-input input-element border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <input type="hidden" name="private_status" id="private_status_hidden" value="false">
                                </span>
                            </div>

                            <div style="display: flex;">
                                <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Áp dụng toàn bọn sản phẩm') }}</label>
                                <span style="margin-left: 15px; margin-top: 5px;">
                                    <input type="checkbox" id="apply_all_product" onclick="handleApplyProduct()" class="form-input input-element border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <input type="hidden" name="apply_all_product" id="apply_all_product_hidden" value="false">
                                </span>
                            </div>

                            <div id="list_product_id">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Sản phẩm') }}</label>
                                <select require name="list_product_id[]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                    @foreach($listProducts as $product)
                                    <option value="{{ $product->code }}">{{ $product->code }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('list_product_id'))
                                <span class="text-danger">{{ $errors->first('list_product_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button onclick="handleReset()" type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Thêm mã khuyến mãi')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        if ($('#discount_amount').val() != null || $('#discount_amount').val() != '') {
            let input = document.getElementById('discount_amount');
            let v = input.value.replace(/\D+/g, '');
            input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
        }

        $('#discount-by-percent').show();
        $('#discount-by-number').hide();
    })

    function onlyNumberAmount(input) {
        let v = input.value.replace(/\D+/g, '');
        input.value = v.replace(/(^\d{1,3}|\d{3})(?=(?:\d{3})+(?:,|$))/g, '$1.');
    }

    function handleType(select) {
        let choice = select.val();

        if (choice == 'percent') {
            $('#discount-by-percent').show();
            $('#discount-by-number').hide();
        } else {
            $('#discount-by-number').show();
            $('#discount-by-percent').hide();
        }
    }

    function handleApplyProduct() {
        let status = 'true';

        if (!$('#apply_all_product').is(":checked")) {
            status = 'false';
        };

        $('#apply_all_product_hidden').val(status);

        if (status == 'true') {
            $('#list_product_id').hide();
        } else {
            $('#list_product_id').show();
        }
    }

    function handleReset() {
        $('#list_product_id').show();
    }

    function handlePrivateStatus() {
        let status = 'true';

        if (!$('#private_status_product').is(":checked")) {
            status = 'false';
        };

        $('#private_status_hidden').val(status);
    }
</script>
