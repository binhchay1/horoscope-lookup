@extends('layouts.page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div class="limiter form-auth">
    <div class="container-login100">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-53">
                    <h1>{{ __('ĐĂNG NHẬP') }}</h1>
                </span>

                @if(isset($errors))
                @foreach ($errors->all() as $error)
                <div style="color: red; margin: 10px">{{ $error }}</div>
                @endforeach
                @endif

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Email
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Nhập email của bạn') }}">
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        {{ __('Mật khẩu') }}
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" id="password" class="block mt-1 w-full" name="password" required autocomplete="current-password" placeholder="{{ __('Nhập mật khẩu của bạn') }}">
                    <span class="focus-input100"></span>
                </div>

                <div class="d-flex mt-15">
                    <input type="checkbox" id="remember_me" name="remember" />
                    <label for="checkboxDefault1" class="inline-block text-base font-medium align-middle ml-5">{{ __('Lưu thông tin') }}</label>
                </div>

                <div class="mt-10 mb-10">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="txt2-password bo1">{{ __('Quên mật khẩu?') }}</a>
                    @endif
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn">
                        {{ __('ĐĂNG NHẬP') }}
                    </button>
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        {{ __('Bạn chưa có tài khoản') }}
                    </span>

                    <a href="{{ route('register') }}" class="txt2-register  bo1">
                        {{ __('Đăng ký ngay') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
