<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Đăng ký tài khoản thành công') }}</title>
</head>

<body>
    <table style="width: 100%; max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; border-collapse: collapse;">
        <tr>
            <td style="background-color: #f8f8f8; text-align: center; padding: 20px;">
                <h2>{{ __('Chào mừng đến với Kattech PC') }}!</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Dear {{ $user->name }}, </p>
                <p>{{ __('Cảm ơn bạn đã đăng ký trên trang web của chúng tôi. Tai khoản của bạn đa được tạo thanh công.') }}</p>
                <p>{{ __('Nếu bạn không yêu cầu đăng ký này, vui lòng bỏ qua email này.') }}</p>
                <p>{{ __('Trân trọng') }},<br> Kattech PC Team</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #333; color: #fff; text-align: center; padding: 10px;">
                &copy; 2024 Kattech PC. All rights reserved.
            </td>
        </tr>
    </table>
</body>

</html>
