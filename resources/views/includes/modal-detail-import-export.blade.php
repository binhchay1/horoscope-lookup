<div id="modalDetailImportExport" modal-center="" class="fixed flex flex-col transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4">
    <div class="w-screen lg:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full modal-content">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">{{ __('Chi tiết nhập/xuất sản phẩm') }}</h5>
            <button onclick="closeModal()" data-modal-close="extraLargeModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x size-5">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                <thead class="text-left">
                    <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="name">{{ __('Ngày') }}</th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="description">{{ __('Mã') }}</th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="description">{{ __('Tên nhân viên') }}</th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="status">{{ __('Số lượng') }}</th>
                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="status">{{ __('Kiểu') }}</th>
                    </tr>
                </thead>
                <tbody class="list" id="table-body-detail">

                </tbody>
            </table>
        </div>
    </div>
</div>
