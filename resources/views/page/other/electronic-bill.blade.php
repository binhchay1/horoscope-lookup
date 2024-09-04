@extends('layouts.page')

@section('title')
<title>{{ __('Tra cứu hóa đơn') }} | Kattech PC</title>
@endsection

@section('description', __('Tra cứu hóa đơn điện tử với Kattech PC'))
@section('keywords', 'bill, electronic bill, electronic, kattechpc, kattech')
@section('breadcrumb', __('Tra cứu hóa đơn'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/bill.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="footer-container">
        <div class="">
            <div class="policy-step ">
                <div class=" ml-100px">
                    <h1>{{ __('HƯỚNG DẪN') }}</h1>
                    <h1>{{ __('TRA CỨU VÀ NHẬN HOÁ ĐƠN ĐIỆN TỬ') }}</h1>
                </div>
            </div>
        </div>
        <div class=" ml-100px">
            <h2>{{ __('CÁCH TRA CỨU HOÁ ĐƠN ĐIỆN TỬ') }}</h2>
        </div>
    </div>
    <div class="row top">
        <div class="" id="bill">
            <h2>{{ __('Bước 1:') }}</h2>
            <span>{{ __(' Truy cập trang web Tra cứu hóa đơn điện tử:') }}</span>
        </div>
    </div>
    <div class=" ml-100px">
        <a href="https://www.meinvoice.vn/tra-cuu">
            <h2>{{ __('www.meinvoice.vn/tra-cuu') }}</h2>
        </a>

    </div>
    <img class="images-bill" src="{{ asset('/images/page/electric-bill.png') }}">
    <div class="row top">
        <div class="" id="bill">
            <h2>{{ __('Bước 2:') }}</h2>
            <span>{{ __(' Nhập mã số :') }}</span>
        </div>
    </div>
    <div class=" ml-100px">
        <h2>{{ __('CÁCH NHẬN BIẾT HOÁ ĐƠN ĐIỆN TỬ') }}</h2>
    </div>
    <span>{{ __(' Kiểm tra email (tài khoản email của khách hàng) KATTECH sẽ gửi email cho khách hàng bằng email:hoadonhacom@kattech.com') }}</span>

    <div class="take-care">
        <div class=" ml-200px" id="bill-care">
            <h2>{{ __('CHĂM SÓC KHÁCH HÀNG') }}</h2>
            <h3>{{ __('Tòa nhà Vicom') }}</h3>
            <h3>{{ __('dichvukhachhang@kattech.vn') }}</h3>
            <h3>{{ __('1900 1903') }}</h3>
        </div>
    </div>
</div>
@endsection
