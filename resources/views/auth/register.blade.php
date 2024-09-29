@extends('layouts.page')

@section('title')
<title>Đăng ký</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid justify-content-center">
    <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
        <div class="d-flex flex-center mb-5">
            <a href="/" class="text-white font-size-h2">
                <img src="uploads/images/logo_don-min.png" class="max-h-25px" alt=""> Tra cứu tử vi
            </a>
        </div>
        <div class="login-signup">
            <div class="mb-5">
                <h3>Đăng ký tài khoản mới</h3>
                <p>Tài khoản cùng hệ thống tracuuthansohoc.com</p>
            </div>
            <form class="form text-center" id="kt_login_signup_form" action="signup" method="post">
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="text" placeholder="Họ và tên" name="name" value="" required="">
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="text" placeholder="Tài khoản" name="username" value="" required="">
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="password" placeholder="Mật khẩu" name="password" required="">
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="password" placeholder="Nhập lại mật khẩu" name="confirm_password" required="">
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="email" placeholder="Email nếu có" name="email" value="">
                </div>
                <div class="form-group text-left px-8">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                            <input type="checkbox" name="agree" id="agreeTerm">
                            <span></span>
                            Tôi ĐỒNG Ý với <a href="{{ route('policy') }}" target="_blank" class="text-white font-weight-bold ml-1">điều khoản sử dụng</a>.
                        </label>
                    </div>
                    <div class="form-text text-white text-left">
                    </div>
                </div>
                <div class="form-group">
                    <button id="kt_login_signup_submit" type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Đăng ký</button>
                </div>
            </form>
            <div class="mt-10">
                <span class="opacity-90 mr-4">
                    Bạn đã có tài khoản?
                </span>
                <a href="javascript:" id="kt_login_signin" class="text-white font-weight-bold">Đăng nhập ngay</a>
            </div>
        </div>
    </div>
</div>
@endsection
