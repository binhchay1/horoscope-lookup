@extends('layouts.master-admin')
@section('title')
    {{ __('Sửa thông tin người dùng') }}
@endsection
@section('content')

    <!-- page title -->

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4 container">
        <div class="xl:col-span-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4 ">{{__('Thông tin người dùng')}}</h3>

                    <form method="POST" action="{{route('admin.profile.update', $user['id'])}}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{__('Tên người dùng')}}</label>
                                <input type="text" id="productNameInput" name="name" value="{{old('name',$user->name)}}"
                                       class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                       placeholder="{{__('Tên người dùng')}}" >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">{{__('Địa chỉ email')}}
                                </label>
                                <input type="text" id="" name="email" value="{{old('name',$user->email)}}"
                                       class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                       placeholder="{{__('Địa chỉ email')}}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div><!--end col-->

                            <div class="xl:col-span-6">
                                <div class="form-group">
                                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{__('Hình ảnh')}}</label>
                                    <div class="">
                                        <div class="" style="display: inline-grid;">
                                            <input value="" type="file" class="border-0 bg-light pl-0" name="profile_photo_path" id="image" hidden>
                                            <div class=" choose-avatar">
                                                <div id="btnimage">
                                                    <img id="showImage" class="show-avatar" src="{{$user->profile_photo_path ?? asset('/images/user/avatar.jpg') }}" alt="avatar" >
                                                </div>
                                                <div id="button">
                                                    <i id="btn_chooseImg" class="fas fa-camera"> {{ __('Chọn hình ảnh') }}</i>
                                                </div>
                                            </div>
                                            @if ($errors->has('profile_photo_path'))
                                                <span class="text-danger">{{ $errors->first('profile_photo_path') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="xl:col-span-6">

                                <div class="xl:col-span-4 mt-4">
                                    <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">{{__('Địa chỉ')}}
                                    </label>
                                    <input type="text" id="productCodeInput" name="address" value="{{old('address', $user->address)}}"
                                           class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                           placeholder="{{__('Địa chỉ')}}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="xl:col-span-4">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">{{__('Số điện thoại')}}
                                </label>
                                <input type="text" id="productCodeInput" name="phone" value="{{old('phone',$user->phone)}}"
                                       class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                       placeholder="{{__('Số điện thoại')}}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div><!--end col-->

                            <div class="xl:col-span-4">
                                <label for="productPrice" class="inline-block mb-2 text-base font-medium">{{__('Ngày sinh')}}</label>
                                <input type="date" id="productPrice" name="age" value="{{old('age',$user->age)}}"
                                       class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                       placeholder="Enter User Age" >
                                @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                @endif
                            </div><!--end col-->

                            <div class="xl:col-span-4">
                                <label for="productStatus" class="inline-block mb-2 text-base font-medium">{{__('Giới tính')}}</label>
                                <select
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    data-choices data-choices-search-false  id="productStatus" name="sex">
                                    @foreach($genderUser as $gender => $value)
                                        <option value="{{ $value }}" {{$value == $user->sex ? 'selected' : ''}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                        </div><!--end grid-->
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="reset"
                                    class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                            <button type="submit"
                                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Sửa thông tin')}}</button>
                        </div>
                    </form>
                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end grid-->
@endsection
@push('scripts')
    <!-- dropzone -->
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <!--product create init js-->
    <script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('js/eventImage.js') }}"></script>
@endpush
