@extends('layouts.page')

@section('title')
<title>{{ __('Đăng ký') }} | Kattech PC</title>
<script async src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
@endsection

@section('description', __('Đăng ký để trải nghiệm nhiều tính năng khác của chúng tôi'))
@section('keywords', 'register, kattechpc, kattech')
@section('breadcrumb', __('Đăng ký'))

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div class="limiter form-auth">
    <div class="container-login100">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-53">
                    <h1>{{ __('ĐĂNG KÍ') }}</h1>
                </span>

                @if(isset($errors))
                @foreach ($errors->all() as $error)
                <div style="color: red; margin: 10px">{{ $error }}</div>
                @endforeach
                @endif

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        {{ __('Tên') }}
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Nhập tên') }}">
                </div>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Email
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Nhập email của bạn') }}">
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        {{ __('Mật khẩu') }}
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" id="password" name="password" required autocomplete="current-password" placeholder="{{ __('Nhập mật khẩu của bạn') }}">
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        {{ __('Xác nhận mật khẩu') }}
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Nhập xác nhận mật khẩu') }}">
                </div>

                <div>
                    <div name="g-recaptcha" class="g-recaptcha mt-4" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                </div>

                <div class="container-login100-form-btn mt-15">
                    <button class="login100-form-btn">
                        {{ __('ĐĂNG KÍ') }}
                    </button>
                </div>

                <div class="w-full text-center p-t-55 mt-15">
                    <span class="txt2">
                        {{ __('Bạn đã có tài khoản') }}
                    </span>

                    <a href="{{ route('login') }}" class="txt2-register bo1">
                        {{ __('Đăng nhập ngay') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
