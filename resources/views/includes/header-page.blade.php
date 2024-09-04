<div class="header">
    <div class="header-top">
        <div class="header-top-container">
            <div class="header-top-left">
                <span class="header-top-hotline"> {{ __('Gọi mua hàng:') }} <span class="hotline"><a href="tel:{{ str_replace('.', '',config('company.hotline')) }}">{{ config('company.hotline') }}</a></span> <i class="fa fa-phone"></i></span>
                <div class="sub">
                    <div class="item"><span class="hotline-number">{{ __('Đường dây') }} 1</span><span>{{ __('Khách hàng Doanh nghiệp') }} (8h-24h)</span></div>
                    <div class="item"><span class="hotline-number">{{ __('Đường dây') }} 2</span><span>{{ __('Khách hàng Cá nhân') }} (8h-24h)</span></div>
                    <div class="item"><span class="hotline-number">{{ __('Đường dây') }} 3</span><span>{{ __('Hỗ trợ Kỹ thuật') }} (8h-21h)</span></div>
                    <div class="item"><span class="hotline-number">{{ __('Đường dây') }} 4</span><span>{{ __('Hỗ trợ Bảo hành') }} (8h-17h30)</span></div>
                    <div class="item"><span class="hotline-number">{{ __('Đường dây') }} 0</span><span>{{ __('Chăm sóc Khách hàng') }} (8h-19h)</span></div>
                </div>
                <span class="header-map-marker" id="open-modal-map">
                    <i class="fa fa-map-marker-alt"></i>
                </span>
            </div>
            <span>
                <marquee width="600" id="marquee-header">
                    {{ __('Đến với Kattech PC chúng tôi đảm bảo sản phẩm luôn có giá tốt nhất thị trường') }}
                </marquee>
            </span>
            <div class="header-top-right">
                <div>
                    <a href="{{ route('policy') }}" class="sep-item-link" target="_blank"><i class="fa fa-pen"></i> {{ __('Chính sách bảo hành') }}</a>
                </div>
                <div class="ml-15px dropdown">
                    <a class="sep-item-link" target="_blank"><i class="fa fa-wrench"></i> {{ __('Chính sách hỗ trợ') }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('rules') }}">{{ __('Quy định chung của công ty') }}</a>
                        <a href="{{ route('businessPolicy') }}">{{ __('Chính sách doanh nghiệp') }}</a>
                        <a href="{{ route('productPolicy') }}">{{ __('Chính sách hàng chính hãng') }}</a>
                        <a href="{{ route('complaint') }}">{{ __('Khiếu nại') }}</a>
                    </div>
                </div>
                <div class="ml-15px">
                    <a href="{{ route('promotion') }}" class="sep-item-link" target="_blank"><i class="fa fa-tag"></i> {{ __('Khuyến mại') }}</a>
                </div>
                @if(auth()->check())
                <div class="ml-15px dropdown">
                    <a class="sep-item-link" target="_blank"><i class="fa fa-user"></i> {{ __('Tài khoản') }}</a>
                    <div class="dropdown-content">
                        <a href="{{ route('profile') }}">{{ __('Tài khoản') }}</a>
                        <a href="{{ route('orderHistory') }}">{{ __('Lịch sử mua hàng') }}</a>
                        <form method="POST" action="{{ route('logout') }}" style="cursor: pointer;">
                            @csrf
                            <a class="sep-item-link" onclick="this.closest('form').submit();return false;">
                                {{__('Đăng xuất')}}
                            </a>
                        </form>
                    </div>
                </div>
                @else
                <div class="ml-15px">
                    <a href="/register" class="sep-item-link" target="_blank"><i class="fa fa-address-book"></i> {{ __('Đăng ký') }}</a>
                </div>
                <div class="ml-15px">
                    <a href="/login" class="sep-item-link" target="_blank"><i class="fa fa-home"></i> {{ __('Đăng nhập') }}</a>
                </div>
                @endif

                @if(auth()->check())
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
                <div class="ml-15px">
                    <a href="{{ route('admin.dashboard') }}" class="sep-item-link" target="_blank"><i class="fa fa-chart-line"></i> {{ __('Dashboard') }}</a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container-hamburger">
            <div class="row-hamburger">
                <div class="test">
                    <div class="columna">
                        <div class="menu-btn">
                            <i class="fa fa-bars" id="btn-toggle"></i>
                        </div>
                    </div>
                    <div class="columnb">
                        <div class="wrap1">
                            <form method="get" action="{{ route('search') }}">
                                <div class="search">
                                    <input type="text" name="q" class="searchTerm inline-search-mobile-scroll" placeholder="Nhập  sản phẩm, từ khóa cần tìm">
                                    <button type="submit" class="searchButton">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>

                            <div class="autocomplete-suggestions list" id="js-search-result-mobile-scroll">
                                <div class="list">

                                </div>
                            </div>
                        </div>
                        <div class="wrap">
                            <form method="get" action="{{ route('search') }}">
                                <div class="search">
                                    <input type="text" name="q" class="searchTerm inline-search-mobile" placeholder="Nhập  sản phẩm, từ khóa cần tìm">
                                    <button type="submit" id="custom_search" class="searchButton">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>

                            <div class="autocomplete-suggestions list" id="js-search-result-mobile">
                                <div class="list">

                                </div>
                            </div>
                        </div>
                        <div class="logo" id="scroll-logo">
                            <a href="/">
                                <img src="{{ asset('/images/logo/logo.png') }}" width="90" alt="logo Kattech PC" class="loading">
                            </a>
                        </div>
                    </div>
                    <div class="columnc">
                        <div class="build-area" style="display: block;">
                            <a href="{{ route('buildPC') }}">
                                <i class="fa fa-screwdriver"></i>
                            </a>
                        </div>
                        <div class="cart-area ml-20px">
                            <a href="{{ route('showCart') }}">
                                <i style="width: 40px;" class="fa badge" value="{{ count(Cart::getContent()) }}">&#xf07a;</i> <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom-container">
            <div class="logo" id="hidden-logo">
                <a href="/">
                    <img src="{{ asset('/images/logo/logo.png') }}" alt="logo Kattech PC" width="150" height="150" class="loading">
                </a>
            </div>

            <div class="search-area">
                <div class="input-search">
                    <form name="search" method="get" action="{{ route('search') }}">
                        <div class="input-text"><input type="text" name="q" class="inline-search" placeholder="Nhập tên sản phẩm, từ khóa cần tìm" autocomplete="off" field_signature="1012080445"></div>
                        <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
                    </form>

                    <div class="autocomplete-suggestions list" id="js-search-result">
                        <div class="list">

                        </div>
                    </div>
                </div>
            </div>

            <div class="action-area d-flex ml-20px">
                <div class="build-area">
                    <a href="{{ route('buildPC') }}">
                        <i class="fa fa-screwdriver"></i>
                        <span style="font-weight: 600">{{ __('Xây Dựng Cấu Hình') }}</span>
                    </a>
                </div>
                <div class="cart-area ml-20px">
                    <a href="{{ route('showCart') }}">
                        <i class="fa badge" value="{{ count(Cart::getContent()) }}">&#xf07a;</i> <span style="font-weight: 600">{{ __('Giỏ Hàng') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sub-header">
    <div class="container-fluid">
        <div class="d-lg-block d-xl-block">
            <ul class="list-submenu list-submenu--desktop">
                <li class="item-submenu sm-1">
                    @include('includes.home-page-menu')
                </li>
                <li class="item-submenu sm-2">
                    <a href="{{ route('post') }}">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 3.25H17.875C18.1734 3.25 18.4595 3.36853 18.6705 3.5795C18.8815 3.79048 19 4.07663 19 4.375V16.75C19 17.3467 18.7629 17.919 18.341 18.341C17.919 18.7629 17.3467 19 16.75 19M16.75 19C16.1533 19 15.581 18.7629 15.159 18.341C14.7371 17.919 14.5 17.3467 14.5 16.75V2.125C14.5 1.82663 14.3815 1.54048 14.1705 1.32951C13.9595 1.11853 13.6734 1 13.375 1H2.125C1.82663 1 1.54048 1.11853 1.32951 1.32951C1.11853 1.54048 1 1.82663 1 2.125V15.625C1 16.5201 1.35558 17.3786 1.98851 18.0115C2.62145 18.6444 3.47989 19 4.375 19H16.75Z" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M4 11.5L11 11.5" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M4 15L11 15" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <rect x="4" y="5" width="7" height="3" rx="1" stroke="currentcolor"></rect>
                            </svg>
                        </span>
                        <span class="text">{{ __('Tin công nghệ') }}</span>
                    </a>
                </li>
                <li class="item-submenu sm-3">
                    <a href="https://www.youtube.com/@kattechpc">
                        <span class="icon">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5284 1.31948C16.0412 0.967549 14.6837 0.5 8.99522 0.5C2.89942 0.5 1.99504 1.03692 1.7048 1.2126C0.160125 2.14402 0.0134681 6.26764 0 7.10376C0.0185428 8.20809 0.196385 11.8822 1.70369 12.7911C1.99337 12.9662 2.89268 13.5 8.99522 13.5C14.6873 13.5 16.0432 13.0347 16.5284 12.6842C17.8449 11.7336 17.9963 8.45989 18 7.08941C17.9966 5.98737 17.8814 2.29774 16.5284 1.3195L16.5284 1.31948ZM15.8721 11.7688C15.6763 11.9104 14.5518 12.372 8.99519 12.372C3.62312 12.372 2.49594 11.9535 2.28298 11.8246C1.74074 11.4981 1.16844 9.76467 1.12351 7.10066C1.1679 4.44256 1.74806 2.50215 2.28414 2.17955C2.49766 2.05011 3.62903 1.62825 8.99519 1.62825C14.5474 1.62825 15.6748 2.09299 15.8721 2.23512C16.3533 2.5831 16.8686 4.41495 16.8762 7.09306C16.8686 9.81319 16.35 11.4237 15.8721 11.7688H15.8721ZM12.6597 6.55639L7.60369 3.44229C7.51846 3.3907 7.4211 3.36276 7.32158 3.36133C7.22206 3.35989 7.12395 3.38501 7.03727 3.43411C6.95052 3.48322 6.87832 3.55459 6.82807 3.6409C6.77782 3.72721 6.75131 3.82538 6.75127 3.92535V10.1546C6.75134 10.3042 6.81056 10.4476 6.91593 10.5534C7.02129 10.6591 7.16417 10.7185 7.31317 10.7186C7.41544 10.7186 7.51577 10.6907 7.60337 10.6377L12.6594 7.52249C12.828 7.42014 12.9311 7.23714 12.9311 7.03944C12.9311 6.84175 12.8282 6.65819 12.6597 6.55639H12.6597ZM7.87537 9.15552V4.92388L11.2819 7.03941L7.87537 9.15552Z" fill="currentcolor"></path>
                            </svg>
                        </span>
                        <span class="text">{{ __('Video') }}</span>
                    </a>
                </li>
                <li class="item-submenu sm-4">
                    <a href="{{ route('payment') }}">
                        <span class="icon"><svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="0.5" width="18" height="13" rx="2.5" stroke="currentcolor"></rect>
                                <rect x="1.25" y="3" width="18" height="2" fill="currentcolor"></rect>
                            </svg>
                        </span>
                        <span class="text">{{ __('Hướng dẫn thanh toán') }}</span>
                    </a>
                </li>
                <li class="item-submenu sm-6">
                    <a href="{{ route('policy') }}">
                        <span class="icon">
                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.95771 1.78875C3.86924 2.08404 2.78817 2.40514 1.71543 2.75175C1.61748 2.78298 1.5304 2.84067 1.46413 2.91824C1.39785 2.99581 1.35504 3.09015 1.34058 3.1905C0.707434 7.86713 2.17029 11.2793 3.91543 13.527C4.6543 14.4882 5.53532 15.335 6.52914 16.0391C6.92457 16.3136 7.27428 16.5116 7.54971 16.6388C7.68685 16.7029 7.79885 16.7456 7.88457 16.7715C7.92205 16.7844 7.9607 16.7939 7.99999 16.7996C8.03882 16.7934 8.07705 16.784 8.11428 16.7715C8.20114 16.7456 8.31314 16.7029 8.45028 16.6388C8.72457 16.5116 9.07542 16.3125 9.47085 16.0391C10.4647 15.335 11.3457 14.4882 12.0846 13.527C13.8297 11.2804 15.2926 7.86713 14.6594 3.1905C14.6451 3.0901 14.6023 2.99571 14.536 2.91811C14.4697 2.84052 14.3826 2.78287 14.2846 2.75175C13.5406 2.51213 12.2846 2.12175 11.0423 1.78987C9.77371 1.45125 8.60685 1.20038 7.99999 1.20038C7.39428 1.20038 6.22628 1.45012 4.95771 1.78875ZM4.65371 0.63C5.89371 0.298125 7.21142 0 7.99999 0C8.78856 0 10.1063 0.298125 11.3463 0.63C12.6148 0.9675 13.8937 1.36687 14.6457 1.60875C14.9601 1.71096 15.2389 1.8984 15.4499 2.14954C15.661 2.40068 15.7958 2.70533 15.8388 3.0285C16.52 8.06513 14.9394 11.7979 13.0217 14.2673C12.2085 15.3236 11.2388 16.2538 10.1451 17.0269C9.76695 17.2944 9.36626 17.5296 8.94742 17.73C8.62742 17.8785 8.28342 18 7.99999 18C7.71657 18 7.37371 17.8785 7.05257 17.73C6.63373 17.5296 6.23303 17.2944 5.85486 17.0269C4.76117 16.2538 3.79152 15.3236 2.97829 14.2673C1.06058 11.7979 -0.519993 8.06513 0.161149 3.0285C0.20422 2.70533 0.339026 2.40068 0.550082 2.14954C0.761137 1.8984 1.03988 1.71096 1.35429 1.60875C2.44594 1.25641 3.54606 0.930065 4.65371 0.63Z" fill="currentcolor"></path>
                                <path d="M11.2618 5.78928C11.315 5.84153 11.3572 5.9036 11.386 5.97194C11.4148 6.04028 11.4297 6.11354 11.4297 6.18753C11.4297 6.26152 11.4148 6.33478 11.386 6.40312C11.3572 6.47145 11.315 6.53353 11.2618 6.58578L7.83322 9.96078C7.78014 10.0132 7.71708 10.0547 7.64765 10.0831C7.57823 10.1114 7.50381 10.126 7.42865 10.126C7.35348 10.126 7.27906 10.1114 7.20964 10.0831C7.14021 10.0547 7.07715 10.0132 7.02407 9.96078L5.30979 8.27328C5.25666 8.22098 5.21452 8.15889 5.18576 8.09056C5.15701 8.02223 5.14221 7.94899 5.14221 7.87503C5.14221 7.80107 5.15701 7.72783 5.18576 7.6595C5.21452 7.59117 5.25666 7.52908 5.30979 7.47678C5.36292 7.42448 5.42599 7.38299 5.49541 7.35469C5.56483 7.32639 5.63923 7.31182 5.71436 7.31182C5.7895 7.31182 5.8639 7.32639 5.93331 7.35469C6.00273 7.38299 6.0658 7.42448 6.11893 7.47678L7.42865 8.76715L10.4526 5.78928C10.5057 5.73689 10.5688 5.69533 10.6382 5.66698C10.7076 5.63862 10.782 5.62402 10.8572 5.62402C10.9324 5.62402 11.0068 5.63862 11.0762 5.66698C11.1456 5.69533 11.2087 5.73689 11.2618 5.78928Z" fill="currentcolor"></path>
                            </svg>
                        </span>
                        <span class="text">{{ __('Chính sách bảo hành') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="sub-header-scroll">
    <div class="container-fluid">
        <div class="d-lg-block d-xl-block">
            <ul class="list-submenu list-submenu--desktop">
                <li class="item-submenu">
                    @include('includes.home-page-menu')
                </li>
                <li class="item-submenu" style="width: 640px;">
                    <div class="search-area">
                        <div class="input-search">
                            <form name="search" method="get" action="{{ route('search') }}">
                                <div class="input-text"><input type="text" name="q" class="inline-search-scroll" placeholder="Nhập tên sản phẩm, từ khóa cần tìm" autocomplete="off" field_signature="1012080445"></div>
                                <button type="submit" class="button-search"><i class="fa fa-search" style="color: #fff"></i></button>
                            </form>

                            <div class="autocomplete-suggestions list" id="js-search-result-scroll">
                                <div class="list">

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item-submenu">
                    <a href="{{ route('post') }}">
                        <span class="icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 3.25H17.875C18.1734 3.25 18.4595 3.36853 18.6705 3.5795C18.8815 3.79048 19 4.07663 19 4.375V16.75C19 17.3467 18.7629 17.919 18.341 18.341C17.919 18.7629 17.3467 19 16.75 19M16.75 19C16.1533 19 15.581 18.7629 15.159 18.341C14.7371 17.919 14.5 17.3467 14.5 16.75V2.125C14.5 1.82663 14.3815 1.54048 14.1705 1.32951C13.9595 1.11853 13.6734 1 13.375 1H2.125C1.82663 1 1.54048 1.11853 1.32951 1.32951C1.11853 1.54048 1 1.82663 1 2.125V15.625C1 16.5201 1.35558 17.3786 1.98851 18.0115C2.62145 18.6444 3.47989 19 4.375 19H16.75Z" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M4 11.5L11 11.5" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M4 15L11 15" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"></path>
                                <rect x="4" y="5" width="7" height="3" rx="1" stroke="currentcolor"></rect>
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="item-submenu">
                    <a href="https://www.youtube.com/@kattechpc">
                        <span class="icon">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5284 1.31948C16.0412 0.967549 14.6837 0.5 8.99522 0.5C2.89942 0.5 1.99504 1.03692 1.7048 1.2126C0.160125 2.14402 0.0134681 6.26764 0 7.10376C0.0185428 8.20809 0.196385 11.8822 1.70369 12.7911C1.99337 12.9662 2.89268 13.5 8.99522 13.5C14.6873 13.5 16.0432 13.0347 16.5284 12.6842C17.8449 11.7336 17.9963 8.45989 18 7.08941C17.9966 5.98737 17.8814 2.29774 16.5284 1.3195L16.5284 1.31948ZM15.8721 11.7688C15.6763 11.9104 14.5518 12.372 8.99519 12.372C3.62312 12.372 2.49594 11.9535 2.28298 11.8246C1.74074 11.4981 1.16844 9.76467 1.12351 7.10066C1.1679 4.44256 1.74806 2.50215 2.28414 2.17955C2.49766 2.05011 3.62903 1.62825 8.99519 1.62825C14.5474 1.62825 15.6748 2.09299 15.8721 2.23512C16.3533 2.5831 16.8686 4.41495 16.8762 7.09306C16.8686 9.81319 16.35 11.4237 15.8721 11.7688H15.8721ZM12.6597 6.55639L7.60369 3.44229C7.51846 3.3907 7.4211 3.36276 7.32158 3.36133C7.22206 3.35989 7.12395 3.38501 7.03727 3.43411C6.95052 3.48322 6.87832 3.55459 6.82807 3.6409C6.77782 3.72721 6.75131 3.82538 6.75127 3.92535V10.1546C6.75134 10.3042 6.81056 10.4476 6.91593 10.5534C7.02129 10.6591 7.16417 10.7185 7.31317 10.7186C7.41544 10.7186 7.51577 10.6907 7.60337 10.6377L12.6594 7.52249C12.828 7.42014 12.9311 7.23714 12.9311 7.03944C12.9311 6.84175 12.8282 6.65819 12.6597 6.55639H12.6597ZM7.87537 9.15552V4.92388L11.2819 7.03941L7.87537 9.15552Z" fill="currentcolor"></path>
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="item-submenu">
                    <a href="{{ route('payment') }}">
                        <span class="icon">
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="0.5" width="18" height="13" rx="2.5" stroke="currentcolor"></rect>
                                <rect x="1.25" y="3" width="18" height="2" fill="currentcolor"></rect>
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="item-submenu">
                    <a href="{{ route('policy') }}">
                        <span class="icon"><svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.95771 1.78875C3.86924 2.08404 2.78817 2.40514 1.71543 2.75175C1.61748 2.78298 1.5304 2.84067 1.46413 2.91824C1.39785 2.99581 1.35504 3.09015 1.34058 3.1905C0.707434 7.86713 2.17029 11.2793 3.91543 13.527C4.6543 14.4882 5.53532 15.335 6.52914 16.0391C6.92457 16.3136 7.27428 16.5116 7.54971 16.6388C7.68685 16.7029 7.79885 16.7456 7.88457 16.7715C7.92205 16.7844 7.9607 16.7939 7.99999 16.7996C8.03882 16.7934 8.07705 16.784 8.11428 16.7715C8.20114 16.7456 8.31314 16.7029 8.45028 16.6388C8.72457 16.5116 9.07542 16.3125 9.47085 16.0391C10.4647 15.335 11.3457 14.4882 12.0846 13.527C13.8297 11.2804 15.2926 7.86713 14.6594 3.1905C14.6451 3.0901 14.6023 2.99571 14.536 2.91811C14.4697 2.84052 14.3826 2.78287 14.2846 2.75175C13.5406 2.51213 12.2846 2.12175 11.0423 1.78987C9.77371 1.45125 8.60685 1.20038 7.99999 1.20038C7.39428 1.20038 6.22628 1.45012 4.95771 1.78875ZM4.65371 0.63C5.89371 0.298125 7.21142 0 7.99999 0C8.78856 0 10.1063 0.298125 11.3463 0.63C12.6148 0.9675 13.8937 1.36687 14.6457 1.60875C14.9601 1.71096 15.2389 1.8984 15.4499 2.14954C15.661 2.40068 15.7958 2.70533 15.8388 3.0285C16.52 8.06513 14.9394 11.7979 13.0217 14.2673C12.2085 15.3236 11.2388 16.2538 10.1451 17.0269C9.76695 17.2944 9.36626 17.5296 8.94742 17.73C8.62742 17.8785 8.28342 18 7.99999 18C7.71657 18 7.37371 17.8785 7.05257 17.73C6.63373 17.5296 6.23303 17.2944 5.85486 17.0269C4.76117 16.2538 3.79152 15.3236 2.97829 14.2673C1.06058 11.7979 -0.519993 8.06513 0.161149 3.0285C0.20422 2.70533 0.339026 2.40068 0.550082 2.14954C0.761137 1.8984 1.03988 1.71096 1.35429 1.60875C2.44594 1.25641 3.54606 0.930065 4.65371 0.63Z" fill="currentcolor"></path>
                                <path d="M11.2618 5.78928C11.315 5.84153 11.3572 5.9036 11.386 5.97194C11.4148 6.04028 11.4297 6.11354 11.4297 6.18753C11.4297 6.26152 11.4148 6.33478 11.386 6.40312C11.3572 6.47145 11.315 6.53353 11.2618 6.58578L7.83322 9.96078C7.78014 10.0132 7.71708 10.0547 7.64765 10.0831C7.57823 10.1114 7.50381 10.126 7.42865 10.126C7.35348 10.126 7.27906 10.1114 7.20964 10.0831C7.14021 10.0547 7.07715 10.0132 7.02407 9.96078L5.30979 8.27328C5.25666 8.22098 5.21452 8.15889 5.18576 8.09056C5.15701 8.02223 5.14221 7.94899 5.14221 7.87503C5.14221 7.80107 5.15701 7.72783 5.18576 7.6595C5.21452 7.59117 5.25666 7.52908 5.30979 7.47678C5.36292 7.42448 5.42599 7.38299 5.49541 7.35469C5.56483 7.32639 5.63923 7.31182 5.71436 7.31182C5.7895 7.31182 5.8639 7.32639 5.93331 7.35469C6.00273 7.38299 6.0658 7.42448 6.11893 7.47678L7.42865 8.76715L10.4526 5.78928C10.5057 5.73689 10.5688 5.69533 10.6382 5.66698C10.7076 5.63862 10.782 5.62402 10.8572 5.62402C10.9324 5.62402 11.0068 5.63862 11.0762 5.66698C11.1456 5.69533 11.2087 5.73689 11.2618 5.78928Z" fill="currentcolor"></path>
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="item-submenu">
                    <div class="action-area d-flex ml-20px">
                        <div class="build-area">
                            <a href="{{ route('buildPC') }}">
                                <i class="fa fa-screwdriver"></i>
                                <span>{{ __('Xây dựng cấu hình') }}</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="item-submenu">
                    <div class="action-area d-flex ml-20px">
                        <div class="cart-area ml-20px">
                            <a href="{{ route('showCart') }}">
                                <i class="fa badge" value="{{ count(Cart::getContent()) }}">&#xf07a;</i> <span>{{ __('Giỏ hàng') }}</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) {
            $('#scroll-logo').fadeOut();
            $('.wrap').fadeOut();
            $('.wrap1').fadeIn();
            $('#bar-scroll').css(' margin-top', '22px');

        } else {
            $('#scroll-logo').fadeIn();
            $('.wrap').fadeIn();
            $('.wrap1').fadeOut();
            $('#bar-scroll').css(' margin-top', '22px');
        }

    });
</script>
