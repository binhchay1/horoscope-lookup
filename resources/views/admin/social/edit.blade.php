@extends('layouts.master-admin')

@section('title')
{{ __('Mạng xã hội') }}
@endsection
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>
@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Quản lý mạng xã hội')}}</h6>

                <form method="POST" action="{{ route('admin.social.update', $social['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Youtube') }}</label>
                            <input type="text" id="productNameInput" name="youtube" value="{{old('youtube', $social->youtube)}}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Đường dẫn youtube') }}">
                            @if ($errors->has('youtube'))
                            <span class="text-danger">{{ $errors->first('youtube') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Facebook') }}</label>
                            <input type="text" id="productNameInput" name="facebook" value="{{ old('facebook', $social->facebook) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Đường dẫn youtube') }}">
                            @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Instagram') }}</label>
                            <input type="text" id="productNameInput" name="instagram" value="{{ old('instagram', $social->instagram) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Đường dẫn facebook') }}">
                            @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Zalo') }}</label>
                            <input type="text" id="productNameInput" name="zalo" value="{{ old('zalo', $social->zalo) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Đường dẫn zalo') }}">
                            @if ($errors->has('zalo'))
                            <span class="text-danger">{{ $errors->first('zalo') }}</span>
                            @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Messager') }}</label>
                            <input type="text" id="productNameInput" name="messager" value="{{ old('messager', $social->messager) }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Đường dẫn messager') }}">
                            @if ($errors->has('messager'))
                            <span class="text-danger">{{ $errors->first('messager') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{__('Xóa toàn bộ')}}</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Cập nhập ')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('js/admin/eventImage.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
