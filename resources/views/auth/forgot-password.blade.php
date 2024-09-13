@extends('layouts.page')

@section('title')
<title>Quên mật khẩu</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/auth.css') }}" />
@endsection

@section('content')
<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('uploads/images/bg.jpg');">
    <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
        <div class="d-flex flex-center mb-5">
            <a href="/" class="text-white font-size-h2">
                <img src="uploads/images/logo_don-min.png" class="max-h-25px" alt=""> Tra cứu tử vi
            </a>
        </div>
        <div class="login-forgot">
            <div class="mb-5">
                <h3>Quên mật khẩu?</h3>
                <p class="opacity-60">Nhập số điện thoại của bạn</p>
            </div>
            <form class="form" id="kt_login_forgot_form" action="forgot" method="post" style="min-height: 350px;">
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
                            <input class="form-control h-auto text-white placeholder-white opacity-90 bg-light-o-90 border-0 py-4 px-8" type="text" placeholder="Số điện thoại của bạn" name="phone" autocomplete="off" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="kt_login_forgot_submit" type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Gửi </button>
                    <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
