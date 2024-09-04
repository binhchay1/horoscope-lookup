@extends('layouts.page')

@section('title')
<title>{{ __('Tài khoản') }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/profile.css') }}" />
@endsection

@section('description', __('Tài khoản với Kattech PC'))
@section('keywords', 'user, profile, kattech, kattech pc')
@section('breadcrumb', __('Tài khoản'))

@section('content')
<div class="row" id="content-profile">
    @include('includes.left-menu-profile')
    <div class="rightcolumn">
        <div class="card">
            <h2 class="title-acount">{{__('Thông tin tài khoản')}}</h2>
            <form method="POST" action="{{ route('updateProfile', $dataUser['id']) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="xl:col-span-6 account input-data">
                        <label for="productNameInput" class="set_title inline-block mb-2 text-base font-medium">{{__('Tên người dùng')}}</label>
                        <input type="text" id="productNameInput" name="name" value="{{$dataUser->name}}" class="form-input  " placeholder="{{__('Tên người dùng')}}">
                        <div class="underline"></div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="xl:col-span-6 account">
                        <label for="productCodeInput" class="set_title ">{{__('Địa chỉ email')}}
                        </label>
                        <input type="text" id="" name="email" value="{{$dataUser->email}}" class="form-input " placeholder="{{__('Địa chỉ email')}}">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

{{--                    <div class="xl:col-span-6 account">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Hình ảnh') }}</label>--}}
{{--                            <div class="">--}}
{{--                                <div class="" style="display: inline-grid;">--}}
{{--                                    <input value="" type="file" class="border-0 bg-light pl-0" name="profile_photo_path" id="image" hidden>--}}
{{--                                    <div class=" choose-avatar">--}}
{{--                                        <div id="btnimage">--}}
{{--                                            <img id="showImage" class="show-avatar" src="{{asset( $dataUser->profile_photo_path ?? '/images/user/avatar.jpg') }}" alt="avatar">--}}
{{--                                        </div>--}}
{{--                                        <div id="button">--}}
{{--                                            <i id="btn_chooseImg" class="fas fa-camera"> {{ __('Chọn hình ảnh') }}</i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @if ($errors->has('profile_photo_path'))--}}
{{--                                    <span class="text-danger">{{ $errors->first('profile_photo_path') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="xl:col-span-6 account">
                        <div class="xl:col-span-4 ">
                            <label for="productCodeInput" class="set_title  inline-block mb-2 text-base font-medium">{{__('Địa chỉ')}}
                            </label>
                            <input type="text" id="productCodeInput" name="address" value="{{$dataUser->address}}" class="form-input " placeholder="{{__('Địa chỉ')}}">
                            @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="xl:col-span-6 account">
                        <label for="productCodeInput" class=" set_title inline-block mb-2 text-base font-medium">{{ __('Số điện thoại') }}
                        </label>
                        <input type="text" id="productCodeInput" name="phone" value="{{$dataUser->phone}}" class="form-input " placeholder="{{ __('Số điện thoại') }}">
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="xl:col-span-6 account">
                        <label for="productPrice" class=" set_title inline-block mb-2 text-base font-medium">{{ __('Ngày sinh') }}</label>
                        <input type="date" id="productPrice" name="age" value="{{$dataUser->age}}" class="form-input " placeholder="Enter User Age">
                        @if ($errors->has('age'))
                        <span class="text-danger">{{ $errors->first('age') }}</span>
                        @endif
                    </div>

                    <div class="xl:col-span-6 account">
                        <label for="productStatus" class=" set_title inline-block mb-2 text-base font-medium">{{__('Giới tính')}}</label>
                        <select class="form-input " data-choices data-choices-search-false id="productStatus" name="sex">
                            @foreach($genderUser as $gender => $value)
                            <option value="{{ $value }}" {{$value == $dataUser->sex ? 'selected' : ''}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="submit" class="btn-submit" id="btn-account">{{__('Sửa thông tin')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);
</script>
@endsection
