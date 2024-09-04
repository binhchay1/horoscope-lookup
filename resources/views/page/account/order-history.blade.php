@extends('layouts.page')

@section('title')
<title>{{ __('Lịch sử mua hàng') }} | Kattech PC</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/page/profile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/page/order-history.css') }}" />
@endsection

@section('description', __('Lịch sử mua hàng của khách hàng với Kattech PC'))
@section('keywords', 'history, history customer, kattech, kattech pc')
@section('breadcrumb', __('Lịch sử mua hàng'))

@section('content')
<div class="row">
    @include('includes.left-menu-profile')
    <div class="rightcolumn">
        <div class="card">
            <h2>{{ __('Lịch sử mua hàng') }}</h2>
            <div class="basket">
                <div class="basket-labels">
                    <div class="item-code heading">{{ __('Mã đơn hàng') }}</div>
                    <div class="item-date heading">{{ __('Ngày') }}</div>
                    <div class="item-total heading">{{ __('Thành tiền') }}</div>
                    <div class="item-action heading">{{ __('Hành động') }}</div>
                </div>
                <?php
                // Convert the collection to an array and sort it by 'created_at'
                $sortedPosts = $dataUser->orders->sortByDesc('order_date');
                ?>
                @foreach($sortedPosts as $orderHistory)
                <div class="basket-product">
                    <div class="item-code">{{ $orderHistory->order_code }}</div>
                    <div class="item-date">{{date("d/m/Y", strtotime($orderHistory->order_date))  }}</div>
                    <div class="item-total">{{ number_format($orderHistory->total_money, 0, '.', '.') }}đ</div>
                    <div class="item-action"><button type="button" data-toggle="modal" data-target="#modalDetail" data-id="{{ $orderHistory->id }}">{{ __('Xem chi tiết') }}</button></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('includes.modal-detail-order-history')
@endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert-block').remove();
    }, 5000);

    $('#modalDetail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var urlGetDetail = '/get-order-detail/' + id;

        $.ajax({
            type: "get",
            url: urlGetDetail,
            success: function(result) {
                $('#table-body-detail').empty();
                $('#modalDetail').attr('style', 'display: flex !important');
                for (let i = 0; i < result.length; i++) {
                    let strAppend = `<tr>
                            <td class="column1">` + formatDate("d/m/Y",Number(result[i].order.order_date)) + `</td>
                            <td class="column2">` + result[i].order.order_code + `</td>
                            <td class="column3">` + result[i].product.name + `</td>
                            <td class="column4">` + addThousandSeparator(result[i].price) +'đ' + `</td>
                            <td class="column5">` + result[i].quantity + `</td>
                            <td class="column6">` + addThousandSeparator(result[i].price * result[i].quantity)+'đ' + `</td>
                        </tr>`;

                    $('#table-body-detail').append(strAppend);
                }
            }
        });
    })

    function formatDate(format) {
        const date = new Date();
        switch(format){
            case "d-m-Y H:i:s":
                return date.getDate()+"-"+(date.getMonth()+1)+"-"+date.getFullYear()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
            case "d-m-Y":
                return date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
        }
        return  date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
    }

    function addThousandSeparator(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    let number = 1234567;
    let formattedNumber = addThousandSeparator(number);
</script>
@endsection
