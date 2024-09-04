@extends('layouts.master-admin')

@section('title')
{{ __('Mạng xã hội') }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">
@endpush

@section('content')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{ __('Mạng xã hội') }}</h6>
                <div>
                    <ul class="flex flex-wrap w-full text-sm font-medium text-center border-b border-slate-200 dark:border-zink-500 nav-tabs">
                        <li class="group active">
                            <a href="javascript:void(0);" style="font-size: 14px;" data-tab-toggle data-target="home" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">{{ __('Trang chủ') }}</a>
                        </li>
                    </ul>

                    <div class="mt-5 tab-content">
                        <div class="tab-pane block" id="home">
                            <form method="POST" action="{{route('admin.social.store')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    <div class="xl:col-span-12">
                                        <div class="form-group">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Messenger') }}</label>
                                            <div class="">
                                                <div class="" style="display: inline-grid;">
                                                    <div class=" choose-avatar">
                                                        <div id="btnimage">
                                                            <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/yvbOx5two0W.png') }}" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="messager" value="{{ isset($social->messager) ? $social->messager : old('messager') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                                                    </div>
                                                    @if ($errors->has('messager'))
                                                    <span class="text-danger">{{ $errors->first('messager') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-12">
                                        <div class="form-group">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Facebook') }}</label>
                                            <div class="">
                                                <div class="" style="display: inline-grid;">
                                                    <div class=" choose-avatar">
                                                        <div id="btnimage">
                                                            <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/download (122).png') }}" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="facebook" value="{{ isset($social->facebook) ? $social->facebook : old('facebook') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                                                    </div>
                                                    @if ($errors->has('facebook'))
                                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-12">
                                        <div class="form-group">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Youtube') }}</label>
                                            <div class="">
                                                <div class="" style="display: inline-grid;">
                                                    <div class=" choose-avatar">
                                                        <div id="btnimage">
                                                            <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/download.png') }}" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="youtube" value="{{ isset($social->youtube) ? $social->youtube : old('youtube') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                                                    </div>
                                                    @if ($errors->has('youtube'))
                                                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-12">
                                        <div class="form-group">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Zalo') }}</label>
                                            <div class="">
                                                <div class="" style="display: inline-grid;">
                                                    <div class=" choose-avatar">
                                                        <div id="btnimage">
                                                            <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/z1-4x.png') }}" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="zalo" value="{{ isset($social->zalo) ? $social->zalo : old('zalo') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                                                    </div>
                                                    @if ($errors->has('zalo'))
                                                    <span class="text-danger">{{ $errors->first('zalo') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-12">
                                        <div class="form-group">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Instagram') }}</label>
                                            <div class="">
                                                <div class="" style="display: inline-grid;">
                                                    <div class=" choose-avatar">
                                                        <div id="btnimage">
                                                            <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/Instagram_Logo-1002x1003.jpg') }}" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="instagram" value="{{ isset($social->instagram) ? $social->instagram : old('instagram') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                                                    </div>
                                                    @if ($errors->has('instagram'))
                                                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20" style="margin-top: 10px;">{{__('Thêm')}}</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('js/admin/layout.js') }}"></script>
<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);
</script>

<script>
    function deleteThumb(idThumb) {
        alert(idThumb)
        let urlDelete = '/delete-social?id=' + idThumb;
        window.location.href = urlDelete;
    }
</script>
@endpush
