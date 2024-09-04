@extends('layouts.master-admin')

@section('title')
{{ __('Thống kê') }}
@endsection

@section('content')
<div class="grid grid-cols-12 gap-x-5" style="margin-top: 20px;">
    <div class="order-6 col-span-12 2xl:order-1 card 2xl:col-span-5">
        <div class="card-body" id="incomChartArea">
            <div class="flex items-center gap-2">
                <h6 class="mb-3 text-15 grow">{{ __('Tổng tiền theo tháng trong năm') }} - <span id="year-html-incom">{{ date('Y') }}</span></h6>
                <select onchange="handleYearIncom($(this))" style="width: auto;" class="rounded-full form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                    @foreach($arrayYearOrder as $yearOrder)
                    <option value="{{ $yearOrder }}">{{ $yearOrder }}</option>
                    @endforeach
                </select>
            </div>

            <div id="incomeChart" class="apex-charts" data-chart-colors='["bg-red-500"]' dir="ltr"></div>
        </div>
    </div>
    <div class="order-7 col-span-12 2xl:order-1 card 2xl:col-span-7">
        <div class="card-body" id="visitorChartArea">
            <div class="flex items-center gap-2">
                <h6 class="mb-3 text-15 grow">{{ __('Tổng lượt truy cập năm') }} - <span id="year-html-visitor">{{ date('Y') }}</span></h6>
                <select onchange="handleYearVisitor($(this))" style="width: auto;" class="rounded-full form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                    @foreach($arrayYearVisitor as $yearVisitor)
                    <option value="{{ $yearVisitor }}">{{ $yearVisitor }}</option>
                    @endforeach
                </select>
            </div>
            <div id="visitorChart" class="apex-charts" data-chart-colors='["bg-custom-500", "bg-purple-500"]' dir="ltr"></div>
        </div>
    </div>
    @include('includes.product-static')

    @include('includes.product-order-static')
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endpush
