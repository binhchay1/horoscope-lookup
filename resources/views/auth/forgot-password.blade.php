{{--@extends('layouts.master-without-nav')--}}
{{--@section('title')--}}
{{--    {{ __('Forget Password') }}--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--<body--}}
{{--    class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">--}}
{{--    <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">--}}
{{--        <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">--}}
{{--            <div class="lg:col-span-5">--}}
{{--                <div class="!px-12 !py-12 card-body h-full flex flex-col">--}}

{{--                    <div class="my-auto">--}}
{{--                        <div class="text-center">--}}
{{--                            <h4 class="mb-2 text-custom-500 dark:text-custom-500">{{__('Quên mật khẩu?')}}</h4>--}}
{{--                            <p class="mb-8 text-slate-500 dark:text-zink-200">{{__('Đặt lại mật khẩu')}}</p>--}}
{{--                        </div>--}}

{{--                        <div--}}
{{--                            class="px-4 py-3 mb-6 text-sm text-yellow-500 border border-transparent rounded-md bg-yellow-50 dark:bg-yellow-400/20">--}}
{{--                            {{__('Cung cấp địa chỉ email của bạn và hướng dẫn sẽ được gửi cho bạn')}}--}}
{{--                        </div>--}}

{{--                        @if (session('status'))--}}
{{--                            <div class="mb-4 font-medium text-sm text-green-600 border border-transparent rounded-md bg-green-50 px-4 py-3">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <form method="POST" action="{{ route('password.email') }}">--}}
{{--                            @csrf--}}
{{--                            <div>--}}
{{--                                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your registered email" />--}}
{{--                                <x-input-error for="email" />--}}
{{--                            </div>--}}
{{--                            <div class="mt-8">--}}
{{--                                <button type="submit"--}}
{{--                                    class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Send--}}
{{--                                    Reset Link</button>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 text-center">--}}
{{--                                <p class="mb-0">{{__('Đợi đã, tôi nhớ mật khẩu của mình...')}} <a href="{{ route('login') }}"--}}
{{--                                        class="underline fw-medium text-custom-500"> {{__('Bấm vào đây')}} </a> </p>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">--}}
{{--                <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">--}}
{{--                    <div class="flex items-center justify-between gap-3">--}}
{{--                        <div class="grow">--}}
{{--                            <a href="{{ url('index') }}">--}}
{{--                                <x-application-logo />--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="shrink-0">--}}
{{--                            <x-language />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-auto">--}}
{{--                        <img src="{{ URL::asset('build/images/auth/img-01.png') }}" alt=""--}}
{{--                            class="md:max-w-[32rem] mx-auto">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}






    @extends('layouts.page')

    @section('title')
        <title>{{ __('Đăng nhập') }} | Kattech PC</title>
    @endsection

    @section('description', __('Đăng nhập để tiếp tục với Kattech PC'))
    @section('keywords', 'login, kattechpc, kattech')
    @section('breadcrumb', __('Đăng nhập'))

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
                            <h1>{{ __('QUÊN MẬT KHẨU') }}</h1>
                        </span>
                            <div
                                class="px-4 py-3 mb-6 text-sm text-yellow-500 border border-transparent rounded-md bg-yellow-50 dark:bg-yellow-400/20" id="get-email">
                                {{__('Vui lòng nhập địa chỉ email đã đăng ký với chúng tôi để tạo mật khẩu mới. Chúng tôi sẽ gửi 1 email vào địa chỉ email cung cấp và yêu cầu xác minh trước khi có thể tạo mật khẩu mới')}}
                            </div>
                        @if(isset($errors))
                            @foreach ($errors->all() as $error)
                                <div style="color: red; margin: 10px">{{ $error }}</div>
                            @endforeach
                        @endif

                        <div class="p-t-31 p-b-9 input-email">
                            <span class="txt1 req">
                                Email
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input-email">
                            <input class="input100" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Nhập email của bạn') }}">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-17" style="margin-top: 20px">
                            <button class="login100-form-btn">
                                {{ __('KHÔI PHỤC') }}
                            </button>
                        </div>
                        <div class="text-center" id="return-login">
                            <p class="mb-0" id="remember-pass">{{__('Đợi đã, tôi nhớ mật khẩu của mình...')}} <a href="{{ route('login') }}"
                                    class="underline fw-medium text-custom-500" id="get-remember-pass"> {{__('Trở về đăng nhập')}} </a> </p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
@endsection

