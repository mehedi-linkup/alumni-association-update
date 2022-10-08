
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
<!-- <link rel="stylesheet" type="text/css" href="{{asset('invoice/css/bootstrap.min.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/all.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/stylesheet.css')}}"/> -->
<style>
  .align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
  }
  .booking {
    border-bottom: 1px solid #000;
  }
  .table{
    width:100%;
    color:#000;
    border-collapse: collapse;
    padding: 10px;
  }
  .table td, .table th{
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }
  .mb-0, .my-0 {
    margin-bottom: 0!important;
 }
 .text-right{
  text-align: right!important;
 }
 .card{
  position: relative;
 }
 body {
    font-family: "Poppins", sans-serif;
}

</style>
</head>
<body>
<!-- Container -->
<div class="container invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-left mb-sm-0">
      <img id="logo" src="{{asset('front/images/logo.jpg')}}" title="Koice" alt="Koice" style=" 
         margin-left: 4%; 
        height: auto;
       width: 37%;">
    <p class="">Ali Azam School</p>
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
       <div class="invoice-logo"><img width="100" src="{{asset($participant->image)}}" alt="Invoice logo"></div>
      </address>
    </div> 
    <div class="col-sm-6 order-sm-0"> <strong>Student Information</strong>
      <address>
      Name: {{$participant->name}}<br />
      Phone: {{$participant->phone}}<br>
      Email:{{$participant->email}}<br />
      </address>
    </div>
  </div>  

  <div class="row">
    <div class="col-sm-12 ">
      <p class="booking">Details Information : </p>
      <address>
      <p> Fathers Name: {{$participant->fathers_name}}</p>
      <p> Mother Name: {{$participant->mother_name}}</p>
      <p> Present Address: {{$participant->present_address}}</p>
      <p> Permanent Address: {{$participant->permanent_address}}</p>
      <p> Occupation: {{$participant->occupation}}</p>
      <p> Passsing Year: {{$participant->passing_year}}</p>
      </address>
    </div>
  </div>  


  <div class="card">
    <div class="card-header px-2 py-0">
      <table class="table mb-0">
        <thead>
          <tr>
            <td class="col-3 border-0"><strong>Service</strong></td>
			<td class="col-4 border-0"><strong>Description</strong></td>
            <td class="col-2 text-center border-0"><strong>Rate</strong></td>
			<td class="col-1 text-center border-0"><strong>QTY</strong></td>
            <td class="col-2 text-right border-0"><strong>Amount</strong></td>
          </tr>
        </thead>
      </table>
    </div>
    <div class="card-body px-2">
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td class="col-3 border-0">Design</td>
              <td class="col-4 text-1 border-0">Creating a website design</td>
              <td class="col-2 text-center border-0">$50.00</td>
			  <td class="col-1 text-center border-0">10</td>
			  <td class="col-2 text-right border-0">$500.00</td>
            </tr>
            <tr>
              <td>Development</td>
              <td class="text-1">Website Development</td>
              <td class="text-center">$120.00</td>
			        <td class="text-center">10</td>
			        <td class="text-right">$1200.00</td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
              <td class="bg-light-2 text-right">$2150.00</td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Tax:</strong></td>
              <td class="bg-light-2 text-right">$215.00</td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Total:</strong></td>
              <td class="bg-light-2 text-right">$2365.00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  </main>
  <footer class="text-center mt-4">
  <div class="btn-group btn-group-sm d-print-none"></div>
  </footer>
</div>
<!-- <script src="{{asset('/admin/jquery/jquery.min.js')}}"></script> -->
<!-- <script>
$(document).ready(function(){
   window.print();
})
</script> -->
</body>
</html>