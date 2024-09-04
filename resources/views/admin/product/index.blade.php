@extends('layouts.master-admin')

@section('title')
{{ __('Danh sách sản phẩm') }}
@endsection

@section('content')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card" id="usersTable">
            <div class="card-body">
                <div class="flex items-center">
                    <h6 class="text-15 grow">{{ __('Danh sách sản phẩm') }}</h6>
                    <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                        <a href="{{route('admin.product.create')}}" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">{{__('Thêm sản phẩm')}}</span></a>
                        <a class="btn btn-warning float-end" style="background: green; color: white; margin-left: 10px" href="{{route('admin.product.export')}}">{{__('Xuất kho')}}</a>
                    </div>
                </div>
            </div>
            <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                <form action="{{ route('admin.product.index') }}" method="GET">
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Tên') }}</label>
                            <input name="s" type="text" class="ltr:pl-8 rtl:pr-8 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tìm kiếm')}}" autocomplete="off">
                            <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600" style="top: 32px;"></i>
                        </div>

                        @if(array_key_exists('category', $_GET))
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Danh mục') }}</label>
                            <select id="filter-category" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="category">
                                <option value="all">{{ __('Tất cả') }}</option>
                                @foreach($categoryFilter as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $_GET['category'] ? 'selected' : ''  }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Danh mục') }}</label>
                            <select id="filter-category" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="category">
                                <option value="all">{{ __('Tất cả') }}</option>
                                @foreach($categoryFilter as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        @if(array_key_exists('status', $_GET))
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Trạng thái') }}</label>
                            <select value="{{ $_GET['status'] }}" id="filter-status" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" name="status">
                                <option value="all">{{ __('Tất cả') }}</option>
                                <option value="available">{{ __('Còn hàng') }}</option>
                                <option value="out of stock">{{ __('Hết hàng') }}</option>
                                <option value="order">{{ __('Đang về hàng') }}</option>
                            </select>
                        </div>
                        @else
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Trạng thái') }}</label>
                            <select id="filter-status" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="status">
                                <option value="all">{{ __('Tất cả') }}</option>
                                <option value="available">{{ __('Còn hàng') }}</option>
                                <option value="out of stock">{{ __('Hết hàng') }}</option>
                                <option value="order">{{ __('Đang về hàng') }}</option>
                            </select>
                        </div>
                        @endif

                        @if(array_key_exists('brand', $_GET))
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Thương hiệu') }}</label>
                            <select id="filter-category" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" name="brand">
                                <option value="all">{{ __('Tất cả') }}</option>
                                @foreach($brandFilter as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $_GET['brand'] ? 'selected' : ''  }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="relative xl:col-span-2">
                            <label>{{ __('Thương hiệu') }}</label>
                            <select id="filter-category" onchange="handleFilter($(this))" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" name="brand">
                                <option value="all">{{ __('Tất cả') }}</option>
                                @foreach($brandFilter as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="relative xl:col-span-2" style="margin-top: 20px;">
                            <button class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20" type="submit">{{ __('Tìm kiếm') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="-mx-5 -mb-5 overflow-x-auto">
                    <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap" id="myTable">
                        <thead class="text-left">
                            <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">{{ __('Hành động') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="name">{{ __('Tên sản phẩm') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="brand">{{ __('Thương hiệu') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="code">{{ __('Mã sản phẩm') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="category">{{ __('Danh mục') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="image">{{ __('Ảnh sản phẩm') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="price">{{ __('Giá') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="detail">{{ __('Thông số sản phẩm') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="detail">{{ __('Thông số kỹ thuật') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="link-youtube">{{ __('Link Youtube') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="description">{{ __('Mô tả') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="status">{{ __('Trạng thái') }}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($listProducts as $index => $product)
                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    <div class="show-button" style="display: flex">
                                        <a data-modal-target="addUserModal" class="edit-button block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{ route('admin.product.edit', $product['id']) }}"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">{{__('Sửa')}}</span></a>
                                        <a data-modal-target="deleteModal-{{ $index }}" class="delete-button block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">{{ __('Xóa') }}</span></a>
                                    </div>
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 name" style="max-width: 200px; overflow: hidden;">
                                    <a href="{{ route('productDetail', $product->slug) }}">{{ $product->name }}</a>
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 name"> {{ $product->brands->name ?? "" }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 code">{{ $product->code }}
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $product->category->name ?? "" }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                    <div class="items-center gap-2" style="overflow: hidden;">
                                        <div class="flex items-center size-10 font-medium rounded-full shrink-0  text-slate-800 dark:text-zink-50 dark:bg-zink-600">
                                            @if(is_array($product->image))
                                            @foreach($product->image as $value)
                                            @if(is_array($value))
                                            @continue
                                            @endif
                                            <img src="{{ asset($value) }}" class="h-10 rounded-full">
                                            @endforeach
                                            @else
                                            <img src="{{ asset('/images/') }}" class="h-10 rounded-full">
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 price">{{ $product->price }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 detail">
                                    <ul class="list-disc list-inside rounded-md marker:text-red-500" style="height: 100px; overflow: hidden;">
                                        @if($product->detail)
                                        @foreach($product->detail as $key => $value)
                                        <li>{{ $key }} : {{ $value }}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </td>

                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 detail">
                                    <ul class="list-disc list-inside rounded-md marker:text-red-500" style="height: 100px; overflow: hidden;">
                                        @if($product->detail_tech)
                                        @foreach($product->detail_tech as $key => $value)
                                        <li>{{ $key }} : {{ $value }}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $product->link_youtube ? Str::limit($product->link_youtube, 50) : "" }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 description">{!! Str::limit(strip_tags(html_entity_decode($product->description)), 100) !!}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 status">
                                    @if($product->status == 'available')
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent">{{ __('Còn hàng') }}</span>
                                    @elseif($product->status == 'out of stock')
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent">{{ __('Hết hàng') }}</span>
                                    @else
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-yellow-100 border-transparent text-yellow-500 dark:bg-yellow-500/20 dark:border-transparent">{{ __('Còn hàng') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <div id="deleteModal-{{ $index }}" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                                    <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                        <div class="float-right">
                                            <button data-modal-close="deleteModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                        </div>
                                        <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                                        <div class="mt-5 text-center">
                                            <h5 class="mb-1">{{ __('Bạn có chắc không?') }}</h5>
                                            <p class="text-slate-500 dark:text-zink-200">{{ __('Bạn có muốn xóa sản phẩm này không?') }}</p>
                                            <div class="flex justify-center gap-2 mt-6">
                                                <button type="reset" data-modal-close="deleteModal" class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">{{__('Hủy')}}</button>
                                                <a href="{{route('admin.product.delete',$product['id'])}}">
                                                    <button class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">{{__('Xóa sản phẩm!')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $listProducts->links() !!}
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);

    const searchParams = new URLSearchParams(window.location.search);

    if (searchParams.has('category')) {
        let categoryFilter = searchParams.get('category');
        $('#filter-category').val(categoryFilter);
    }

    if (searchParams.has('status')) {
        let statusFilter = searchParams.get('status');
        $('#filter-status').val(statusFilter);
    }
</script>
@endpush
