@extends('front.master')
@include('front.home.registration_css')
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
                    <h3 class="signup-h2">New<span class="signup-span">Registration</span></h3>
                </div>
                <div class="row float-right">
                    <div class="col-12 mr-2">
                        <a href="{{ route('signup-bangla') }}" class="btn btn-success">বাংলা</a>
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
                @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('status') }} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('message') }}</strong>
                    </div>
                @endif

                <form method="POST" action="{{ route('participant-registration') }}" id="frmCheckout"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="container">
                            <div class="label-title1">
                                <label class="form-label1" style="font-size: 23px;color: #0d0f10;">Personal
                                    Information</label>
                            </div>
                            <div class="form-top">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="">Name<span class="span-star">*</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <input type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="" id="name" placeholder="Your Name">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Fathers Name<span class="span-star">*</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <input type="text"
                                            class="form-control{{ $errors->has('fathers_name') ? ' is-invalid' : '' }}"
                                            name="fathers_name" id="fathers_name" placeholder="Fathers Name">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('fathers_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Mother Name<span class="span-star">*</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <input type="text"
                                            class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}"
                                            name="mother_name" id="mother_name" placeholder="Mother Name">
                                        @if ($errors->has('mother_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('mother_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Blood Group</label>
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
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Gender</label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <select id="gender" name="gender" class="select-gender"
                                            style=" width: 100%;">
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
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Occupation<span class="span-star">*</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <input type="text"
                                            class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                            id="occupation" name="occupation" placeholder="Occupation">
                                        @if ($errors->has('occupation'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('occupation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-12">
                                        <input type="text"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <label class="form-label mt-2 mb-0">Dress Size<span class="span-star">*</span></label>
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
                    <div class="clearfix" style="padding-bottom: 20px">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <div class="label-title1">
                                    <label class="form-label1" style="font-size: 23px;color: #0d0f10;">Address
                                        Area</label>
                                </div>
                                <div class="form-top">
                                    <div class="row mb-2 ">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label mb-0">Present Address<span
                                                    class="span-star">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-12">
                                            <input type="text"
                                                class="form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}"
                                                name="present_address" id="present_address"
                                                placeholder="Present Address">
                                        </div>
                                    </div>
                                    <div class="row mb-2 ">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label mb-0">Permanet Address<span
                                                    class="span-star">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-12">
                                            <input type="text"
                                                class="form-control{{ $errors->has('permanent_address') ? 'is-invalid' : '' }}"
                                                name="permanent_address" id="permanent_address"
                                                placeholder="Permanent Address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label mb-0">SSC Passing Year<span
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
                                                <option selected disabled value="">SSC Passing Year</option>
                                                <?php for ($i = $start; $i <= $end; $i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-8" id="others_field" style="display: none">
                                            {{-- others --}}

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-6">
                                                    <select id="class" name="class" class="select"
                                                        aria-label="Default select example">
                                                        <option selected disabled value="">Class</option>
                                                        <option value="one">One</option>
                                                        <option value="two">Two</option>
                                                        <option value="three">Three</option>
                                                        <option value="three">Four</option>
                                                        <option value="three">Five</option>
                                                        <option value="three">Six</option>
                                                        <option value="three">Seven</option>
                                                        <option value="three">Eight</option>
                                                        <option value="three">Nine</option>
                                                        <option value="three">Ten</option>

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
                                                        <option selected disabled value="">Year</option>
                                                        <?php for ($i = $start; $i <= $end; $i++) { ?> <option value="<?php echo $i; ?>">
                                                            <?php echo $i; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-4">
                                            <input id="other" type="checkbox"><label
                                                class="form-label mb-0">Other</label>
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
                                    <label class="form-label"
                                        style="font-size: 23px;
                                                              color: #0d0f10;">Login
                                        Information</label>
                                </div>
                                <div class="form-top">
                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label">Phone Number<span class="span-star">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-12">
                                            <input type="text"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                id="phone" name="phone" placeholder="Phone Number">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label">Password<span class="span-star">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-12">
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

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label"> Confirm Password<span
                                                    class="span-star">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-12">
                                            <input type="password" name="password"
                                                class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}"
                                                id="confirm_password" placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <label class="form-label">Picture</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-8">
                                            <input type="file" value="" name="image" id="image"
                                                class="ml-3 form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                accept="image/jpeg, image/png" onchange="imageUpload(this, 'show_photo')">
                                            <label class="custom-file-label custom-files form-control"
                                                for="image">Choose
                                                file</label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-4 pl-3">
                                            {!! CommonFunction::getImageFromURL('', '', 'show_photo') !!}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="offset-lg-2 col-lg-8 offset-md-3 col-12 ml-3 ml-0">
                                            <input id="terms" class="form-check-input" type="checkbox"
                                                value="" name="terms" required>
                                            <label class="form-check-label mt-0" for="terms"><a data-toggle="modal" href="#exampleModalLong">Terms and
                                                Conditions</a></label>
                                        </div>
                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions
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
                                            <input id="checkbox" class="form-check-input" type="checkbox"
                                                value="" name="checkbox" required>
                                            <label class="form-check-label mt-0" for="checkbox">
                                                <span class="signup-thotho">I hereby declare that all the information
                                                    given above is true and I will be held responsible if any false
                                                    information is provided.</span>
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
@include('front.home.register_js')
@push('website-js')
<script>
    $(document).on('click','#terms-button', function(event) {
        $('#terms').prop('checked', true)
    });
    $(document).on('click','#modal-close', function(event) {
        $('#terms').prop('checked', false)
    });
</script>
@endpush
