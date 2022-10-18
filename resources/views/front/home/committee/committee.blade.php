@extends('front.master')
@include('front.home.teacher.teacher_nuning_css')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<div class="clearfix" style="padding-top: 10px">

</div>
    <section class="teacher">
        <div class="clearfix" style="padding-top: 10px">
        </div>
        <div id="content" class="main-content">
            <div class="container">
                <div class="card-content">
                    <div class="section-title mt-4 mb-4">
                        <h3 class="">{{$type}}</h3>
                    </div>
                </div>
            </div>
        <div id="content" class="main-content">
    </section>

    <section class="teacher">
      <div id="content" class="main-content">
         <div class="container">
            @if($type == '100 Years Celebration Committee')
            <div class="row justify-content-center">
                <div class="col-md-2 shadow p-3 mb-5 bg-white rounded">
                    <div class="primary-sidebar-teacher" id="primary-sidebar-teacher">
                        <aside id="text-6" class="widget widget_text">
                         <div class="textwidget">
                            <div class="field-image">
                                <img src="{{ asset('uploads/commeitte/1.kazi-ikram-ullah-sablu.jpg') }}" height="264" width="230" class="image">
                                <div class="committe-member">
                                    <p>Kazi Ikram Ullah (Sablu)</p>
                                    <p>Chief Advisor</p>
                                    <p>Batch - 1972</p>
                                </div>
                            </div>
                         </div>
                        </aside>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
             @foreach($committees as $committee)
                 <div class="col-md-2 shadow p-3 mb-5 bg-white rounded">
                   <div class="primary-sidebar-teacher" id="primary-sidebar-teacher">
                      <aside id="text-6" class="widget widget_text">
                        <!-- <h2 class="widget-title">{{$committee->name}}</h2> -->
                        <div class="textwidget">
                            <div class="field-image">
                                <img src="{{ asset($committee->image)}}" height="264" width="230" class="image">
                                <div class="committe-member">
                                  <p>{{$committee->name}}</p>
                                  <p>{{$committee->desingnation}}</p>
                                  <p>Batch - {{$committee->batch}}</p>
                               </div>
                            </div>
                            <div class="field-content">
                                <!-- <a class="title">{{$committee->name}}</a> -->
                                {{-- <p>Md. Monowar</p> --}}
                               
                            </div>
                        </div>
                      </aside>
                    </div>
                  </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

<div class="clearfix" style="margin: 40px">
</div>
@endsection
