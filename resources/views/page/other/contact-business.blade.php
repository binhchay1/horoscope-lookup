@extends('layouts.page')

@section('title')
    <title>{{ __('Chính sách doanh nghiệp') }} | Kattech PC</title>
@endsection

@section('description', __('Chính sách doanh nghiệp với Kattech PC'))
@section('keywords', 'contact business, contact, business, kattechpc, kattech')
@section('breadcrumb', __('Chính sách doanh nghiệp'))

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page/contactBusiness.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>{{ __('LIÊN HỆ HỢP TÁC KINH DOANH') }}</h1>
                <h2>{{ __('CAM KẾT GIÁ TỐT NHẤT THỊ TRƯỜNG') }}</h2>
            </div>
            <div class="column">
                <img class="image-pc" src="{{ asset('/images/page/contact.jpg') }}">
            </div>
        </div>

        <div style="margin-top: 50px">
            <h1>{{__('THÔNG TIN LIÊN HỆ') }}</h1>
            <p style="font-size: 18px">{{__('Thành lập vào ngày 08/08/2000 và trải qua hơn 20 năm hoạt động & phát triển, KATTECH đã từng bước khẳng định và tạo sự tín nhiệm trong lòng khách hàng, trở thành một trong những công ty chuyên nghiệp nhất cung cấp điện thoại, máy tính, thiết bị văn phòng và các giải pháp, ứng dụng công nghệ. Với đội ngũ nhân viên trình độ cao, tận tâm cùng hệ thống showroom, trung tâm bảo hành hiện đại trên khắp Hà Nội,
KATTECH sẽ mang đến cho khách hàng sự hài lòng cao nhất khi lựa chọn sản phẩm, sử dụng dịch vụ.')}}</p>
        </div>

        <div class=" top">
            <div class=" ml-200px">
                <h3 id="text-title">{{ __('LIÊN HỆ HỢP TÁC KINH DOANH') }}</h3>
            </div>
        </div>
        <div class=" top1">
            <div class="parent">
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
                <div class="child1" id="business-title1">
                    <span class="policy-title">{{__('Tên')}}: {{ __('Nguyễn Văn A') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('nguyenvana@gmail.com') }}</span>
                    <br>
                    <span class="policy-title">{{__('Tên')}}: {{ __('0945333422/0355545643') }}</span>
                    <br>
                    <button class="btn btn-button">{{__('Tên')}}</button>
                </div>
            </div>
        </div>
        <div class="top">
            <div class="d-flex" id="policy-condition" style="gap: 30px">
                <div  id="condition-contact-bussiness">
                    <h2 class="title-contact">{{__('DỊCH VỤ KHÁCH HÀNG')}}</h2>
                    <h3 class="title-contact1">{{__('Bộ phận giải quyết thắc mắc, khiếu nại')}}</h3>
                    <p class="contact-title">{{__('Địa ch :Tầng 3, Tòa nhà LILAMA, số 124 Minh Khai - Hai Bà Trưng - Hà Nội.')}}</p>
                    <p class="contact-title">{{__('Email liên hệ: dichvukhachhang@kettech.vn')}}</p>
                    <p class="contact-title">{{__('Số điện thoại: 1900 1903 (máy lẻ: 0)')}}</p>
                </div>
                <div  id="condition2">
                    <h2 class="title-contact">{{__('NGƯỜI ĐẠI DIỆN PHÁP LUẬT')}}</h2>
                    <h3 class="title-contact1">{{__('Mr. BÙI MẠNH THẮNG')}}</h3>
                    <p class="contact-title">{{__('Email liên hệ: thangbm@kettech.vn.')}}</p>
                    <p class="contact-title">{{__('Số điện thoại: 1900 1903')}}</p>
                    <div style="text-align: center;" >
                        <input type="button" class="btn-contact" value="TỔNG GIÁM ĐỐC">
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
