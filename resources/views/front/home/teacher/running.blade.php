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
                <div class="cantact-top">
                    <h2 class="teacher-h2"> Runing Teacher</h2>
                </div>
            </div>
        </div>
        @if($head != null)

       <div id="content" class="main-content">
           <div class="container">
           <div class="row">
            <div class="col-md-4 offset-4">
              <div class="primary-sidebar-teacher" id="primary-sidebar-teacher">
                <aside id="text-6" class="widget widget_text">
                    <h2 class="widget-title">{{$head->degingnation_title}}</h2>
                    <div class="textwidget">
                        <div class="field-image">
                            <img src="{{asset($head->image)}}" height="264" width="230" class="image">
                        </div>
                        <div class="field-content">
                            <a class="title">{{$head->name}}</a>
                            {{-- <p>Md. Monowar</p> --}}
                        </div>
                    </div>
                 </aside>
               </div>
             </div>
            </div>
          </div>
        </div>
       @endif 
    </section>


    <section class="teacher">
      <div id="content" class="main-content">
         <div class="container">
            <div class="row">
             @foreach($runningteachers as $running)
                 <div class="col-md-2">
                   <div class="primary-sidebar-teacher" id="primary-sidebar-teacher">
                      <aside id="text-6" class="widget widget_text">
                        <h2 class="widget-title">{{$running->degingnation_title}}</h2>
                        <div class="textwidget">
                            <div class="field-image">
                                <img src="https://aahcalumni.org/{{ $running->image }}" height="264" width="230" class="image">
                            </div>
                            <div class="field-content">
                                <a class="title">{{$running->name}}</a>
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
