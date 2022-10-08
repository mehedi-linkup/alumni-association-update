@extends('front.master')
@include('front.home.contact_css')
@include('front.home.register_js')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<style>
</style>
    <div class="clearfix" style="padding-top: 10px">

    </div>
    <section class="signup-top">
        <div class="container">
            <div class="card-content">
                <div class="section-title mt-4 mb-4">
                    <h3 class="">Contact<span class="contact-span">Us</span></h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
            @include('message.message')
                <div class="col-md-6">
                    <div class="contact-form-wrapper">
                        <form class="contact-form" method="POST" action="{{route('save_contact')}}" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" required id="name" placeholder="Enter Name" autofocus>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" autofocus>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="+88 " required autofocus>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" placeholder="Write Your Message" required autofocus></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <div class="google_map_wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.3362149737545!2d90.3866213154314!3d23.73538709526567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8c6d25f0a91%3A0xf8da21d64c3856dc!2sNew%20Work%20Aquarium%20Center!5e0!3m2!1sen!2sus!4v1593765590933!5m2!1sen!2sus"
                            frameborder="0" style="border: 0;
                         width: 101%;
                         height: 80%;
                         margin-top: 3%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div> -->
                    <div id="map" style="height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact_details">
                        <h4>School Address Info</h4>
                        <ul class="fa-ul">
                            <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-map-marker only"></i></span>Address :
                                {{ $info->school_address }}</li>
                            <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-phone only"></i></span>Contact Number :
                                {{$info->school_phone  }}</li>
                            <li><span class="fa-li margin-icon"><i class="fa fa-envelope only"></i></span>Email :
                                {{ $info->school_email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_details">
                        <h4>Secretary Address Info </h4>
                        <ul class="fa-ul">
                          <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-map-marker only"></i></span>Address :{{ $info->secretary_address }}</li>
                          <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-phone only"></i></span>Contact Number : {{ $info->secretary_phone }}</li>
                          <li><span class="fa-li margin-icon"><i class="fa fa-envelope only"></i></span>Email : {{ $info->secretary_email }}</li>
                      </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_details">
                        <h4>Committee Address Info </h4>
                        <ul class="fa-ul">
                          <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-map-marker only"></i></span>Address :{{ $info->committee_address }}</li>
                          <li class="mb-3"><span class="fa-li margin-icon"><i class="fa fa-phone only"></i></span>Contact Number : {{ $info->committee_phone }}</li>
                          <li><span class="fa-li margin-icon"><i class="fa fa-envelope only"></i></span>{{ $info->committee_email }}</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix" style="padding-bottom: 12%">
    @endsection
