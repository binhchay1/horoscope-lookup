@extends('layouts.master-admin')

@section('title')
{{ __('Thêm ảnh sản phẩm') }}
@endsection

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5 mt-4">
    <div class="xl:col-span-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">{{__('Thêm ảnh sản phẩm')}}</h6>
                <h5>{{__('Sản phẩm')}}: {{ $product->name }}</h5>
                @if ($errors->any())
                <ul class="alert alert-warning" style="color: red">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="flex justify-end gap-2 mt-4">
                    <button>
                        <a href="{{ route('admin.product.index') }}" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600
                        hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring
                        focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Quay lại')}}</a>
                    </button>
                </div>

                <form method="POST" action="{{ url('/admin/products/'.$product->id.'/upload') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">{{ __('Chọn ảnh') }}</label>
                            <input type="file" name="images[]" multiple class="form-control" required oninvalid="this.setCustomValidity('Chọn một hoặc nhiều ảnh')" />
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{__('Thêm ảnh sản phẩm')}}</button>
                    </div>
                </form>
                <div class="flex  gap-2 mt-4">
                    @foreach ($productImages as $prodImg)
                    <img src="{{ asset($prodImg->image) }}" class="border p-2 m-3" style="width: 100px; height: 100px;" alt="Img" />
                    <a href="{{ url('/admin/product-image/'.$prodImg->id.'/delete') }}">{{ __('Xóa ảnh') }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
