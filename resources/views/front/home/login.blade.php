@extends('front.master')
@include('front.home.login_css')
@include('front.home.register_js')
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
                    <h2>Sign in To view Your Account</h2>
                 
                    <div class="login-left-box">
                        @include('message.message')
                            @if(Session::get('message'))
                            <div>
                                <div class="success">{{Session::put('message')}}</div>
                            </div>
                            @endif
                        <form  method="post" id="login_form" action="{{ route('participant.login') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="Email">Phone Number</label>
                            <div class="field-wrapper">
                                <input class="field-text @error('phone') is-invalid @enderror"  id="Phone"
                                       name="phone" placeholder="Enter your Phone Number" type="text" value="">
                                       @error('Phone')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                            </div>
                            <label for="Password">Password</label>
                            <div class="field-wrapper">
                                <input class="field-text{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                       placeholder="Enter your password" type="password" value="">
                                       {{-- @if ($errors->has('password'))
                                       <span class="invalid-feedback{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                       <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                       @endif       --}}
                                       @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror

                            </div>
                            <div class="checkbox-wrapper">
                                <label>
                                    <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" value="true"><input
                                        name="RememberMe" type="hidden" value="false">
                                    <span class="fake-box"></span>
                                    <span class="checkbox-text">Remember Me <i class="small-text">(Not recommended for public computers)</i></span>
                                </label>
                            </div>

                            <div class="field-wrapper">
                                <button onclick="loginsubmit()" type="submit" class="btn-big wrap" >Sign in to your account</button>
                                <p>
                                    Forgot Password?? <a href="{{route('forgot_password')}}">Click Here</a>
                                </p>
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

