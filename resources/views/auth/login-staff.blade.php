@extends('layouts.master-without-nav')
@section('title')
{{ __('staff-login') }}
@endsection
@section('content')

<body class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
    <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
        <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <div class="!px-12 !py-12 card-body">

                    <div class="text-center">
                        <h4 class="mb-2 text-purple-500 dark:text-purple-500">{{ __('Xin chào!') }}</h4>
                        <p class="text-slate-500 dark:text-zink-200">{{ __('Đăng nhập với tư cách quản lý') }}</p>
                    </div>

                    @if (session('status'))
                    <div class="font-medium text-sm text-green-600 border border-transparent rounded-md bg-green-50 px-4 py-3 mt-4">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(isset($errors))
                    @foreach ($errors->all() as $error)
                    <div class="text-center" style="color: red; margin: 10px">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form method="POST" action="{{ route('post.staff.login') }}" class="mt-10" id="signInForm">
                        @csrf
                        <div class="mb-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Nhập email của bạn') }}" />
                            <x-input-error for="email" />
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between">
                                <div>
                                    <x-label for="password" value="{{ __('Mật khẩu') }}" />
                                </div>
                                <div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-gray-500 dark:text-gray-100 text-sm">{{ __('Quên mật khẩu?') }}</a>
                                    @endif
                                </div>
                            </div>
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Nhập mật khẩu của bạn') }}" />
                            <x-input-error for="password" />
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <x-checkbox id="remember_me" name="remember" />
                                <label for="checkboxDefault1" class="inline-block text-base font-medium align-middle cursor-pointer">{{ __('Lưu thông tin') }}</label>
                            </div>
                            <x-input-error for="remember" />
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __('Đăng nhập') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">
                <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">
                    <div style="margin-top: 20%;">
                        <img src="{{ asset('/images/logo/logo.png') }}" alt="" class="md:max-w-[32rem] mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
