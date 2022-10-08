@section('header-resource')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/css/calendar.scss') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/css/owl.carousel.min.css') }}">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('front/images/logo.jpg') }}" type="image/gif" sizes="16x16">
    {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.js">
    </script>
    <link href="{{ asset('/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/calendar1.css') }}" rel="stylesheet" type="text/css">
    @stack('website-css')
@endsection
