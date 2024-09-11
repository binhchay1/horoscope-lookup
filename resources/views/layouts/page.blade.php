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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/page/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/page/lib.min.css') }}">

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

    <script src="{{ asset('/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/page/viewv1.min.js') }}"></script>
    <script src="{{ asset('/js/page/clipboard.min.js') }}"></script>
    <script src="{{ asset('/js/page/footerv6.min.js') }}"></script>

    @yield('js')
</body>

</html>
