@extends('layouts.page')

@section('title')
<title>{{ __('Khuyến mãi') }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/promotion-type.css') }}" />
@endsection

@section('description', __('Tham gia khuyến mãi shock mỗi ngày với Kattech PC'))
@section('keywords', 'promotion, sale, kattechpc, kattech')
@section('breadcrumb', __('Khuyến mãi'))

@section('content')
<div class="container-promotion">
    @if(isset($layout->banner_promotion_thumbnail))
    <div class="banner-deal-page">
        <a class="item-banner">
            <img class="image-flash-sale" src="{{ asset($layout->banner_promotion_thumbnail) }}" alt="banner-deal">
        </a>
    </div>
    @endif

    <div class="saleoff-heading">
        <a>{{ __('Hãy thường xuyên theo dõi các chương trình khuyến mãi để có cơ hội mua HÀNG CHÍNH HÃNG GIÁ TỐT NHẤT') }}</a>
    </div>
    <div class="row post-data">
        @foreach($listPromotionDESC as $random)
        @php
        $currentDate = strtotime(date('Y-m-d H:i:s'));
        $endDate = strtotime($random->end_date);
        @endphp
        @if($currentDate < $endDate) <div class="column">
            <div class="set-image-promotion">
                <img class="image-promotion " src="{{ $random->image ?? asset('images/page/no-image.png') }}" style="object-fit: cover;">
            </div>
            <div class="promotion">
                <h2><a href="{{ route('promotion.detail', $random['slug']) }}" class="text-tech" href="">{{ $random->title }}</a></h2>
                <div class="pac-market_time">
                    {{ __('Từ') }}: {{ $random->start_date }} - {{ __('Kết thúc') }}: {{ $random->end_date }}
                </div>
            </div>
    </div>
    @endif
    @endforeach
</div>
</div>
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
