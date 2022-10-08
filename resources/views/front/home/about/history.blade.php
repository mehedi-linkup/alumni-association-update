@extends('front.master')
@include('front.home.about.about_history_css')
@include('front.home.register_js')
@section('title')
    Ali azam School & College
@endsection
@section('content')
    <div class="clearfix" style="padding-top: 10px">
    </div>
    <section class="signup-top">
        <div class="container">
            <div class="card-content">
                <div class="section-title mt-4 mb-4">
                    <h3 class="">{{ $histories->title }}</h3>
                </div>
            </div>
        </div>
        <div class="container " style="font-family:'Ubuntu'!important;">
            <div class="row">
                <div class="card-body">
                    <div class=" white-bg padding15 float-left mr-3" >
                        <h6 class="brief-title">{{ $histories->about_type }}</h6><br><small>{{ $histories->date }}
                        </small>
                        <img src="https://aahcalumni.org/{{ $histories->image }}" class=" img-responsive margin-bottom2P"
                            alt="History of ACPS" height="50" width="500" title="History of ACPS">
                    </div>
                    <div class="pr-3" style="font-family:kalpurush; text-align:justify">
                        <p>{!! $histories->description !!}</p>
                    </div>
                </div>
            </div>
    </section>
    <div class="clearfix" style="padding-bottom: 20px">
    @endsection
