<table>
    <tbody>
        <tr>
            @for($i = 0; $i < 5 ; $i++)
            <td></td>
            @endfor
            <td colspan="2" rowspan="11" style="border-left: 1px solid; border-right: 1px solid"></td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="2" style="font-size: 18px; font-weight: bold;">CÔNG TY TNHH MÁY TÍNH KATTECH PC</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Trụ sở chính: {{ config('company.headquarters') }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Hotline: {{ config('company.hotline') }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><a href="mailto:info@kattechpc.vn">Email: {{ config('company.email') }}</a></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><a href="https://kattechpc.vn">Website: https://kattechpc.vn</a></td>
        </tr>
        @for($k = 0; $k < 4 ; $k++)
        <tr></tr>
        @endfor
        <tr>
            <td colspan="7" rowspan="2" align="center" valign="middle" style="font-size: 20px; font-weight: bold;">BÁO GIÁ CHI TIẾT</td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="2" style="font-weight: bold;">{{ __('Tên khách hàng:') }}</td>
            <td></td>
            <td></td>
            <td colspan="2" style="background-color: #f3070f; color: white; text-align: center;">{{ __('Ngày') }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="font-weight: bold;">{{ __('Địa chỉ:') }}</td>
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: center;">{{ date('d/m/Y') }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="font-weight: bold;">{{ __('Mã số thuế:') }}</td>
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: center;">{{ __('Đơn vị tiền:') }} VNĐ</td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('STT') }}</td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('Tên sản phẩm') }}</td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('Bảo hành') }}</td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('Số lượng') }}</td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('Đơn giá') }}</td>
            <td style="background-color: #f3070f; border: 1px solid #fff;">{{ __('Thành tiền') }}</td>
        </tr>
        @foreach($cartInfos as $key => $product)
        <tr>
            <td></td>
            <td style="border: 1px solid #fff;" align="left">{{ $key + 1 }}</td>
            <td style="border: 1px solid #fff;">{{ $product->name }}</td>
            <td style="border: 1px solid #fff;">24 tháng</td>
            <td style="border: 1px solid #fff;" align="left">{{ $product->quantity }}</td>
            <td style="border: 1px solid #fff;">{{ number_format($product->price) }}đ</td>
            <td style="border: 1px solid #fff;" align="right">{{ number_format(($product->price) *  $product->quantity) }}đ</td>
        </tr>
        @endforeach

        <tr>
            <td></td>
            @for($m = 0; $m < 6; $m++)
            <td style="border: 1px solid #fff;"></td>
            @endfor
        </tr>
        <tr>
            <td></td>
            @for($h = 0; $h < 6; $h++)
            <td style="border: 1px solid #fff;"></td>
            @endfor
        </tr>
        <tr>
            <td></td>
            <td colspan="3" style="border: 1px solid #fff;"></td>
            <td style="border: 1px solid #fff;"></td>
            <td style="border: 1px solid #fff;"></td>
            <td style="border: 1px solid #fff;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" rowspan="7" valign="middle">
                {{ __('Quý khách lưu ý: Giá bán, khuyến mại của sản phẩm và tình trạng còn hàng có thể bị thay đổi bất cứ lúc nào mà không kịp báo trước') }}<br>
                {{ __('Để biết thêm chi tiết, Quý khách vui lòng liên hệ KATTECH PC qua Hotline:') }} {{ config('company.hotline') }} {{ __('(8h30-18h30 tất cả các ngày trong tuần)') }} {{ __('hoặc') }} email: {{ config('company.email') }}<br>
                {{ __('Một lần nữa KATTECH PC cảm ơn quý khách!') }}
            </td>
            <td></td>
            <td style="background-color: #f77e7e;">{{ __('Phí vận chuyển') }}</td>
            <td>0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="background-color: #f77e7e;">{{ __('Chi phí khác') }}</td>
            <td>0</td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td style="background-color: #f77e7e;">{{ __('Tổng tiền đơn hàng') }}</td>
            <td>{{ number_format($total) }}</td>
        </tr>
        @if(Session::has('discount-total'))
            <?php $getDiscount = Session::get('discount-total');
            $intValue =  str_replace(',', '', $getDiscount);
            $disCountInt = intval(str_replace('.', '', $intValue));
            $money = $total - $disCountInt;
            ?>
        <tr>
            <td></td>
            <td></td>
            <td style="background-color: #f77e7e;">{{ __('Được giảm tiền mặt') }}</td>
            <td align="right">{{number_format($disCountInt) }}đ</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="background-color: #f77e7e;">{{ __('Tổng tiền đơn hàng') }}</td>
            <td align="right">{{number_format($money) }}đ </td>
        </tr>
            @else
            <tr>
                <td></td>
                <td></td>
                <td style="background-color: #f77e7e;">{{ __('Được giảm tiền mặt') }}</td>
                <td align="right">-</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td style="background-color: #f77e7e;">{{ __('Tổng tiền đơn hàng') }}</td>
                <td align="right">{{number_format($total) }}đ </td>
            </tr>
        @endif
    </tbody>
</table>
