@extends('layouts.page')

@section('title')
<title>{{ __('Thanh toán trực tuyến') }} | Kattech PC</title>
@endsection

@section('description', __('Thanh toán trực tuyến với Kattech PC'))
@section('keywords', 'payment online, payment, kattechpc, kattech')
@section('breadcrumb', __('Thanh toán trực tuyến'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/payment-online.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row d-flex" id="payment">
        <div class="column">
            <h1>{{ __('Mua hàng trực tuyến') }}</h1>
            <h2>{{ __('1, Đặt hàng qua số điện thoại') }}</h2>
            <h2>{{ __('2, Đặt hàng qua tin nhắn hệ thống') }}</h2>
            <h2>{{ __('3, Đặt hàng qua website') }}</h2>
        </div>
        <div class="column">
            <img src="{{asset('/images/Online-Shopping.jpg')}}">
        </div>
    </div>
    <div class="footer-container">
        <div class="">
            <div class="policy-step d-flex">
                <div class="d-flex flex-column ml-100px" style="padding: 15px">
                    <h1>{{ __('Bước 1: Đặt hàng qua số điện thoại') }}</h1>
                    <span class="policy-title">{{ __(' Quý khách click "Gọi tư vấn mua hàng" để gặp nhân viên bán hàng Online của chúng tôi. Nhân viên bán hàng Online sẽ tư vấn và tiếp nhận đơn hàng cho quý khách trong thời gian từ 8h-21h30 hàng ngày và tất cả các ngày trong tuần.') }}</span>

                </div>
            </div>
            <div class="policy-step w-100">
                <div class="d-flex flex-column ml-10px" style="padding: 15px">
                    <h1>{{ __('Bước 2: Đặt hàng qua tin nhắn hệ thống') }}</h1>
                    <span class="policy-title">{{ __(' Quý khách truy cập vào website để chat và đặt hàng qua phần mềm chat hiển thị ngay góc bên phải chân trang web. Nhân viên Online sẽ tư vấn và xác nhận đơn hàng của quý khách.') }}</span>
                </div>
            </div>
            <div class="policy-step">
                <div class="d-flex flex-column ml-10px" style="padding: 15px">
                    <h1>{{ __('Bước 3: Đặt hàng qua website') }}</h1>
                    <span class="policy-title">{{ __('Bạn truy cập vào website để mua hàng trực tuyến. Dưới đây là các bước hướng dẫn mua hàng trực tuyến bên KATTECHPC.COM') }}</span>
                </div>
            </div>

        </div>
    </div>
    <div class="row top">
        <h1 class="title-top1"> {{ __('Hướng dẫn mua hàng trực tuyến') }}</h1>
        <h2>{{ __('BƯỚC 1: TÌM SẢN PHẨM CẦN MUA') }}</h2>
        <p>{{ __('Bạn có thể truy cập website kattech.com để tìm và chọn sản phẩm muốn mua bằng nhiều cách:') }}</p>
        <p>{{ __('+ Sử dụng ô tìm kiếm phía trên, gõ tên sản phẩm muốn mua (có thể tìm đích danh 1 sản phẩm, tìm theo hãng...). Website sẽ cung cấp cho bạn những gợi ý chính xác để lựa chọn:') }}</p>
        <img src="{{asset('/images/page/pic1.png')}}">

        <h2>{{ __('BƯỚC 2: ĐẶT MUA SẢN PHẨM') }}</h2>
        <p>{{ __('Sau khi chọn được sản phẩm ưng ý muốn mua, bạn tiến hành đặt hàng bằng cách: Chọn vào nút  MUA NGAY nếu bạn muốn thanh toán luôn toàn bộ giá tiền sản phẩm') }}</p>
        <img src="{{asset('/images/page/pic2.png')}}">

        <h2>{{ __('BƯỚC 3: Tiến hành thanh toán') }}</h2>
        <p>
            {{ __('- Trong giỏ hàng của quý khách có hiển thị thông tin về tên sản phẩm, đơn giá, số lượng cần mua, quý khách có thể thay đổi số lượng cần mua, xóa bỏ mặt hàng không muốn mua
                Quý khách bấm "Tiến hành thanh toán " để thực hiện mua hàng trong giỏ') }}
        </p>
        <p>{{ __('Quý khách bấm "Đặt hàng " để thực hiện mua hàng trong giỏ') }}</p>
        <img src="{{asset('/images/page/pic3.png')}}">

        <h2>{{ __('BƯỚC 4: Hoàn tất mua hàng') }}</h2>
        <p>
            {{ __('- Sau khi đặt hàng xong, thì việc của bạn chỉ đơn giản là ngồi chờ thôi. Bộ phận bán hàng online gọi điện đến số điện thoại mà bạn vừa nhập để xác nhận. Khi xác nhận xong thì hàng sẽ được lên đơn, đóng gói và chuyển đến tận tay cho bạn, thế là xong') }}
        </p>
    </div>

    <h3>{{ __('Trên đây là bài hướng dẫn phương pháp đặt hàng online tại KATTECH, chúc quý khách hàng mua sắm vui vẻ, nhiều sức khỏe và bình an trong mùa dịch. KATTECH trân trọng!') }}</h3>
</div>
@endsection
