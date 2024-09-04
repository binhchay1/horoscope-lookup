@extends('layouts.master-admin')

@section('title')
{{ __('Chi tiết đơn hàng ') }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/product.css') }}">
@endpush
<style>
    .btn-success {
        background-color: green;
        color: white;
        border-radius: 10px;
        padding: 10px;
    }

    .btn-danger {
        background-color: red;
        color: white;
        border-radius: 10px;
        padding: 10px;
    }
</style>
@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{ __('Chi tiết đơn hàng') }}</h6>
                <form method="POST" action="{{route('admin.order.update', $orderDetail['id'])}}" enctype="multipart/form-data">
                    <?php if ($orderDetail->payment) {
                        $data = $orderDetail->payment;
                        $data = "thanh toán trực tuyến";
                    } else {
                        $data = "";
                    }

                    ?>
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Mã đơn hàng') }}</label>
                            <input type="text" id="productNameInput" name="order_code" value="{{  $orderDetail->order_code }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tên sản phẩm') }}">
                            @if ($errors->has('order_code'))
                            <span class="text-danger">{{ $errors->first('order_code') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên khách hàng') }}</label>
                            <input type="text" id="productNameInput" name="name" value="{{  $orderDetail->name}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Số điện thoại') }}</label>
                            <input type="text" id="productNameInput" name="phone" value="{{  $orderDetail->phone}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Email') }}</label>
                            <input type="text" id="productNameInput" name="email" value="{{  $orderDetail->email}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-4">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Ngày đặt hàng') }}</label>
                            <input type="date" id="productNameInput" name="order_date" value="{{ $orderDetail->order_date }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('order_date'))
                            <span class="text-danger">{{ $errors->first('order_date') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-4">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Phương thức thanh toán') }}</label>
                            <input type="text" id="productCodeInput" name="payment" value="{{  $data }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã sản phẩm') }}">
                            @if ($errors->has('payment'))
                            <span class="text-danger">{{ $errors->first('payment') }}</span>
                            @endif
                        </div>

                        <?php $totalOrder =  number_format($orderDetail->total_money, 0, ',', '.')  ?>
                        <div class="xl:col-span-4">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Tổng giá trị') }}</label>
                            <input type="text" id="productCodeInput" name="total_money" value="{{  $totalOrder }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã sản phẩm') }}">
                            @if ($errors->has('total'))
                            <span class="text-danger">{{ $errors->first('total') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tỉnh/Thành phố') }}</label>
                            <input type="text" id="productNameInput" name="province" value="{{  $orderDetail->province ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('province'))
                            <span class="text-danger">{{ $errors->first('province') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Quận/Huyện') }}</label>
                            <input type="text" id="productNameInput" name="district" value="{{  $orderDetail->district ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('district'))
                            <span class="text-danger">{{ $errors->first('district') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Phường/Xã') }}</label>
                            <input type="text" id="productNameInput" name="ward" value="{{  $orderDetail->ward ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('ward'))
                            <span class="text-danger">{{ $errors->first('ward') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-3">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Địa chỉ') }}</label>
                            <input type="text" id="productNameInput" name="address" value="{{  $orderDetail->address ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12 ">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Ghi chú') }}</label>
                            <textarea type="text" id="productCodeInput" name="notes" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{  $orderDetail->notes }}</textarea>
                        </div>

                        <div class="xl:col-span-4">
                            <label for="productStatus" class="inline-block mb-2 text-base font-medium">{{ __('Trạng thái đơn hàng: ') }}</label>
                            <select style="width: 50%; " class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500
                            disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                            dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:
                            border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false value="{{ $orderDetail->status }}" id="brandSelect" name="status">
                                @foreach($statusOrder as $type => $value)
                                <option id="type_of_league" value="{{ $type }}" {{$value == $orderDetail->status  ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Xác nhận')}}</button>
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

    const status_product = 'edit';
</script>
<script src="{{ URL::asset('js/admin/product.js') }}"></script>
@endpush
