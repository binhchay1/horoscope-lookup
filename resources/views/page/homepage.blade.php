@extends('layouts.page')

@section('title')
<title>{{ __('Trang chủ') }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/owlcarousel/owl.theme.default.min.css') }}" />
@endsection

@section('content')
<h1 style="position: absolute;top: -99999px">Kattech PC - Cửa Hàng Máy Tính PC Đồ Hoạ - Gaming chuyên nghiệp</h1>
<section class="slider-banner">
    <div class="slider-banner-main">
        <div class="news-main">
            <div class="news-main-left">
                <div id="header-carousel" class="owl-carousel slide">
                    <div class="carousel-inner-slide">
                        @foreach($listSlide as $keyOwl => $slide)
                        @if($keyOwl == 0)
                        <div class="carousel-item active">
                            <a href="{{ $slide['url'] }}">
                                <img src="{{ asset($slide['image']) }}" width="920" height="500" alt="Image" class="lazy">
                            </a>
                        </div>
                        @else
                        <div class="carousel-item">
                            <a href="{{ $slide['url'] }}">
                                <img src="{{ asset($slide['image']) }}" width="920" height="500" alt="Image" class="lazy">
                            </a>
                        </div>
                        @endif
                        @endforeach
                        <div class="swiper-button-next swiper-button-next-slide" tabindex="0" role="button" aria-label="Next slide" aria-controls="js-deal-box"></div>
                        <div class="swiper-button-prev swiper-button-prev-slide" tabindex="0" role="button" aria-label="Previous slide" aria-controls="js-deal-box"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
            <div class="news-main-right">
                <div class="news-main-right-1">
                    @if(isset($layout->small_thumbnail_1))
                    @if($layout->hide_small_thumbnail_1 == 0)
                    <a href="{{ isset($layout->permarklink_small_thumbnail_1) ? $layout->permarklink_small_thumbnail_1 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_1) }}" width="500" class="lazy">
                    </a>
                    @endif
                    @endif
                </div>
                <div class="news-main-right-2">
                    @if(isset($layout->small_thumbnail_2))
                    @if($layout->hide_small_thumbnail_2 == 0)
                    <a href="{{ isset($layout->permarklink_small_thumbnail_2) ? $layout->permarklink_small_thumbnail_2 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_2) }}" width="500" class="lazy">
                    </a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="news-main-under">
        <div class="news-main-right-1">
            @if(isset($layout->small_thumbnail_3))
            @if($layout->hide_small_thumbnail_3 == 0)
            <a href="{{ isset($layout->permarklink_small_thumbnail_3) ? $layout->permarklink_small_thumbnail_3 : '#' }}">
                <img src="{{ asset($layout->small_thumbnail_3) }}" width="350" class="lazy">
            </a>
            @endif
            @endif
        </div>
        <div class="news-main-right-2" style="margin-left: 10px;">
            @if(isset($layout->small_thumbnail_4))
            @if($layout->hide_small_thumbnail_4 == 0)
            <a href="{{ isset($layout->permarklink_small_thumbnail_4) ? $layout->permarklink_small_thumbnail_4 : '#' }}">
                <img src="{{ asset($layout->small_thumbnail_4) }}" width="350" class="lazy">
            </a>
            @endif
            @endif
        </div>
        <div class="news-main-right-2" style="margin-left: 10px;">
            @if(isset($layout->small_thumbnail_5))
            @if($layout->hide_small_thumbnail_5 == 0)
            <a href="{{ isset($layout->permarklink_small_thumbnail_5) ? $layout->permarklink_small_thumbnail_5 : '#' }}">
                <img src="{{ asset($layout->small_thumbnail_5) }}" width="350" class="lazy">
            </a>
            @endif
            @endif
        </div>
        <div class="news-main-right-2" style="margin-left: 10px;">
            @if(isset($layout->small_thumbnail_6))
            @if($layout->hide_small_thumbnail_6 == 0)
            <a href="{{ isset($layout->permarklink_small_thumbnail_6) ? $layout->permarklink_small_thumbnail_6 : '#' }}">
                <img src="{{ asset($layout->small_thumbnail_6) }}" width="350" class="lazy">
            </a>
            @endif
            @endif
        </div>
    </div>
</section>

<section class="slider-banner-mobile">
    <div class="slider-banner-main-mobile">
        <div class="owl-carousel slide">
            <div class="carousel-inner-slide-mobile">
                @foreach($listSlide as $keyOwl => $slide)
                @if($keyOwl == 0)
                <div class="carousel-item active">
                    <a href="{{ $slide['url'] }}">
                        <img src="{{ asset($slide['image']) }}" width="100%" height="250" alt="Image" class="lazy">
                    </a>
                </div>
                @else
                <div class="carousel-item">
                    <a href="{{ $slide['url'] }}">
                        <img src="{{ asset($slide['image']) }}" width="100%" height="250" alt="Image" class="lazy">
                    </a>
                </div>
                @endif
                @endforeach
                <div class="swiper-button-next swiper-button-next-slide-mobile" tabindex="0" role="button" aria-label="Next slide" aria-controls="js-deal-box"></div>
                <div class="swiper-button-prev swiper-button-prev-slide-mobile" tabindex="0" role="button" aria-label="Previous slide" aria-controls="js-deal-box"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
    <div class="news-main-under-mobile">
        <div class="owl-carousel slide">
            <div class="carousel-inner-thumb">
                @if(isset($layout->small_thumbnail_1))
                @if($layout->hide_small_thumbnail_1 == 0)
                <div class="news-main-right-1 carousel-item active">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_1) ? $layout->permarklink_small_thumbnail_1 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_1) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
                @if(isset($layout->small_thumbnail_2))
                @if($layout->hide_small_thumbnail_2 == 0)
                <div class="news-main-right-2 carousel-item">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_2) ? $layout->permarklink_small_thumbnail_2 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_2) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
                @if(isset($layout->small_thumbnail_3))
                @if($layout->hide_small_thumbnail_3 == 0)
                <div class="news-main-right-1 carousel-item">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_3) ? $layout->permarklink_small_thumbnail_3 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_3) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
                @if(isset($layout->small_thumbnail_4))
                @if($layout->hide_small_thumbnail_4 == 0)
                <div class="news-main-right-2 carousel-item">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_4) ? $layout->permarklink_small_thumbnail_4 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_4) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
                @if(isset($layout->small_thumbnail_5))
                @if($layout->hide_small_thumbnail_5 == 0)
                <div class="news-main-right-2 carousel-item">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_5) ? $layout->permarklink_small_thumbnail_5 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_5) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
                @if(isset($layout->small_thumbnail_6))
                @if($layout->hide_small_thumbnail_6 == 0)
                <div class="news-main-right-2 carousel-item">
                    <a href="{{ isset($layout->permarklink_small_thumbnail_6) ? $layout->permarklink_small_thumbnail_6 : '#' }}">
                        <img src="{{ asset($layout->small_thumbnail_6) }}" width="100%" height="250" class="lazy">
                    </a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>

@if(isset($getFlashSale->flash_sale_timer))
@if(strtotime($getFlashSale->flash_sale_timer) >= strtotime(date('Y-m-d H:i:s')) and $getFlashSale->flash_sale_list_product_id != null)
<section class="flash-sale-banner">
    <div class="flash-sale-area">
        <div class="d-flex align-items-center justify-content-between custom-mobile-flash-sale">
            <div class="flash-sale-title-area d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="fa fa-bolt"></i>
                    <h2 class="flash-sale-title">{{ __('Flash sale') }}</h2>
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <span class="text-time-deal-home">{{ __('Kết thúc sau') }}</span>
                    <div class="global-time-dea d-flex align-items-center" id="timer-flashsale">

                    </div>
                </div>
            </div>

            <div>
                <a href="{{ route('view.flash.sale') }}" class="view-more-flash-sale">{{ __('Xem thêm khuyến mãi') }} <i class="fa fa-caret-right"></i></a>
            </div>
        </div>

        <div class="swiper box-list-item-deal swiper-box-deal swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="swiper-wrapper d-flex swiper-flash-sale" style="margin-left: 10px;">
                @if(isset($listFlashSale['flash_sale_list_product_id']))
                @foreach($listFlashSale['flash_sale_list_product_id'] as $product)
                <div class="swiper-slide" role="group">
                    <div class="product-item">
                        <a href="{{ route('productDetail', $product['slug']) }}" class="product-image position-relative">
                            <img width="245" height="164" alt="{{ $product->name }}" class="hover-for-tooltips lazy hover-image" src="{{ asset(json_decode($product->image, true)[0]) }}" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                        </a>
                        <div class="product-info">
                            <a href="{{ route('productDetail', $product['slug']) }}">
                                <h3 class="product-title line-clamp-3">{{ $product->name }} </h3>
                            </a>
                            <div class="product-martket-main d-flex align-items-center">
                                <p class="product-market-price">{{ $product->price }} ₫</p>
                                <?php $new_price = floor(100 - (((int) $product->new_price / (int) str_replace('.', '', $product->price)) * 100)) ?>
                                <div class="product-percent-price">-{{ ($new_price) }} %</div>
                            </div>

                            @if(isset($product->new_price))
                            <div class="product-price-main font-weight-600">
                                {{ number_format($product->new_price, 0, ',', '.') }} đ
                            </div>
                            @endif
                            <div class="p-quantity-sale">
                                <i class="sprite sprite-fire-deal"></i>
                                <div class="bg-gradient"></div>
                                <?php $total_line = ($product->stock / $product->sale_quantity) * 100 ?>
                                <p class="js-line-deal-left" style="<?php echo 'width: ' . $total_line . '%' ?>"></p>
                                <span style="font-size: 14px; font-weight: bold;">{{ __('Còn') }} {{ $product->stock }} / {{ $product->sale_quantity }} {{ __('sản phẩm') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="swiper-button-next swiper-button-next-flash-sale" tabindex="0" role="button" aria-label="Next slide" aria-controls="js-deal-box"></div>
            <div class="swiper-button-prev swiper-button-prev-flash-sale" tabindex="0" role="button" aria-label="Previous slide" aria-controls="js-deal-box"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
@endif
@endif

@if(count($listHotSale))
<section class="top-sale">
    <div class="flash-sale-area">
        <div class="d-flex align-items-center justify-content-between hot-sale-mobile">
            <div class="flash-sale-title-area d-flex align-items-center justify-content-center">
                <h2 class="flash-sale-title">{{ __('Sản phẩm bán chạy') }}</h2>
            </div>

            <div>
                <a href="{{ route('view.top.sale') }}" class="view-more-flash-sale" style="color: #f3070f">{{ __('Xem thêm sản phẩm bán chạy') }} <i class="fa fa-caret-right"></i></a>
            </div>
        </div>

        <div class="swiper d-flex">
            <div class="box-banner-collection">
                @if(isset($layout->hot_sale_big_thumbnail))
                <a href="{{ isset($layout->permarklink_hot_sale_big_thumbnail) ? $layout->permarklink_hot_sale_big_thumbnail : '#' }}" class="banner-collection boder-radius-10">
                    <img src="{{ asset($layout->hot_sale_big_thumbnail) }}" width="660" height="430" class="boder-radius-10 lazy">
                </a>
                @endif
            </div>
            <div class="swiper-wrapper swiper-top-sale">
                @foreach($listHotSale as $product)
                <div class="swiper-slide1" role="group">
                    <div class="product-item">
                        <a href="{{ route('productDetail', $product->slug) }}" class="product-image position-relative">
                            @if(isset($product->image))
                            <img src="{{ asset(json_decode($product->image, true)[0]) }}" width="210" height="164" class="hover-for-tooltips lazy hover-image" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                            @endif
                        </a>
                        <div class="product-info">
                            <a href="">
                                <h3 class="product-title line-clamp-3">{{ $product->name }} </h3>
                            </a>
                            <div class="product-martket-main d-flex align-items-center">
                                <p class="product-market-price">{{ $product->price }} ₫</p>
                                <?php $new_price = floor(100 - (((int) $product->new_price / (int) $product->price) * 100)) ?>
                                <div class="product-percent-price">-{{ ($new_price) }} %</div>
                            </div>
                            <div class="product-price-main font-weight-600">
                                {{ $product->new_price }} đ
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-next-top-sale" tabindex="0" role="button" aria-label="Next slide" aria-controls="js-deal-box"></div>
            <div class="swiper-button-prev swiper-button-prev-top-sale" tabindex="0" role="button" aria-label="Previous slide" aria-controls="js-deal-box"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
@endif

<section class="category">
    <div class="d-flex align-items-center justify-content-between">
        <div class="flash-sale-title-area d-flex align-items-center justify-content-center">
            <h2 class="flash-sale-title">{{ __('Danh mục sản phẩm') }}</h2>
        </div>
    </div>
    <div class="flex-container">
        @foreach($listCategoryProduct as $category)
        @if($category->status == 1 && $category->parent == 0)
        <a href="{{ route('showDataCategory', $category->slug) }}" class="d-flex flex-column text-center category-home-page">
            <img src="{{ asset($category->image) }}" class="item-hot lazy" width="70" height="70">
            <span class="policy-title">{{ $category->name }}</span>
        </a>
        @endif
        @endforeach
    </div>
</section>

@foreach($listCategoryProduct as $category)

@if(count($category->products) == 0)
@continue
@endif

@if($category->parent == 0 && $category->status == 1)
<section class="product-slide">
    <div class="product-slide-main boder-radius-10">
        <div class="d-flex align-items-center justify-content-between">
            <div class="title">
                <a href="{{ route('showDataCategory', $category['slug']) }}">
                    <h2 class="title-box font-weight-600">{{ $category->name }}</h2>
                </a>
                <i class="fa fa-truck hide-mobile"></i>
                <p class="hide-mobile">{{ __('Miễn phí giao hàng') }}</p>
            </div>

            <div class="list-category-child d-flex align-items-center justify-content-end flex-1">
                @foreach($category->children as $children)
                <a href="{{ route('showDataCategory', $children['slug']) }}" class="title-category">{{ $children->name }}</a>
                @endforeach
                <a href="{{ route('showDataCategory', $category['slug']) }}" class="title-all-category hover-color-all">{{ __('Xem tất cả') }} <i class="fa fa-caret-right"></i></a>
            </div>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper swiper-product-{{ $category->slug }}">
                @foreach($category->products as $product)
                <div class="swiper-slide" role="group">
                    <div class="product-item">
                        <a href="{{ route('productDetail', $product['slug']) }}" class="product-image position-relative">
                            <img src="{{  asset(json_decode($product->image, true)[0]) }}" width="204" height="164" class="hover-for-tooltips lazy hover-image" data-detail="{{ $product->detail }}" data-title="{{ $product->title }}" data-price="{{ $product->price }}" data-new-price="{{ $product->new_price }}" data-sale-detail="{{ $product->sale_detail }}" data-status-guarantee="{{ $product->status_guarantee }}" data-status="{{ $product->status }}">
                            @if($product->hot_status == 1)
                            <span class="p-type-holder">
                                <i class="p-icon-type p-icon-hot"></i>
                            </span>
                            @endif
                            @if($product->hot_sale_status == 1)
                            <span class="p-type-holder p-type-holder-2">
                                <i class="p-icon-type p-icon-best-sale"></i>
                            </span>
                            @endif
                        </a>
                        <div class="product-info">
                            <a href="{{ route('productDetail', $product['slug']) }}">
                                <h3 class="product-title line-clamp-3">{{ $product->name }}</h3>
                            </a>
                            @if($product->new_price != null)
                            <div class="product-martket-main d-flex align-items-center">
                                <p class="product-market-price">{{ $product->price }} ₫</p>
                                <?php $new_price = floor(100 - (((int) $product->new_price / (int) $product->price) * 100)) ?>
                                <div class="product-percent-price">- {{ $new_price }} %</div>
                            </div>

                            <div class="product-price-main font-weight-600">
                                {{ $product->new_price }} đ
                            </div>
                            @else
                            <div class="product-price-main font-weight-600">
                                {{ $product->price }} đ
                            </div>
                            @endif
                            <div class="product-offer line-clamp-2">
                                <p>{!! Str::limit($product->sale_detail, 100, ' ...') ?? ""!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-next-product-{{ $category->slug }}" tabindex="0" role="button" aria-label="Next slide"></div>
            <div class="swiper-button-prev swiper-button-prev-product-{{ $category->slug }}" tabindex="0" role="button" aria-label="Previous slide"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>
@endif
@endforeach

@if(count($listPromotion) > 0)
<section class="content-sale">
    <div class="box-article-group boder-radius-10">
        <div class="d-flex justify-content-between align-items-center">
            <div class="title-box">
                <h2 class="title-box font-weight-600">{{ __('Khuyến mại') }}</h2>
            </div>
            <a href="{{ route('promotion') }}" class="btn-article-group hover-color-all">{{ __('Xem tất cả') }} <i class="fa fa-caret-right"></i></a>
        </div>
        <div class="list-article-group d-flex align-items-center custom-mobile-promotion">
            @foreach($listPromotion as $promotion)
            <div class="item-article d-flex gap-12">
                <a href="{{ route('promotion.detail', $promotion->slug) }}" class="img-article boder-radius-10 position-relative">
                    <img class="lazy" src="{{ asset($promotion->image) }}" alt="Banner">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(count($listNews) > 0)
<section class="content-news">
    <div class="box-article-group boder-radius-10">
        <div class="d-flex justify-content-between align-items-center">
            <div class="title-box">
                <h2 class="title-box font-weight-600">{{ __('Tin tức công nghệ') }}</h2>
            </div>
            <a href="{{ route('post') }}" class="btn-article-group hover-color-all">{{ __('Xem tất cả') }} <i class="fa fa-caret-right"></i></a>
        </div>
        <div class="list-article-group d-flex" id="list-post-home">
            @foreach($listNews as $news)
            <div class="item-article d-flex gap-12">
                <a href="{{ route('post.detail', $news['slug']) }}" class="img-article boder-radius-10 position-relative">
                    <img class="boder-radius-10" src="{{ asset($news->thumbnail) ?? asset('/images/test_post/2904-viettel-dau-gia-thanh-cong-bang-tan-5g-1.jpg') }}" alt="Viettel trúng đấu giá băng tần để chính thức triển khai 5G tại Việt Nam">
                </a>
                <div class="content-article content-article-item d-flex flex-column flex-1">
                    <a href="{{ route('post.detail', $news['slug']) }}" class="title-article">
                        <h3 class="font-weight-400 line-clamp-2">{{ Str::limit(($news->title), 50) }}</h3>
                    </a>
                    <p class="time-article d-flex align-items-center gap-4">
                        <i class="sprite sprite-clock-item-article"></i>
                        <span>{{ date_format($news->created_at, "F j, Y, g:i a") }}</span>
                    </p>
                    <p class="descreption-article line-clamp-2">{!! Str::limit(($news->short_description), 150)!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(count($listYoutube) > 0)
<section class="content-news">
    <div class="box-videos-group box-article-group position-relative boder-radius-10">
        <div class="d-flex justify-content-between align-items-center">
            <div class="title-box">
                <h2 class="title-box font-weight-600">{{ __('Youtube Channel') }}</h2>
            </div>
            <a href="https://www.youtube.com/@kattechpc" class="btn-article-group hover-color-all">{{ __('Xem tất cả') }} <i class="fa fa-caret-right"></i></a>
        </div>
        <div class="list-article-group d-flex" id="list-post-home">
            @foreach($listYoutube as $youtube)
            <div class="item-article d-flex gap-12">
                <div class="content-article content-article-item d-flex flex-column flex-1">
                    <a class="img-article boder-radius-10 position-relative" data-url="{{ $youtube->link }}" onclick="watchYoutubeVideo($(this))">
                        <img class="boder-radius-10" src="{{ asset($youtube->thumbnail) }}" alt="{{ $youtube->title }}">
                        <i class="sprite sprite-play-youtube incon-play-youtube"></i>
                    </a>
                    <a class="title-article" data-url="{{ $youtube->link }}" onclick="watchYoutubeVideo($(this))">
                        <p style="font-size: 14px;">{{ $youtube->title }}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="review">
    <div class="box-review-from-customer boder-radius-10">
        <div class="title-box">
            <h2 class="title-box font-weight-600">{{ __('Đánh giá từ khách hàng') }}</h2>
        </div>
        <div class="list-review-customer-homepage">
            <div class="swiper">
                <div class="swiper-wrapper swiper-review-customer">
                    @foreach($listCustomerReview as $customerReview)
                    <div class="swiper-slide-review" role="group">
                        <div class="item-review-customer-hompage d-flex align-items-center">
                            <div class="left-review position-relative">
                                <img src="{{ asset($customerReview->thumbnail) }}" width="88" height="93" class="lazy" alt="avatar">
                            </div>
                            <div class="right-review">
                                <p class="text-review line-clamp-2">
                                    {{ $customerReview->customer_review }}
                                </p>
                                <b class="author-review font-weight-500">- {{ $customerReview->customer_name }} -</b>
                                <img src="{{ asset('/images/page/5star-customer.png') }}" width="80" height="15" class="lazy" alt="avatar">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @if(!$isMobile)
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                @if(count($listCustomerReview) > 4)

                @php
                $totalPag = count($listCustomerReview) - 4 + 1;
                @endphp

                @for($i = 0; $i < $totalPag; $i++) @if($i==0) <span class="swiper-pagination-bullet swiper-pagination-bullet-active" data-id="swiper-pagination-bullet-{{ $i + 1 }}" tabindex="0" role="button" aria-label="Go to slide {{ $i + 1 }}"></span>
                    @else
                    <span class="swiper-pagination-bullet" data-id="swiper-pagination-bullet-{{ $i + 1 }}" tabindex="0" role="button" aria-label="Go to slide {{ $i + 1 }}"></span>
                    @endif
                    @endfor
                    @else
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                    @endif
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            @else
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                @if(count($listCustomerReview) >= 2)

                @php
                $totalPag = count($listCustomerReview);
                @endphp

                @for($i = 0; $i < $totalPag; $i++) @if($i==0) <span class="swiper-pagination-bullet swiper-pagination-bullet-active" data-id="swiper-pagination-bullet-{{ $i + 1 }}" tabindex="0" role="button" aria-label="Go to slide {{ $i + 1 }}"></span>
                    @else
                    <span class="swiper-pagination-bullet" data-id="swiper-pagination-bullet-{{ $i + 1 }}" tabindex="0" role="button" aria-label="Go to slide {{ $i + 1 }}"></span>
                    @endif
                    @endfor
                    @else
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                    @endif
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            @endif
        </div>
    </div>
</section>

@if($listSlideFooter)
<section id="slide-footer">
    <div class="flash-sale-area">
        <div class="swiper">
            <div class="swiper-wrapper swiper-footer-slide">
                @foreach($listSlideFooter as $slide)
                <div class="swiper-slide2" role="group" style="width: 286px;">
                    <div class="product-item1" style="min-height: 0 !important;">
                        <img src="{{ $slide['image_footer'] }}" width="275" height="300" class="lazy">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-next-footer-slide" tabindex="0" role="button" aria-label="Next slide"></div>
            <div class="swiper-button-prev swiper-button-prev-footer-slide" tabindex="0" role="button" aria-label="Previous slide"></div>
        </div>
    </div>
</section>
@endif

@include('includes.tooltips')
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/page/main.js') }}"></script>
<script>
    <?php if (isset($listFlashSale['flash_sale_timer'])) { ?>
        let countTimeSale = `<?php echo $listFlashSale['flash_sale_timer'] ?>`;

        var countDownDate = new Date(countTimeSale).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            var strDays = '';
            var strHours = '';
            var strMinutes = '';
            var strSeconds = '';

            if (days < 10) {
                strDays = '0' + days;
            } else {
                strDays = days;
            }

            if (hours < 10) {
                strHours = '0' + hours;
            } else {
                strHours = hours;
            }

            if (minutes < 10) {
                strMinutes = '0' + minutes;
            } else {
                strMinutes = minutes;
            }

            if (seconds < 10) {
                strSeconds = '0' + seconds;
            } else {
                strSeconds = seconds;
            }

            $('#timer-flashsale').empty();
            $('#timer-flashsale').append('<p>' + strDays + '</p><span>:</span><p>' + strHours + '</p><span>:</span><p>' + strMinutes + '</p><span>:</span><p>' + strSeconds + '</p>');

            if (distance < 0) {
                clearInterval(x);
                $('#timer-flashsale').empty();
                $('#timer-flashsale').append('<p>EXPIRED</p>');
            }
        }, 1000);
    <?php } ?>

    const listCategory = <?php echo json_encode($listCategory) ?>;

    let listSlideOwl = $('.carousel-inner-slide .carousel-item');
    let totalListSlideOwl = listSlideOwl.length;

    let listSlideMobileOwl = $('.carousel-inner-slide-mobile .carousel-item');
    let totalListSlideMobileOwl = listSlideMobileOwl.length;

    let listThumbOwl = $('.carousel-inner-thumb .carousel-item');
    let totalListThumbOwl = listThumbOwl.length;

    if (totalListSlideOwl > 1) {
        handleOwl(listSlideOwl, '.swiper-button-next-slide', '.swiper-button-prev-slide');
    } else {
        $('.swiper-button-next-slide').addClass('d-none');
        $('.swiper-button-prev-slide').addClass('d-none');
    }

    if (totalListSlideMobileOwl > 1) {
        handleOwl(listSlideMobileOwl, '.swiper-button-next-slide-mobile', '.swiper-button-prev-slide-mobile');
    } else {
        $('.swiper-button-next-slide-mobile').addClass('d-none');
        $('.swiper-button-prev-slide-mobile').addClass('d-none');
    }

    if (totalListThumbOwl > 1) {
        handleOwl(listThumbOwl, '.swiper-button-next-slide-mobile', '.swiper-button-prev-slide-mobile');
    } else {
        $('.swiper-button-next-thumb').addClass('d-none');
        $('.swiper-button-prev-thumb').addClass('d-none');
    }

    function handleOwl(list, next, prev) {
        let countOwl = 0;
        let intervalOwl = setInterval(function() {
            if (countOwl == list.length - 1) {
                list[countOwl].classList.remove('active');
                countOwl = 0;
                nextOwl = countOwl;
                list[nextOwl].classList.add('active');

            } else {
                nextOwl = countOwl + 1;

                list[countOwl].classList.remove('active');
                list[nextOwl].classList.add('active');
            }

            countOwl++;
        }, 3000);

        $(next).on('click', function() {
            if (countOwl == list.length - 1) {
                return;

            } else {
                list[countOwl].classList.remove('active');
                list[countOwl + 1].classList.add('active');
                countOwl++;
            }

            clearInterval(intervalOwl);
        });

        $(prev).on('click', function() {
            if (countOwl == 0) {
                return;
            } else {
                list[countOwl].classList.remove('active');
                list[countOwl - 1].classList.add('active');
                countOwl--;
            }

            clearInterval(intervalOwl);
        });
    }
</script>
@endsection
