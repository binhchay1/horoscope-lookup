@extends('layouts.page')

@section('title')
<title>{{ __('Flash sale') }} | Kattech PC</title>
@endsection

@section('description', __('Săn linh kiện có giá cực tốt mỗi ngày với Kattech PC'))
@section('keywords', 'sale, flash sale, kattechpc, kattech')
@section('breadcrumb', __('Flash sale'))

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
            @if(isset($listFlashSale['flash_sale_list_product_id'], $listFlashSale['flash_sale_timer']))
            @foreach($listFlashSale['flash_sale_list_product_id'] as $k => $product)
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
                        <div class="p-quantity-sale">
                            <i class="sprite sprite-fire-deal"></i>
                            <div class="bg-gradient"></div>
                            <?php $total_line = ($product->stock / $product->sale_quantity) * 100 ?>
                            <p class="js-line-deal-left" style="<?php echo 'width: ' . $total_line . '%' ?>"></p>
                            <span style="font-size: 14px; font-weight: bold;">{{ __('Còn') }} {{ $product->stock }} / {{ $product->sale_quantity }} {{ __('sản phẩm') }}</span>
                        </div>
                        <div class="js-item-deal-time js-item-time-26469">
                            <p class="time-deal-page">Kết thúc sau <span id="date-count-sale-{{ $k }}"></span>:<span id="hours-count-sale-{{ $k }}"></span>:<span id="min-count-sale-{{ $k }}"></span>:<span id="second-count-sale-{{ $k }}"></span>
                            </p>
                        </div>
                        <a href="{{ route('addCart', $product['slug']) }}" class="buy-now-deal">Mua giá sốc</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<script>
    <?php if (isset($listFlashSale['flash_sale_timer'])) { ?>
        let countTimeSale = `<?php echo $listFlashSale['flash_sale_timer'] ?>`;
        let countListFlashSale = '<?php echo  count($listFlashSale['flash_sale_list_product_id']) ?>';

        for (let k = 0; k < countListFlashSale; k++) {
            var countDownDate = new Date(countTimeSale).getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (days == 0) {
                    days = '00';
                }

                if (hours == 0) {
                    hours = '00';
                }

                if (minutes == 0) {
                    minutes = '00';
                }

                if (days < 10 && days != '00') {
                    days = '0' + days;
                }

                if (hours < 10 && hours != '00') {
                    hours = '0' + hours;
                }

                if (minutes < 10 && minutes != '00') {
                    minutes = '0' + minutes;
                }

                if (seconds < 10 && seconds != '00') {
                    seconds = '0' + seconds;
                }

                $('#date-count-sale-' + k).empty();
                $('#date-count-sale-' + k).append(days);

                $('#hours-count-sale-' + k).empty();
                $('#hours-count-sale-' + k).append(hours);

                $('#min-count-sale-' + k).empty();
                $('#min-count-sale -' + k).append(minutes);

                $('#second-count-sale-' + k).empty();
                $('#second-count-sale-' + k).append(seconds);

                if (distance < 0) {
                    clearInterval(x);
                    $('.box-flash-sale').remove();
                }
            }, 1000);
        }
    <?php } ?>
</script>
@include('includes.tooltips')
@endsection
