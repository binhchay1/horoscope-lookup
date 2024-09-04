<div class="tab-pane hidden" id="hot-sale">
    <form method="POST" action="{{ route('admin.store.hot.sale') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
            <div class="xl:col-span-12 grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                <div class="xl:col-span-6">
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="hot_sale_big_thumbnail" id="image12" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->hot_sale_big_thumbnail))
                                    <img id="showImage12" class="show-avatar" src="{{ asset($layout->hot_sale_big_thumbnail) }}" alt="avatar">
                                    @else
                                    <img id="showImage12" class="show-avatar" src="{{ asset('/images/layout/650x430.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-12">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_hot_sale_big_thumbnail" value="{{ isset($layout->permarklink_hot_sale_big_thumbnail) ? $layout->permarklink_hot_sale_big_thumbnail : old('permarklink_hot_sale_big_thumbnail') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            @if ($errors->has('permarklink_hot_sale_big_thumbnail'))
                            <span class="text-danger">{{ $errors->first('permarklink_hot_sale_big_thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-6 mt-4">
                <div class="d-flex">
                    <label for="productDetail" class="inline-block mb-2 text-base font-medium">{{ __('Danh sách sản phẩm') }}</label>
                    <button id="add-product-hot-sale" type="button" style="padding: 5px 10px;" class="ml-2 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">+</button>
                </div>
                <ul class="space-y-5 rounded-md" id="area-product-hot-sale">
                    @foreach($listHotSale as $productCode)
                    <li class="item-product-hot-sale">
                        <input name="product_id[]" class="form-input" value="{{ $productCode }}" placeholder="{{ __('Nhập mã sản phẩm') }}" />
                        <span class="btn-x">X</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20" style="margin-top: 10px;">{{__('Sửa')}}</button>
    </form>
</div>
