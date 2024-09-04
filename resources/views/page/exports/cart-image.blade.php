<style>
    .list_table {
        border-collapse: collapse;
    }

    .list_table td {
        padding: 5px;
        vertical-align: middle;
    }

    .cart_first_tr {
        background-color: #cccccc;
    }

    body,
    form,
    table,
    td,
    span,
    div {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .title a {
        color: #0000FF;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        text-decoration: none;
    }

    .title a:hover {
        color: #0000FF;
        text-decoration: underline;
    }

    #capture {
        width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ebeff5;
    }

    #capture::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: calc(100% - 150px);
        opacity: .1;
        z-index: 1;
        background: url('/images/logo/logo.png') no-repeat;
        background-position: center;
    }

    .p-name {
        font-size: 14px;
        font-weight: bold;
        margin: 0;
    }
</style>

<div id="capture">
    <table width="800">
        <tbody>
            <tr>
                <td colspan="5" align="center" style="line-height: 19px;">
                    <b style="color: #007bff;font-size: 20px;">CÔNG TY TNHH MÁY TÍNH KATTECH PC</b><br>
                    {{ __('Trụ sở chính:') }} {{ config('company.headquarters') }}<br>
                    Website: <a style="text-decoration: none;" href="{{ route('home') }}">kattechpc.vn</a>
                </td>
            </tr>
            <tr>
                <td colspan="7"></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <div style="padding: 10px;"></div>
    <table width="800" class="list_table">
        <tbody>
            <tr style="color: #000;font-weight: bold;">
                <td colspan="2">{{ __('Tên sản phẩm') }}</td>
                <td width="100">{{ __('Bảo hành') }}</td>
                <td width="100">{{ __('Đơn giá') }}</td>
                <td width="100">{{ __('Số lượng') }}</td>
                <td width="120">{{ __('Thành tiền') }}</td>
            </tr>

            @foreach($cartInfor as $key => $product)
            <tr>
                <td colspan="2">
                    <p class="p-name" href="{{ route('productDetail', $product->id) }}">{{ $product->name }}</p> <br>
                    {{ __('Mã sp:') }} {{ $product->code }} <br>
                </td>
                <td>24 tháng </td>
                <td style="border: 1px solid #fff;">{{ number_format($product->price) }}đ</td>
                <td>{{ $product->quantity }} </td>
                <td style="border: 1px solid #fff;">{{ number_format(($product->price) *  $product->quantity) }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <table width="800">
        <tbody>
            <tr>
                <td colspan="8"><b>{{ __('Quý khách lưu ý:') }}</b> {{ __('Giá bán, khuyến mại của sản phẩm và tình trạng còn hàng có thể bị thay đổi bất cứ lúc nào mà không kịp báo trước') }}</td>
            </tr>
            <tr>
                <td colspan="7">
                    {{ __('Để biết thêm chi tiết, Quý khách vui lòng liên hệ KATTECH PC qua hotline') }} {{ config('company.hotline') }} (8h30-18h30 {{ __('tất cả các ngày trong tuần') }}) {{ __('hoặc email') }}: <a href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
                </td>
            </tr>
            <tr>
                <td colspan="7">{{ __('Một lần nữa KATTECH PC cảm ơn quý khách!') }}</td>
            </tr>
        </tbody>
    </table>
</div>
