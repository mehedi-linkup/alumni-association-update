@extends('admin.master')
@section('header-resource')
{{-- @include('vendor.datatable.datatable_css') --}}
@include('Participant::form_css')
@endsection
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark text-center">Particapant SMS</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        @include('message.message')
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="card-title">Send SMS</h5>
                    </div>

                    <form method="POST" action="javascript:void(0)" id="frmCheckout" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" id="photo_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="participant_type" class="form-label">Participant Type</label>
                                        <select id="participant_type" class="form-control" name="passing_year">
                                            <option selected disabled value="">Select Participant Type</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        @if ($errors->has('participant_type'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('participant_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sms" class="form-label">SMS</label>
                                        <textarea id="sms" type="text" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="sms" rows="6" placeholder="Write your message here">{{ old('sms')}}</textarea>
                                        @if ($errors->has('sms'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('sms') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" onclick="participantsubmit()" class="btn btn-info float-right">Submit</button>
                                </div>
                            </div>
                        </div>                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
</div>
</div>