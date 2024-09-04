<div id="addImageModal" modal-center="" class="fixed flex flex-col transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 hidden">
    <div class="w-screen lg:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">{{ __('Thêm ảnh') }}</h5>
            <button data-modal-close="extraLargeModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x size-5">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <h5 class="mb-3 text-16">{{ __('Chọn ảnh và điền đường dẫn') }}</h5>
            <form method="POST" action="{{ route('admin.store.slide') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="xl:col-span-6">
                        <label for="categoryInput" class="inline-block mb-2 text-base font-medium">{{ __('Ảnh') }}</label>
                        <input type="file" class="border-0 bg-light pl-0" name="slide_image" id="image10" hidden>
                        <div id="btnimage">
                            <img id="showImage10" class="show-avatar" src="{{ asset('/images/layout/500x250.png') }}" alt="avatar">
                        </div>
                        <div id="button-10">
                            <i class="fas fa-camera btn_chooseImg"> {{ __('Chọn hình ảnh') }}</i>
                        </div>
                    </div>

                    <div class="xl:col-span-6">
                        <label for="categoryParentInput" class="inline-block mb-2 text-base font-medium">{{ __('Đường dẫn') }}</label>
                        <input type="text" id="categoryInput" name="slide_url" value="{{ old('image') }}" class="form-input  border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="{{ __('Nhập đường dẫn') }}">
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __('Xóa toàn bộ') }}</button>
                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __('Thêm slide') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
