@extends('front.master')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<div class="clearfix" style="padding-top: 10px">

</div>
    <section class="slider">
        <div id="content" class="main-content">
            <div class="container">
                    <div class="clearfix" style="padding-top: 10px">
                    </div>
                    <section class="news-announcement">
                        <div class="card-header section-title mt-4 mb-4">
                            <h3 class="">News & Announcement</h3>
                        </div>

                     @foreach($news as $new)
                        <div class="card-body">
                          <div class="container">
                            <div class="row">
                               <div class="col-md-6">
                                 <div class="news-timer">
                                    <p class="news-p">
                                        <i class="fa fa-clock-o" style="color: #40a978;"></i> {{$new->created_at}} {{$new->title}}.</p>
                                  </div>
                              
                                  <div class="newstitle">
                                        {!!$new->description!!}
                                        <h1 id="headline"></h1>
                                  </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="">
                                        <div class="abutimg">
                                            <img src="https://aahcalumni.org/{{$new->image}}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                             </div>
                          </div>
                        </div>
                      @endforeach

                    </section>
                </div>
           </div>
        </div>
    </section>

<div class="clearfix" style="margin: 40px">
</div>
@endsection
