<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/daterangepicker/jquery.datepicker2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/login.css')}}">
    <link rel="icon" href="{{asset('front/images/logo.jpg')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/dashboard.css')}}">
    <link href="{{asset('/admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    @stack('client-css')
</head>
<body class="site-layout-fluid">
    @include('front.dashboard.header')
    <div id="main_page" class="ali_azom site">
        @yield('content')
    </div>

    <footer>
        @include('front.dashboard.footer')
    </footer>
    <script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/admin/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/daterangepicker/jquery.datepicker2.min.js') }}"></script>
    <script src="{{asset('/front/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/front/js/signup.js')}}"></script>  
    <script>
        $(function () {
            var i = 0;
            $("#header-navigation .menu-toggle").click(function (){
                i++;
                if(i%2 == 1){
                    $(this).addClass("selected");
                    $(".menu-toggle .fa-close").css("display","block");
                    $(this).parent().addClass("toggled-on");
                    $(this).parent("#header-navigation").children(".header-menu-content").fadeIn("slow");
                }
                else{
                    $(this).removeClass("selected");
                    $(".menu-toggle .fa-close").css("display","none");
                    $(this).parent().removeClass("toggled-on");
                    $(this).parent("#header-navigation").children(".header-menu-content").fadeOut("slow");
                }
            })
            var j =0;
            $(".dropdown-toggle").click(function (){
                j++;
                if(j%2 == 1){
                    $(".dropdown-toggle.toggled-on.active").removeClass("toggled-on active");
                    $(".sub-menu.toggled-on").removeClass("toggled-on");
                    $(this).addClass("toggled-on active");
                    $(this).parent().children(".sub-menu").addClass("toggled-on");
                }
                else{
                    $(this).removeClass("toggled-on active");
                    $(this).parent().children(".sub-menu").removeClass("toggled-on");
                }

            })
            $(window).bind('scroll', function () {
                if ($(window).scrollTop() > 50) {
                    $('#main-header-nav').addClass('fixed-top');
                } else {
                    $('#main-header-nav').removeClass('fixed-top');
                }
            });
        })
        $('.nav-tabs > li > a').click(function () {
            $(this).parents().find(".active").removeClass("active");
            $(this).parent().addClass("active");
            $(this).tab('show');
        });
        function editprofile()
        {
            $(".std-profile").css("display","none");
            $(".std-edit-profile").css("display","block");
        }
        $(".profile").click(function () {
            $(".std-profile").css("display","block");
            $(".std-edit-profile").css("display","none");
        })
        function paymentinfo()
        {
            $('.nav-tabs > li > a').parents().find(".active").removeClass("active");
            $('.nav-tabs > li > a').parents().find("#payment").addClass("active");
        }
    </script>
    @stack('client-js')
</body>

</html>
