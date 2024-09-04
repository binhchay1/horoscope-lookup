<div class="newsletter">
    <div class="newsletter-area">
        <div class="newsletter-title">
            <p class="newsletter-title">{{ __('ĐĂNG KÝ NHẬN EMAIL THÔNG BÁO KHUYẾN MẠI HOẶC ĐỂ ĐƯỢC TƯ VẤN MIỄN PHÍ') }}</p>
        </div>
        <div class="newsletter-form">
            <input type="text" name="" id="email_newsletter" placeholder="Nhập email hoặc số điện thoại của bạn">
            <a class="footer-subscribe-button" id="news-button-summit">{{ __('Gửi') }}</a>
        </div>
    </div>
</div>

<div class="footer">
    <div class="footer-container">
        <div class="policy-area">
            <div class="policy-item">
                <div class="policy-icon"><i class="fa fa-shipping-fast"></i></div>
                <div class="d-flex flex-column ml-10px">
                    <span class="policy-title">{{ __('CHÍNH SÁCH GIAO HÀNG') }}</span>
                    <span class="policy-content">{{ __('Nhận hàng và thanh toán tại nhà') }}</span>
                </div>
            </div>
            <div class="policy-item">
                <div class="policy-icon"><i class="fa fa-sync"></i></div>
                <div class="d-flex flex-column ml-10px">
                    <span class="policy-title">{{ __('ĐỔI TRẢ DỄ DÀNG') }}</span>
                    <span class="policy-content">{{ __('1 đổi 1 trong 15 ngày') }}</span>
                </div>
            </div>
            <div class="policy-item">
                <div class="policy-icon"><i class="fa fa-credit-card"></i></div>
                <div class="d-flex flex-column ml-10px">
                    <span class="policy-title">{{ __('THANH TOÁN TIỆN LỢI') }}</span>
                    <span class="policy-content">{{ __('Trả tiền mặt, CK, trả góp 0%') }}</span>
                </div>
            </div>
            <div class="policy-item">
                <div class="policy-icon"><i class="fa fa-comments"></i></div>
                <div class="d-flex flex-column ml-10px">
                    <span class="policy-title">{{ __('HỖ TRỢ NHIỆT TÌNH') }}</span>
                    <span class="policy-content">{{ __('Tư vấn, giải đáp mọi thắc mắc') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="footer-middle-content">
            <div class="footer-middle-item">
                <span class="footer-middle-title">{{ __('GIỚI THIỆU') }} KATTECH</span>
                <p><a href="{{ route('introduction') }}">{{ __('Giới thiệu công ty') }}</a></p>
                <p><a href="{{ route('contactBusiness') }}" target="_blank">{{ __('Liên hệ hợp tác kinh doanh') }}</a></p>
                <p><a href="{{ route('post') }}" target="_blank">{{ __('Tin công nghệ') }}</a></p>
                <span class="footer-middle-social">
                    <a href="{{ $social->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $social->youtube ?? '' }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="{{ $social->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </span>
            </div>
            <div class="footer-middle-item">
                <span class="footer-middle-title">{{ __('HỖ TRỢ KHÁCH HÀNG') }}</span>
                <p><a href="{{ route('paymentOnline') }}">{{ __('Hướng dẫn mua hàng trực tuyến') }}</a>
                </p>
                <p><a href="{{ route('payment') }}">{{__('Hướng dẫn thanh toán')}}</a></p>
                <p><a href="{{ route('electronicBill') }}">{{ __('In hóa đơn điện tử') }}</a>
                </p>
                <p><a href="{{ route('complaint') }}">{{ __('Góp ý, Khiếu Nại') }}</a></p>
            </div>
            <div class="footer-middle-item">
                <span class="footer-middle-title">{{ __('CHÍNH SÁCH CHUNG') }}</span>
                <p><a href="{{ route('rules') }}">{{ __('Chính sách, quy định chung') }}</a></p>
                <p><a href="{{ route('policy') }}">{{ __('Chính sách bảo hành') }}</a></p>
                <p><a href="{{ route('businessPolicy') }}">{{ __('Chính sách cho doanh nghiệp') }}</a></p>
                <p><a href="{{ route('productPolicy') }}">{{ __('Chính sách hàng chính hãng') }}</a></p>
                <p><a href="{{ route('securityCustomer') }}">{{ __('Bảo mật thông tin khách hàng') }}</a></p>
            </div>
            <div class="footer-middle-item">
                <span class="footer-middle-title">{{ __('THÔNG TIN KHUYẾN MẠI') }}</span>
                <p><a href="{{ route('promotion') }}" target="_blank">{{ __('Thông tin khuyến mại') }}</a></p>
                </p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>{{__('© 2021 Công ty Cổ phần đầu tư công nghệ Kattech PC')}}</p>
            <p>{{__('Địa chỉ: Tòa nhà Vicom')}} </p>
            <p>{{__('GPĐKKD số 0101142131 do Sở KHĐT Tp.Hà Nội cấp ngày 12/9/2023')}}</p>
            <p>Email: <a class="color-primary" href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>. {{ __('Điện thoại') }}: <a class="color-primary" href="tel:{{ config('company.hotline') }}">{{ config('company.hotline') }}</a></p>
        </div>
    </div>
</div>
<div id="toolbar-menu-mobile" class="toolbar-menu-mobile  d-xl-none d-lg-none hSticky hSticky-nav hSticky-up bottomMenu">
    <ul>
        @if(Auth::check())
        <li class="item">
            <a href="{{ route('profile') }}">
                <span class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <span>{{ Auth::user()->name }}</span>
            </a>
        </li>
        @else
        <li class="item">
            <a href="{{ route('login') }}">
                <span class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <span>{{ __('Khách hàng') }}</span>
            </a>
        </li>
        @endif
        <li class="item">
            <a href="{{ route('showCart') }}" class="js-click-menu-mb" id="">
                <span class="icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </span>
                <span>{{ __('Giỏ hàng') }}</span>
            </a>
        </li>
        <li class="item ">
            <a href="{{ route('post') }}">
                <span class="icon">
                    <i class="fa fa-newspaper" aria-hidden="true"></i>
                </span>
                <span>{{ __('Tin tức') }}</span>
            </a>
        </li>
        <li class="item">
            <a href="{{ $social->youtube ?? '' }}">
                <span class="icon" style="display: flex !important; margin-bottom: 5px;">
                    <svg width="39" height="35" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5284 1.31948C16.0412 0.967549 14.6837 0.5 8.99522 0.5C2.89942 0.5 1.99504 1.03692 1.7048 1.2126C0.160125 2.14402 0.0134681 6.26764 0 7.10376C0.0185428 8.20809 0.196385 11.8822 1.70369 12.7911C1.99337 12.9662 2.89268 13.5 8.99522 13.5C14.6873 13.5 16.0432 13.0347 16.5284 12.6842C17.8449 11.7336 17.9963 8.45989 18 7.08941C17.9966 5.98737 17.8814 2.29774 16.5284 1.3195L16.5284 1.31948ZM15.8721 11.7688C15.6763 11.9104 14.5518 12.372 8.99519 12.372C3.62312 12.372 2.49594 11.9535 2.28298 11.8246C1.74074 11.4981 1.16844 9.76467 1.12351 7.10066C1.1679 4.44256 1.74806 2.50215 2.28414 2.17955C2.49766 2.05011 3.62903 1.62825 8.99519 1.62825C14.5474 1.62825 15.6748 2.09299 15.8721 2.23512C16.3533 2.5831 16.8686 4.41495 16.8762 7.09306C16.8686 9.81319 16.35 11.4237 15.8721 11.7688H15.8721ZM12.6597 6.55639L7.60369 3.44229C7.51846 3.3907 7.4211 3.36276 7.32158 3.36133C7.22206 3.35989 7.12395 3.38501 7.03727 3.43411C6.95052 3.48322 6.87832 3.55459 6.82807 3.6409C6.77782 3.72721 6.75131 3.82538 6.75127 3.92535V10.1546C6.75134 10.3042 6.81056 10.4476 6.91593 10.5534C7.02129 10.6591 7.16417 10.7185 7.31317 10.7186C7.41544 10.7186 7.51577 10.6907 7.60337 10.6377L12.6594 7.52249C12.828 7.42014 12.9311 7.23714 12.9311 7.03944C12.9311 6.84175 12.8282 6.65819 12.6597 6.55639H12.6597ZM7.87537 9.15552V4.92388L11.2819 7.03941L7.87537 9.15552Z" fill="currentcolor"></path>
                    </svg>
                </span>
                <span>Youtube</span>
            </a>
        </li>
    </ul>
</div>
@include('includes.modal-submit-get-news')
