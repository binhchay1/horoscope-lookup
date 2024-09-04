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
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php if($orderDetail->payment)
                        {
                            $data = $orderDetail->payment;
                            $data = "thanh toán trực tuyến";
                        }
                        else {
                            $data = "";
                        }

                        ?>
                        {{ csrf_field() }}
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">

                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Mã đơn hàng') }}</label>
                                <input type="text" id="productNameInput" name="name" value="{{  $orderDetail->order_code }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tên sản phẩm') }}">
                            </div>

                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tên khách hàng') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{  $orderDetail->name}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">

                            </div>
                            <div class="xl:col-span-4">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Ngày đặt hàng') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{ date("d/m/Y", strtotime($orderDetail->order_date)) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            </div>


                            <div class="xl:col-span-4">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Phương thức thanh toán') }}</label>
                                <input type="text" id="productCodeInput" name="code" value="{{  $data }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã sản phẩm') }}">

                            </div>

                            <?php $totalOrder =  number_format($orderDetail->total_money, 0, ',', '.')  ?>
                            <div class="xl:col-span-4">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Tổng giá trị') }}</label>
                                <input type="text" id="productCodeInput" name="code" value="{{  $totalOrder }}đ" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Mã sản phẩm') }}">

                            </div>
                            <div class="xl:col-span-3">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Tỉnh/Thành phố') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{  $orderDetail->province ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            </div>
                            <div class="xl:col-span-3">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Quận/Huyện') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{  $orderDetail->district ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            </div>
                            <div class="xl:col-span-3">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Phường/Xã') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{  $orderDetail->ward ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            </div>

                            <div class="xl:col-span-3">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Địa chỉ') }}</label>
                                <input type="text" id="productNameInput" name="title" value="{{  $orderDetail->address ?? "" }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Tiêu đề') }}">
                            </div>

                            <div class="xl:col-span-12 ">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium"> {{ __('Ghi chú') }}</label>
                                <textarea type="text" id="productCodeInput" name="code" value="{{  $orderDetail->notes }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" ></textarea>
                            </div>

                            <div class="xl:col-span-4">
                                <label for="productStatus" class="inline-block mb-2 text-base font-medium">{{ __('Trạng thái: ') }}</label>
                                @if($orderDetail->status == 1)
                                    <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent"><i data-lucide="check" class="size-3 ltr:mr-1 rtl:ml-1"></i>
                                {{ __('Xác nhận') }}
                                </span>
                                @elseif( $orderDetail->status == 0)
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-yellow-100 border-yellow-200 text-yellow-500 dark:bg-yellow-500/20 dark:border-yellow-500/20">
                                             {{ __('Chưa xác nhận') }}</span>
                                    </span>
                                @endif
                            </div>
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
