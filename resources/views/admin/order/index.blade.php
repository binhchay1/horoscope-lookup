@extends('layouts.master-admin')

@section('title')
{{ __('Danh sách đơn hàng') }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/order.css') }}" />
@endsection
@section('content')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12 mt-4">
    <div class="xl:col-span-12">
        <div class="card" id="usersTable">
            <div class="card-body">
                <div class="flex items-center">
                    <h6 class="text-15 grow">{{ __('Danh sách đặt hàng') }}</h6>
                    <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11 button-export">
                        <a class="btn btn-warning float-end" style="background: green; color: white" href="{{route('admin.order.export')}}">{{__('Xuất kho')}}</a>
                    </div>
                </div>
            </div>
            <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                <form action="#!">
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        <div class="relative xl:col-span-2">
                            <input type="text" id="myInput" onkeyup="myFunction()" class="ltr:pl-8 rtl:pr-8  form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{__('Tìm kiếm')}}" autocomplete="off">
                            <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="-mx-5 -mb-5 overflow-x-auto">
                    <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap" id="myTable">
                        <thead class="text-left">
                            <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">

                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="code">
                                    {{ __('Mã đơn hàng') }}
                                </th>

                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="user">{{ __('Người đặt hàng') }}
                                </th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="date">{{ __('Ngày đặt hàng') }}
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="quantity">{{ __('Tổng tiền') }}
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="address">{{ __('Địa chỉ') }}
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="phone">{{ __('Số điện thoại') }}
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="note">{{ __('Ghi chú') }}
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="location">{{ __('Trạng thái') }}
                                </th>
                                <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">{{ __('Hành động') }}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($listOrders as $order)
                            <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">

                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->order_code }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->name }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ date("d/m/Y", strtotime($order->order_date)) }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"> {{ number_format($order->total_money, 0, ',', '.') }} đ
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->address }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->phone }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->notes }}
                                </td>
                                <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 status">
                                    @if($order->status == 1)
                                    <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent"><i data-lucide="check" class="size-3 ltr:mr-1 rtl:ml-1"></i>
                                        {{ __('Xác nhận') }}
                                    </span>
                                    @elseif( $order->status == 0)
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-yellow-100 border-yellow-200 text-yellow-500 dark:bg-yellow-500/20 dark:border-yellow-500/20">
                                        {{ __('Chưa xác nhận') }}</span>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="show-button" style="display: flex">
                                        <a data-modal-target="addUserModal" class="edit-button block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{route('admin.order.edit', $order['id'])}}">
                                            <i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">{{__('Sửa')}}</span></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $listOrders->links() !!}
    </div>
</div>

@endsection
@push('scripts')
<script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);
</script>
@endpush
