@extends('front.dashboard.master')
@section('content')
    <style>
        .card {
            background-image: linear-gradient(to right top, #ebdfe6, #e6cde3, #dbbde5, #c7afe9, #a9a4f0, #a5a8f4, #a1acf7, #9db0fa, #bbc2fb, #d5d5fc, #ebeafd, #ffffff);
        }

        .header-text {
            font-size: 14px;
            padding-left: 10%;
            padding-top: 3%;
            padding-right: 2%;
            color: #000;
            text-shadow: 1px 0px #fff;
            font-weight: 600;
            font-family: roboto;
            width: 75%;
            float: right;
        }

        .signeture {
            display: none !important;
        }

        .card-img {
            text-align: center;
            width: 22%;
            float: left;
        }

        .card-img img {
            width: 88px;
            height: 54px;
        }

        .profile-image {
            text-align: center;
        }

        .profile-image img {
            width: 100px;
        }

        .profile-image h5 {
            text-transform: uppercase;
            text-align: center;
            color: #FBEF01;
            font-size: 25px;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-family: 'Times New Roman', Times, serif;
            margin-bottom: 0px;
        }

        .profile-image span {
            text-align: center;
            font-weight: 700;
            color: #bb2828;
            text-shadow: 2px 2px grey;
            font-size: 25px;
        }

        .footer-img {
            text-align: center;
            display: flex;
        }

        .card-name {
            font-size: 13px;
            color: #000000;
        }

        .frontpart {
            height: 336px;
            width: 250px;
        }

        .backpart {
            height: 336px;
            width: 250px;

        }

        .backpart-center {
            margin-top: 50%;
            text-align: center;
        }

        .text-dark {
            color: #000000 !important;
            font-family: roboto;
        }

        .invoice-logo img {
            width: 275px !important;
            height: 80px !important;
        }

        @media print {
            .invoice-logo img {
                height: 10px !important;
                width: 30px !important;
            }
        }

    </style>
    <div class="container">
        <div class="clearfix" style="padding-bottom: 20px">
        </div>
        <div class="card-title">
            <h2 class="align-center" style="text-align: center">Dashboard</h2>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="row" style="min-height:400px;">
                <div class="col-sm-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home"
                                    aria-hidden="true"></i> Home</a>
                        </li>
                        <li><a class="profile" href="#profile" data-toggle="tab"><i class="fa fa-user"
                                    aria-hidden="true"></i>
                                Profile</a>
                        </li>
                        <!-- <li><a href="#messages" data-toggle="tab"><i class="fa fa-commenting" aria-hidden="true"></i>
                      Messages</a> -->
                        <li><a href="#payment" data-toggle="tab"><i class="fa fa-money" aria-hidden="true"></i> Payment
                                Info</a>
                        </li>
                        <li><a href="#invoice_print" data-toggle="tab"><i class="fa fa-print" aria-hidden="true"></i>
                                Invoice Print</a>
                        </li>
                        <!-- <li><a href="#id_print" data-toggle="tab"><i class="fa fa-print" aria-hidden="true"></i> ID Print</a>
                   </li> -->
                        <li><a href="#settings" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i>
                                Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="card-body shadow p-3">
                                <div class="welcome-notes">
                                    <p>Welcome To Ali Azam School</p>
                                </div>
                            </div>
                            <br>
                            <br>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ Session::get('message') }}</strong>
                                </div>
                            @endif
                            @if (Auth::guard('participant')->user()->status == '0')
                                <div class="alert-warning message">
                                    <p> <span>Kindly <a
                                                href="{{ route('add_payment', ['id' => Auth::guard('participant')->user()->id]) }}">add
                                                your payment</a> to complete your registration</span></p>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="col-md-12">
                                <div class="container std-profile">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                @if (!Auth::guard('participant')->user()->image == '')
                                                    <img width="129" height="86"
                                                        src="{{ asset(Auth::guard('participant')->user()->image) }}"
                                                        alt="" />
                                                @elseif(Auth::guard('participant')->user()->gender == 'Male')
                                                    <img width="120" height="40"
                                                        src="{{ asset('front/images/male.png') }}" alt="">
                                                @else
                                                    <img width="120" height="40"
                                                        src="{{ asset('front/images/female.png') }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="profile-head">
                                                <h5>
                                                    {{ Auth::guard('participant')->user()->name }}
                                                </h5>
                                                <h6>
                                                    {{ Auth::guard('participant')->user()->occupation }}
                                                </h6>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-selected="true">Profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" onclick="editprofile()" class="profile-edit-btn"
                                                name="btnAddMore" value="Edit Profile" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="profile-work">
                                                <p>Passing Year</p>
                                                <a href="">{{ Auth::guard('participant')->user()->passing_year }}</a><br />
                                                <p>Blood Group</p>
                                                <a href=""></a><br />
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Fathers Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->fathers_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Mothers Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->mother_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->phone }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::guard('participant')->user()->occupation }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="container">
                        <div class="row">
                           <div class="col-4">
                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset(Auth::guard('participant')->user()->image)}}" alt="User profile picture">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-4">
                  <p class="profile-name">
                     {{Auth::guard('participant')->user()->name}}
                  </p>
               </div>
            </div>
            <div class="row">
               <div class="col-4">
                  <button type="button" onclick="editprofile()" name="btnAddMore" class="btn btn-info">Edit Profile</button>
               </div>
               <div class="col-md-8">
                  <div class="tab-content profile-tab" id="myTabContent">
                     <div class="row">
                        <div class="col-md-6">
                           <p>Name : {{Auth::guard('participant')->user()->name}}</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Fathers Name : {{Auth::guard('participant')->user()->fathers_name}}</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Mothers Name : {{Auth::guard('participant')->user()->mother_name}}</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Email : {{Auth::guard('participant')->user()->email}}</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Phone : {{Auth::guard('participant')->user()->phone}} </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Passing Year : {{Auth::guard('participant')->user()->passing_year}} </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p>Blood Group : {{Auth::guard('participant')->user()->blood_group}} </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
                                <div class="std-edit-profile" style="display: none">
                                    <fieldset>
                                        <div class="card-body shadow p-3 mb-5 bg-white rounded">
                                            <form id="frmCheckout" action="{{ route('participant.update-participant') }}"
                                                method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input id="participant_id" type="hidden" name="participant_id" value="{{Auth::guard('participant')->user()->id}}">
                                                        <div class="form-group">
                                                            <label class="form-label">Name</label>
                                                            <input class="form-control" name="name" type="text"
                                                                value="{{ Auth::guard('participant')->user()->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Fathers Name</label>
                                                            <input class="form-control" name="fathers_name" type="text"
                                                                value="{{ Auth::guard('participant')->user()->fathers_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Mothers Name</label>
                                                            <input class="form-control" name="mother_name" type="text"
                                                                value="{{ Auth::guard('participant')->user()->mother_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="passing_year" class="form-label">Passing
                                                                Year</label>
                                                            <?php

                                                            use App\Payment;

                                                            $start = 1970;
                                                            $end = intval(date('Y', strtotime(\Carbon\Carbon::now())));
                                                            $i = 0; ?>
                                                            <select id="passing_year" class="form-control"
                                                                name="passing_year">
                                                                <option selected disabled value=""> Select Passing Year
                                                                </option>
                                                                <?php for ($i = $start; $i <= $end; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if (Auth::guard('participant')->user()->passing_year == $i) {
    echo 'selected';
} ?>>
                                                                    <?php echo $i; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            @if ($errors->has('passing_year'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('passing_year') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- Permanent Address --}}
                                                        <div class="form-group">
                                                            <label for="permanent_address" class="form-label">Present
                                                                Address</label>
                                                            <input id="present_address" type="text"
                                                                class=" form-control{{ $errors->has('present_address') ? ' is-invalid' : '' }}"
                                                                name="present_address"
                                                                value="{{ Auth::guard('participant')->user()->present_address }}">
                                                            @if ($errors->has('present_address'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('present_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{-- Permanent Address --}}
                                                        <div class="form-group">
                                                            <label for="permanent_address" class="form-label">Permanent
                                                                Address</label>
                                                            <input id="permanent_address" type="text"
                                                                class=" form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}"
                                                                name="permanent_address"
                                                                value="{{ Auth::guard('participant')->user()->permanent_address }}">
                                                            @if ($errors->has('permanent_address'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="blood_group" class="form-label">Blood
                                                                Group</label>
                                                            <select name="blood_group" id="blood_group"
                                                                class="form-control">
                                                                <option selected disabled>Select Blood Group</option>
                                                                <option value="A+" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'A+') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>A+(ve)</option>
                                                                <option value="A-" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'A-') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>A-(ve)</option>
                                                                <option value="AB+" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'AB+') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>AB+(ve)</option>
                                                                <option value="AB-" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'AB-') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>AB-(ve)</option>
                                                                <option value="B+" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'B+') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>B+(ve)</option>
                                                                <option value="B-" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'B-') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>B-(ve)</option>
                                                                <option value="O+" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'O+') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>O+(ve)</option>
                                                                <option value="O-" @php
                                                                    if (Auth::guard('participant')->user()->blood_group == 'O-') {
                                                                        echo 'selected';
                                                                    }
                                                                @endphp>O-(ve)</option>
                                                            </select>
                                                            @if ($errors->has('blood_group'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="{{ Auth::guard('participant')->user()->email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- Phone Number --}}
                                                        <div class="form-group">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input id="phone" type="number"
                                                                class=" form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                                name="phone"
                                                                value="{{ Auth::guard('participant')->user()->phone }}">
                                                            @if ($errors->has('phone'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                            @endif

                                                            <label for="occupation"
                                                                class="form-label mt-2">Occupation</label>
                                                            <input id="occupation" type="text"
                                                                class=" form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                                                name="occupation"
                                                                value="{{ Auth::guard('participant')->user()->occupation }}">
                                                            @if ($errors->has('occupation'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('occupation') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="image" class="form-label">Image</label>
                                                            <div class="input-group mb-1">
                                                                <div class="custom-file">
                                                                    <input type="file" value="" name="image" id="image"
                                                                        class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                                        accept="image/jpeg, image/png"
                                                                        onchange="imageUpload(this, 'show_photo')">
                                                                    <label class="custom-file-label" for="image">Choose
                                                                        file</label>
                                                                </div>
                                                            </div>
                                                            {{-- <small id="emailHelp" class="form-text text-muted"> --}}
                                                            {{-- File Format: *.jpg/ .png | Max file size: 3MB --}}
                                                            {{-- </small> --}}
                                                            <div class="mb-1 first">
                                                                {{-- <img class="mb-1" id="photo_preview" height="100" width="100"> --}}
                                                                {!! CommonFunction::getImageFromURL(Auth::guard('participant')->user()->image, '', 'show_photo') !!}
                                                            </div>
                                                            {{-- Show image --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button onclick="participantsubmit()" type=submit
                                                            class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="invoice_print">
                            @if (!Auth::guard('participant')->user()->status == 1)
                                <div class="card-content">
                                    <div class="alert-warning message">
                                        <p> <span>Kindly <a
                                                    href="{{ route('add_payment', ['id' => Auth::guard('participant')->user()->id]) }}">add
                                                    your payment</a> to complete your registration</span></p>
                                    </div>
                                </div>
                            @else
                                <div class="card-content">
                                    <div class="alert-warning message">
                                        <a href="{{ route('participant-invoice', ['id' => Auth::guard('participant')->user()->id]) }}"
                                            target="_blank"> Check Your Invoice</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="id_print">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card frontpart shadow p-2">
                                            <div class="row">
                                                <div class="card-img">
                                                    <img class="text-center"
                                                        src="{{ asset('front/images/card-logo.png') }}" alt="">
                                                </div>
                                                <h1 class="text-center header-text text-shadow">
                                                    Ali Azam School & College Alumni Association
                                                </h1>
                                            </div>
                                            <hr>
                                            <div class="profile-image">
                                                @if (!Auth::guard('participant')->user()->image == '')
                                                    <img src="{{ asset(Auth::guard('participant')->user()->image) }}"
                                                        class="float-left" alt="">
                                                @elseif(Auth::guard('participant')->user()->gender == 'Male')
                                                    <img src="{{ asset('front/images/male.png') }}"
                                                        class="float-left" alt="">
                                                @else
                                                    <img src="{{ asset('front/images/female.png') }}"
                                                        class="float-left" alt="">
                                                @endif
                                                <h5>Batch</h5>
                                                <span>{{ Auth::guard('participant')->user()->passing_year }}</span>
                                                <div class="font-weight-bold card-name">
                                                    {{ Auth::guard('participant')->user()->name }}</div>
                                            </div>
                                            <div class="footer-img">
                                                <img class="w-50 h-80 mt-4"
                                                    src="{{ asset('front/images/card-100.png') }}" alt="">

                                                <img class="w-50"
                                                    src="{{ asset('front/images/card-Qr.png') }}" alt="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-5">
                                        <div class="card backpart shadow p-2">
                                            <div class="backpart-center align-middle">
                                                <ul class="fa-ul ml-3 text-dark font-weight-bold">
                                                    <li>
                                                        If u Found Please Contact with
                                                    </li>
                                                    <li>
                                                        Address: Ali-Azam School
                                                    </li>
                                                    <li>
                                                    <li>
                                                        78, Naya Palton, Shanjari Tower (1st Floor), Dhaka-1000, Bangladesh.
                                                    </li>
                                                    <li>
                                                        01511541043
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="messages">Messages Tab.</div> -->
                        <div class="tab-pane" id="payment">
                            <!-- payment section added  -->
                            @if (Auth::guard('participant')->user()->status == 0)
                                <div class="card-content">
                                    <div class="alert-warning message">
                                        <p> <span>Kindly <a
                                                    href="{{ route('add_payment', ['id' => Auth::guard('participant')->user()->id]) }}">add
                                                    your payment</a> to complete your registration</span></p>
                                    </div>
                                </div>
                        </div>
                    @else
                        <?php $payment = DB::table('transaction')
                            ->where('user_id', Auth::guard('participant')->user()->id)
                            ->first(); ?>
                        <div class="card-body">
                            <h4 class="received-title">
                                Received Payment Info</h3>
                                <div class="container bootdey" id="print_section">
                                    <div class="row invoice">
                                        <div class="col-8 offset-2 row-printable set-box-shadow set-padding set-margin">
                                            <div class="panel panel-default plain " id="dash_0">
                                                <div class="panel-body p30">
                                                    <div class="row" style="display: flex; padding-bottom:6px">
                                                        <div class="col-md-6 col-sm-6" style="width: 50%; float:left">
                                                            <div class="invoice-logo">
                                                                <img height="170" width="600" style="padding-bottom: 20px;"
                                                                    src="{{ asset('front/images/logo.jpg') }}"
                                                                    alt="Invoice logo">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-md-6" style="width: 50%; float:right">
                                                            <div class="invoice-from">
                                                                <ul class="list-unstyled text-right">
                                                                    <li>Ali Azam School</li>
                                                                    <li>Munshirhat, Fulgazi, Feni</li>
                                                                    <li>{{ $payment->created_at }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="invoice-details mt25">
                                                                <div class="well">
                                                                    <ul class="list-unstyled mb0">
                                                                        <li><strong>Transaction ID</strong>
                                                                            {{ $payment->tx_id }}</li>
                                                                        <li><strong>Transaction Date:</strong>
                                                                            {{ $payment->created_at }}</li>
                                                                        <li><strong>Total Amount:</strong>
                                                                            {{ $payment->amount }} Taka</li>
                                                                        <li><strong>Status:</strong> <span
                                                                                class="label label-danger">Paid</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="invoice-to mt25">
                                                                <ul class="list-unstyled">
                                                                    <li><strong>Money receipt</strong></li>
                                                                    <li>Name :
                                                                        {{ Auth::guard('participant')->user()->name }}</li>
                                                                    <li>Address :
                                                                        {{ Auth::guard('participant')->user()->permanent_address }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="invoice-items">
                                                                <div class="table-responsive ">
                                                                    <table class="table table-bordered ">
                                                                        <thead class="col-md-12 col-sm-12">
                                                                            <tr>
                                                                                <th class="per70 text-center">Description
                                                                                </th>
                                                                                <th class="per5 text-center">Payment Option
                                                                                </th>
                                                                                <th class="per25 text-center">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-center">
                                                                                    {{ $payment->tx_id }} -
                                                                                    {{ $payment->sp_code_des }}</td>
                                                                                <td class="text-center">
                                                                                    {{ $payment->sp_payment_option }}</td>
                                                                                <td class="text-center">
                                                                                    {{ $payment->amount }} Taka</td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="2" class="text-right">
                                                                                    Total Amount:</th>
                                                                                <th class="text-center">
                                                                                    {{ $payment->amount }} Taka</th>

                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="signeture pt-10" style="">
                                                                <p style="border-top: 1px solid #0d0808;text-align:left">Signature</p>
                                                            </div>

                                                            <div class="invoice-footer mt25">

                                                                <button class="text-center btn btn-danger"
                                                                    onclick="invoiceprint()"><i
                                                                        class="fa fa-print mr5"></i> Print</button>
                                                            </div>

                                                        </div>
                                                        <!-- col-lg-12 end here -->
                                                    </div>
                                                    <!-- End .row -->
                                                </div>
                                            </div>
                                            <!-- End .panel -->
                                        </div>
                                        <!-- col-lg-12 end here -->
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endif
                    <div class="tab-pane" id="settings">
                        <div class="container">
                            <form class="" method="POST" action="{{ route('participant.change') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" style="padding-top: 0!important;">
                                    <div class="row">
                                        <div class="container">
                                            <div class="form-label">
                                                <h4 class="card-header">
                                                    Password Change</label>
                                            </div>
                                            <div class="form-top shadow p-3">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="label-title">
                                                                <label class="form-label">Current password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="mb-2">
                                                                <input type="password"
                                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                    name="password" placeholder="Password" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="label-title">
                                                                <label class="form-label">New Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="mb-2">
                                                                <input type="password"
                                                                    class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                                                    name="new_password" id="new_password"
                                                                    placeholder="New Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="label-title">
                                                                <label class="form-label">Confirm New Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="mb-2">
                                                                <input type="password"
                                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                    name="password" placeholder="Confirm New Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="update-password">
                                                    <button type="submit" class="btn btn-success btn-large">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
