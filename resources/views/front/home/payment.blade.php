@extends('front.master')
@include('front.home.registration_css')
@include('vendor.datepicker.datepicker_css')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<div class="clearfix" style="padding-top: 10px">

</div>
<section class="signup-top">
    <div class="container">
        <div class="card-content">
         <div class="signup-title">
           <h2 class="signup-h2">Payment<span class="signup-span" >Option</span></h2>
        </div>
        @if ($errors->any())

           <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error)
                      <strong>{{ $error }}</strong>
            @endforeach
          </div>

         @endif
         @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ Session::get('success') }}</strong>
          </div>
        @endif
       
        <form class="" method="POST" action="{{route('payment.save')}}" id="frmCheckout" enctype="multipart/form-data">
         @csrf
            <div class="clearfix" style="padding-bottom: 20px">
            </div>
            <div class="card-body">
              <input type="hidden" name="participant_id" value="{{$participant}}">
            <div class="row">
                <div class="container">
                     <div class="label-title1">
                              <label class="form-label" style="font-size: 23px;
                                                 margin-top: -33px;
                                      color: #0d0f10;">Payment Information</label>
                                 </div>
                  <div class="form-top">
                  <div class="form">
                       <div class="label-title">
                          <label class="form-label">Transtion ID</label>
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control{{ $errors->has('transaction_id') ? ' is-invalid' : '' }}" name="transaction_id" id="transaction_id" placeholder="Transaction ID">
                        
                       </div>
                     </div>
                      <div class="form">
                         <div class="label-title">
                            <label class="form-label">Transtion Date</label>
                        </div>
                        <div class="mb-3">
                          <input type="text" data-select="datepicker" class="form-control{{ $errors->has('transaction_date') ? ' is-invalid' : '' }}" name="transaction_date" id="transaction_date" placeholder="Transaction Date">
                          
                         </div>
                       </div>
                     <div class="form">
                          <div class="label-title">
                              <label class="form-label">Referance Number</label>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('referance_number') ? ' is-invalid' : '' }}" name="referance_number" id="referance_number" placeholder="Referance Number">
                          </div>
                      </div>
                      <div class="form">
                        <div class="label-title">
                            <label class="form-label">Member Quantity</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="member" class="form-control{{ $errors->has('member') ? ' is-invalid' : '' }}" id="member" placeholder="Member Quantity">
                        </div>
                      </div>
                      <div class="form">
                        <div class="label-title">
                            <label class="form-label">Pay Amount</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="pay_amount" class="form-control{{ $errors->has('pay_amount') ? ' is-invalid' : '' }}" id="pay_amount" placeholder="Pay Amount">
                        </div>
                      </div>
                      <div class="form">
                          <div class="label-title">
                              <label class="form-label">Description</label>
                          </div>
                          <div class="mb-3">
                          <textarea type="text" name="description" class="form-label"></textarea>
                          </div>
                          <div class="row align-center">
                            <div class="col-md-2">
                            <button type="submit" class="btn btn-info btn-lg">Save</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('/')}}" class="btn btn-warning btn-outline-light btn-lg">Later</a>
                            </div>
                        </div>
                      </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
        </form>
    </div>
</section>

@endsection

@section('script')
@include('vendor.datepicker.datepicker_js')
@endsection

