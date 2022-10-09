var mybutton = document.getElementById("myBtn");
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$('.carousel').carousel();

$(function () {
    var i = 0;
    $("#header-navigation .menu-toggle").click(function () {
        i++;
        if (i % 2 == 1) {
            $(this).addClass("selected");
            $(".menu-toggle .fa-close").css("display", "block");
            $(this).parent().addClass("toggled-on");
            $(this).parent("#header-navigation").children(".header-menu-content").fadeIn("slow");
        } else {
            $(this).removeClass("selected");
            $(".menu-toggle .fa-close").css("display", "none");
            $(this).parent().removeClass("toggled-on");
            $(this).parent("#header-navigation").children(".header-menu-content").fadeOut("slow");
        }
    })
    var j = 0;
    $(".dropdown-toggle").click(function () {
        j++;
        if (j % 2 == 1) {
            $(".dropdown-toggle.toggled-on.active").removeClass("toggled-on active");
            $(".sub-menu.toggled-on").removeClass("toggled-on");
            $(this).addClass("toggled-on active");
            $(this).parent().children(".sub-menu").addClass("toggled-on");
        } else {
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
    loop: true,
    margin: 30,
    nav: true,
    autoplay: false,
    dots: false,
    // stagePadding:50,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 4
        },
        1000: {
            items: 6
        }
    }
})
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    autoplay: true,
    dots: false,
    // stagePadding:50,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 4
        },
        1000: {
            items: 4
        }
    }
})
var _CONTENT = [
    "100 Years Celebration of Ali Azam School",
];
var _PART = 0;
var _PART_INDEX = 0;
var _INTERVAL_VAL;
var _ELEMENT = document.querySelector("#text");
var _CURSOR = document.querySelector("#cursor");
function Type() {
    var text = _CONTENT[_PART].substring(0, _PART_INDEX + 1);
    _ELEMENT.innerHTML = text;
    _PART_INDEX++;
    if (text === _CONTENT[_PART]) {
        // Hide the cursor
        _CURSOR.style.display = 'none';

        clearInterval(_INTERVAL_VAL);
        setTimeout(function () {
            _INTERVAL_VAL = setInterval(Delete, 50);
        }, 1000);
    }
}
function Delete() {
    var text = _CONTENT[_PART].substring(0, _PART_INDEX - 1);
    _ELEMENT.innerHTML = text;
    _PART_INDEX--;
    if (text === '') {
        clearInterval(_INTERVAL_VAL);
        if (_PART == (_CONTENT.length - 1))
            _PART = 0;
        else
            _PART++;

        _PART_INDEX = 0;
        setTimeout(function () {
            _CURSOR.style.display = 'inline-block';
            _INTERVAL_VAL = setInterval(Type, 300);
        }, 200);
    }
}
_INTERVAL_VAL = setInterval(Type, 300);

let myDate = document.getElementById('jumping_date').innerHTML;
var _CONTENT1 = [
    `Celebration Date: ${myDate}`
];
var _PART1 = 0;
var _PART_INDEX1 = 0;
var _INTERVAL_VAL1;
var _ELEMENT1 = document.querySelector("#text1");
var _CURSOR1 = document.querySelector("#cursor1");
function Type1() {
    var text1 = _CONTENT1[_PART1].substring(0, _PART_INDEX1 + 1);
    _ELEMENT1.innerHTML = text1;
    _PART_INDEX1++;
    if (text1 === _CONTENT1[_PART1]) {
        _CURSOR1.style.display = 'none';

        clearInterval(_INTERVAL_VAL1);
        setTimeout(function () {
            _INTERVAL_VAL1 = setInterval(Delete1, 50);
        }, 1000);
    }
}
function Delete1() {
    var text1 = _CONTENT1[_PART1].substring(0, _PART_INDEX1 - 1);
    _ELEMENT1.innerHTML = text1;
    _PART_INDEX1--;
    if (text1 === '') {
        clearInterval(_INTERVAL_VAL1);
        if (_PART1 == (_CONTENT1.length - 1))
            _PART1 = 0;
        else
            _PART1++;
        _PART_INDEX1 = 0;
        setTimeout(function () {
            _CURSOR1.style.display = 'inline-block';
            _INTERVAL_VAL1 = setInterval(Type1, 300);
        }, 200);
    }
}

_INTERVAL_VAL1 = setInterval(Type1, 300);