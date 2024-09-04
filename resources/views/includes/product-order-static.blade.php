<style>
    .btn-success {
        background: green;
        color: white;
    }

    .btn-danger {
        background: red;
        color: white;
    }
</style>

<div class="order-11 col-span-12 2xl:order-1 card 2xl:col-span-12">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
            <div class="2xl:col-span-3">
                <h6 class="text-15">{{ __('Thống kê đơn hàng') }}</h6>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                    <tr>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            #
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('ID Đơn hàng') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Tên khách hàng') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Địa chỉ') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Ngày đặt') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Phương thức thanh toán') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Tổng giá trị') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Trạng thái') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Hành động') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderStatic as $key => $order)
                    <?php if ($order->payment) {
                        $data = $order->payment;
                        $data = "thanh toán khi nhận hàng";
                    } else {
                        $data = "";
                    }

                    ?>
                    <tr>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $key + 1 }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $order->order_code }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $order->name }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $order->province }} - {{ $order->district }} - {{ $order->ward }} - {{ $order->address }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ date("d/m/Y", strtotime($order->order_date)) }}
                        </td>

                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $data }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ number_format($order->total_money, 0, ',', '.') }}
                        </td>

                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500 status">
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
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            <div class="relative dropdown">
                                <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="usersAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="usersAction1">
                                    <li>
                                        <a data-modal-target="addUserModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{route('admin.detailDetail', $order['id'])}}"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">{{__('Chi tiết')}}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 15px;">
                {!! $orderStatic->links() !!}
            </div>

        </div>
    </div>
</div>
