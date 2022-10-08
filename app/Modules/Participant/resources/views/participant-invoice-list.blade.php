
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>Invoice</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/all.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/stylesheet.css')}}"/>
<style>

</style>
</head>
<body>
<!-- Container -->
@foreach($participant as $participant)
<div class="container invoice-container">
  <!-- Header -->
  <header>
  
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-sm-0">
      <img id="logo" src="{{asset('front/images/logo.jpg')}}" title="Koice" alt="Koice" style=" 
         margin-left: 4%; 
        height: auto;
       width: 37%;">
    <p>Ali Azam School</p>
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      Ali Azam School<br>
      Munshirhat, Fulgazi, Feni.
    </div>
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-md-6 offset-5"> <strong></strong>Invoice</strong></div>
  </div>
  
  <div class="row">
  
 <div class="col-sm-6 text-sm-right order-sm-1"> <strong></strong>
      <address>
      <!-- Koice Inc<br />
      2705 N. Enterprise St<br />
      Orange, CA 92865<br />
	    contact@koiceinc.com -->
       <div class="invoice-logo"><img width="100" @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt="Invoice logo"></div>
      </address>
    </div> 
    <div class="col-sm-6 order-sm-0"> <strong>Student Information</strong>
     <p class="mb-0">Name: {{$participant->name}}</p>
     <p class="mb-0"> Phone:{{$participant->phone}}</p>
     <p class="mb-0">Email:{{$participant->email}}</p>
      
    </div>
  </div>  

  <div class="row">
    <div class="col-sm-12">
      <p class="booking" style="font-weight: 600;">Details Information : </p>
    </div>
      <div class="col-sm-6">
      <address>
        <p class="mb-0"> Fathers Name: {{$participant->fathers_name}}</p>
        <p class="mb-0"> Mother Name: {{$participant->mother_name}}</p>
        <p class="mb-0"> Present Address: {{$participant->present_address}}</p>
      </address>
      </div>
      <div class="col-sm-6">
      <address>
      <p class="mb-0"> Permanent Address: {{$participant->permanent_address}}</p>
        <p class="mb-0"> Occupation: {{$participant->occupation}}</p>
        <p class="mb-0"> Passsing Year: {{$participant->passing_year}}</p>
      </address>
     
      </div>
  </div>  
  <div class="card border-0">
    <div class="barcode-section-border mb-3"></div>
    <div class="row">
      <div class="col-sm-6 pb-2 bottom-dash right-dash ">
        <div class="shadow p-3 align-item-center"> 
            <div class="ml-3">
              <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
            </div>
            <div class="image pl-4 text-center">
            <?php
                 echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id)."\r\n". 'lunch'); ?>
                <p class="mb-0">
                        {{$participant->name}} <br>
                  Number :  {{$participant->phone}}<br>
                </p>
            </div>
        </div>
      </div>
        <div class="col-sm-6 bottom-dash pb-2">
          <div class="shadow p-3 align-item-center"> 
              <div class="ml-3">
              <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
              </div>
              <div class="image pl-4 text-center">
                <?php
                echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id + 1)."\r\n". 'lunch'); ?>
                <p class="mb-0">
                 {{$participant->name}} <br>
                 Number : {{$participant->phone}}<br>
                </p>
              </div>
          </div>
        </div>

        <div class="col-sm-6 pt-2 right-dash">
          <div class="shadow  p-3 align-item-center"> 
              <div class="ml-3">
              <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
              </div>
              <div class="image pl-4 text-center">
               <?php
                 echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id + 2)."\r\n". 'lunch'); ?>
                  <p class="mb-0">
                  {{$participant->name}} <br>
                  Number :  {{$participant->phone}}<br>
                  </p>
              </div>
          </div>
        </div>
       
        <div class="col-sm-6 pt-2">
          <div class="shadow p-3 align-item-center"> 
              <div class="ml-3">     
              <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
              </div>
              <div class="image pl-4 text-center">
              <?php 
                echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id + 3)."\r\n". 'lunch'); ?>
                <p class="mb-0">
                {{$participant->name}} <br>
                Number : {{$participant->phone}}<br>
                </p>
              </div>
          </div>
        </div>
        <div class="col-sm-6 pt-2 right-dash">
          <div class="shadow  p-3 align-item-center"> 
              <div class="ml-3">
              <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
              </div>
              <div class="image pl-4 text-center">
               <?php
                 echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id + 2)."\r\n". 'lunch'); ?>
                  <p class="mb-0">
                  {{$participant->name}} <br>
                  Number :  {{$participant->phone}}<br>
                  </p>
              </div>
          </div>
        </div>
       
        <div class="col-sm-6 pt-2">
          <div class="shadow p-3 align-item-center"> 
              <div class="ml-3">     
                  <img width="100" height="100"  @if (!$participant->image == '') src="{{asset($participant->image)}}"   @elseif($participant->gender == 'Male') src="{{ asset('front/images/male.png') }}" @else src="{{ asset('front/images/female.png') }}" @endif alt=""> 
              </div>
              <div class="image pl-4 text-center">
              <?php 
                echo SimpleSoftwareIO\QrCode\Facades\QrCode::generate("Name: ".$participant->name."\r\n Id: ".intval($participant->registration_id + 3)."\r\n". 'lunch'); ?>
                <p class="mb-0">
                {{$participant->name}} <br>
                Number : {{$participant->phone}}<br>
                </p>
              </div>
          </div>
        </div>
    </div>
</div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>নোটিশ :</strong>অনুগ্রহপূর্বক শতবর্ষ উদযাপনের দিন টোকেন নিয়ে আসার জন্য অনুরোধ করা হলো । অন্যথায় সাহায্য ও সকল প্রকার সেবা থেকে বঞ্চিত হইবেন । </p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"> Download</a> </div>
  </footer>
</div>
@endforeach
<script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
   window.print();
})
</script>
</body>
</html>