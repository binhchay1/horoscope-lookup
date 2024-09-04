<div class="order-11 col-span-12 2xl:order-1 card 2xl:col-span-12">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-12">
            <div class="xl:col-span-3">
                <h6 class="text-15">{{ __('Thống kê sản phẩm') }}</h6>
            </div>
        </div>

        <div class="-mx-5 overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                    <tr>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Sản phẩm') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Gía') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Tiền bán được') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Số lượng bán được') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Số lượng xem') }}
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Tỉ lệ mua') }} (%)
                        </th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                            {{ __('Trạng thái') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productStatic as $product)
                    <tr>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $product->name }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $product->price }} đ
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ number_format($product->income, 0, ',', '.') }} đ
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $product->total_quantity }}
                        </td>
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ $product->views }}
                        </td>
                        @if($product->views != 0)
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            {{ number_format(($product->total_quantity / $product->views) * 100, 2) }}%
                        </td>
                        @else
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            0%
                        </td>
                        @endif
                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                            @if($product->status == 'available')
                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent"><i data-lucide="check" class="size-3 ltr:mr-1 rtl:ml-1"></i>
                                {{ __('Còn hàng') }}
                            </span>
                            @elseif( $product->status == 'out of stock')
                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent"><i data-lucide="x" class="size-3 ltr:mr-1 rtl:ml-1"></i>
                                {{ __('Hết hàng') }}
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium rounded border bg-yellow-100 border-transparent text-yellow-500 dark:bg-yellow-500/20 dark:border-transparent"><i data-lucide="check-circle-2" class="size-3 ltr:mr-1 rtl:ml-1"></i>
                                {{ __('Đặt hàng') }}
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            <div style="margin-top: 15px;">
            {!! $productStatic->links() !!}
        </div>
    </div>

</div>
