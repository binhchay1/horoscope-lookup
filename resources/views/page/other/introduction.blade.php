@extends('layouts.page')

@section('title')
    <title>{{ __('Hướng dẫn thanh toán') }} | Kattech PC</title>
@endsection

@section('description', __('Tra cứu hóa đơn điện tử với Kattech PC'))
@section('keywords', 'bill, electronic bill, electronic, kattechpc, kattech')
@section('breadcrumb', __('Tra cứu hóa đơn'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/page/introduction.css') }}" />
@endsection

@section('content')
    <div class="container">
        <h1 class="title-top1"> {{ __('Giới thiệu công ty') }}</h1>
        <p class="text-accept">{{ __('GIỚI THIỆU CHUNG: ')}}
        <hr class="unline">
        </p>
        <p class="text-accept1">{{ __('Công ty Cổ phần Đầu tư Công nghệ KATTECH (viết tắt là “KATTECH”, tiền thân là Công ty Cổ phần Máy tính Hà Nội, sở hữu thương hiệu KATTECH), được thành lập vào tháng 9/2001, hoạt động chủ yếu trong lĩnh vực bán lẻ các sản phẩm máy tính và thiết bị văn phòng. Trải qua chặng đường hơn 20 năm phát triển, đến nay KATTECH đã trở thành một trong những thương hiệu hàng đầu trong lĩnh vực kinh doanh các sản phẩm Công nghệ thông tin tại Việt Nam với hệ thống các showroom quy mô và hiện đại trải dài từ Bắc vào Nam.

Nhiều tổ chức uy tín liên tục đánh giá cao KATTECH với nhiều giải thưởng danh giá: Top 50 Nhãn hiệu nổi tiếng Việt Nam do Hội Sở hữu Trí tuệ Việt Nam công nhận và trao tặng; Top 500 Doanh nghiệp tăng trưởng nhanh nhất Việt Nam 2021 và 2022 (FAST500), top 500 Doanh nghiệp lớn nhất Việt Nam 2021 (VNR500) do Vietnam Report công nhận và trao tặng, top 50 Thương hiệu Uy tín Hàng đầu Châu Á 2022 do Trung tâm Nghiên cứu Phát triển Doanh nghiệp Châu Á phối hợp với tổ chức Giám sát Chất lượng Quốc tế xét chọn.

Với khẩu hiệu “Uy tín tạo dựng niềm tin”, KATTECH mong muốn xây dựng “niềm tin” của Khách hàng bằng chất lượng dịch vụ tốt nhất, vượt trội nhất. Đó cũng chính là kim chỉ nam cho sự phát triển bền vững mà KATTECH hướng đến.') }}</p>

        <p class="text-accept">{{ __('TẦM NHÌN SỨ MỆNH: ')}}
        <hr class="unline">
        </p>
        <p class="text-intro">{{__('Tầm nhìn')}}</p>
        <p class="text-accept1">{{ __('- Là chuỗi bán lẻ các sản phẩm công nghệ hàng đầu với độ phủ rộng khắp các tỉnh thành trên cả nước.') }}</p>
        <p class="text-intro">{{__('Sứ mệnh')}}</p>
        <p class="text-accept1">{{ __('- Với sứ mệnh phụng sự, chúng tôi đem đến cho khách hàng những trải nghiệm và dịch vụ ưu việt, qua đó tạo nên những giá trị tốt đẹp hơn cho cộng đồng và cuộc sống.') }}</p>

        <p class="text-accept">{{ __('GIÁ TRỊ CỐT LÕI : ')}}
        <hr class="unline">
        </p>

        <p class="text-accept1">{{ __('Văn hóa KATTECH được thể hiện qua bốn giá trị cốt lõi:') }}
        <strong style="color: #000080;">{{__('TẬN TÂM – TRÁCH NHIỆM – SÁNG TẠO ')}}</strong>
        </p>

        <div class="footer-container">
            <div class="payment">
                <div class="policy-step d-flex"  id="payment-step">
                    <div class="d-flex flex-column ml-100px">
                        <h3>{{ __('TẬN TÂM')}}</h3>
                        <img src="{{ asset('/images/page/su-menh.png') }}">
                    </div>
                </div>
                <div class="policy-step d-flex" id="payment-step">
                    <div class="d-flex flex-column ml-100px">
                        <h3>{{ __('TRÁCH NHIỆM') }}</h3>
                        <img src="{{ asset('/images/page/10083610.png') }}">
                    </div>
                </div>
                <div class="policy-step d-flex" id="payment-step">
                    <div class="d-flex flex-column ml-100px">
                        <h3>{{ __('SÁNG TẠO') }}</h3>
                        <img src="{{ asset('/images/page/sang-tao.png') }}">
                    </div>
                </div>
            </div>
        </div>

        <p class="text-accept">{{ __('LĨNH VỰC KINH DOANH: ')}}
        <hr class="unline">
        </p>

        <div class="row d-flex" id="payment">
            <div class="column-image " style="width: 30%;">
                <img src="{{ asset('/images/page/HACOMprofile-072.jpg') }}">
            </div>
            <div class="column">
                <p>{{ __('Đặc biệt trong lĩnh vực Tin học, KATTECH chú trọng các hoạt động như:') }}</p>
                <p>{{ __('> Thiết kế giải pháp tổng thể (thiết kế hệ thống, xây dựng mạng LAN, WAN,..)') }}</p>
                <p>{{ __('> Cung cấp các thiết bị tin học (Máy chủ, máy tính PC, máy tính NOTEBOOKS, các thiết bị ngoại vi, các ứng dụng)') }}</p>
                <p>{{ __(' > Cung cấp phần mềm của các hãng trên thế giới, các phần mềm quản lý, truyền thông…') }}</p>
                <p>{{ __(' > Cung cấp phần mềm của các hãng trên thế giới, các phần mềm quản lý, truyền thông…') }}</p>
                <p>{{ __(' > Tư vấn và đào tạo cho khách hàng') }}</p>
                <p>{{ __(' > Các dịch vụ bảo hành, bảo trì…') }}</p>
                <h3>{{ __('Qua thời gian hoạt động, KATTECH đã tạo được uy tín và sự tin cậy của khách hàng giúp công ty ngày càng lớn mạnh trong các lĩnh vực hoạt động.') }}</h3>

            </div>

        </div>

        <p class="text-accept">{{ __('ĐỐI TÁC CỦA KATTECH: ')}}
        <hr class="unline">
        </p>
        <div class=" top">
            <img class="top-image" src="{{ asset('/images/best-laptop-brand.jpg') }}">
        </div>
        <h1 class="title-top1"> {{ __('KATTECH-NGƯỜI BẠN ĐỒNG HÀNH ĐÁNG TIN CẬY') }}</h1>
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
