@extends('layouts.page')

@section('title')
<title>{{ __('Trang chủ') }} | env('APP_NAME', 'TUVI')</title>
@endsection

@section('content')
<div class="bg-light start-header start-style">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand text-white" href="{{ route('home') }}"><img
                            src="{{ asset('/images/logo/logo.png') }}" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation" style="line-height: 1.4;">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse text-left" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="account"
                                    role="button" aria-haspopup="true" aria-expanded="false"><i
                                        class="fas fa-shopping-bag"></i> Mua Vip</a>
                                <div class="dropdown-menu" style="min-width: 250px;right:0!important;left:auto;">
                                    <div style="position: relative">
                                        <a class="dropdown-item" href="{{ route('purchase_kid') }}"><i class="fas fa-tint"></i> Mua Vip
                                            tử vi</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <span class="nav-link"><a href="{{ route('register') }}" class="text-white">Đăng ký</a> / <a href="{{ route('login') }}" class="text-white">Đăng nhập</a></span>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</div>
<section class="container" unselectable="on"
    style="display: table;min-height: calc(100vh - 100px);padding:1px 10px;">
    <div id="TUVI_CONTAINER">
        <div class="initial-carousel-container content-container carousel-container"
            style="margin: 15px auto 15px!important;">
            <div class="signs-carousel">
                <div class="sign-container sign-8-container"
                    style="margin: 0px auto 10px!important;width: 200px;height: 200px;">
                    <p class="sign-bg"></p>
                    <p class="animated pulse infinite sign-image sign-8"></p>
                </div>
            </div>
        </div>

        <p class="text-center m-b-10 m-t-20" style="line-height: 1.5;font-size: 16px;color:#ffed00;"><b>TRA CỨU LÁ
                SỐ TỬ VI</b><br> Lập lá số tử vi chính xác nhất</p>

        @include('includes.form-lookup')

        <div class="m-t-15 text-left" style="padding:10px;border-radius: 10px;background: #ffffffd4;">
            <b>CHÚ THÍCH:</b><br>
            - Năm xem (âm lịch) và tháng xem (âm lịch) bạn chọn để an thêm các sao lưu vào trong lá số của bạn và
            tính tiểu hạn!<br>
            - Xem lại các luận giải lá số bạn đã tra cứu VIP tại <a href="{{ route('history') }}" style="color:#007bff!important;">Lịch sử tra cứu</a>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
