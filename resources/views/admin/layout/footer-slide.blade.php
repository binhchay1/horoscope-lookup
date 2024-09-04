<div class="tab-pane hidden" id="footer-slide">
    <button data-modal-target="addImageModalFooter" type="button" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:focus:ring-custom-400/20">{{ __('Thêm ảnh') }}</button>
    <div class="-mx-5 -mb-5 overflow-x-auto" style="margin-top: 10px;">
        <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
            <thead class="text-left">
                <tr class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="image">
                        {{ __('Ảnh') }}
                    </th>
                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">{{ __('Hành động') }}</th>
                </tr>
            </thead>
            <tbody class="list">
                @if($listSlideFooter)
                @foreach($listSlideFooter as $item => $data)
                <tr class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"><img width="200" height="100" src="{{ asset($data['image_footer']) }}" /></td>
                    <td>
                        <div class="relative dropdown">
                            <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="usersAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="usersAction1">
                                <li>
                                    <a data-modal-target="deleteModal1" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">{{__('Xóa')}}</span></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>

                <div id="deleteModal1" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                    <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                            <div class="float-right">
                                <button data-modal-close="deleteModal1" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                            </div>
                            <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                            <div class="mt-5 text-center">
                                <h5 class="mb-1">{{__('Bạn có chắc không?')}}</h5>
                                <p class="text-slate-500 dark:text-zink-200">{{__('Bạn có muốn xóa danh mục này không?')}}</p>
                                <div class="flex justify-center gap-2 mt-6">
                                    <button type="reset" data-modal-close="deleteModal1" class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">{{__('Hủy')}}</button>
                                    <a href="{{ route('admin.delete.footerSlide', $item) }}">
                                        <button class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">{{__('Xóa!')}}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @include('includes.modal-add-footer-image')
</div>
