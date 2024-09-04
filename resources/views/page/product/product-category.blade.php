@extends('layouts.page')

@section('title')
<title>{{ $dataCategory->title }} | Kattech PC</title>
@endsection

@section('description', $dataCategory->description)
@section('keywords', $dataCategory->key_word)
@section('breadcrumb', $dataCategory->name)

@section('css')
<link rel="stylesheet" href="{{ asset('/css/page/product-cate.css') }}" />
@endsection

@section('content')
<div class="container" id="product-category-area">
    <section class="top-sale">
        <div class="flash-sale-area">
            <div class="d-flex align-items-center justify-content-between">
                <div class="flash-sale-title-area d-flex align-items-center justify-content-center">
                    <h1 class="flash-sale-title">{{ __('Sản phẩm bán chạy') }}</h1>
                </div>
            </div>

            <div class="swiper d-flex">
                <div class="swiper-wrapper">
                    @if(isset($dataProducts->products))
                    @foreach($dataProducts->products as $product)
                    <div class="swiper-slide1" role="group">
                        <div class="product-item">
                            <a href="{{ route('productDetail', $product->slug) }}" class="product-image position-relative">
                                @if(isset($product->image))
                                <img src="{{ asset(json_decode($product->image, true)[0]) }}" width="210" height="164" class="lazy product-image hover-image hover-for-tooltips" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                                @endif
                            </a>
                            <div class="product-info">
                                <a href="{{ route('productDetail', $product->slug) }}">
                                    <h3 class="product-title line-clamp-3">{{ $product->name }} </h3>
                                </a>
                                @if($product->new_price != null)
                                <div class="product-martket-main d-flex align-items-center">
                                    <p class="product-market-price">{{ $product->price }} ₫</p>
                                    <?php $new_price = floor(100 - (((int) $product->new_price / (int) $product->price) * 100)) ?>
                                    <div class="product-percent-price">-{{ $new_price }}%</div>
                                </div>

                                <div class="product-price-main font-weight-600">
                                    {{ $product->new_price }} đ
                                </div>
                                @else
                                <div class="product-price-main font-weight-600">
                                    {{ $product->price }} đ
                                </div>
                                @endif

                                <div class="product-description">
                                    {{ Str::limit($product->short_description, 100) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    @if(isset($dataProducts->productChildren))
                    @foreach($dataProducts->productChildren as $product)
                    <div class="swiper-slide1" role="group">
                        <div class="product-item">
                            <a href="" class="product-image position-relative">
                                @if(isset($product->image))
                                <img src="{{ asset(json_decode($product->image, true)[0]) }}" width="210" height="164" class="hover-for-tooltips lazy product-image hover-image" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                                @endif
                            </a>
                            <div class="product-info">
                                <a>
                                    <h3 class="product-title line-clamp-3">{{ $product->name }} </h3>
                                </a>
                                @if($product->new_price != null)
                                <div class="product-martket-main d-flex align-items-center">
                                    <p class="product-market-price">{{ $product->price }} ₫</p>
                                    <?php $new_price = floor(100 - (((int) $product->new_price / (int) $product->price) * 100)) ?>
                                    <div class="product-percent-price">-{{ $new_price }}%</div>
                                </div>

                                <div class="product-price-main font-weight-600">
                                    {{ $product->new_price }} đ
                                </div>
                                @else
                                <div class="product-price-main font-weight-600">
                                    {{ $product->price }} đ
                                </div>
                                @endif

                                <div class="product-description">
                                    {{ Str::limit($product->short_description, 100) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="filter-box-group">
            <div class="brand-filter-list">
                @foreach($dataBrand as $brand)
                <a class="brand-image button-filter" onclick="sortByBrand($(this))" data-id="{{ $brand['id'] }}">
                    <img alt="{{ $brand['name'] }}" width="70" height="35" hi class="lazy" src="{{ asset($brand['image']) }}">
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <h1>Chọn theo nhu cầu</h1>
    <div class="row">
        <div class="flex" id="select-price">
            <div class="area-title-filter">
                <h2>{{ __('Lọc theo giá:') }}</h2>
                <a class="dropbtn" onclick="dropMenuHandle('drop-menu-price')">
                    <svg class="drop-menu-price-drop-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M207 381.5L12.7 187.1c-9.4-9.4-9.4-24.6 0-33.9l22.7-22.7c9.4-9.4 24.5-9.4 33.9 0L224 284.5l154.7-154c9.4-9.3 24.5-9.3 33.9 0l22.7 22.7c9.4 9.4 9.4 24.6 0 33.9L241 381.5c-9.4 9.4-24.6 9.4-33.9 0z" />
                    </svg>

                    <svg class="drop-menu-price-drop-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M241 130.5l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9l-22.7 22.7c-9.4 9.4-24.5 9.4-33.9 0L224 227.5 69.3 381.5c-9.4 9.3-24.5 9.3-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.6 0-33.9L207 130.5c9.4-9.4 24.6-9.4 33.9 0z" />
                    </svg>
                </a>
            </div>

            <div class="d-flex sort-price-area area-process-in-mobile d-none-in-mobile" id="drop-menu-price">
                <div data-id="duoi-10trieu" data-type="price" class="section">
                    <button>{{ __('Dưới 10 triệu') }}</button>
                </div>
                <div data-id="tu-10trieu-15trieu" data-type="price" class="section">
                    <button>{{ __('10 triệu - 15 triệu') }}</button>
                </div>
                <div data-id="tu-15trieu-20trieu" data-type="price" class="section">
                    <button>{{ __('15 triệu - 20 triệu') }}</button>
                </div>
                <div data-id="tu-20trieu-30trieu" data-type="price" class="section">
                    <button>{{ __('20 triệu - 30 triệu') }}</button>
                </div>
                <div data-id="tu-30trieu-50trieu" data-type="price" class="section">
                    <button>{{ __('30 triệu - 50 triệu') }}</button>
                </div>
                <div data-id="tu-50trieu-100trieu" data-type="price" class="section">
                    <button>{{ __('50 triệu - 100 triệu') }}</button>
                </div>
                <div data-id="tren-100trieu" data-type="price" class="section">
                    <button>{{ __('Trên 100 triệu') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row1 mt-1">
        <div class="flex sort">
            <div class="area-title-filter">
                <h2>{{ __('Lọc theo tiêu chí:') }}</h2>
                <a class="dropbtn" onclick="dropMenuHandle('sort')">
                    <svg class="sort-drop-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M207 381.5L12.7 187.1c-9.4-9.4-9.4-24.6 0-33.9l22.7-22.7c9.4-9.4 24.5-9.4 33.9 0L224 284.5l154.7-154c9.4-9.3 24.5-9.3 33.9 0l22.7 22.7c9.4 9.4 9.4 24.6 0 33.9L241 381.5c-9.4 9.4-24.6 9.4-33.9 0z" />
                    </svg>

                    <svg class="sort-drop-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M241 130.5l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9l-22.7 22.7c-9.4 9.4-24.5 9.4-33.9 0L224 227.5 69.3 381.5c-9.4 9.3-24.5 9.3-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.6 0-33.9L207 130.5c9.4-9.4 24.6-9.4 33.9 0z" />
                    </svg>
                </a>
            </div>

            <div class="flex sort area-process-in-mobile d-none-in-mobile" id="sort">
                @if(isset($dataCategory->children))
                <div class="d-flex flex-direction-column">
                    <label class="font-bold">{{ __('Danh mục') }}</label>
                    <select class="mt-1" id="category-in-product-category" onchange="sortByCategoryChild($(this))">
                        <option value="all">{{ __('Tất cả') }}</option>
                        @foreach($dataCategory->children as $children)
                        <option value="{{ $children->id }}">{{ $children->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                @if(isset($listKeyWord))
                @foreach($listKeyWord as $item)
                <div class="d-flex flex-direction-column">
                    <label class="font-bold">{{ $item->title }}</label>
                    <select class="mt-1 select-keyword" id="select-keyword-{{ $item->id }}" data-slug="{{ $item->slug }}" onchange="sortByKeyWord($(this))">
                        <option value="all">{{ __('Tất cả') }}</option>

                        @php
                        $item->keyword = explode(PHP_EOL, $item->keyword);
                        @endphp

                        @foreach($item->keyword as $keyword)
                        <option value="{{ trim($keyword) }}">{{ trim($keyword) }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="row2">
        <div class="area-title-filter">
            <h2>{{ __('Sắp xếp theo:') }}</h2>
            <a class="dropbtn" onclick="dropMenuHandle('select-sort')">
                <svg class="select-sort-drop-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M207 381.5L12.7 187.1c-9.4-9.4-9.4-24.6 0-33.9l22.7-22.7c9.4-9.4 24.5-9.4 33.9 0L224 284.5l154.7-154c9.4-9.3 24.5-9.3 33.9 0l22.7 22.7c9.4 9.4 9.4 24.6 0 33.9L241 381.5c-9.4 9.4-24.6 9.4-33.9 0z" />
                </svg>

                <svg class="select-sort-drop-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M241 130.5l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9l-22.7 22.7c-9.4 9.4-24.5 9.4-33.9 0L224 227.5 69.3 381.5c-9.4 9.3-24.5 9.3-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.6 0-33.9L207 130.5c9.4-9.4 24.6-9.4 33.9 0z" />
                </svg>
            </a>
        </div>

        <div class="flex area-process-in-mobile d-none-in-mobile" id="select-sort">
            <div data-id="new" data-type="sort" class="select button-filter" style="border: none;">
                <button>{{ __('Hàng mới về') }}</button>
            </div>
            <div data-id="price-asc" data-type="sort" class="select button-filter" style="border: none;">
                <button>{{ __('Giá tăng dần') }}</button>
            </div>
            <div data-id="price-desc" data-type="sort" class="select button-filter" style="border: none;">
                <button>{{ __('Giá giảm dần') }}</button>
            </div>
            <div data-id="name-asc" data-type="sort" class="select button-filter" style="border: none;">
                <button>{{ __('Tên từ A -> Z') }}</button>
            </div>
            <div data-id="name-desc" data-type="sort" class="select button-filter" style="border: none;">
                <button>{{ __('Tên từ Z -> A') }}</button>
            </div>
        </div>
    </div>

    <div class="list-product-category list-product-flex d-flex flex-wrap gap-12">
        @foreach($dataCategories as $product)
        <div class="product-item">
            <a href="{{ route('productDetail', $product['slug']) }}" class="product-image">
                <img width="200" height="150" alt="{{ $product->name }}" class="lazy hover-for-tooltips hover-image" src="{{ asset(json_decode($product->image, true)[0]) }}" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                <span class="p-type-holder">
                    @if($product->hot_status)
                    <i class="p-icon-type p-icon-hot"></i>
                    @endif
                </span>
                <span class="p-type-holder p-type-holder-2">
                    @if($product->hot_sale_status)
                    <i class="p-icon-type p-icon-best-sale"></i>
                    @endif
                </span>
            </a>

            <div class="product-info flex-1">
                <a href="{{ route('productDetail', $product['slug']) }}">
                    <h3 class="product-title line-clamp-3">{{ $product->name }}</h3>
                </a>
                @if($product->new_price != null)
                <div class="product-martket-main d-flex align-items-center">
                    <p class="product-market-price">{{ $product->price }} đ</p>
                    <?php $new_price = floor(100 - (((int) $product->new_price / (int) $product->price) * 100)) ?>
                    <div class="product-percent-price">
                        -{{ ($new_price) }} %
                    </div>
                </div>

                <div class="product-price-main font-weight-600">
                    {{ $product->new_price }} đ
                </div>
                @else
                <div class="product-price-main font-weight-600">
                    {{ $product->price }} đ
                </div>
                @endif

                <div class="product-description">
                    {{ Str::limit($product->short_description, 50) }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="center">
        <div class="pagination">
            {{ $dataCategories->links('page.paginate.default') }}
        </div>
    </div>
</div>
@include('includes.tooltips')
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/js/page/product-category.js') }}"></script>
@endsection
