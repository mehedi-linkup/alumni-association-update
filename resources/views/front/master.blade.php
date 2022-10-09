@include('front.update-news')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/css/calendar.scss') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/owl.carousel.min.css') }}">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('front/images/logo.jpg') }}" type="image/gif" sizes="16x16">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.js">
    </script>
    <link href="{{ asset('/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/calendar1.css') }}" rel="stylesheet" type="text/css">
    @yield('header-resource1')
    @stack('website-css')
</head>

<body class="site-layout-fluid">
    <div id="main_page" class="ali_azom site">
        @include('front.topbar')
        @yield('content')
    </div>
    <!-- @yield('sponsored') -->
    <!-- @yield('update') -->
    @include('front.footer')


    <script src="{{ asset('/admin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('/admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/front/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    @stack('website-js')
    @yield('script')
</body>
</html>
