<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Horoscope">
    <meta name="rating" content="General">
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="7 days">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @yield('title')

    <link rel="shortcut icon" href="{{ asset('/images/logo/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/css/page/util.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/plugins/font-awesome/font-awesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/page/style.min.css') }}">

    @yield('css')
</head>

<body>
    <div id="all-content-in">
        <div id="content-page">
            @yield('content')
        </div>
        <div id="footer-page">
            @include('includes.footer-page')
        </div>
    </div>

    <div class="alert-box hide" id="alertBox"></div>
    <div class="alert-success-box" id="alertSuccessBox">Thành công</div>
    <script src="{{ asset('/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/page/viewv1.min.js') }}"></script>
    <script src="{{ asset('/js/page/clipboard.min.js') }}"></script>
    <script src="{{ asset('/js/page/footerv6.min.js') }}"></script>

    @yield('js')
</body>

</html>
