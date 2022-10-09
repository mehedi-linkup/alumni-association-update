<div id="header-top">
    <div class="container">
        <div id="emergency-contact">
            <ul>
                @php
                $data = App\HeaderContent::first();
                @endphp
                <li class="emergency-call"><i class="fas fa-phone"></i><a href="tel:{{$data->phone}}">{{$data?$data->phone:""}}</a></li>
                <li class="emergency-email"><i class="fa fa-inbox"></i><a href="mailto:{{$data->email}}">{{$data?$data->email:""}}</a></li>
            </ul>

        </div>
        <div class="header-social-wrapper">
            <div class="widget education_hub_widget_social">
                <ul>
                    <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header id="header-top-master" class="site-header" role="banner" style="position: relative">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 d-md-flex align-items-center">
                <div class="logo-left">
                    <a href="{{route('/')}}">
                        <img src="{{asset('front/images/ali-azam-01.jpg')}}" class="custom-logo" alt="Ali azam School">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="master-identity">
                    <h1 class="master-title"> Ali Azam School & College Alumni Association</h1>
                    <p class="master-sulogan" style="margin-bottom:5px!important; font-style:italic; font-family:roboto;">One Purpose, One Mission, One Dream for Together</p>
                    <p class="master-address" style="margin-bottom:5px!important;">(Munshirhat, Fulgazi, Feni)</p>
                    <div id="text">
                        <div id="cursor"></div>
                    </div><br>
                    <div></div>
                    <div id="text1">
                        <div id="cursor1"></div>
                    </div>
                    <div id="jumping_date" style="display:none">{{ date('j F, Y', strtotime(@$contact_info->program_start_date)) }}</div>
                </div>

            </div>
            <div class="col-12 col-md-3 d-md-flex align-items-center">
                <div class="logo-right">
                    <img width="195" height="195" src="{{asset('front/images/100-year.jpg')}}" alt="Ali azam School">
                </div>
            </div>
        </div>
    </div>
    <iframe class="countdown" width="195" height="auto" src="{{asset('front/html/iframe.html')}}" frameborder="0"></iframe>
</header>
<div id="main-header-nav" class="clear-fix">
    <div class="container">
        <nav id="header-navigation" class="main-header-navigation" role="navigation" aria-expanded="false">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="fa fa-bars"></i>
                <i class="fa fa-close"></i>
                Menu</button>
            <div id="registration" class="align-center">
                <a href="{{url('/participant/login')}}" class="btn btn-success" style="color: #fff;">Login</a>

                <a href="{{route('signup')}}" class="btn btn-danger">
                    Registration
                </a>
            </div>
            <div class="header-menu-content">
                <div class="menu-main_menu-container">
                    <ul id="primary-menu" class="menu">
                        <li id="menu-item-243" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-243">
                            <a href="{{route('/')}}" aria-current="page">Home</a>
                        </li>
                        <li id="menu-item-134" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-134" aria-haspopup="true">
                            <a href="#">About Us</a>
                            <button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">
                                </span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="{{route('about-history', ['type'=> 'History'])}}">History Of Ali azam School</a></li>
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="{{route('about-history', ['type'=> 'Achievement'])}}">Achievement of the organization</a></li>
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="{{route('terms-conditions')}}">Terms and Conditions</a></li>
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="{{route('return-policy')}}">Return Policy</a></li>
                            </ul>
                        </li>
                        <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-452" aria-haspopup="true">
                            <a href="">News & Events</a>
                            <button class="dropdown-toggle" aria-expanded="false">
                                <span class="screen-reader-text"></span>
                            </button>
                            <ul class="sub-menu">
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item">
                                    <a href="{{route('get-news-type',['type'=>'upcoming-news-event'])}}">Important Notices about the Upcoming Event</a>
                                </li>
                                <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item">
                                    <a href="{{route('get-news-type',['type' => 'upcoming-news-meeting'])}}">Information about upcoming meeting</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-604" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-604" aria-haspopup="true"><a href="">Committee</a>
                            <button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text"></span></button>
                            <ul class="sub-menu">
                                <?php $committee = DB::table('committes')->orderBy('committee_type')->distinct()->get();
                                $prev = "";
                                ?>
                                @foreach($committee as $com)
                                <?php if ($prev != $com->committee_type) { ?>
                                    <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-605">
                                        <a href="{{route('get-committee-type',['type'=>$com->committee_type])}}">{{$com->committee_type}}</a>
                                    </li>
                                <?php };
                                $prev = $com->committee_type; ?>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-666" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-666" aria-haspopup="true">
                            <a href="{{route('school-gallery')}}">Gallery</a>
                        </li>
                        <li id="menu-item-553" aria-haspopup="true">
                            <a href="{{route('contact-us')}}">Contact Info</a>
                        </li>
                        <li id="menu-item-666" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-666" aria-haspopup="true">
                            <a href="{{route('view-soronika')}}">Soronika</a>
                        </li>
                        <div id="menu-item-registration" class="float-right" aria-haspopup="true"><a href="{{route('signup')}}" class="btn btn-danger">Registration</a>

                        </div>
                        <div id="menu-item-login" class="float-right" aria-haspopup="true" style="margin-left: -1%;"><a href="{{url('/participant/login')}}" class="btn btn-success" style="color: #fff;">Login</a>

                        </div>


                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>
