@extends('layouts.page')

@section('title')
<title>{{ $promotion->title }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/promotion-detail.css') }}" />
<style>
    .promotion-releated {
        padding: 10px;
    }
</style>
@endsection

@section('description', __($promotion->short_description . 'với Kattech PC'))
@section('keywords', 'promotion, flash sale, sale, kattechpc, kattech')
@section('breadcrumb', $promotion->title)

@section('content')
<div class="content-promotion d-flex">
    <div class="leftColumn">
        <div class="content-inside-promotion">
            <div class="card" style="flex-direction: column; justify-content: center;">
                <div class="flex-direction-column">
                    <div class="d-flex justify-content-center flex-direction-column">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset($promotion->image) }}" style="width: 100%;">
                        </div>

                        <h1 style="font-size: 24px; margin: 0; text-align: center;">{{ $promotion->title }}</h1>
                    </div>

                    <div class="d-flex flex-direction-column justify-content-center text-center">
                        <p>{{ date_format($promotion->created_at, "F j, Y, g:i a") }}</p>
                        <p>{{ $promotion->short_description }}</p>
                    </div>
                </div>
            </div>

            <div style="font-size: 16px;">
                {!! $promotion->content !!}
            </div>
        </div>

        <div class="sapo-promotion">
            <p style="text-align: justify;"><span style="font-size: 12pt;"><strong>Lưu ý:</strong></span></p>
            <p><span style="font-size: 12pt;"><em>👉 Áp dụng cho tất cả các sản phẩm Laptop trừ Apple, Surface</em></span></p>
            <p><span style="font-size: 12pt;"><em>👉 KH chỉ được hưởng 1 chương trình KM trừ tiền (nếu có) - áp dụng song song với chương trình sinh viên</em></span></p>
            <p><span style="font-size: 12pt;"><em>👉 Khách hàng vẫn được hưởng các chương trình khuyến mại tặng quà khác (nếu có)</em></span></p>
            <p><span style="font-size: 12pt;"><strong>Kattech cam kết</strong></span></p>
            <p><span style="font-size: 12pt;">👍 100% sản phẩm chính hãng</span></p>
            <p><span style="font-size: 12pt;">👍 100% giá cạnh tranh so với thị trường</span></p>
            <p><span style="font-size: 12pt;"><strong>Hình thức giao hàng, dịch vụ bảo hành và chăm sóc khách hàng tại Kattech</strong></span></p>
            <p><span style="font-size: 12pt;">- <a href="{{route('policy')}}" target="_blank">Đổi mới sản phẩm đến 30 ngày</a></span></p>
            <p><span style="font-size: 12pt;">- Khách hàng đặt hàng sẽ được nhân viên Kattech giao hàng hoặc nhận qua dịch vụ chuyển phát nhanh</span></p>
            <p><span style="font-size: 12pt;">- Giao hàng nhanh trong nội thành Hà Nội trong vòng 2H</span></p>
            <p><span style="font-size: 12pt;">- <a href="{{route('policy')}}" target="_blank">Bảo hành chính hãng 100%, bảo hành tại nơi sử dụng</a></span></p>
            <p><span style="font-size: 12pt;">- Đội ngũ chăm sóc khách hàng sẵn sàng giải đáp mọi thắc mắc</span></p>
            <p><span style="font-size: 12pt;">- Các sản phẩm sẽ có hướng dẫn lắp đặt, sử dụng từ đội ngũ kĩ thuật qua kênh tin tức, video</span></p>
            <p><span style="font-size: 12pt;">- Shipper luôn đeo khẩu trang đảm bảo an toàn</span></p>
            <p><span style="font-size: 12pt;"><em>&gt;&gt;Xem thêm các chương trình khuyến mãi hấp dẫn khác </em><strong><a href="{{route('promotion')}}" target="_blank">tại đây</a></strong></span></p>

            <p><span style="font-size: 12pt;"><strong>Để biết thêm thông tin chi tiết, Quý khách vui lòng xem chi tiết trên từng sản phẩm, tới hệ thống showroom Kattech hoặc liên hệ hotline 1900 2164 (ext 1)</strong></span></p>
            <p><span style="font-size: 12pt;"><strong>Tới <a href="{{route('home')}}" target="_blank">Kattech</a> để được tư vấn và sở hữu các sản phẩm công nghệ</strong></span></p>
            <p><span style="font-size: 12pt; color: red;"><strong>Kattech PC - HÀNG CHÍNH HÃNG - GIÁ LUÔN TỐT NHẤT!!!</strong></span></p>
            <p><span style="font-size: 12pt; color: red;"><strong>HOTLINE: {{ config('company.hotline') }}</strong></span></p>
            <p><span style="font-size: 12pt; color: red;"><strong>Hệ thống Showroom Kattech:</strong></span></p>
            <p><span style="font-size: 12pt;"><strong>* Trụ sở chính:</strong> 15 Xã Đàn, Đống Đa, Hà Nội ✆ Tel: {{ config('company.hotline') }}</span></p>
        </div>

    </div>

    <div class="rightColumn">
        <div class="new-read-late">
            <h3 id="title-post"> {{ __('Khuyến mại gần đây') }}</h3>
            @foreach($listPromotion as $key => $promotionNews)

            @if($promotion->id == $promotionNews->id)
            @continue
            @endif

            @if($key > 3)
            @break
            @endif
            <div>
                <div>
                    <img src="{{  asset( $promotionNews->image ?? 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div>
                    <a href="{{ route('promotion.detail', $promotionNews['slug']) }}">
                        <h3> {{$promotionNews->title}}</h3>
                    </a>

                </div>
                <span id="post-des">{{$promotionNews->short_description}}</span>
            </div>
            @endforeach
        </div>

        <div class="new-relate">
            <h3 id="title-post"> {{ __('Tin công nghệ gần đây') }}</h3>
            @if($firstPosts1 != null)
            <div>
                <div>
                    <img src="{{ $firstPosts1->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div>
                    <h3> {{$firstPosts1->title}}</h3>
                </div>
            </div>
            @endif
            @if($postRandom)
            @foreach($postRandom as $key1 => $post)
            @if($key1 > 3)
            @break
            @endif
            <div id="content">
                <div id="left">
                    <img src="{{ $post->thumbnail ?? asset( 'images/page/no-image.png') }}" alt="Image Alt" class="image-post" />
                </div>
                <div id="content-right">
                    <?php $text = \Illuminate\Support\Str::limit($post->short_description, 80) ?>
                    <a href="{{ route('post.detail', $post['slug']) }}">
                        <h3> {{$text}}</h3>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
