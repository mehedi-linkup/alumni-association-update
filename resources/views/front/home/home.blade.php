@extends('front.master')
@include('front.sponsored')
@section('title')
    Ali Azam School & College
@endsection
@section('content')
    <div class="clearfix" style="padding-top: 10px">

    </div>
    <section class="slider">
        <div id="content" class="main-content">
            <div class="container">
                <div class="primary-slider" id="primary-slider">

                    {{-- slider start here --}}
                    {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> --}}
                    {{-- <div class="carousel-inner"> --}}
                    {{-- <div class="carousel-item active"> --}}
                    {{-- <img class="d-block w-100" src="{{asset('front/images/slider1.jpg')}}" --}}
                    {{-- alt="First slide"> --}}
                    {{-- </div> --}}
                    {{-- <div class="carousel-item"> --}}
                    {{-- <img class="d-block w-100" src="{{asset('front/images/image3.jpg')}}" --}}
                    {{-- alt="Second slide"> --}}
                    {{-- </div> --}}
                    {{-- <div class="carousel-item"> --}}
                    {{-- <img class="d-block w-100" src="{{asset('front/images/image6.jpg')}}" alt="Third slide"> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" --}}
                    {{-- data-slide="prev"> --}}
                    {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                    {{-- <span class="sr-only">Previous</span> --}}
                    {{-- </a> --}}
                    {{-- <a class="carousel-control-next" href="#carouselExampleControls" role="button" --}}
                    {{-- data-slide="next"> --}}
                    {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                    {{-- <span class="sr-only">Next</span> --}}
                    {{-- </a> --}}
                    {{-- </div> --}}
                    {{-- another slider for testing --}}




                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="row">
                            <div class="slider-left" style="width:100%;">
                                <div class="carousel-inner">
                                    @foreach ($sliders as $key => $slider)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"><img
                                                src="{{ asset($slider->image) }}" alt="Hills"></div>

                                    @endforeach

                                </div>

                                <!-- Left right -->
                                <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#custCarousel" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>

                                <!-- Thumbnails -->
                            </div>

                            <!--<div class="slider-right">-->
                            <!--    <ol class="carousel-indicators list-inline">-->

                            <!--        @foreach ($sliders as $key => $slider)-->
                            <!--            <li class="list-inline-item {{ $key == 0 ? 'active' : '' }}"><a-->
                            <!--                    id="carousel-selector-0" class="selected" data-slide-to="0"-->
                            <!--                    data-target="#custCarousel"> <img src="{{ $slider->image }}"-->
                            <!--                        class="img-fluid"> </a></li>-->
                            <!--        @endforeach-->


                            <!--    </ol>-->
                            <!--</div>-->
                        </div>
                    </div>
                    {{-- end slider --}}
                    {{-- slider end here --}}
                    {{-- About us Section is start here --}}
                    {{-- <div class="clearfix" style="padding-top: 10px"> --}}

                    {{-- </div> --}}
                    <section class="about-us">
                        <div class="card-header section-title">
                            <h3 class="">{{ $welcomenotes->title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="about-left-side">
                                    <div class="abutimg">
                                        <img src="{{ asset($welcomenotes->image) }}" class="img-fluid">
                                    </div>
                                </div>
                                <div class="about-right-side" style="font-family: kalpurush;">

                                    <p>{!! $welcomenotes->description !!}</p>

                                    <h1 id="headline"></h1>
                                </div>

                            </div>

                        </div>
                    </section>
                    {{-- About Us section End Here --}}
                    {{-- News & Announcement Section is start here --}}
                    <div class="clearfix" style="padding-top: 10px">

                    </div>
                    <section class="news-announcement">
                        <div class="card-header section-title">
                            <h3>Announcement</h3>
                        </div>
                        <div class="row">
                            <div class="card-body">
                                @if($welcomenews->image)
                                    <div class="float-right abutimg ml-0 ml-sm-3">
                                        <img class="announcment-image" src="{{ asset($welcomenews->image) }}" alt="">
                                    </div>
                                @endif
                                <div class="bangla-font">
                                    <h3 style="color: #0a0440; font-weight:500">
                                        {{ $welcomenews->title }}
                                    </h3>
                                    <p>{!! $welcomenews->description !!}</p>
                                </div>
                                <div>
                                </div>
                            </div>

                    </section>
                    {{-- end here --}}
                    {{-- Gallery Section Start Here --}}
                    <div class="clearfix" style="padding-top: 10px">

                    </div>

                    <div class="gallery-section">
                        <div class="section-title">
                            <h3>School Gallery</h3>
                        </div>
                        <div class="clearfix" style="padding-top: 10px">

                        </div>
                        @foreach ($schoolgallerys as $schoolgallery)

                            @php
                                $images = DB::table('photo')
                                    ->where('event_id', $schoolgallery->id)
                                    ->take(4)
                                    ->get();
                            @endphp


                            <div class="row">
                                @foreach ($images as $img)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img class="card-img" src="{{ asset($img->photo) }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="primary-sidebar" id="primary-sidebar">

                    @foreach ($massages as $massage)

                        <aside id="text-6" class="widget widget_text text-center">
                            <h2 class="widget-title">Message Of {{ $massage->desingnation }}</h2>
                            <div class="textwidget">
                                <div class="field-image">
                                    <img src="{{ $massage->image }}" height="264" width="230"
                                        class="image">
                                </div>
                                <div class="field-content">
                                    <a class="title">{{ $massage->name }}</a>

                                </div>
                                <p class="massage mb-0">{{ $massage->description }}</p>
                                <a href="{{ $massage->file }}" target="_blank" class="btn btn-outline-warning">Read
                                    More</a>

                            </div>
                        </aside>

                    @endforeach



                    <aside id="text-6" class="widget widget_text">
                        <h2 class="widget-title">Useful Links</h2>
                        <div class="textwidget">
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <a href="http://www.educationboardresults.gov.bd/" target="_blank"
                                    rel="noopener noreferrer">
                                    Education Board Bangladesh
                                </a>
                            </p>
                            <p>
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <a href="http://www.nu.ac.bd/" target="_blank" rel="noopener noreferrer">
                                    National University
                                </a>
                            </p>
                            <p>
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <a href="https://dhakaeducationboard.gov.bd/" target="_blank" rel="noopener noreferrer">
                                    Dhaka Board Of Bangladesh
                                </a>
                            </p>
                            <p>
                            <p>
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <a href="{{ route('view-soronika') }}" target="_blank" rel="noopener noreferrer">
                                    Soronika
                                </a>
                            </p>
                            <p>
                            <p>
                            <p>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                <a href="https://www.facebook.com/pages/category/School/Ali-Azam-High-School-College-144173712433697/"
                                    target="_blank" rel="noopener noreferrer">
                                    Facebook Group
                                </a>
                            </p>
                            <p>
                        </div>
                    </aside>
                    <aside id="text-6" class="widget widget_text">
                        <h2 class="widget-title">News & Events</h2>
                        <div class="textwidget">
                            <p style="font-size: 14px;
                                              color: #000;">
                                <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5">{!! $updatenews->description !!}</marquee>
                            </p>
                        </div>
                    </aside>
                    <aside id="text-6" class="widget widget_text">
                        {{-- <h2 class="widget-title">Calender</h2> --}}

                        <div class="calendar">
                            <div class="calendar-header">
                                <span class="month-picker" id="month-picker">February</span>
                                <div class="year-picker">
                                    <span class="year-change" id="prev-year">
                                        <pre><</pre>
                                    </span>
                                    <span id="year">2021</span>
                                    <span class="year-change" id="next-year">
                                        <pre>></pre>
                                    </span>
                                </div>
                            </div>
                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="calendar-days"></div>
                            </div>
                            {{-- <div class="calendar-footer">
                                <div class="toggle">
                                    <span>Dark Mode</span>
                                    <div class="dark-mode-switch">
                                        <div class="dark-mode-switch-ident"></div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="month-list"></div>
                        </div>
                        {{-- <div class="calendar">
                            <div class="calendar__month">
                            <div class="cal-month__previous">
                                    <div class="cal-month__current"></div>
                                    <div class="cal-month__next"></div>
                            </div>
                            <div class="calendar__head">
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                                <div class="cal-head__day"></div>
                            </div>
                            <div class="calendar__body">
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                                <div class="cal-body__week">
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                    <div class="cal-body__day"></div>
                                </div>
                            </div>
                        </div> --}}
                    </aside>
                </div>
                {{-- left sidebar end here --}}
            </div>
        </div>
    </section>

    <!-- committe mambers -->
    <div class="clearfix" style="margin: 40px">
    </div>
    <section class="section-committee">
        <div class="container">
            <div class="section-title">
                <h3>Ceremony Committee</h3>
            </div>
            <div class="clearfix" style="margin: 40px">
            </div>
            <ul class="sponsored owl-carousel">
                @foreach ($committee as $com)
                    <li class="item text-center">
                        <div class="img-center-circle">
                            <img height="171" src="{{ $com->image }}" alt="">
                        </div>
                        <h6 class="carousel-h6">{{ $com->name }}</h6>
                        <span>{{ $com->desingnation }}</span>

                    </li>
                @endforeach
            </ul>

        </div>
    </section>

    <!-- committe mambers -->
    <div class="clearfix" style="margin: 40px">

    </div>

    <section class="section-committee">
        <div class="container">
            <div class="section-title">
                <h3>Sponsored By</h3>
            </div>
            <div class="clearfix" style="margin: 40px">
            </div>
            <ul class="owl-carousel">
                @foreach ($sponsors as $spo)
                    <li class="item">
                        <div class="cust-img">
                            <img class="img-fluid" src="{{ $spo->image }}" alt="">
                        </div>

                    </li>
                @endforeach
            </ul>

        </div>
    </section>
    <!-- Update Notice    -->
    <section class="notice">
        <div class="container group">
            <div class="row">
                <div class="span1">
                    <span class="pl-2">Updates|</span>
                </div>
                <div class="span11">
                    <marquee width="100%" behavior="scroll" scrolldelay="50" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();" style="margin-top: 15px !important;">
                        <span class="description">
                            {!! $updatenews->description !!}
                        </span>
                    </marquee>
                </div>
            </div>
        </div>
    </section>
    <!--End Update Notice    -->

    <!--End committe mambers -->
@endsection

@section('script')
    <script src="{{ asset('/front/js/calendar.js') }}"></script>
@endsection
