<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>CÔNG TY TNHH MÁY TÍNH KATTECH PC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="revisit-after" content="2 days">
    <meta name="robots" content="index, follow">
    <meta name="author" content="CÔNG TY TNHH MÁY TÍNH KATTECH PC">
    <meta name="distribution" content="global">
    <style>
        .list_table {
            border-collapse: collapse;
        }

        .list_table td {
            border: solid 1px #aaa;
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

        @media print {
            .screen-only {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div style="width: 800px;margin: 0 auto;" id="capture">
        <table width="800">
            <tbody>
                <tr>
                    <td colspan="2" valign="top">
                        <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt="Kattech pc" style="width:210px;"></a>
                    </td>
                    <td colspan="5" align="right" style="line-height: 19px;">
                        <b style="color: #007bff;font-size: 20px;">CÔNG TY TNHH MÁY TÍNH KATTECH PC</b><br>
                        Trụ sở chính: {{ config('company.headquarters') }}<br>
                        Website: <a style="text-decoration: none;" href="{{ route('home') }}">kattechpc.vn</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="7" style="border-top: 4px double #ccc;;font-size:21px; font-weight:bold; text-align:center; padding:15px 0;">{{ __('BÁO GIÁ THIẾT BỊ') }}</td>
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
        <table width="800">
            <tbody>
                <tr>
                    <td colspan="5" align="left"></td>
                    <td colspan="3" align="right">
                        {{ __('Ngày báo giá:') }} {{ date('d-m-Y') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left"></td>
                    <td colspan="3" align="right">
                        <i>{{ __('Đơn vị tính') }}: VNĐ</i>
                    </td>
                </tr>
            </tbody>
        </table>

        <div style="padding: 10px;"></div>
        <table width="800" class="list_table" border="1">
            <tbody>
                <tr style="color: #000;font-weight: bold;">
                    <td>STT</td>
                    <td colspan="2">{{ __('Tên sản phẩm') }}</td>
                    <td width="100">{{ __('Bảo hành') }}</td>
                    <td width="70">{{ __('Số lượng') }}</td>
                    <td width="100">{{ __('Đơn giá') }}</td>
                    <td width="120">{{ __('Thành tiền') }}</td>
                </tr>

                @foreach($getProduct as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td colspan="2">
                        <a href="{{ route('productDetail', $product->slug) }}">{{ $product->name }}</a> <br>
                        Mã sp: {{ $product->code }} <br>
                    </td>
                    <td>{{ $product->status_guarantee }} </td>
                    <td>1</td>
                    @if($product->new_price != null)
                    <td>{{ $product->new_price }} đ</td>
                    @else
                    <td>{{ $product->price }} đ</td>
                    @endif

                    @if($product->new_price != null)
                    <td width="120">{{ $product->new_price }} đ</td>
                    @else
                    <td width="120">{{ $product->price }} đ</td>
                    @endif
                </tr>
                @endforeach

                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" style="background:#b8cce4;">{{ __('Phí vận chuyển') }}</td>
                    <td style="background:#b8cce4;">0</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" style="background:#b8cce4;">{{ __('Chi phí khác') }}</td>
                    <td style="background:#b8cce4;">0</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" style="background:#b8cce4;">{{ __('Tổng tiền đơn hàng') }}</td>
                    <td style="background:#b8cce4;">{{ number_format($total, 0, ',', '.') }} đ</td>
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

        <table width="800">
            <tbody>
                <tr>
                    <td colspan="8"><b>{{ __('Quý khách lưu ý:') }}</b> {{ __('Giá bán, khuyến mại của sản phẩm và tình trạng còn hàng có thể bị thay đổi bất cứ lúc nào mà không kịp báo trước') }}</td>
                </tr>
                <tr>
                    <td colspan="7">
                        {{ __('Để biết thêm chi tiết, Quý khách vui lòng liên hệ KATTECH PC qua hotline') }} 097.9999.191 (8h30-18h30 {{ __('tất cả các ngày trong tuần') }}) {{ __('hoặc email') }}: <a href="mailto:info@kattechpc.vn">info@kattechpc.vn</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">{{ __('Một lần nữa KATTECH PC cảm ơn quý khách!') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="screen-only" style="text-align: center;padding: 20px 0;">
            <a href="{{ route('buildPC') }}" class="btn_cyan" style="width:150px;display:inline-block;border:1px solid #dcdcdc;border-radius:3px;padding:5px">{{ __('Xây lại cấu hình') }}</a>
            <a href="javascript:window.print()" style="width:100px;display:inline-block;border:1px solid #dcdcdc;border-radius:3px;padding:5px" class="btn_orange">{{ __('In đơn hàng') }}</a>
        </div>
    </div>
</body>

</html>
