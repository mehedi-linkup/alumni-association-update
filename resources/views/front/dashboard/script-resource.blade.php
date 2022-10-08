@section('script-resource')
    <script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/admin/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/daterangepicker/jquery.datepicker2.min.js') }}"></script>
  <!--    Validate js -->
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
    // end logout menu Responsiv   
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
        $(".profile").click(function (){
            $(".std-profile").css("display","block");
            $(".std-edit-profile").css("display","none");
        })
        function paymentinfo()
        {
            $('.nav-tabs > li > a').parents().find(".active").removeClass("active");
            $('.nav-tabs > li > a').parents().find("#payment").addClass("active");
        }
    </script>
@endsection
