@extends('front.master')
@include('front.home.registration_css')
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
           <div class="section-title mt-3 mb-3">
            <h3 class="signup-h2">নতুন<span class="signup-span">নিবন্ধন</span></h3>
         </div>
         <div class="row float-right">
            <div class="col-12 mr-2">
                <a href="{{ route('signup') }}" class="btn btn-success">English</a>
            </div>
        </div>
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         @if (Session::has('success'))
         <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ Session::get('success') }}</strong>
         </div>
         @endif

         
         <form method="POST" action="{{ route('participant-registration') }}" id="frmCheckout"
         enctype="multipart/form-data">
         @csrf
         <div class="card-body">
             <div class="row">
                 <div class="container">
                     <div class="label-title1">
                         <label class="form-label1"
                             style="font-size: 23px;margin-top: -33px; color: #0d0f10;">ব্যক্তিগত তথ্য</label>
                     </div>
                     <div class="form-top">
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="">নাম
                                    <span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                     name="name" value="" id="name" placeholder="নাম">

                                 @if ($errors->has('name'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('name') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">পিতার নাম<span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('fathers_name') ? ' is-invalid' : '' }}"
                                     name="fathers_name" id="fathers_name" placeholder="পিতার নাম">
                                 @if ($errors->has('name'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('fathers_name') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">মাতার নাম<span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}"
                                     name="mother_name" id="mother_name" placeholder="মাতার নাম">
                                 @if ($errors->has('mother_name'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('mother_name') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">রক্তের গ্রুপ
                                 </label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <select id="blood_group" name="blood_group" class="select"
                                     style=" width: 100%;">
                                     <option value="A+">A+(ve)</option>
                                     <option value="A-">A-(ve)</option>
                                     <option value="AB+">AB+(ve)</option>
                                     <option value="AB-">AB-(ve)</option>
                                     <option value="B+">B+(ve)</option>
                                     <option value="B-">B-(ve)</option>
                                     <option value="O+">O+(ve)</option>
                                     <option value="O-">O-(ve)</option>
                                 </select>
                                 @if ($errors->has('blood_group_id'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('blood_group') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">লিঙ্গ
                                 </label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <select id="gender" name="gender" class="select-gender" style=" width: 100%;">
                                     <option value="">নির্বাচন করুন
                                    </option>
                                     <option value="Male">পুরুষ</option>
                                     <option value="Female">মহিলা</option>
                                 </select>
                                 @if ($errors->has('gender'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('gender') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">পেশা<span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                     id="occupation" name="occupation" placeholder="পেশা">
                                 @if ($errors->has('occupation'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('occupation') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row ">
                             <div class="col-lg-2 col-md-3 col-12">
                                 <label class="form-label">ইমেইল</label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                     name="email" id="email" placeholder="ইমেইল">
                                 @if ($errors->has('email'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('email') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row ">
                            <div class="col-lg-2 col-md-3 col-12">
                                <label class="form-label mt-2 mb-0">ড্রেস সাইজ<span class="span-star">*</span></label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-12">

                                <div class="input-group mt-2" id="dress">
                                    <div class="form-check d-flex align-items-center mt-0">
                                        <input
                                            class="form-check-input {{ $errors->has('dress') ? ' is-invalid' : '' }}"
                                            value="M" type="radio" name="dress"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            M
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mt-0">
                                        <input
                                            class="form-check-input {{ $errors->has('dress') ? ' is-invalid' : '' }}"
                                            value="L" type="radio" name="dress"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            L
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mt-0">
                                        <input
                                            class="form-check-input {{ $errors->has('dress') ? ' is-invalid' : '' }}"
                                            value="XL" type="radio" name="dress"
                                            id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            XL
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mt-0">
                                        <input
                                            class="form-check-input {{ $errors->has('dress') ? ' is-invalid' : '' }}"
                                            value="XXL" type="radio" name="dress"
                                            id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            XXL
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mt-0">
                                        <input
                                            class="form-check-input {{ $errors->has('dress') ? ' is-invalid' : '' }}"
                                            value="XXXL" type="radio" name="dress"
                                            id="flexRadioDefault5">
                                        <label class="form-check-label" for="flexRadioDefault5">
                                            XXXL
                                        </label>
                                    </div>
                                </div>

                                @if ($errors->has('dress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="clearfix" style="padding-bottom: 20px">
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="container">
                     <div class="label-title1">
                         <label class="form-label1"
                             style="font-size: 23px; margin-top: -33px;color: #0d0f10;">ঠিকানা</label>
                     </div>
                     <div class="form-top">
                         <div class="row mb-2 ">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label mb-0">বর্তমান ঠিকানা<span
                                         class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}"
                                     name="present_address" id="present_address" placeholder="বর্তমান ঠিকানা">
                             </div>
                         </div>
                         <div class="row mb-2 ">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label mb-0">স্থায়ী ঠিকানা<span
                                         class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('permanent_address') ? 'is-invalid' : '' }}"
                                     name="permanent_address" id="permanent_address"
                                     placeholder="স্থায়ী ঠিকানা">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label mb-0">এসএসসি পাসের সন<span
                                         class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-4 col-md-5 col-8" id="passing_year_field">
                                 <?php
                                 $start = 1906;
                                 $end = intval(date('Y', strtotime(\Carbon\Carbon::now())));
                                 $i = 0;
                                 ?>
                                 <select id="passing_year" name="passing_year" class="select"
                                     aria-label="Default select example">
                                     <option selected disabled value="">এসএসসি পাসের সন</option>
                                     <?php for ($i = $start; $i <= $end; $i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                         <?php } ?>
                                 </select>
                             </div>

                             <div class="col-lg-4 col-md-6 col-8" id="others_field" style="display: none">
                                 {{-- others --}}

                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 col-6">
                                         <select id="class" name="class" class="select"
                                             aria-label="Default select example">
                                             <option selected disabled value="">শ্রেণি</option>
                                             <option value="one">প্রথম শ্রেণি</option>
                                             <option value="two">দ্বিতীয় শ্রেণি</option>
                                             <option value="three">তৃতীয় শ্রেণি</option>
                                             <option value="three">চতুর্থ শ্রেণি</option>
                                             <option value="three">পঞ্চম শ্রেণি</option>
                                             <option value="three">ষষ্ঠ শ্রেণি</option>
                                             <option value="three">সপ্তম শ্রেণি</option>
                                             <option value="three">অষ্টম শ্রেণি</option>
                                             <option value="three">নবম শ্রেণি</option>
                                             <option value="three">দশম শ্রেণি</option>

                                         </select>
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-6">
                                         <?php
                                         $start = 1906;
                                         $end = intval(date('Y', strtotime(\Carbon\Carbon::now())));
                                         $i = 0;
                                         ?>
                                         <select id="year" name="year" class="select"
                                             aria-label="Default select example">
                                             <option selected disabled value="">বছর</option>
                                             <?php for ($i = $start; $i <= $end; $i++) { ?> <option
                                                 value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                 <?php } ?>
                                         </select>
                                     </div>

                                 </div>
                             </div>
                             <div class="col-lg-2 col-md-3 col-4">
                                 <input id="other" type="checkbox"> <label class="form-label mb-0">অন্যান্য</label>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="clearfix" style="padding-bottom: 20px">
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="container">
                     <div class="label-title1">
                         <label class="form-label" style="font-size: 23px;
                                       margin-top: -33px;
                                       color: #0d0f10;">লগইন তথ্য</label>
                     </div>
                     <div class="form-top">
                         <div class="row mb-2">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label">ফোন নম্বর<span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="text"
                                     class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                     id="phone" name="phone" placeholder="ফোন নম্বর">
                                 @if ($errors->has('phone'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('phone') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label">পাসওয়ার্ড <span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="password" name="password"
                                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                     id="password" placeholder="পাসওয়ার্ড ">
                                 @if ($errors->has('password'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>

                         <div class="row mb-2">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label"> পুনরায় পাসওয়ার্ড লিখুন<span
                                         class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-6 col-md-7 col-12">
                                 <input type="password" name="password"
                                     class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}"
                                     id="password" placeholder="পুনরায় পাসওয়ার্ড লিখুন">
                                 @if ($errors->has('password'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-lg-3 col-md-4 col-12">
                                 <label class="form-label">ছবি<span class="span-star">*</span></label>
                             </div>
                             <div class="col-lg-4 col-md-4 col-8">
                                 <input type="file" value="" name="image" id="image"
                                     class="ml-3 form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                     accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                                 <label class="custom-file-label custom-files form-control" for="image">ছবি নির্বাচন করুন </label>
                             </div>
                             <div class="col-lg-3 col-md-3 col-4 pl-3">
                                 {!! CommonFunction::getImageFromURL('', '', 'show_photo') !!}
                             </div>
                         </div>
                         <div class="row mb-2">
                            <div class="offset-lg-2 col-lg-8 offset-md-3 col-12 ml-3 ml-0">
                                <input id="terms" class="form-check-input" type="checkbox"
                                    value="" name="terms" required>
                                <label class="form-check-label mt-0" for="terms"><a data-toggle="modal" href="#exampleModalLong">শর্তাবলী</a></label>
                            </div>
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">শর্তাবলী
                                            </h5>
                                            <button id="modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                {!! $etc->terms_conditions !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="terms-button" type="button" class="btn btn-primary" data-dismiss="modal">Agree</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mb-2">
                             <div class="offset-lg-2 col-lg-8 offset-md-3 col-12 ml-3 ml-0">
                                 <input class="form-check-input" type="checkbox" value="" name="checkbox"
                                     required>
                                 <label class="form-check-label" for="flexCheckIndeterminate">
                                     <span class="signup-thotho">আমার প্রদত্ত তথ্য সমূহ ১০০ ভাগ  সঠিক এবং ভুল তথ্য  হলে  আমি  নিজেই  দায়ী  থাকবো ।</span>
                                 </label>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="clearfix" style="padding-bottom: 10px"></div>
         <div class="row">
             <div class="col-12">
                 <button type="submit" onclick="participantsubmit()" class=" btn-information">Save</button>
             </div>
         </div>
 </div>
</div>
</div>
<div class="clearfix" style="padding-bottom: 30px"></div>
</div>
</form>
</div>
</div>
</section>
@endsection
