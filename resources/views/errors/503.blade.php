@extends('layouts.master-without-nav')

@section('title')
{{ __('503') }}
@endsection

@section('content')
<script type="text/javascript">
    let split = window.location.pathname.split('/');
    let notRedirect = false;
    for (let i = 0; i < split.length; i++) {
        if (split[i] == '503') {
            notRedirect = true;
        }
    }

    if (!notRedirect) {
        window.location.href = '/503';
    }
</script>
<div class="mb-0 border-none shadow-none lg:w-[500px] card bg-white/70 dark:bg-zink-500/70">
    <div class="!px-10 !py-12 card-body">
        <div class="mt-10">
            <img src="{{ URL::asset('build/images/auth/maintenance.png') }}" alt="" class="h-64 mx-auto">
        </div>
        <div class="mt-8 text-center">
            <h4 class="mb-2 text-purple-500">{{ __('Xin lỗi, Dịch vụ không tồn tại') }}</h4>
            <p class="mb-6 text-slate-500 dark:text-zink-200">{{ __('Dịch vụ bạn yêu cầu không tồn tại. Vui lòng kiểm tra lại!') }}</p>
            <form action="{{ route('admin.toggleMaintenanceMode') }}" method="POST">
                <div class="relative flex items-center h-header" style="text-align:center">
                    @csrf
                    <button style="margin: 0 auto; display: block" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 align-middle" type="submit" name="enable" value="0">Maintenance Mode
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
