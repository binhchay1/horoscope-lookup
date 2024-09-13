@extends('layouts.page')

@section('title')
<title>Đăng nhập</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid">
    <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
        <div class="d-flex flex-center mb-5">
            <a href="/" class="text-white font-size-h2">
                <img src="uploads/images/logo_don-min.png" class="max-h-25px" alt=""> Tra cứu tử vi
            </a>
        </div>
        <div class="login-signin">
            <div class="mb-5">
                <h3>Đăng nhập</h3>
                <p>Tài khoản cùng hệ thống {{ env('APP_URL') }}</p>
            </div>
            <form class="form" id="kt_login_signin_form" action="login" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <div style="width: 100%; margin-left: 8px;position: relative;">
                                <div class="select-flag">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="tf" code="vn">+84</span>
                                    <div class="dropdown-flag hidden">
                                        <input class="hidden phone_code" type="hidden" name="phone_code" value="+84" autocomplete="off" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8 mb-5" type="text" placeholder="Số điện thoại đăng nhập" name="username" value="" autocomplete="off" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8 mb-5" type="password" placeholder="Mật khẩu" name="password" required="">
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                            <input type="checkbox" name="remember">
                            <span></span>
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                    <a href="javascript:" id="kt_login_forgot" class="text-white font-weight-bold">Quên mật khẩu?</a>
                </div>
                <div class="form-group text-center mt-10">
                    <button id="kt_login_signin_submit" type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Đăng nhập</button>
                </div>
            </form>
            <div class="mt-10">
                <span class="opacity-90 mr-4">
                    Bạn chưa có tài khoản?
                </span>
                <a href="javascript:" id="kt_login_signup" class="text-white font-weight-bold">Đăng ký ngay</a>
            </div>
        </div>
    </div>
</div>
@endsection
