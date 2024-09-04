@extends('layouts.master-admin')

@section('title')
{{ __('Danh sách sản phẩm') }}
@endsection

@section('css')
<style>
    #modalDetailImportExport {
        display: none;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        margin: auto;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card" id="usersTable">
            <div class="card-body">
                <div class="flex items-center">
                    <h6 class="text-15 grow">{{__('Danh sách sản phẩm')}}</h6>
                </div>
            </div>
            <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                <form action="#!">
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="relative xl:col-span-2">
                            <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tìm kiếm')}}" autocomplete="off">
                            <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="-mx-5 -mb-5 overflow-x-auto">
                    <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                        <thead class="text-left">
                            <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="name">{{ __('Tên sản phẩm') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="description">{{ __('Mô tả') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="description">{{ __('Số lượng') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="status">{{ __('Trạng thái') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="status">{{ __('Hành động') }}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($listProducts as $product)
                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 name"> {{ $product->name }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 description">{!! Str::limit(strip_tags(html_entity_decode($product->description)), 100)!!}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 description">{{ $product->quantity }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 status">
                                    @if($product->status == 'available')
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent">{{ __('Còn hàng') }}</span>
                                    @elseif( $product->status == 'out of stock')
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent">{{ __('Hết hàng') }}</span>
                                    @else
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-yellow-100 border-transparent text-yellow-500 dark:bg-yellow-500/20 dark:border-transparent">{{ __('Đang về hàng') }}</span>
                                    @endif
                                </td>
                                <td class="text-center"><a onclick="detailImportExportHandle(this)" data-id="{{ $product->id }}"><i data-lucide="eye" class="inline-block size-4 ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600" aria-label="{{ __('Xem chi tiết') }}" title="{{ __('Xem chi tiết') }}"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $listProducts->links() !!}
    </div>
</div>

@include('includes.modal-detail-import-export')
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);

    function detailImportExportHandle(storage) {
        let id = storage.getAttribute('data-id');
        let url = '/admin/storages/get-detail-import-export-handle';

        $.ajax({
            url: url,
            data: {
                'id': id
            }
        }).done(function(result) {
            $('#table-body-detail').empty();
            $('#modalDetailImportExport').attr('style', 'display: flex !important');
            for (let i = 0; i < result.length; i++) {
                let strAppend = `<tr>
                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">` + result[i].created_at + `</td>
                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">` + result[i].code + `</td>
                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">` + result[i].user.name + `</td>
                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">` + result[i].quantity + `</td>
                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">` + result[i].type + `</td>
                        </tr>`;

                $('#table-body-detail').append(strAppend);
            }
        });
    }

    function closeModal() {
        $('#modalDetailImportExport').attr('style', 'display: none !important');
    }
</script>
@endpush
