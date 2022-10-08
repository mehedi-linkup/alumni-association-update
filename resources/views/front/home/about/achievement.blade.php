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
            <div class="cantact-top">
                <h2 class="organization-h2">Achievement of the<span class="history-span" >Organization</span></h2>
            </div>
        </div>
    </div>
    @foreach($achivements as $achivement)
    <div class="container">
        <div class="container">
            <div class="row">
           
                <div class="col-sm-8 details-left-panel" style="padding: 27px;margin-top: -28px;">
                    <div class="row body-container white-bg padding15">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="brief-title">{{$achivement->title}}</h6><br><small>Sep 27, 2020 </small>|<span></span>
                                <img src="https://aahcalumni.org/{{$achivement->image}}" class="img-responsive margin-bottom2P" alt="History of ACPS" title="History of ACPS">
                            </div>
                         </div>
                     </div>
                       <div class="history-text">
                         <p>{!!$achivement->description!!}</p>
                      </div>
                </div>
         
           
                <!-- Right Side -->
                <div class="col-sm-4 details-right-panel">
                  <div class="row">
                    <div class="col-xs-10 col-md-10">
                        <div class="row top-head-right box-title">
                            <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a> / <span>About Us / History                            </span>
                        </div>

                        <div class="row right-video margin-top10 box-title">
                            <i class="fa fa-file-video-o" aria-hidden="true" style="margin-top: 5px;"></i> Suggested Video
                        </div>
                        <div class="row right-video margin-top10 box-title">
                            <i class="fa fa-file-video-o" aria-hidden="true" style="margin-top: 5px;"></i>  Why Study at Ali Azam School
                        </div>
                        <div class="row right-video margin-top10 box-title">
                            <i class="fa fa-file-video-o" aria-hidden="true" style="margin-top: 5px;"></i> Suggested Video
                        </div>
                        <div class="row right-video margin-top10 box-title">
                            <i class="fa fa-file-video-o" aria-hidden="true" style="margin-top: 5px;"></i> Suggested Video
                        </div>
                        <div class="row right-video margin-top10 box-title">
                            <i class="fa fa-file-video-o" aria-hidden="true" style="margin-top: 5px;"></i> Suggested Video
                        </div>
                        <div class="row text-center margin-top10">
                           
                        </div>

                        <div class="row related-topics box-title">
                            <i class="fa fa-trophy" aria-hidden="true"> </i>  Achievement
                        </div>
                    </div>
                  </div>              
                </div>
            </div>
        </div>
  </div> 
  @endforeach


</section>
<div class="clearfix" style="padding-bottom: 20px">
@endsection
