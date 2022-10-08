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
         <div class="signup-title">
            <h2 class="signup-h2">New<span class="signup-span" >Registration</span></h2>
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
         <form  method="POST" action="{{route('participant-registration')}}" id="frmCheckout" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
               <div class="row">
                  <div class="container">
                     <div class="label-title1">
                        <label class="form-label1" style="font-size: 23px;margin-top: -33px; color: #0d0f10;">Personal Information</label>
                     </div>
                     <div class="form-top" style="height: 130px !important;">
                        <div class="row">
                           <div class="col-lg-2">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" id="name" placeholder="Your Name">
                             
                              @if ($errors->has('name'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-2">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" class="form-control">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-2">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" class="form-control">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-2">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" class="form-control">
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-2">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" class="form-control">
                           </div>
                        </div>







                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Name<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                             
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Fathers Name<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('fathers_name') ? ' is-invalid' : '' }}" name="fathers_name" id="fathers_name" placeholder="Fathers Name">
                              @if ($errors->has('name'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('fathers_name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Mother Name<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" id="mother_name" placeholder="Mother Name">
                              @if ($errors->has('mother_name'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('mother_name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Blood Group</label>
                           </div>
                           <div class="mb-3">
                              <select id="blood_group" name="blood_group" class="select" style=" width: 50%;">
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
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Gender</label>
                           </div>
                           <div class="mb-3">
                              <select id="gender" name="gender" class="select-gender" style=" width: 50%;">
                                 <option value="">Gender</option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </select>
                              @if ($errors->has('gender'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('gender') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Occupation<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" id="occupation" name="occupation" placeholder="Occupation">
                              @if ($errors->has('occupation'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('occupation') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>
                     
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Email</label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Email">
                              @if ($errors->has('email'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
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
                        <label class="form-label1" style="font-size: 23px; margin-top: -33px;color: #0d0f10;">Address Area</label>
                     </div>
                     <div class="form-top" style="height: 130px !important;">
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Present Address<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}" name="present_address" id="present_address" placeholder="Present Address">
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">Permanet Address<span class="span-star">*</span></label>
                           </div>
                           <div class="mb-3">
                              <input type="text" class="form-control{{$errors->has('permanent_address') ? 'is-invalid' : ''}}" name="permanent_address" id="permanent_address" placeholder="Permanent Address">
                           </div>
                        </div>
                        <div class="form">
                           <div class="label-title">
                              <label class="form-label">SSC Passing Year<span class="span-star">*</span></label>
                           </div>
                           <div class="row">
                            <div class="col-md-4">
                                <div id="passing_year_field">
                                   <div class="mb-3">
                                      <?php $start = 1906; $end = intval(date('Y',strtotime(\Carbon\Carbon::now())));$i=0; ?>
                                      <select id="passing_year" name="passing_year" class="select" aria-label="Default select example" style="margin-left: 4%;">
                                         <option selected disabled value="">SSC Passing Year</option>
                                         <?php for($i=$start; $i<=$end; $i++){ ?>
                                         <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                         <?php } ?>
                                      </select>
                                   </div>
                                </div>
                               </div>
                            
                              <div class="col-md-6">
                                 {{-- others  --}}
                                 <div class="form-group" id="others_field" style="margin-left: -59%;display: none">
                                       <div class="row">
                                          <div class="col-sm-6 col-md-6 ">
                                             <div class="mb-3">
                                                <select id="class" name="class" class="select" aria-label="Default select example" style="width: 183%;">
                                                   <option selected disabled value="">Class</option>
                                                 
                                                   <option value="one">One</option>
                                                   <option value="two">Two</option>
                                                   <option value="three">Three</option>
                                                   <option value="three">Three</option>
                                                   <option value="three">five</option>
                                                   <option value="three">Six</option>
                                                   <option value="three">Seven</option>
                                                   <option value="three">Eight</option>
                                                   <option value="three">Nine</option>
                                                   <option value="three">Ten</option>

                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <?php $start = 1906; $end = intval(date('Y',strtotime(\Carbon\Carbon::now())));$i=0; ?>
                                                <select id="year" name="year" class="select" aria-label="Default select example" style=" margin-left: 68%;width: 183%;">
                                                   <option selected disabled value="">Year</option>
                                                   <?php for($i=$start; $i<=$end; $i++){ ?>
                                                   <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                  
                                   </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="form-group1" style="margin-left: -227%;">
                                       <input id="other" type="checkbox" > <label class="form-label">Other</label>
                                    </div>
                                 </div>
                                 {{-- end others --}}
                           
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
                              color: #0d0f10;">Login Information</label>
                        </div>
                        <div class="form-top">
                           <div class="form">
                              <div class="label-title">
                                 <label class="form-label">Phone Number<span class="span-star">*</span></label>
                              </div>
                              <div class="mb-3">
                                 <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" placeholder="Phone Number">
                                 @if ($errors->has('phone'))
                                 <span class="invalid-feedback">
                                 <strong>{{ $errors->first('phone') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form">
                              <div class="label-title">
                                 <label class="form-label">Password<span class="span-star">*</span></label>
                              </div>
                              <div class="mb-3">
                                 <input type="password" name="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    id="password" placeholder="Password">
                                 @if ($errors->has('password'))
                                 <span class="invalid-feedback">
                                 <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form">
                              <div class="label-title">
                                 <label class="form-label"> Confirm Password<span class="span-star">*</span></label>
                              </div>
                              <div class="mb-3">
                                 <input type="password" name="password"
                                    class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}"
                                    id="password" placeholder="Password">
                                 @if ($errors->has('password'))
                                 <span class="invalid-feedback">
                                 <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form">
                              <div class="row">
                                 <div class="col-md-2">
                                    <div class="label-title">
                                       <label class="form-label">Picture<span class="span-star">*</span></label>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-group mb-1" style="margin-left: 19px;">
                                       <div class="custom-file">
                                          <input type="file" value="" name="image" id="image"
                                             class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                             accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                                          <label class="custom-file-label" for="image">Choose file</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="mb-1 first">
                                       {{-- <img class="mb-1" id="photo_preview" height="54" width="53"> --}}
                                       {!! CommonFunction::getImageFromURL('', '', 'show_photo') !!}
                                       <div class="first">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkbox" required>
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                      <span class="signup-thotho">I will be responsible if the information I provide is 100% correct and incorrect.</span>
                                    </label>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix" style="padding-bottom: 10px"></div>
            <div class="btn-save" style="width: 20%; margin-left: 148px; margin-top: -10px;">
               <button type="submit" onclick="participantsubmit()" class="btn btn-info">Save</button>
            </div>
            <div class="clearfix" style="padding-bottom: 30px"></div>
      </div>
      </form>
   </div>
   </div>
</section>
@endsection