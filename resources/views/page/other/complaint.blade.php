@extends('layouts.page')

@section('title')
<title>{{ __('Giải quyết khiếu nại') }} | Kattech PC</title>
@endsection

@section('description', __('Giải quyết khiếu nại với Kattech PC'))
@section('keywords', 'complaint policy, policy, complaint, kattechpc, kattech')
@section('breadcrumb', __('Giải quyết khiếu nại'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/complaint.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="footer-container">
        <div class="policy-step">
            <div class=" ml-100px">
                <h1>{{ __('GIẢI QUYẾT KHIẾU NẠI') }}</h1>
                <h1>{{ __('KATTECH PC') }}</h1>
            </div>
        </div>
        <div class="ml-100px">
            <h2>{{ __('QUY TRÌNH 4 BƯỚC GIẢI QUYẾT KHIẾU NẠI') }}</h2>
            <h3>{{ __('Nếu bạn hài lòng hãy nói với mọi người. Nếu không hài lòng hãy nói với chúng tôi.') }}</h3>
            <h3>{{ __(' Mỗi ý kiến của bạn sẽ là cơ hội để chúng tôi phục vụ ngày một tốt hơn.') }}</h3>
        </div>

        <div class="ml-200px" id="complaint-1">
            <h2>{{ __('CHĂM SÓC KHÁCH HÀNG') }}</h2>
            <h3>{{ __('Tầng 3 Tòa nhà LILAMA, 124 Minh Khai, Hai Bà Trưng, Hà Nội.') }}</h3>
            <h3>{{ __('dichvukhachhang@kattech.vn') }}</h3>
            <h3>{{ __('1900 1903') }}</h3>
        </div>
    </div>

    <div class="row top">
        <div id="condition">
            <div style="padding: 10px">

            <h2>{{ __('1. TIẾP NHẬN YÊU CẦU') }}</h2>
            <p class="policy-title">{{ __('● Cách 1: Gọi điện thoại đến hotline: 1900 1903') }}</p>
            <p class="policy-title">{{ __('● Cách 2: Gửi Email về địa chỉ: dichvukhachhang@kattech.vn') }}</p><p class="policy-title">{{ __('● Cách 3: Gửi tin nhắn tới Facebook hoặc Website: kattech.vn') }}</p>
            </div>
        </div>
        <div  id="condition2">
            <div style="padding: 10px">
            <h2>{{__('2. PHÂN TÍCH YÊU CẦU')}}</h2>
            <p class="policy-title">{{ __('1. Đối với các khiếu nại trực tiếp hoặc qua điện thoại mà có đủ thông tin, có thể giải quyết được ngay: trả lời khiếu nại khách hàng ngay.') }}</p>
            <p class="policy-title">{{ __('2. Đối với khiếu nại chưa đủ thông tin hoặc không thể giải quyết được ngay thì thực hiện:') }}</p>
            <p class="policy-title">{{ __('● Hẹn khách hàng thời gian thông báo lại thông tin (tối đa 3 ngày).') }}</p>
            <p class="policy-title">{{ __('● Liên hệ tới các bộ phận liên quan để làm rõ khiếu nại.') }}</p>
            <p class="policy-title">{{ __('● Đề xuất các phương án giải quyết khiếu nại.') }}</p>
        </div>
        </div>
    </div>

    <div class="row top promotion">
        <div id="condition">
            <div style="padding: 10px">
            <h2>{{ __('3. TRẢ LỜI, GIẢI QUYẾT YÊU CẦU') }}</h2>
            <p class="policy-title">{{ __('1. Liên hệ lại với khách hàng để trả lời khiếu nại và đề xuất các phương án giải quyết.') }}</p>
            <p class="policy-title">{{ __('2. Giải quyết khiếu nại theo hướng đề xuất đã được khách hàng yêu cầu.') }}</p>
        </div>
        </div>
        <div  id="condition2">
            <div style="padding: 10px">
            <h2>{{ __('4. KẾT THÚC YÊU CẦU') }}</h2>
            <p class="policy-title">{{ __('Lưu lại thông tin khiếu nại để tổng hợp và rút kinh nghiệm.') }}</p>
        </div>
        </div>
    </div>
</div>
@endsection
