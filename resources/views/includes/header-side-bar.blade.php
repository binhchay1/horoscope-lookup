<div class="main-menu-category">
    <div class="header-menu-mobile">
        <span class="close-mn" onclick="closeMenuMobile()">X</span>
        <a href="/" class="logo-menu" style="margin-left: 80px;">
            <img src="{{ asset('images/logo/logo.png') }}" width="100" height="100" alt="Logo Kattech PC">
        </a>

        <div class="d-flex">
            <div class="build-area" style="display: block;">
                <a href="{{ route('buildPC') }}">
                    <i class="fa fa-screwdriver" style="background: white; color: black"></i>
                </a>
            </div>

            <div class="cart-area" style="margin-left: 10px;">
                <a href="{{ route('showCart') }}">
                    <i class="fa badge" style="background: white; color: black" value="{{ count(Cart::getContent()) }}">&#xf07a;</i> <span></span>
                </a>
            </div>
        </div>
    </div>
    <ul class="list-category-menu-mobile">
        @foreach($listCategory['default'] as $category)
        @if($category->status == 0 && $category->parent != 0)
        @continue
        @endif
        <li class="list-items">
            <a href="{{ route('showDataCategory', $category->slug) }}" class="cat-1">
                <img class="lazy icon-menu entered loaded" alt="{{ $category->name }}" width="1" height="1" src="{{ asset($category->image) }}">
                <span class="cat-title line-clamp-1">{{ $category->name }}</span>
            </a>
            <span class="icon-right" onclick="handleSideBar($(this))"></span>
            <ul class="list-items-sub">
                @if(isset($category->children) and count($category->children) > 0)
                <li class="sub-items">
                    <a class="lv2">CHỌN THEO NHU CẦU</a>
                    <span class="icon-right item-lv2 item-lv" onclick="handleSideBar($(this))"></span>
                    <div class="sub-menu-lv3">
                        @foreach($category->children as $categoryChild)
                        <a href="{{ route('showDataCategory', $categoryChild['slug']) }}" class="lv3">{{ $categoryChild->name }}</a>
                        @endforeach
                    </div>
                </li>
                @endif
                <li class="sub-items">
                    <a class="lv2">{{ __('CHỌN THEO KHOẢNG GIÁ') }}</a>
                    <span class="icon-right item-lv2 item-lv" onclick="handleSideBar($(this))" aria-hidden="true"></span>
                    <div class="sub-menu-lv3">
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=duoi-10trieu" class="lv3">{{ __('Dưới 10 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-10trieu-15trieu" class="lv3">{{ __('10 Triệu - 15 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-15trieu-20trieu" class="lv3">{{ __('15 Triệu - 20 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-20trieu-30trieu" class="lv3">{{ __('20 Triệu - 30 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-30trieu-50trieu" class="lv3">{{ __('30 Triệu - 50 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tu-50trieu-100trieu" class="lv3">{{ __('50 Triệu - 100 Triệu') }}</a>
                        <a href="{{ route('showDataCategory', $category->slug) }}?price=tren-100trieu" class="lv3">{{ __('Trên 100 Triệu') }}</a>
                    </div>
                </li>

                <li class="sub-items">
                    @if(array_key_exists('brand', $listCategory))
                    @if(array_key_exists($category->name, $listCategory['brand']))
                    <a class="lv2">{{ __('CHỌN THEO HÃNG') }}</a>
                    <span class="icon-right item-lv2 item-lv" onclick="handleSideBar($(this))" aria-hidden="true"></span>
                    <div class="sub-menu-lv3">
                        @foreach($listCategory['brand'][$category->name] as $categoryBrand)
                        <a href="{{ route('showDataCategory', $category->slug) }}?brand={{ $categoryBrand }}" class="lv3">{{ $categoryBrand }}</a>
                        @endforeach
                    </div>
                    @endif
                    @endif
                </li>

                @if(array_key_exists('keyword', $listCategory))
                @if(array_key_exists($category->name, $listCategory['keyword']))
                @foreach($listCategory['keyword'][$category->name] as $title => $listKeyword)
                <li class="sub-items">
                    <a class="lv2">{{ __('CHỌN THEO') }} {{ $title }}</a>
                    <span class="icon-right item-lv2 item-lv" onclick="handleSideBar($(this))" aria-hidden="true"></span>
                    <div class="sub-menu-lv3">
                        @foreach($listKeyword as $keyword)
                        <a href="{{ route('showDataCategory', $category->slug) }}?{{ $title }}={{ $keyword }}" class="lv3">{{ $keyword }}</a>
                        @endforeach
                    </div>
                </li>
                @endforeach
                @endif
                @endif
            </ul>
        </li>
        @endforeach
        <hr>
        <li class="list-items no-border" style="margin-top: 20px"><a href="{{ route('home') }}"><i class="fa fa-home"></i>{{__("Trang chủ")}}</a></li>
        <li class="list-items no-border"><a href="{{ route('post') }}"><i class="fa fa-newspaper"></i>{{__("Tin công nghệ")}}</a></li>
        <li class="list-items no-border"><a href="{{ route('payment') }}"><i class="fa fa-money-check"></i>{{__("Hướng dẫn thanh toán")}}</a></li>
        <li class="list-items no-border"><a href="{{ route('policy') }}"><i class="fa fa-shield-alt"></i>{{__("Chính sách bảo hành")}}</a></li>
        <li class="list-items no-border">
            @if(Auth::check())
            <div class="dropdown">
                <a class="sep-item-link" style="width: 608px;" target="_blank"><i class="fa fa-user"></i> {{ __('Tài khoản') }}</a>
                <div class="dropdown-content">
                    <a href="{{ route('profile') }}">{{ __('Tài khoản') }}</a>
                    <a href="{{ route('orderHistory') }}">{{ __('Lịch sử mua hàng') }}</a>
                    <form method="POST" action="{{ route('logout') }}" style="cursor: pointer;">
                        @csrf
                        <a class="sep-item-link" onclick="this.closest('form').submit();return false;">
                            {{ __('Đăng xuất') }}
                        </a>
                    </form>
                </div>
            </div>
            @else
            <div>
                <a href="{{ route('register') }}" class="sep-item-link" target="_blank"><i class="fa fa-user"></i> {{ __('Đăng ký') }}</a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="sep-item-link" target="_blank"><i class="fa fa-user"></i> {{ __('Đăng nhập') }}</a>
            </div>
            @endif
        </li>
        <li class="list-items no-border">
            <a href="tel:{{ config('company.hotline') }}" style="color: red; display: flex">
                <span>
                    <svg width="22" height="22" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.37476 11.9262H3.24976C2.00711 11.9262 0.999756 12.9386 0.999756 14.1876V17.5797C0.999756 18.8286 2.00711 19.8411 3.24976 19.8411H4.37476C5.6174 19.8411 6.62475 18.8286 6.62475 17.5797V14.1876C6.62475 12.9386 5.6174 11.9262 4.37476 11.9262Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.7497 11.9264H15.6247C14.3821 11.9264 13.3747 12.9389 13.3747 14.1878V17.5799C13.3747 18.8289 14.3821 19.8413 15.6247 19.8413H16.7497C17.9923 19.8413 18.9997 18.8289 18.9997 17.5799V14.1878C18.9997 12.9389 17.9923 11.9264 16.7497 11.9264Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M1 14.1876V10.7955C1 8.39644 1.94821 6.09564 3.63604 4.39925C5.32387 2.70287 7.61305 1.74985 10 1.74985C12.3869 1.74985 14.6761 2.70287 16.364 4.39925C18.0518 6.09564 19 8.39644 19 10.7955V14.1876" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8.19063 23.9014C5.34558 24.0148 1.68793 22.801 1.86299 19.2078L3.79676 19.2078C3.79676 21.729 5.88816 22.4163 8.19063 22.2935C8.25136 21.9719 8.52587 21.729 8.85602 21.729H11.7511C12.1258 21.729 12.3484 22.2388 12.3484 22.6244V23.5522C12.3484 23.9377 12.0447 24.2502 11.67 24.2502H8.77488C8.5245 24.2502 8.30818 24.1093 8.19063 23.9014Z" fill="currentColor"></path>
                    </svg>
                </span>
                <span class="text" style="font-size: 20px; margin-left: 15px">{{ config('company.hotline') }}</span>
            </a>
        </li>
    </ul>
</div>
