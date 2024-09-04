@extends('layouts.page')

@section('title')
<title>{{ __('Chính sách hàng chính hãng') }} | Kattech PC</title>
@endsection

@section('description', __('Chính sách hàng chính hãng với Kattech PC'))
@section('keywords', 'product policy, policy, genuine product policy, kattechpc, kattech')
@section('breadcrumb', __('Chính sách hàng chính hãng'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/product-policy.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="column">
            <h1>{{__('CHÍNH SÁCH HÀNG CHÍNH HÃNG')}}</h1>
            <h2>{{__('CAM KẾT GIÁ TỐT NHẤT THỊ TRƯỜNG')}}</h2>
        </div>
        <div class="column">
            <img class="image-pc" src="{{asset('/images/page/pc-setup.jpg')}}">
        </div>
    </div>

    <div class=" top">
        <h1 class="text"> {{__('CAM KẾT VỀ CHẤT LƯỢNG SẢN PHẨM')}}</h1>
        <img class="image-pc" src="{{asset('/images/page/1501_chinh-hang.jpg')}}">
    </div>

    <div>
        <h3>{{__('Với sự tự tin tuyệt đối vào chất lượng và nguồn gốc sản phẩm, KATTECH xin tự hào cam kết: nếu sản phẩm có bất kỳ thông số kỹ thuật,
             mẫu mã, chất lượng không đúng với các thông số của hãng, của nhà sản xuất,
             chúng tôi sẽ hoàn trả lại 100% số tiền đã thanh toán cho quý khách trong thời hạn 3 ngày kể từ ngày khách hàng mua sản phẩm và còn giữ đầy đủ vỏ hộp, không trầy xước.')}}
        </h3>
        <h3>{{__('Các cơ chế bảo hành của KATTECH và bảo hành 1 đổi 1 trong vòng 15 ngày vui lòng xem tại: ')}}
        </h3>
    </div>

    <div class=" top">
        <h1 class="text"> {{__('ĐỐi TÁC TIN CẬY')}}</h1>
    </div>
    <div>
        <h3>{{__('KATTECH hiện là đối tác chiến lược, nhà phân phối chính hãng của các thương hiệu công nghệ hàng đầu thế giới như: Intel, AMD, Samsung, Acer, ASUS, Gigabyte, MSI, Dell, HP, Lenovo,
            Microsoft, LG, FPS, Kingfast,... và rất nhiều các thương hiệu lớn khác. Tất cả các sản phẩm được bán tại KATTECH đều nhận được giấy phép ủy quyền chính hãng, giấy tờ chứng minh nguồn gốc xuất xứ, cơ sở sản xuất cũng như đầy đủ các loại giấy tờ pháp lý khác.')}}
        </h3>
    </div>

    <div class=" top1">
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

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
