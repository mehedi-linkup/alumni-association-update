@extends('front.master')
@include('front.home.login_css')
@include('front.home.password_js')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<div class="clearfix" style="padding-bottom: 30px">

</div>
<section class="login-section">
    <div class="login-card">
        <div class="login-container">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" style="padding: 0px;">
                <ul>
                    @foreach ($errors->all() as $error)
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $error }}</strong>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="clearfix">
                <h2>Forgot Password</h2>

                <div class="login-left-box">
                    @if(Session::get('message'))
                    <div>
                        <div class="success">{{Session::put('message')}}</div>
                    </div>
                    @endif
                    <form method="post" id="login_form" action="javascript:void(0)" enctype="multipart/form-data">
                        @csrf
                        <label for="Email">Email Address</label>
                        <div class="field-wrapper">
                            <input type="email" id="email" name="email" class="field-text @error('email') is-invalid @enderror" required  placeholder="Enter your Email Address" value="">
                            <span id="error_email" class="text-danger"></span>
                            {{-- @error('email') --}}
                            {{-- <span id="error_email" class="invalid-feedback" role="alert">
                            </span> --}}
                            {{-- @enderror --}}
                        </div>


                        <div class="field-wrapper">
                            <button onclick="emailsubmit()" type="submit" class="btn-big wrap">Submit</button>

                        </div>
                        <div class="reg-info">
                            <p>
                                Not Registered?? <a href="{{route('signup')}}">Click Here</a>
                            </p>
                        </div>
                    </form>
                    <form method="post" id="code_form" action="{{route('password_code')}}" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <label for="Email">Email / Phone Number</label>
                        <div class="field-wrapper">
                            <input class="field-text @error('phone') is-invalid @enderror" readonly id="given_email" name="email" placeholder="Enter your Email" type="text" value="">
                            {{-- @if ($errors->has('phone'))
                                       <span class="invalid-feedback{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif --}}
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="code">Code</label>
                        <div class="field-wrapper">
                            <input class="field-text @error('code') is-invalid @enderror" id="code" name="code" placeholder="Enter your Verify Code Number" type="text" value="">
                            {{-- @if ($errors->has('phone'))
                                       <span class="invalid-feedback{{ $errors->has('code') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif --}}
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="field-wrapper">
                            <button type="submit" class="btn-big wrap">Submit</button>

                        </div>
                        <div class="reg-info">
                            <p>
                                Not Registered?? <a href="{{route('signup')}}">Click Here</a>
                            </p>
                        </div>
                    </form>
                    <form method="post" id="reset_form" action="javascript:void(0)" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <label for="Email">Email / Phone Number</label>
                        <div class="field-wrapper">
                            <input class="field-text @error('phone') is-invalid @enderror" disabled id="final_email" name="phone" placeholder="Enter your Phone Number" type="text" value="">
                            {{-- @if ($errors->has('phone'))
                                       <span class="invalid-feedback{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif --}}
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="code">Code</label>
                        <div class="field-wrapper">
                            <input class="field-text @error('code') is-invalid @enderror" disabled id="final_code" name="code" placeholder="Enter your Verify Code Number" type="text" value="">
                            {{-- @if ($errors->has('phone'))
                                       <span class="invalid-feedback{{ $errors->has('code') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif --}}
                            @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="Email"> New Password </label>
                        <div class="field-wrapper">
                            <input class="field-text @error('phone') is-invalid @enderror" id="password" name="password" placeholder="Enter your New Password" type="text" value="">
                            {{-- @if ($errors->has('phone'))
                                       <span class="invalid-feedback{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif --}}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="Email"> Confirm Password</label>
                        <div class="field-wrapper">
                            <input class="field-text @error('phone') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Enter your Confirm Password" type="text" value="">
                            {{-- @if ($errors->has('confirm_password'))
                                       <span class="invalid-feedback{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                            @endif --}}
                            @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="field-wrapper">
                            <button onclick="resetsubmit()" type="submit" class="btn-big wrap">Submit</button>

                        </div>
                        <div class="reg-info">
                            <p>
                                Not Registered?? <a href="{{route('signup')}}">Click Here</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="login-right-helper">
                    <div class="banner-wrapper">
                        <div class="photo-wrapper">
                            <div class="img-fluid">
                                <img src="{{asset('front/images/login.jpg')}}" class="bg-login-image">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</section>
@endsection