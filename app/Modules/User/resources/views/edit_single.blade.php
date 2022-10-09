@extends('admin.master')
@push('admin-css')
<style>
    input[type="file"] {
        padding: 1px;
    }
</style>
@endpush
@include('User::form_css')
@section('breadcumb')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h4 class="m-0 text-dark">User</h4>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">

                @include('message.message')

                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h5 class="card-title">Edit Single User</h5>
                            </div>
                            <form method="POST" action="{{ route('profile_update') }}" id="frmCheckout"
                                enctype="multipart/form-data" role="form">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <div class="card-body" style="font-family: Roboto">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name <span
                                                        class='required-star'></span></label>
                                                <input id="name" type="text"
                                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                    name="name" value="{{ old('name', optional($user)->name) }}"
                                                    autofocus>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username" class="form-label">User Name <span
                                                        class='required-star'></span></label>
                                                <input id="username" type="text"
                                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                    name="username" value="{{ old('name', optional($user)->username) }}"
                                                    autofocus>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">E-mail <span
                                                        class='required-star'></span></label>
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ old('email', optional($user)->email) }}">

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_type" class="form-label"> User Type <span
                                                        class='required-star'></span></label>
                                                <select class="form-control" name="user_type">
                                                    <option selected disabled>Select User Type</option>
                                                    <?php if($user!=null){ ?>
                                                    <option value="Admin" <?php if ($user->user_type == 'Admin') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                                                    <option value="User" <?php if ($user->user_type == 'User') {
                                                        echo 'selected';
                                                    } ?>>User</option>
                                                    <option value="team_manager" <?php if ($user->team_manager == 'team_manager') {
                                                        echo 'selected';
                                                    } ?>>Team Manager</option>
                                                    <?php }else{ ?>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                    <option value="team_manager">Team Manager</option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Profile Image <span
                                                        class='required-star'></span></label>
                                                <input id="image" type="file" onchange="mainThambUrl(this)"
                                                    class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                    name="image" value="{{ old('image', optional($user)->image) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-center">
                                                <img id="mainThmb" class="img-thumbnail" src="{{(@$user->image) ? asset($user->image) : asset('uploads/no.png') }}" style="width: 150px;height: 120px;  alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('view-user') }}">
                                        <button type="button" class="btn btn-danger">Close</button>
                                    </a>
                                    <button onclick="clientsubmit()" type="submit"
                                        class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix" style="margin-bottom: 20px">
        </div>
    @endsection

    @push('admin-js')
    <script src="{{asset('front/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/client_form.js')}}"></script>
    <script src="{{asset('admin/sweetalert2/sweetalert2.all.js')}}"></script>
    <script src="{{asset('admin/sweetalert2/sweetalert2.js')}}"></script>
    <script>
    function mainThambUrl(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThmb').attr('src',e.target.result).width(140)
                  .height(110);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
    @endpush
