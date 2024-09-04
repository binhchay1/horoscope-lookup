<div class="tab-pane block" id="home">
    <form method="POST" action="{{ route('admin.store.layout') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 1') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_1" id="image1" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_1))
                                    <img id="showImage1" class="show-avatar" src="{{ asset($layout->small_thumbnail_1) }}" alt="avatar">
                                    @else
                                    <img id="showImage1" class="show-avatar" src="{{ asset('/images/layout/500x250.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-1">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_1" value="{{ isset($layout->permarklink_small_thumbnail_1) ? $layout->permarklink_small_thumbnail_1 : old('permarklink_small_thumbnail_1') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_thumbnail_1" onchange="handleHideInput('hide_small_thumbnail_1')" {{ $layout->hide_small_thumbnail_1 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_1')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_1'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_1') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 2') }}</label>
                    <div>
                        <div style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_2" id="image2" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_2))
                                    <img id="showImage2" class="show-avatar" src="{{ asset($layout->small_thumbnail_2) }}" alt="avatar">
                                    @else
                                    <img id="showImage2" class="show-avatar" src="{{ asset('/images/layout/500x250.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-2">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_2" value="{{ isset($layout->permarklink_small_thumbnail_2) ? $layout->permarklink_small_thumbnail_2 : old('permarklink_small_thumbnail_2') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_thumbnail_2" onchange="handleHideInput('hide_small_thumbnail_2')" {{ $layout->hide_small_thumbnail_2 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_2')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_2'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_2') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 3') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_3" id="image3" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_3))
                                    <img id="showImage3" class="show-avatar" src="{{ asset($layout->small_thumbnail_3) }}" alt="avatar">
                                    @else
                                    <img id="showImage3" class="show-avatar" src="{{ asset('/images/layout/350x175.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-3">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_3" value="{{ isset($layout->permarklink_small_thumbnail_3) ? $layout->permarklink_small_thumbnail_3 : old('permarklink_small_thumbnail_3') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_thumbnail_3" onchange="handleHideInput('hide_small_thumbnail_3')" {{ $layout->hide_small_thumbnail_3 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_3')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_3'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_3') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 4') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_4" id="image4" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_4))
                                    <img id="showImage4" class="show-avatar" src="{{ asset($layout->small_thumbnail_4) }}" alt="avatar">
                                    @else
                                    <img id="showImage4" class="show-avatar" src="{{ asset('/images/layout/350x175.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-4">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_4" value="{{ isset($layout->permarklink_small_thumbnail_4) ? $layout->permarklink_small_thumbnail_4 : old('permarklink_small_thumbnail_4') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" name="hide_small_thumbnail_4" onchange="handleHideInput('hide_small_thumbnail_4')" {{ $layout->hide_small_thumbnail_4 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_4')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_4'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_4') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 5') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_5" id="image5" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_5))
                                    <img id="showImage5" class="show-avatar" src="{{ asset($layout->small_thumbnail_5) }}" alt="avatar">
                                    @else
                                    <img id="showImage5" class="show-avatar" src="{{ asset('/images/layout/350x175.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-5">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_5" value="{{ isset($layout->permarklink_small_thumbnail_5) ? $layout->permarklink_small_thumbnail_5 : old('permarklink_small_thumbnail_5') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" name="hide_small_thumbnail_5" onchange="handleHideInput('hide_small_thumbnail_5')" {{ $layout->hide_small_thumbnail_5 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_5')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_5'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_5') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo 6') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_thumbnail_6" id="image6" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_thumbnail_6))
                                    <img id="showImage6" class="show-avatar" src="{{ asset($layout->small_thumbnail_6) }}" alt="avatar">
                                    @else
                                    <img id="showImage6" class="show-avatar" src="{{ asset('/images/layout/350x175.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-6">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_thumbnail_6" value="{{ isset($layout->permarklink_small_thumbnail_6) ? $layout->permarklink_small_thumbnail_6 : old('permarklink_small_thumbnail_6') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_thumbnail_6" onchange="handleHideInput('hide_small_thumbnail_6')" {{ $layout->hide_small_thumbnail_6 == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_thumbnail_6')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_thumbnail_6'))
                            <span class="text-danger">{{ $errors->first('small_thumbnail_6') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh biểu ngữ trái') }}</label>
                    <div>
                        <div style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_banner_thumbnail_left" id="image7" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_banner_thumbnail_left))
                                    <img id="showImage7" class="show-avatar" src="{{ asset($layout->small_banner_thumbnail_left) }}" alt="avatar">
                                    @else
                                    <img id="showImage7" class="show-avatar" src="{{ asset('/images/layout/150x450.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-7">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_banner_thumbnail_left" value="{{ isset($layout->permarklink_small_banner_thumbnail_left) ? $layout->permarklink_small_banner_thumbnail_left : old('permarklink_small_banner_thumbnail_left') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_banner_thumbnail_left" onchange="handleHideInput('hide_small_banner_thumbnail_left')" {{ $layout->hide_small_banner_thumbnail_left == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_banner_thumbnail_left')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_banner_thumbnail_left'))
                            <span class="text-danger">{{ $errors->first('small_banner_thumbnail_left') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh biểu ngữ phải') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="small_banner_thumbnail_right" id="image8" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->small_banner_thumbnail_right))
                                    <img id="showImage8" class="show-avatar" src="{{ asset($layout->small_banner_thumbnail_right) }}" alt="avatar">
                                    @else
                                    <img id="showImage8" class="show-avatar" src="{{ asset('/images/layout/150x450.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-8">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_small_banner_thumbnail_right" value="{{ isset($layout->permarklink_small_banner_thumbnail_right) ? $layout->permarklink_small_banner_thumbnail_right : old('permarklink_small_banner_thumbnail_right') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_small_banner_thumbnail_right" onchange="handleHideInput('hide_small_banner_thumbnail_right')" {{ $layout->hide_small_banner_thumbnail_right == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('small_banner_thumbnail_right')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('small_banner_thumbnail_right'))
                            <span class="text-danger">{{ $errors->first('small_banner_thumbnail_right') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh banner quảng cáo ') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="banner_promotion_thumbnail" id="image9" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->banner_promotion_thumbnail))
                                        <img id="showImage9" class="show-avatar" src="{{ asset($layout->banner_promotion_thumbnail) }}" alt="avatar">
                                    @else
                                        <img id="showImage9" class="show-avatar" src="{{ asset('images/sspaps-Logo.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-9">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_banner_promotion_thumbnail" value="{{ isset($layout->permarklink_banner_promotion_thumbnail) ? $layout->permarklink_banner_promotion_thumbnail : old('permarklink_banner_promotion_thumbnail') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_banner_promotion_thumbnail" onchange="handleHideInput('hide_banner_promotion_thumbnail')" {{ $layout->hide_banner_promotion_thumbnail == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('banner_promotion_thumbnail')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('banner_promotion_thumbnail'))
                                <span class="text-danger">{{ $errors->first('banner_promotion_thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh popup quảng cáo ') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="adv_thumbnail" id="image10" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->adv_thumbnail))
                                        <img id="showImage10" class="show-avatar" src="{{ asset($layout->adv_thumbnail) }}" alt="avatar">
                                    @else
                                        <img id="showImage10" class="show-avatar" src="{{ asset('images/sspaps-Logo.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-10">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_adv_thumbnail" value="{{ isset($layout->permarklink_adv_thumbnail) ? $layout->permarklink_adv_thumbnail : old('permarklink_adv_thumbnail') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_adv_thumbnail" onchange="handleHideInput('hide_adv_thumbnail')" {{ $layout->hide_adv_thumbnail == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('adv_thumbnail')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('adv_thumbnail'))
                                <span class="text-danger">{{ $errors->first('adv_thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-4">
                <div class="form-group">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh quảng cáo xây dựng cấu hình') }}</label>
                    <div class="">
                        <div class="" style="display: inline-grid;">
                            <input type="file" class="border-0 bg-light pl-0" name="build_pc_thumbnail" id="image11" hidden>
                            <div class=" choose-avatar">
                                <div id="btnimage">
                                    @if(isset($layout->build_pc_thumbnail))
                                        <img id="showImage11" class="show-avatar" src="{{ asset($layout->build_pc_thumbnail) }}" alt="avatar">
                                    @else
                                        <img id="showImage11" class="show-avatar" src="{{ asset('images/sspaps-Logo.png') }}" alt="avatar">
                                    @endif
                                </div>
                                <div id="button-11">
                                    <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="permarklink_build_pc_thumbnail" value="{{ isset($layout->permarklink_build_pc_thumbnail) ? $layout->permarklink_build_pc_thumbnail : old('permarklink_build_pc_thumbnail') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                            </div>
                            <div class="area-action-layout">
                                <div>
                                    <input type="checkbox" id="hide_build_pc_thumbnail" onchange="handleHideInput('hide_build_pc_thumbnail')" {{ $layout->hide_build_pc_thumbnail == 1 ? 'checked' : '' }}>
                                    <label>{{ __('Ẩn') }}</label>
                                </div>

                                <button type="button" class="btn-delete-layout" onclick="deleteThumb('build_pc_thumbnail')">{{ __('Xóa') }}</button>
                            </div>
                            @if ($errors->has('adv_thumbnail'))
                                <span class="text-danger">{{ $errors->first('adv_thumbnail') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="hide_small_thumbnail_1" value="{{ $layout->hide_small_thumbnail_1 }}">
            <input type="hidden" name="hide_small_thumbnail_2" value="{{ $layout->hide_small_thumbnail_2 }}">
            <input type="hidden" name="hide_small_thumbnail_3" value="{{ $layout->hide_small_thumbnail_3 }}">
            <input type="hidden" name="hide_small_thumbnail_4" value="{{ $layout->hide_small_thumbnail_4 }}">
            <input type="hidden" name="hide_small_thumbnail_5" value="{{ $layout->hide_small_thumbnail_5 }}">
            <input type="hidden" name="hide_small_thumbnail_6" value="{{ $layout->hide_small_thumbnail_6 }}">
            <input type="hidden" name="hide_small_banner_thumbnail_left" value="{{ $layout->hide_small_banner_thumbnail_left }}">
            <input type="hidden" name="hide_small_banner_thumbnail_right" value="{{ $layout->hide_small_banner_thumbnail_right }}">
            <input type="hidden" name="hide_banner_promotion_thumbnail" value="{{ $layout->hide_banner_promotion_thumbnail }}">
            <input type="hidden" name="hide_adv_thumbnail" value="{{ $layout->hide_adv_thumbnail }}">
            <input type="hidden" name="hide_build_pc_thumbnail" value="{{ $layout->hide_build_pc_thumbnail }}">
        </div>

        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20" style="margin-top: 10px;">{{__('Sửa ảnh')}}</button>
    </form>
</div>
