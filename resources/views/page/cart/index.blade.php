@extends('layouts.page')

@section('title')
<title>{{ __('Giỏ hàng') }} | Kattech PC</title>
@endsection

@section('description', __('Thêm vào giỏ hàng cùng Kattech PC'))
@section('keywords', 'cart, kattechpc, kattech')
@section('breadcrumb', __('Giỏ hàng'))

@section('css')
<link rel="stylesheet" href="{{ asset('/css/page/cart.css') }}" />
@endsection

@section('content')
<main>
    @if($totalCart == 0)
    <div>
        <img class="image-cart" src="{{asset('images/cart.jpg')}}">
        <h2 class="text-center">{{ __('Không có sản phẩm nào trong giỏ hàng') }}</h2>

        <div class="button-css-cart" id="css-cart-tks">
            <a href="{{ route('home') }}" style="font-weight:600; padding: 10px 15px; border-radius: 10px;">
                {{ __('TIẾP TỤC MUA SẮM') }}
            </a>
        </div>
    </div>
    @else
    <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="title-c-ct input-address">{{ __('THÔNG TIN KHÁCH HÀNG') }}</div>
        <div class="product-data">
            <h3 style="font-style: italic; color: #e31223">{{ __('Các thông tin * bắt buộc nhập') }}</h3>
            @if(Auth::user())
            <div class="basket" id="info-user">
                <div class="basket-module">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Họ tên')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="name" value="{{Auth::user()->name}}" placeholder="{{ __('Họ và tên') }}">
                        </div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Email')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" value="{{Auth::user()->email }}" name="email" placeholder="{{__('Địa chỉ email')}}">
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}<span class="require-field">*</span></span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Số điện thoại')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="phone" value="{{Auth::user()->phone}}" placeholder="{{ __('Số điện thoại') }}">
                        </div>
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Tỉnh/Thành phố')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm mb-3 selected-name" id="city" aria-label=".form-select-sm" name="province">
                            <option value="" selected>{{ __('Chọn tỉnh thành') }}</option>
                            <option value="{{Auth::user()->province}}" selected>{{Auth::user()->province}}</option>

                        </select>
                        @if ($errors->has('province'))
                        <span class="text-danger">{{ $errors->first('province') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Quận/huyện')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm mb-3 selected-name" id="district" aria-label=".form-select-sm" name="district">
                            <option value="" selected>{{ __('Chọn quận huyện') }}</option>
                            <option value="{{Auth::user()->district}}" selected>{{Auth::user()->district}}</option>
                        </select>
                        @if ($errors->has('district'))
                        <span class="text-danger">{{ $errors->first('district') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Phường/xã')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm selected-name" id="ward" aria-label=".form-select-sm" name="ward">
                            <option value="" selected>{{ __('Chọn phường xã') }}</option>
                            <option value="{{Auth::user()->ward}}" selected>{{Auth::user()->ward}}</option>
                        </select>
                        @if ($errors->has('ward'))
                        <span class="text-danger">{{ $errors->first('ward') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Địa chỉ')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="address" value="{{Auth::user()->address}}" placeholder="{{ __('Địa chỉ') }}">
                        </div>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                        <?php $date = date('Y-m-d H:i:s'); ?>
                        <input type="hidden" id="fname" name="user_id" value="{{Auth::user()->id}}" placeholder="{{ __('Địa chỉ') }}">
                        <input type="hidden" id="fname" name="order_date" value="{{$date}}" placeholder="{{ __('Địa chỉ') }}">
                        <input type="hidden" id="fname" name="status" value="0">
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Ghi chú')}}<span class="require-field"></span></label>
                        </div>
                        <div class="col-75">
                            <textarea type="text" id="fname" name="notes" value="" placeholder="{{ __('Ghi chú') }}"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            @else
            <div class="basket" id="info-user">
                <div class="basket-module">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Họ tên')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="name" placeholder="{{__('Họ và tên')}}">
                        </div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Email')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="email" placeholder="{{__('Địa chỉ email')}}">
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Số điện thoại')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="phone" placeholder="{{__('Số điện thoại')}}">
                        </div>
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Tỉnh/Thành phố')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm mb-3 selected-name" id="city" aria-label=".form-select-sm" name="province">
                            <option value="" selected>{{ __('Chọn tỉnh thành') }}</option>
                        </select>
                        @if ($errors->has('province'))
                        <span class="text-danger">{{ $errors->first('province') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Quận/huyện')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm mb-3 selected-name" id="district" aria-label=".form-select-sm" name="district">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                        @if ($errors->has('district'))
                        <span class="text-danger">{{ $errors->first('district') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Phường/xã')}}<span class="require-field">*</span></label>
                        </div>
                        <select class="form-select form-select-sm selected-name" id="ward" aria-label=".form-select-sm" name="ward">
                            <option value="" selected>{{ __('Chọn phường xã') }}</option>
                        </select>
                        @if ($errors->has('ward'))
                        <span class="text-danger">{{ $errors->first('ward') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Địa chỉ')}}<span class="require-field">*</span></label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="address" placeholder="{{__('Địa chỉ')}}">
                        </div>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                        <?php $date = date('Y-m-d H:i:s'); ?>
                        <input type="hidden" id="fname" name="order_date" value="{{$date}}" placeholder="{{__('Địa chỉ')}}">
                        <input type="hidden" id="fname" name="status" value="0" placeholder="{{__('Địa chỉ')}}">
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname" class="label">{{__('Ghi chú')}}<span class="require-field"></span></label>
                        </div>
                        <div class="col-75">
                            <textarea type="text" id="fname" name="notes" value="" placeholder="{{ __('Ghi chú') }}"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            @endif

            <div class="basket">
                <div class="basket-labels" id="cart-basket">
                    <ul>
                        <li class="item item-heading">{{ __('Sản phẩm') }}</li>
                        <li class="quantity item-quan" style="font-weight: 700">{{ __('Số lượng') }}</li>
                        <li class="subtotal " style="font-weight: 700">{{ __('Thành tiền') }}</li>
                    </ul>
                </div>

                @foreach($dataCart as $product)
                <div class="basket-product flex-direction-column item-cart">
                    <div class="d-flex item-product-in-cart">
                        <div class="item">
                            <div class="product-image">
                                <?php $image = json_decode($product->attributes->image, true); ?>
                                <img src="{{ asset($image[0]) }}" alt="Placholder Image 2" class="product-frame">
                            </div>
                            <div class="product-details">
                                <span class="item-quantity" style="font-family: 'SF Pro Display', sans-serif;">{{ $product->name }}</span>
                            </div>
                        </div>

                        <div class="information-cart-item">
                            <div class="in-mobile">
                                <div class="quantity " id="quantity-cart">
                                    <input type="number" value="{{ $product->quantity }}" min="1" class="quantity-field" onchange="updateCart(this.value, '{{ $product->id }}')">
                                </div>
                            </div>
                            <?php
                            $total = (int) $product->quantity * (int) str_replace('.', '',  $product->price);

                            ?>
                            <div class="subtotal get-total inline">
                                <span id="total_cart-{{ $product->id }}">{{ number_format($total, 0, '.', '.') }} đ</span>
                                <input hidden name="total_cart" value="{{ $total }}">
                                <div class="delete delete-cart">
                                    <a>
                                        <button type="button" onclick="deleteSales(`{{ route('deleteCart', $product['id']) }}`)">{{ __('Xóa') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        @if(isset($product->attributes->warranty->title))
                        <div>
                            <span class="warranty-text">
                                <p>{{ __('Gói bảo hành') }} : {{ $product->attributes->warranty->title }} ( {{ $product->attributes->warranty->price }} )</p>
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

                <div>
                    <div class="summary1">
                        <div class="basket-module">
                            <div class="d-flex align-items-center">
                                <svg class="icon-voucher-line" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" version="1.1" id="Capa_1" viewBox="0 0 502.672 502.672" xml:space="preserve">
                                    <g>
                                        <path style="fill:#010002;" d="M106.905,80.468c-4.702,5.263-6.989,11.497-6.989,18.723c0,7.118,1.963,13.05,5.932,17.861     c4.012,4.81,10.85,8.434,20.277,10.85V70.675C117.971,71.947,111.586,75.204,106.905,80.468z" />
                                        <path style="fill:#010002;" d="M138.614,152.816v62.642c8.132-1.014,14.884-4.53,20.19-10.591     c5.263-6.04,8.024-13.525,8.024-22.434c0-7.636-1.941-13.719-5.695-18.357C157.402,159.503,149.917,155.707,138.614,152.816z" />
                                        <path style="fill:#010002;" d="M479.583,291.775l0.841,1.294l-19.176-65.489c-2.438-8.348-8.003-15.229-15.66-19.414     c-7.636-4.163-16.458-5.134-24.742-2.696l-3.969,1.165c-6.536,1.898-11.066,6.967-15.164,12.209     c-5.846-16.049-22.779-25.41-39.367-20.579l-9.232,2.718c-6.04,1.79-10.656,5.803-14.647,10.246     c-0.043-0.151-0.561-2.049-0.561-2.049c-5.048-17.235-23.232-27.114-40.445-22.045l-9.232,2.696     c-5.716,1.661-9.362,6.428-13.244,10.721c-4.034-13.676-8.003-27.33-11.368-38.784V57.581c0-28.668-23.447-52.072-52.029-52.072     H52.093C23.469,5.509,0,28.914,0,57.581v182.23c0,28.668,23.469,52.093,52.093,52.093h159.494c4.077,0,8.003-0.582,11.821-1.488     c2.934,10.074,4.94,16.911,5.242,17.968c-4.918,15.121-13.956,62.361-16.933,77.935c0.043,5.134,2.265,25.152,17.58,35.851     l92.905,59.622c2.243,1.38,3.387,2.157,3.387,2.157c22.024,12.511,42.991,16.178,61.261,10.829l54.811-16.049     c37.08-10.829,61.52-56.106,61.002-91.503C502.297,366.604,487.672,307.91,479.583,291.775z M336.785,465.808     c-1.877-1.057-3.689-2.2-3.689-2.2c0.367,0.28-91.697-58.737-91.697-58.737c-6.191-4.336-8.456-14.15-8.758-17.58     c6.191-30.954,14.172-69.199,16.588-74.635l1.553-3.516l-0.992-3.947l-45.881-156.518c-1.726-5.954,1.812-12.446,7.765-14.215     l9.232-2.653c6.04-1.79,12.403,1.704,14.172,7.744l46.291,158.114l23.814-8.391l-2.589-9.707l-16.2-55.264     c-0.841-2.89-0.475-5.954,0.949-8.65c1.51-2.696,3.926-4.659,6.816-5.522l9.232-2.696c6.083-1.79,12.425,1.704,14.194,7.765     l19.759,67.344l26.51-4.724l-3.408-11.238l-9.168-31.04c-1.79-6.018,1.747-12.403,7.766-14.194l9.254-2.718     c6.018-1.769,12.382,1.747,14.15,7.787l13.719,46.658l27.244-3.085l-3.408-12.08l-4.918-16.782     c-0.82-2.934-0.475-6.018,0.992-8.715c1.402-2.675,3.861-4.616,6.73-5.436l4.055-1.186c2.891-0.863,5.91-0.496,8.585,0.949     c2.696,1.467,4.681,3.883,5.522,6.795l19.306,65.856l0.216,0.496c2.416,6.514,20.579,61.757,21.075,87.621     c0.388,27.05-18.357,62.836-45.752,70.882l-54.854,16.049C365.021,479.117,348.109,472.344,336.785,465.808z M174.443,217.464     c-9.232,9.728-21.139,14.905-35.872,15.617v21.312h-12.425v-0.022v-21.01c-10.397-1.294-18.961-3.624-25.583-7.054     c-6.536-3.365-12.166-8.844-16.911-16.394c-4.832-7.571-7.571-16.782-8.283-27.697l21.075-4.055     c1.704,11.303,4.487,19.565,8.564,24.85c5.867,7.485,12.964,11.648,21.118,12.468v-65.834     c-8.542-2.243-17.321-5.846-26.36-10.915c-6.709-3.732-11.842-8.866-15.445-15.488c-3.645-6.601-5.436-14.064-5.436-22.455     c0-14.905,5.263-26.963,15.811-36.217c7.032-6.234,17.537-10.009,31.407-11.433V43.042h12.446v10.095     c12.144,1.165,21.851,4.767,28.926,10.807c9.189,7.636,14.625,18.184,16.502,31.493l-21.571,3.257     c-1.294-8.262-3.84-14.56-7.744-18.982c-3.904-4.4-9.254-7.291-16.07-8.693v60.161c10.591,2.696,17.515,4.81,21.01,6.277     c6.493,2.869,11.799,6.385,15.962,10.505c4.12,4.098,7.291,9.017,9.448,14.69c2.286,5.673,3.343,11.821,3.343,18.443     C188.356,195.634,183.761,207.735,174.443,217.464z" />
                                    </g>
                                </svg>
                                <h3 class="input-address ml-5">{{__('Hình thức thanh toán')}}</h3>
                            </div>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled><span>{{__('Thanh toán sau khi nhận hàng')}}</span><br>
                        </div>

                        <div class="basket-module" id="add_discount">
                            <div class="d-flex align-items-center">
                                <svg fill="none" viewBox="0 -2 23 22" class="icon-voucher-line">
                                    <g filter="url(#voucher-filter0_d)">
                                        <mask id="a" fill="#fff">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2h18v2.32a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75V16H1v-2.12a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75V2z"></path>
                                        </mask>
                                        <path d="M19 2h1V1h-1v1zM1 2V1H0v1h1zm18 2.32l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zM19 16v1h1v-1h-1zM1 16H0v1h1v-1zm0-2.12l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zM19 1H1v2h18V1zm1 3.32V2h-2v2.32h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zM20 16v-2.13h-2V16h2zM1 17h18v-2H1v2zm-1-3.12V16h2v-2.12H0zm1.4.91a2.5 2.5 0 001.5-2.29h-2a.5.5 0 01-.3.46l.8 1.83zm1.5-2.29a2.5 2.5 0 00-1.5-2.3l-.8 1.84c.18.08.3.26.3.46h2zM0 10.48v.65h2v-.65H0zM.9 9.1a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 9.1h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 8.65zM0 7.08v.65h2v-.65H0zM.9 5.7a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 5.7h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 5.25zM0 2v2.33h2V2H0z" mask="url(#a)"></path>
                                    </g>
                                    <path clip-rule="evenodd" d="M6.49 14.18h.86v-1.6h-.86v1.6zM6.49 11.18h.86v-1.6h-.86v1.6zM6.49 8.18h.86v-1.6h-.86v1.6zM6.49 5.18h.86v-1.6h-.86v1.6z"></path>
                                    <defs>
                                        <filter id="voucher-filter0_d" x="0" y="1" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                            <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                            <feOffset></feOffset>
                                            <feGaussianBlur stdDeviation=".5"></feGaussianBlur>
                                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"></feColorMatrix>
                                            <feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                                            <feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>

                                <h3 class="input-address ml-5">{{ __('Mã khuyến mãi') }}</h3>
                            </div>
                            @if(Session::has('discount-code'))
                            <div class="d-flex align-items-center flex-row in-section-discount">
                                <a onclick="showModalCoupon()" class="accept-coupon">{{ __('Mã đã được sử dụng ') }} {{ Session::get('discount-code') }}</a>
                                <a class="delete-coupon">X</a>
                            </div>

                            <p class="error_msg" style="color: green"></p>
                            @else
                            <div class="d-flex align-items-center flex-row in-section-discount">
                                <a onclick="showModalCoupon()" class="accept-coupon">{{ __('Chọn hoặc nhập mã') }}</a>
                                <p class="error_msg" style="color: green"></p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="summary summary-area">
                        <div class="input-address summary-total-items total-title">{{ __('Tổng tiền') }} </div>
                    </div>
                    @if(Session::has('discount-total'))
                    <?php $getDiscount = Session::get('discount-total');
                    $intValue =  str_replace(',', '', $getDiscount);
                    $disCountInt = intval(str_replace('.', '', $intValue));
                    ?>
                    <div class="summary summary-area">
                        <div class="total-value final-value summary-total" style="margin: 0;">{{__('Giảm giá')}}</div>
                        <div class="total-value final-value get-total discount_total" style="text-transform: inherit">
                            <div class="alert alert-danger total-discount">
                                {{ $getDiscount }} đ
                            </div>
                        </div>
                    </div>
                    <div class="summary-total summary-area">
                        <div class="total-title" style="font-size: 16px; font-weight: 0">{{ __('Thành tiền') }}</div>
                        <?php $money = $totalCart - $disCountInt;
                        ?>
                        <div class="total-value final-value get-total" id="total-amount" style=" font-size: 16px;">{{number_format($money, 0, '.', '.') }} đ
                            <input hidden name="total_money" value="{{ $money }}">
                        </div>
                    </div>
                    @else
                    <div class="add-coupon-area"></div>
                    <div class="summary-total summary-area">
                        <div class="total-title"  style="font-size: 16px; font-weight: 0">{{ __('Thành tiền') }}</div>
                        <div class="total-value final-value get-total" id="total-amount" style="    font-size: 19px;">{{ number_format($totalCart, 0, '.', '.') }} đ
                            <input hidden name="total_money" value="{{ $totalCart }}">
                        </div>
                    </div>
                    @endif
                    <div class="summary-checkout">
                        <button class="checkout-cta" style="background-color: #f3070f; font-weight: 600">{{ __('Đặt hàng') }}</button>
                        <div class="d-flex action-cart" id="cart-exel">
                            <a onclick="downloadCartExcel()" target="_blank">{{ __('Tải file excel') }}</a>
                            <a onclick="downloadCartImage()" target="_blank">{{ __('Tải ảnh báo giá') }}</a>
                            <a onclick="printCart()" target="_blank">{{ __('In báo giá') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
</main>

<div id="area-export-image"></div>
@include('includes.modal-coupon')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    const total_amount = `<?php echo $totalCart ?>`;
    var discount_code_default = '';
    <?php if (Session::has('discount-code')) { ?>
        discount_code_default = `<?php echo Session::get('discount-code') ?>`;
    <?php } ?>
</script>
<script src="{{ asset('js/page/cart.js') }}"></script>
@endsection
