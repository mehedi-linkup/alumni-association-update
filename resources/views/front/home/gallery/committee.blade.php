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
            <div class="committee-top">
                <h2 class="committee-h2">Committee  Gallery</h2>
            </div>
        </div>
    </div>
</section>


@foreach($schoolgallerys as $schoolgallery)
<section class="gallery-page-gallery">
    <div class="container">
        <div class="mb-5">
            <div class="gallery-heading">
                <h1>{{$schoolgallery->event_name}}</h1>
                <p>{{$schoolgallery->date}}</p>
            </div>

           @php 
           $image = DB::table('photo')->where('event_id',$schoolgallery->id)->get();
           @endphp

       
             <div class="row m-0 justify-content-center">
             @foreach($image as $im)
                <div class="col-md-2 p-0">
                        <div class="gallery-image">
                            <img src="https://aahcalumni.org/{{($im->photo)}}" alt="">
                        </div>
                  </div>
            @endforeach    
            </div>
         
            <!-- <div class="row m-0 justify-content-center">
                <div class="col-md-4 p-0">
                        <div class="gallery-image">
                            <img src="{{asset('front/images/history.jpg')}}" alt="">
                        </div>
                  </div>
                <div class="col-md-4 p-0">
                        <div class="gallery-image hover-zoom">
                            <img src="{{asset('front/images/history.jpg')}}" alt="">
                        </div>
                   </div>
                  <div class="col-md-4 p-0">
                        <div class="gallery-image">
                            <img src="{{asset('front/images/history.jpg')}}" alt="">
                        </div>
                  </div>
            </div> -->
        </div>
     
    </div>
</section>
@endforeach
<div class="clearfix" style="padding-bottom: 20px">
@endsection
