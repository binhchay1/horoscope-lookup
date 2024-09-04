@extends('layouts.page')

@section('title')
<title>{{ __('Sản phẩm bán chạy') }} | Kattech PC</title>
@endsection

@section('description', __('Cùng khám phá các sản phẩm bán chạy với Kattech PC'))
@section('keywords', 'sale, top sale, top kattechpc, kattech')
@section('breadcrumb', __('Sản phẩm bán chạy'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/flash-sale.css') }}" />
@endsection

@section('content')
<section class="page-deal container page-hompage container">
    <div class="box-product-deal">
        @if(isset($layout->banner_promotion_thumbnail))
        <div class="banner-deal-page">
            <a class="item-banner">
                <img class="image-flash-sale" src="{{ asset($layout->banner_promotion_thumbnail) }}" alt="banner-deal">
            </a>
        </div>
        @endif

        <div class="flash-sale-content">
            @if(isset($listTopSale['hot_sale_list_product_id']))
            @foreach($listTopSale['hot_sale_list_product_id'] as $k => $product)
            <div class="column">
                <div class="card">
                    <div class="product-image-sale">
                        <a href="{{route('productDetail', $product['slug']) }}" class="product-image position-relative">
                            <img class="image-sale hover-for-tooltips hover-image lazy" src="{{ asset(json_decode($product->image, true)[0]) }}" alt="{{ $product->name }}" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="{{ route('productDetail', $product['slug']) }}">
                            <h3 class="product-title line-clamp-3">{{ $product->name }} </h3>
                        </a>

                        @if(isset($product->new_price))
                        <div class="product-martket-main d-flex align-items-center">
                            <p class="product-market-price">{{ $product->price }} ₫</p>
                            <?php $new_price = floor(100 - (((int) $product->new_price / (int) str_replace('.', '', $product->price)) * 100)) ?>
                            <div class="product-percent-price">-{{ ($new_price) }} %</div>
                        </div>

                        <div class="product-price-main font-weight-600">
                            {{ $product->new_price }} đ
                        </div>
                        @else
                        <div class="product-martket-main d-flex align-items-center">
                            <p class="product-market-price-non-dat">{{ $product->price }} ₫</p>
                        </div>
                        @endif
                        <a href="{{ route('addCart', $product['slug']) }}" class="buy-now-deal">Mua giá sốc</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@include('includes.tooltips')
@endsection
