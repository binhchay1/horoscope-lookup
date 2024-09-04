@extends('layouts.page')

@section('title')
<title>{{ __('Hướng dẫn thanh toán') }} | Kattech PC</title>
@endsection

@section('description', __('Hướng dẫn thanh toán với Kattech PC'))
@section('keywords', 'payment, kattechpc, kattech')
@section('breadcrumb', __('Hướng dẫn thanh toán'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/payment.css') }}" />
@endsection

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row d-flex" id="payment">
        <div class="column">
            <h1>{{ __('Thông tin hướng dẫn thanh toán') }}</h1>
            <h2>{{ __('Khách hàng mua hàng trực tuyến bằng cách :') }}</h2>
            <h3>{{ __('1, Đặt hàng qua số điện thoại') }}</h3>
            <h3>{{ __('2, Đặt hàng qua tin nhắn hệ thống') }}</h3>
            <h3>{{ __('3, Đặt hàng qua website') }}</h3>

        </div>
        <div class="column">
            <img src="{{ asset('/images/page/thanh-toan.jpg') }}">
        </div>
    </div>
    <h1 class="title-top1"> {{ __('Hướng dẫn thanh toán') }}</h1>
    <div class="footer-container">
        <div class="payment">
            <div class="policy-step d-flex"  id="payment-step">
                <div class="d-flex flex-column ml-100px">
                    <h3>{{ __('Thanh toán trực tuyến')}}</h3>
                    <img src="{{ asset('/images/page/savemoney.png') }}">
                </div>
            </div>
            <div class="policy-step d-flex" id="payment-step">
                <div class="d-flex flex-column ml-100px">
                    <h3>{{ __('Thanh toán khi nhận hàng(COD)') }}</h3>
                    <img src="{{ asset('/images/page/delivery.png') }}">
                </div>
            </div>
            <div class="policy-step d-flex" id="payment-step">
                <div class="d-flex flex-column ml-100px">
                    <h3>{{ __('Thanh toán chuyển khoản trước') }}</h3>
                    <img src="{{ asset('/images/page/dollar.png') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <p class="heading-title">{{ __('Có 3 hình thức thanh toán, khách hàng có thể lựa chọn hình thức thanh toán phù hợp với mình nhất') }}</p>
        <div class="step-payment">
            <p>{{ __('Cách 1: Thanh toán trực tiếp tại cửa hàng của chúng tôi')}}</p>
            <p>{{ __('Cách 2: Thanh toán khi nhận hàng(COD), khách hàng nhận và xem hàng tại nhà, sau đó thanh toán trực tiếp cho nhân viên giao hàng') }}</p>
            <p>{{ __('Cách 3: Quý khách thanh toán trước bằng hình thức chuyển khoản, sau đó chúng tôi sẽ  giao hàng theo thỏa thuận hợp đồng với Quý khách') }}</p>
        </div>
    </div>

    <h1 class="title-top1 title-accept">
        <span class="title-accept1" id="title-mobile">{{ __('Chấp nhận thanh toán ATM, VISA') }}</span>
    </h1>
    <p class="text-accept">{{ __('Lưu ý: ')}}</p>
    <p class="text-accept1">{{ __('Nội dung chuyển khoản ghi rõ họ tên và chuyển cho món hàng nào. Sau khi chuyển khoản, chúng tôi sẽ liên hệ xác nhận và tiến hành giao hàng. Nếu sau thời gian thỏa thuận mà chúng tôi không giao hàng hoặc không phản hồi lại, quý khách có thể gửi khiếu nại trực tiếp về địa chỉ trụ sở và yêu cầu bồi thường nếu chứng minh được sự chậm trễ làm ảnh hưởng đến kinh doanh của quý khách. Đối với khách hàng có nhu cầu mua số lượng lớn để kinh doanh hoặc buôn sỉ vui lòng liên hệ trực tiếp với chúng tôi để có chính sách giá cả hợp lý. Và việc thanh toán sẽ được thực hiện theo hợp đồng. Chúng tôi cam kết kinh doanh minh bạch, hợp pháp, bán hàng chất lượng, có nguồn gốc.') }}</p>
</div>

@endsection

@section('js')
<script>
    $('.vendor-carousel').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
    });
</script>
@endsection
