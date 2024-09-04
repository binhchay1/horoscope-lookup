@extends('layouts.page')

@section('title')
<title>{{ __('Chính sách bảo hành') }} | Kattech PC</title>
@endsection

@section('description', __('Chính sách bảo hành với Kattech PC'))
@section('keywords', 'policy, guarantee, kattechpc, kattech')
@section('breadcrumb', __('Chính sách bảo hành'))

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/owlcarousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/page/policy.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row d-flex policy-part1">
        <div class="column">
            <h1>{{ __('CHÍNH SÁCH BẢO HÀNH') }}</h1>
            <h2>{{ __('DÀNH CHO KHÁCH HÀNG KATTECH') }}</h2>
            <p class="policy-title">{{ __('Nếu Quý Khách gặp khó khăn trong việc liên hệ Trung Tâm Bảo Hành, Quý Khách vui lòng liên hệ với bộ phận chăm sóc khách hàng của KATTECH theo thông tin sau để được hỗ trợ:') }}</p>
            <h5>{{ __('E-mail: info@kattechpc.com • Hotline: 1800.1234') }}</h5>
        </div>
        <div class="column">
            <img src="{{asset('/images/page/baohanh.jpg')}}" class="policy-image1">
        </div>
    </div>
    <div class="footer-container">
        <div class="policy-step d-flex" id="poli-step">
            <div class="d-flex flex-column ml-100px" id="poli-padding">
                <h1>{{__('Bước 1: Liên hệ với Kattech')}}</h1>
                <span class="policy-title">{{ __('Khi có nhu cầu bảo hành sản phẩm, khách hàng vui lòng liên hệ với Kattech qua hình thức sau:') }}</span>
                <span class="policy-title">{{ __('Tổng đài bảo hành: 1900 1903 máy lẻ 3') }}</span>
                <span class="policy-title">{{ __('Trò chuyện trực tiếp tại Website hoặc Fanpage') }}</span>
                <span class="policy-title">{{ __('Liên hệ trực tiếp tại chi nhánh cửa hàng của Kattech') }}</span>
            </div>
        </div>
        <div class="policy-step w-100"  id="poli-step">
            <div class="d-flex flex-column ml-10px" id="poli-padding">
                <h1>{{__('Bước 2: Chuyển sản phẩm tới bản hành')}}</h1>
                <span class="policy-title">{{ __('Trung tâm bảo hành HACOM::') }}</span>
                <span class="policy-title">{{ __('Quý khách gửi sản phẩm bảo hành tại các Chi nhánh Kattech trên toàn quốc.') }}</span>
                <span class="policy-title">{{ __('Quý khách vui lòng truy cập Website: www.hacom.vn để tìm hiểu chi tiết về Hệ thống các chi nhánh Kattech.') }}</span>
            </div>
        </div>
        <div class="policy-step"  id="poli-step">
            <div class="d-flex flex-column ml-10px" id="poli-padding">
                <h1>{{__('Bước 3: Bảo hành và bàn giao sản phẩm')}}</h1>
                <span class="policy-title">{{ __('Hoàn tất xử lý bảo hành và bàn giao sản phẩm đến khách hàng.') }}</span>
            </div>
        </div>

    </div>
    <div class="row top">
        <h1 class="title-top1"> {{__('Điều kiện bảo hành sản phẩm')}}</h1>
        <div class="d-flex" id="policy-condition" style="gap: 30px">
            <div  id="condition">
                <h2>{{__('NHỮNG SẢN PHẨM ĐỦ ĐIỀU KIỆN BẢO HÀNH')}}</h2>
                <p class="policy-title">{{__('Sản phẩm nếu có tem niêm phong (seal) trên sản phẩm thì tem niêm phong phải còn nguyên vẹn.')}}</p>
                <p class="policy-title">{{__('Đối với sản phẩm bảo hành trên hộp: sản phẩm còn đầy đủ hộp.')}}</p>
                <p class="policy-title">{{__('Sản phẩm không trầy xước, cấn móp, bể, vỡ, biến dạng so với ban đầu.')}}</p>
            </div>
            <div  id="condition-policy" class="">
                <h2>{{ __('NHỮNG SẢN PHẨM KHÔNG ĐỦ ĐIỀU KIỆN BẢO HÀNH') }}</h2>
                <p class="policy-title">{{ __('Hết thời hạn bảo hành.') }}</p>
                <p class="policy-title">{{ __('Không có tem niêm phong, hoặc bị tẩy xóa, không còn nguyên dạng ban đầu.') }}</p>
                <p class="policy-title">{{ __('Bị tác động vật lý làm trầy xước, cong vênh, rạn nứt, bể vỡ trong quá trình quá trình sử dụng.') }}</p>
                <p class="policy-title">{{ __('Bị hư hỏng do tự ý thảo mở, sửa chữa, thay đổi cấu trúc sản phẩm bên trong mà chưa có sự xác nhận đồng ý hoặc giám sát bởi kỹ thuật viên HACOM.') }}</p>
                <p class="policy-title">{{ __('Bị hư hỏng, chập, cháy do sử dụng sai mục đích, tự ý tháo, lắp đặt không tuân theo các hướng dẫn sử dụng đính kèm theo sản phẩm.') }}</p>
                <p class="policy-title">{{ __('Bị hư hỏng do côn trùng xâm nhập (chuột, gián, kiến, mối…).') }}</p>
                <p class="policy-title">{{ __('Bị hư hỏng do thiên tai, hỏa hoạn, lụt lội, sét đánh, rỉ sét, hao mòn do môi trường gây ra.') }}</p>
            </div>
        </div>
    </div>

    <div class="row top1">
        <h1 class="title-top1"> {{ __('Chính sách bảo hành chung') }}</h1>
        <div class="d-flex" id="policy-apply">
            <div class="column height-auto">
                <h2 class="color-primary">{{ __('Sản phẩm đổi mới 100%') }}</h2>
                <p class="policy-title">{{ __('Trong 15 ngày đầu khi phát sinh lỗi từ nhà sản xuất') }}</p>
                <p class="policy-title">{{ __('Sản phẩm phải có đầy đủ vỏ hộp, phụ kiện kèm theo, không bị trầy xước.') }}</p>
                <p class="policy-title">{{ __('Không vi phạm điều kiện bảo hành khác và không phải là vật tư tiêu hao.') }}</p>
                <p class="policy-title">{{ __('Không áp dụng với các sản phẩm: CPU, máy in, máy chiếu, máy photo, máy fax, TV, các sản phẩm của Apple, Surface, máy chơi game Sony, Nintendo, Xbox, hàng thanh lý, hàng cũ,… (nếu lỗi HACOM sẽ tiếp nhận bảo hành sản phẩm)') }}</p>
            </div>
            <div class="column">
                <img class="image" src="{{asset('/images/pc.jpg')}}">
            </div>
        </div>

    </div>

    <div class="row row-top1">
        <h1 class="title-top1"> {{ __('Thưong hiệu uy tín') }}</h1>
        <div class="parent">
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/dell.png')}}">
            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/hp.png')}}">

            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/asus.png')}}">

            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/msi.png')}}">

            </div>
            <div class="child" id="product-poli" >
                <img class="image-pc" src="{{asset('/images/page/samsung.jpg')}}">

            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/apple.png')}}">

            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/gigabyte.png')}}">

            </div>
            <div class="child" id="product-poli">
                <img class="image-pc" src="{{asset('/images/page/kington.png')}}">

            </div>
        </div>

    </div>

</div>
@endsection
