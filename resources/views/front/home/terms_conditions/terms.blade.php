@extends('front.master')
@include('front.home.terms_conditions.terms_css')
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
                    <h3 class="">Terms and Conditions</h3>
                </div>
            </div>
        </div>
        <div class="container " style="font-family:'Ubuntu'!important;">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card-body">
                        <div class="pr-3" style="font-family:kalpurush; text-align:justify">
                            <div>{!! $terms->terms_conditions !!}</div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="clearfix" style="padding-bottom: 20px">
    @endsection
