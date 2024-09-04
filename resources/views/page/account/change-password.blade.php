@extends('layouts.page')

@section('title')
<title>{{ __('Thay đổi mật khẩu') }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/profile.css') }}" />
@endsection

@section('description', __('Thay đổi mật khẩu của khách hàng với Kattech PC'))
@section('keywords', 'password, change password, kattech, kattech pc')
@section('breadcrumb', __('Thay đổi mật khẩu'))

@section('content')
<div class="row">
    @include('includes.left-menu-profile')
    <div class="rightcolumn">
        <div class="card">
            <h2>{{__('Thay đổi mật khẩu')}}</h2>
            <form method="POST" action="{{ route('update-password') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="xl:col-span-6 account">
                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{__('Mật khẩu hiện tại')}}</label>
                        <input type="password" id="productNameInput" name="old_password" value="" class="form-input " placeholder="{{__('Mật khẩu cũ')}}">
                        @if ($errors->has('old_password'))
                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        @endif
                    </div>

                    <div class="xl:col-span-6 account">
                        <label for="productCodeInput" class="">{{__('Mật khẩu mới')}}
                        </label>
                        <input type="password" id="" name="new_password" class="form-input " placeholder="{{ __('Mật khẩu mới') }}">
                        @if ($errors->has('new_password'))
                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                        @endif

                    </div>
                    <div class="xl:col-span-6 account">
                        <div class="xl:col-span-4">
                            <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">{{ __('Nhập lại mật khẩu') }}
                            </label>
                            <input type="password" id="productCodeInput" name="new_password_confirmation" value="" class="form-input " placeholder="{{ __('Nhập lại mật khẩu') }}">
                            @if ($errors->has('new_password_confirmation'))
                            <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" class="btn-reset">{{__('Xóa toàn bộ')}}</button>
                    <button type="submit" class="btn-submit">{{__('Sửa thông tin')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    $('.vendor-carousel').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
    });
</script>


<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);
</script>
@endsection
