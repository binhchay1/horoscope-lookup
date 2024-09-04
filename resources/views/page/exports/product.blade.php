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
                <td colspan="2">{{ __('Tên') }}</td>
                <td width="100">{{ __('Mô tả') }}</td>
                <td width="100">{{ __('Gía') }}</td>
                <td width="120">{{ __('Trạng thái') }}</td>
                <td width="120">{{ __('Mã') }}</td>
                <td width="120">{{ __('Danh mục') }}</td>
                <td width="120">{{ __('Mô tả ngắn') }}</td>
                <td width="120">{{ __('Gía mới') }}</td>
                <td width="120">{{ __('Qùa tặng') }}</td>
                <td width="120">{{ __('Bảo hành') }}</td>
                <td width="120">{{ __('Tổng số view') }}</td>
                <td width="120">{{ __('Link youtube') }}</td>
            </tr>

            @foreach($listProduct as $product)
            <tr>
                <td colspan="2">
                    <p class="p-name">{{ $product->name }}</p>
                </td>
                <td>{{ strip_tags($product->description) }} </td>
                <td>{{ $product->price }} </td>
                <td>{{ $product->status }} </td>
                <td>{{ $product->code }} </td>
                <td>{{ $product->category->name }} </td>
                <td>{{ $product->short_description }} </td>
                <td>{{ $product->new_price }} </td>
                <td>{{ $product->new_price }} </td>
                <td>{{ $product->status_guarantee }} </td>
                <td>{{ $product->view }} </td>
                <td>{{ $product->link_youtube }} </td>
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
</div>
