@extends('layouts.page')

@section('title')
<title>{{ __('Xây dựng cấu hình') }} | Kattech PC</title>
@endsection

@section('description', __('Xây dựng cấu hình với Kattech PC'))
@section('keywords', 'build pc, build, kattechpc, kattech')
@section('breadcrumb', __('Xây dựng cấu hình'))

@section('css')
<link rel="stylesheet" href="{{ asset('/css/page/build-pc.css') }}" />
@endsection

@section('content')
<div class="build-pc-area">
    @if(isset($layout->build_pc_thumbnail))
    <div class="banner-deal-page">
        <a class="item-banner">
            <img class="image-flash-sale" src="{{ asset($layout->build_pc_thumbnail) }}" alt="banner-deal" width="100%">
        </a>
    </div>
    @endif

    <div class="build-pc_content">
        <h1 style="font-size: 30px;line-height:36px;margin-bottom: 10px;text-align: center;font-weight:500;">{{ __('Build PC - Xây dựng cấu hình máy tính PC giá rẻ chuẩn nhất') }}</h1>
        <h2 style="font-size: 26px;line-height:30px;margin-bottom: 10px;font-weight:500; ">{{ __('Chọn linh kiện xây dựng cấu hình - Tự build PC') }} </h2>

        <ul class="list-btn-action">
            <li id="build-pc-set-item-1" class="active"><span onclick="changeBuild(1);" style="padding:0 20px;">{{ __('Cấu hình') }} 1</span></li>
            <li id="build-pc-set-item-2"><span onclick="changeBuild(2);" style="padding:0 20px;">{{ __('Cấu hình') }} 2</span></li>
        </ul>

        <ul class="list-btn-action">
            <li class="reset-build-pc" style="width:auto;"><span onclick="resetBuildPC()" style="padding:0 20px;">{{ __('Làm mới') }} <i class="fa fa-undo"></i></span></li>
        </ul>

        <div id="build-pc-content-area-1">
            <div id="build-pc-content-price-1">
                <p class="total-price">{{ __('Chi phí dự tính:') }} <span class="total-price-in-hud-1">{{ $dataListMenu['listArea1']['price-format'] }}</span>
                    <span class="total-price-config-1"></span>
                </p>
                <div class="js-buildpc-promotion-content" style="margin-bottom: 0px;"></div>
            </div>
            <div class="list-drive" id="build-pc-content-list-1" style="border: solid 1px #e1e1e1;">
                @foreach($dataListMenu['listArea1']['menu'] as $key1 => $value)
                @if($dataListMenu['listArea1']['data'][$key1] == null)
                <div class="item-drive d-flex">
                    <div class="name-item-drive">
                        <h3 class="d-name d-name-277">{{ $key1 + 1 }}. {{ $value->name }}</h3>
                        @if(isset($value->offers))
                        <div class="d-flex">
                            <i class="fa fa-gift"></i>
                            <h5 class="offers-build-pc">{{ $value->offers }}</h5>
                        </div>
                        @endif
                    </div>
                    <div class="drive-checked" style="margin-left:0;">
                        <span class="show-popup_select span-last open-selection" id="category-js-{{ $value->id }}-1"><i class="fa fa-plus"></i> Chọn {{ $value->name }}</span>
                        <div id="category-js-selected-{{ $value->id }}-1" class="js-item-row category-selected-row"></div>
                    </div>
                </div>
                @else
                <div class="item-drive d-flex">
                    <div class="name-item-drive">
                        <h3 class="d-name d-name-277">{{ $key1 + 1 }}. {{ $value->name }}</h3>
                        @if(isset($value->offers))
                        <div class="d-flex">
                            <i class="fa fa-gift"></i>
                            <h5 class="offers-build-pc">{{ $value->offers }}</h5>
                        </div>
                        @endif
                    </div>
                    <div class="drive-checked" style="margin-left:0;">
                        <span class="show-popup_select span-last open-selection" id="category-js-{{ $value->id }}-1" style="display: none"><i class="fa fa-plus"></i> Chọn {{ $value->name }}</span>
                        <div id="category-js-selected-{{ $value->id }}-1" class="js-item-row category-selected-row">
                            @php
                            $productSession1 = $dataListMenu['listArea1']['data'][$key1];
                            if($productSession1->new_price != null) {
                            $price1 = $productSession1->new_price;
                            } else {
                            $price1 = $productSession1->price;
                            }

                            if ($productSession1->status == 'available') {
                            $textStatus1 = 'Còn hàng';
                            } else if ($productSession1->status == 'out of stock') {
                            $textStatus1 = 'Hết hàng';
                            } else {
                            $textStatus1 = 'Đang về hàng';
                            }

                            $image1 = json_decode($productSession1->image, true);
                            @endphp
                            <div class="contain-item-drive" id="product-item-in-list-1-{{ $productSession1->id }}">
                                <a target="_blank" href="{{ route('productDetail', $productSession1->slug) }}" class="d-img"><img src="{{ $image1[0] }}"></a>
                                <span class="d-name">
                                    <a target="_blank" href="{{ route('productDetail', $productSession1->slug) }}"> {{ $productSession1->name }} </a> <br>
                                    Bảo hành: {{ $productSession1->status_guarantee }} <br>
                                    Kho hàng: <span style="color: red">{{ $textStatus1 }}</span> | Mã SP: <span style="color: red">{{ $productSession1->code }}</span>
                                </span>
                                <div class="price-in-mobile">
                                    <span class="d-price">{{ $price1 }}</span>
                                    <i>x</i> <input class="count-p" type="number" value="1" min="1" max="50" disabled><i>=</i>
                                    <span class="sum_price">{{ $price1 }}</span>
                                    <span class="btn-action_seclect show-popup_select" onclick="changeProductHandle('category-js-{{ $value->id }}-1')"><i class="fa fa-edit edit-item"></i></span>
                                    <span class="btn-action_seclect delete_select" data-id="{{ $productSession1->id }}" data-price="{{ $price1 }}" onclick="deleteProductHandle(this, 'category-js-{{ $value->id }}-1')"><i class="fa fa-trash remove-item"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <p class="total-price">{{ __('Chi phí dự tính:') }} <span class="total-price-in-hud-1">{{ $dataListMenu['listArea1']['price-format'] }}</span></p>
        </div>

        <div id="build-pc-content-area-2" class="d-none">
            <div id="build-pc-content-price-2">
                <p class="total-price">{{ __('Chi phí dự tính:') }} <span class="total-price-in-hud-1">{{ $dataListMenu['listArea2']['price-format'] }}</span>
                    <span class="total-price-config-2"></span>
                </p>
                <div class="js-buildpc-promotion-content" style="margin-bottom: 0px;"></div>
            </div>
            <div class="list-drive" id="build-pc-content-list-2" style="border: solid 1px #e1e1e1;">
                @foreach($dataListMenu['listArea2']['menu'] as $key2 => $value)
                @if($dataListMenu['listArea2']['data'][$key2] == null)
                <div class="item-drive d-flex">
                    <div class="name-item-drive">
                        <h3 class="d-name d-name-277">{{ $key2 + 1 }}. {{ $value->name }}</h3>
                        @if(isset($value->offers))
                        <div class="d-flex">
                            <i class="fa fa-gift"></i>
                            <h5 class="offers-build-pc">{{ $value->offers }}</h5>
                        </div>
                        @endif
                    </div>
                    <div class="drive-checked" style="margin-left:0;">
                        <span class="show-popup_select span-last open-selection" id="category-js-{{ $value->id }}-2"><i class="fa fa-plus"></i> Chọn {{ $value->name }}</span>
                        <div id="category-js-selected-{{ $value->id }}-2" class="js-item-row category-selected-row"></div>
                    </div>
                </div>
                @else
                <div class="item-drive d-flex">
                    <div class="name-item-drive">
                        <h3 class="d-name d-name-277">{{ $key2 + 1 }}. {{ $value->name }}</h3>
                        @if(isset($value->offers))
                        <div class="d-flex">
                            <i class="fa fa-gift"></i>
                            <h5 class="offers-build-pc">{{ $value->offers }}</h5>
                        </div>
                        @endif
                    </div>
                    <div class="drive-checked" style="margin-left:0;">
                        <span class="show-popup_select span-last open-selection" id="category-js-{{ $value->id }}-1" style="display: none"><i class="fa fa-plus"></i> Chọn {{ $value->name }}</span>
                        <div id="category-js-selected-{{ $value->id }}-2" class="js-item-row category-selected-row">
                            @php
                            $productSession2 = $dataListMenu['listArea2']['data'][$key2];
                            if($productSession2->new_price != null) {
                            $price2 = $productSession2->new_price;
                            } else {
                            $price2 = $productSession2->price;
                            }

                            if ($productSession2->status == 'available') {
                            $textStatus2 = 'Còn hàng';
                            } else if ($productSession2->status == 'out of stock') {
                            $textStatus2 = 'Hết hàng';
                            } else {
                            $textStatus2 = 'Đang về hàng';
                            }

                            $image2 = json_decode($productSession2->image, true);
                            @endphp
                            <div class="contain-item-drive" id="product-item-in-list-2-{{ $productSession2->id }}">
                                <a target="_blank" href="{{ route('productDetail', $productSession2->slug) }}" class="d-img"><img src="{{ $image2[0] }}"></a>
                                <span class="d-name">
                                    <a target="_blank" href="{{ route('productDetail', $productSession2->slug) }}"> {{ $productSession2->name }} </a> <br>
                                    Bảo hành: {{ $productSession2->status_guarantee }} <br>
                                    Kho hàng: <span style="color: red">{{ $textStatus2 }}</span> | Mã SP: <span style="color: red">{{ $productSession2->code }}</span>
                                </span>
                                <div class="price-in-mobile">
                                    <span class="d-price">{{ $price1 }}</span>
                                    <i>x</i> <input class="count-p" type="number" value="1" min="1" max="50" disabled><i>=</i>
                                    <span class="sum_price">{{ $price1 }}</span>
                                    <span class="btn-action_seclect show-popup_select" onclick="changeProductHandle('category-js-{{ $value->id }}-2')"><i class="fa fa-edit edit-item"></i></span>
                                    <span class="btn-action_seclect delete_select" data-id="{{ $productSession2->id }}" data-price="{{ $price2 }}" onclick="deleteProductHandle(this, 'category-js-{{ $value->id }}-2')"><i class="fa fa-trash remove-item"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <p class="total-price">{{ __('Chi phí dự tính:') }} <span class="total-price-in-hud-1">{{ $dataListMenu['listArea2']['price-format'] }}</span></p>
        </div>

        <ul class="list-btn-action" id="js-buildpc-action">
            <li onclick="addToCart()"><span>{{ __('THANH TOÁN') }}<i class="fa fa-shopping-cart"></i></span></li>
            <li onclick="printPage()"><span>{{ __('XEM VÀ IN') }}<i class="fa fa-print"></i></span></li>
            <li onclick="exportExcel()"><span>{{ __('TẢI FILE EXCEL') }}<i class="fa fa-file"></i></span></li>
            <li onclick="exportImage()"><span>{{ __('TẢI ẢNH') }}<i class="fa fa-image"></i></span></li>
        </ul>

        @if($hasYoutubeLink)
        <div>
            <h3 style="text-align: center;">{{ __('Video hướng dẫn xây dựng cấu hình') }}</h3>

            <div class="link-youtube-area">
                @foreach($arrLinkYoutube as $link)
                <iframe width="560" height="315" class="link-youtube-item" src="{{ $link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
                @endforeach
            </div>
        </div>
        @endif

        @if(count($theme) > 0)
        @if(isset($theme[0]->content))
        <div class="build-pc-content-tutorial">
            <h3 style="text-align: center;">{{ __('Hướng dẫn xây dựng cấu hình máy tính PC dễ dàng nhất') }}</h3>
            <div class="p-info1">
                {!! Str::limit($theme[0]->content, 1000, '')!!}
                @if (strlen($theme[0]->content) > 10)
                <span id="dots-content">...</span>
                @endif
            </div>

            <div class="p-info1">
                <span id="more-content" style="display: none;">{!! $theme[0]->content !!}</span>
            </div>

            <a href="javascript:" onclick="loadMore()" id="read-all-product" class="btn-article-col js-viewmore-content font-weight-500 gap-8 d-flex align-items-center justify-content-center">
                {{ __('Xem tất cả') }}
                <i class="fas fa-angle-down" style="margin-left: 5px;"></i>
            </a>

            <a href="javascript:" onclick="loadMore()" id="hide-all-product" class="btn-article-col js-viewmore-content font-weight-500 gap-8 d-flex align-items-center justify-content-center d-none">
                {{ __('Thu gọn') }}
                <i class="fas fa-angle-up" style="margin-left: 5px;"></i>
            </a>
        </div>
        @endif
        @endif
    </div>
</div>

<div id="area-export-image"></div>

@include('includes.modal-build-pc')
@include('includes.tooltips-buildpc')
@include('includes.modal-no-item-print')
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    var currentPrice1 = parseInt(<?php echo $dataListMenu['listArea1']['price'] ?>);
    var currentPrice2 = parseInt(<?php echo $dataListMenu['listArea2']['price'] ?>);
    var countMenuBuildPC = parseInt(<?php echo $countMenuBuildPC ?>);
    var dataListMenu = {
        'listArea1': JSON.parse(`<?php echo json_encode($dataProductBuild['listArea1']) ?>`),
        'listArea2': JSON.parse(`<?php echo json_encode($dataProductBuild['listArea2']) ?>`)
    };

    console.log(dataListMenu);
</script>
<script src="{{ asset('/js/page/buildpc.js') }}"></script>
@endsection
