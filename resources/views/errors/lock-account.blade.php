@extends('layouts.page')

@section('title')
    <title>{{ __('419') }}</title>
@endsection

@section('description', __('Nội dung không có quyền truy cập trong Kattech PC'))
@section('keywords', '419, kattechpc, kattech')
@section('breadcrumb', __('Không có quyền truy cập'))

@section('content')
    <div class="mb-0 border-none shadow-none lg:w-[500px] card bg-white/70 dark:bg-zink-500/70">
        <div class="!px-10 !py-12 card-body">
            <div class="mt-10 d-flex justify-content-center">
                <img src="{{ URL::asset('/images/404.png') }}" alt="" class="h-64 mx-auto">
            </div>
            <div class="mt-8 text-center">
                <h4 class="mb-2 text-purple-500" style="font-size: 20px">{{ __('KHÔNG CÓ QUYỀN TRUY CẬP!') }}</h4>
                <div class="mt-10 d-flex justify-content-center">
                    <a href="{{ route('home') }}"><img src="{{ URL::asset('/images/logo/logo.png') }}" width="100" class="h-64 mx-auto"></a>
                </div>
                <p class="mb-6 text-slate-500 dark:text-zink-200">{{ __('Thông tin tài khoản của khách không có quyền truy cập. Nếu quý khách cần hỗ trợ, xin vui lòng liên hệ '. config('company.hotline') . ' để được tư vấn sớm nhất') }}</p>
            </div>
        </div>

        @if($listSlideFooter)
            <section class="" id="slide-footer">
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
    </div>
@endsection
