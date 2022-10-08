@section('script-resource')
    <script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/admin/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    @stack('website-js')
    <script type="text/javascript">
        //Get the button
        var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }





        $('.carousel').carousel()
    </script>
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


        $('.sponsored').owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplay:false,
            dots: false,
            // stagePadding:50,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:4
                },
                1000:{
                    items:6
                }
            }
        })
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplay:true,
            dots: false,
            // stagePadding:50,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:4
                },
                1000:{
                    items:4
                }
            }
        })

        
        // Auto Typewriter is start here
        var _CONTENT = [
            "100 Years Celebration of Ali Azam School",
        ];

        // Current sentence being processed
        var _PART = 0;

        // Character number of the current sentence being processed
        var _PART_INDEX = 0;

        // Holds the handle returned from setInterval
        var _INTERVAL_VAL;

        // Element that holds the text
        var _ELEMENT = document.querySelector("#text");

        // Cursor element
        var _CURSOR = document.querySelector("#cursor");

        // Implements typing effect
        function Type() {
            // Get substring with 1 characater added
            var text =  _CONTENT[_PART].substring(0, _PART_INDEX + 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX++;

            // If full sentence has been displayed then start to delete the sentence after some time
            if(text === _CONTENT[_PART]) {
                // Hide the cursor
                _CURSOR.style.display = 'none';

                clearInterval(_INTERVAL_VAL);
                setTimeout(function() {
                    _INTERVAL_VAL = setInterval(Delete, 50);
                }, 1000);
            }
        }

        // Implements deleting effect
        function Delete() {
            // Get substring with 1 characater deleted
            var text =  _CONTENT[_PART].substring(0, _PART_INDEX - 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX--;

            // If sentence has been deleted then start to display the next sentence
            if(text === '') {
                clearInterval(_INTERVAL_VAL);

                // If current sentence was last then display the first one, else move to the next
                if(_PART == (_CONTENT.length - 1))
                    _PART = 0;
                else
                    _PART++;

                _PART_INDEX = 0;

                // Start to display the next sentence after some time
                setTimeout(function() {
                    _CURSOR.style.display = 'inline-block';
                    _INTERVAL_VAL = setInterval(Type, 300);
                }, 200);
            }
        }

        // Start the typing effect on load
        _INTERVAL_VAL = setInterval(Type, 300);
        // Auto typewriter is end here

        let myDate = document.getElementById('jumping_date').innerHTML;
        
        // Auto Typewriter1 is start here
        var _CONTENT1 = [
            `Celebration Date: ${myDate}`
        ];

        // Current sentence being processed
        var _PART1 = 0;

        // Character number of the current sentence being processed
        var _PART_INDEX1 = 0;

        // Holds the handle returned from setInterval
        var _INTERVAL_VAL1;

        // Element that holds the text
        var _ELEMENT1 = document.querySelector("#text1");

        // Cursor element
        var _CURSOR1 = document.querySelector("#cursor1");

        // Implements typing effect
        function Type1() {
            // Get substring with 1 characater added
            var text1 =  _CONTENT1[_PART1].substring(0, _PART_INDEX1 + 1);
            _ELEMENT1.innerHTML = text1;
            _PART_INDEX1++;

            // If full sentence has been displayed then start to delete the sentence after some time
            if(text1 === _CONTENT1[_PART1]) {
                // Hide the cursor
                _CURSOR1.style.display = 'none';

                clearInterval(_INTERVAL_VAL1);
                setTimeout(function() {
                    _INTERVAL_VAL1 = setInterval(Delete1, 50);
                }, 1000);
            }
        }
1
        // Implements deleting effect
        function Delete1() {
            // Get substring with 1 characater deleted
            var text1 =  _CONTENT1[_PART1].substring(0, _PART_INDEX1 - 1);
            _ELEMENT1.innerHTML = text1;
            _PART_INDEX1--;

            // If sentence has been deleted then start to display the next sentence
            if(text1 === '') {
                clearInterval(_INTERVAL_VAL1);

                // If current sentence was last then display the first one, else move to the next
                if(_PART1 == (_CONTENT1.length - 1))
                    _PART1 = 0;
                else
                    _PART1++;

                _PART_INDEX1 = 0;

                // Start to display the next sentence after some time
                setTimeout(function() {
                    _CURSOR1.style.display = 'inline-block';
                    _INTERVAL_VAL1 = setInterval(Type1, 300);
                }, 200);
            }
        }

        // Start the typing effect on load
        _INTERVAL_VAL1 = setInterval(Type1, 300);
        // Auto typewriter1 is end here

    </script>
@endsection
