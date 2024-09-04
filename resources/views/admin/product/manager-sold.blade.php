@extends('layouts.master-admin')

@section('title')
{{ __('Danh sách sản phẩm đã bán') }}
@endsection

@section('content')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card" id="usersTable">
            <div class="card-body">
                <div class="flex items-center">
                    <h6 class="text-15 grow">{{ __('Danh sách sản phẩm đã bán') }}</h6>
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
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="order_code">{{ __('Mã đơn hàng') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="name">{{ __('Tên khách hàng') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="phone">{{ __('Số điện thoại') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="created_at">{{ __('Ngày mua') }}</th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="detail">{{ __('Chi tiết') }}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($managerSold as $sold)
                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 order_code" style="max-width: 200px; overflow: hidden;">
                                    {{ $sold['order_code'] }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 name"> {{ $sold['name'] }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 phone">{{ $sold['phone'] }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 created_at">{{ $sold['created_at'] }}</td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5" style="width: 100%;">
                                    <div class="items-center gap-2">
                                        <div class="flex items-center size-10 font-medium rounded-full shrink-0  text-slate-800 dark:text-zink-50 dark:bg-zink-600">
                                            <ul class="list-disc list-inside rounded-md marker:text-red-500">
                                                @if(isset($sold['detail']))
                                                @foreach($sold['detail'] as $name => $detail)
                                                <li>
                                                    {{ __('Sản phẩm') }}: {{ $name }} - {{ __('Bảo hành') }}: <span style="font-weight: bold; color:red">{{ $detail['guarantee'] }}</span> - {{ __('Số lượng') }}: {{ $detail['quantity'] }}
                                                    @if(array_key_exists('warranty', $detail))
                                                    - {{ __('Gói bảo hành:') }} <span style="font-weight: bold; color:red">{{ $detail['warranty']->title }}</span>
                                                    @endif
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $managerSold->links() !!}
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
</script>
@endpush
