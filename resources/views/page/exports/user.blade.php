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
                <td width="100">{{ __('Email') }}</td>
                <td width="100">{{ __('Số điện thoại') }}</td>
                <td width="120">{{ __('Địa chỉ') }}</td>
                <td width="120">{{ __('Tuổi') }}</td>
                <td width="120">{{ __('Giới tính') }}</td>
                <td width="120">{{ __('Chức vụ') }}</td>
                <td width="120">{{ __('Trạng thái khóa') }}</td>
            </tr>

            @foreach($listUser as $user)
            <tr>
                <td colspan="2">
                    <p class="p-name">{{ $user->name }}</p>
                </td>
                <td>{{ $user->email }} </td>
                <td>{{ $user->phone }} </td>
                <td>{{ $user->address }} </td>
                <td>{{ $user->age }} </td>
                <td>{{ $user->sex }} </td>
                <td>{{ $user->role == 'user' ? 'Khách hàng' : 'Quản lý' }} </td>
                <td>{{ $user->lock_user == 1 ? 'Đang khóa' : 'Không khóa' }} </td>
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
