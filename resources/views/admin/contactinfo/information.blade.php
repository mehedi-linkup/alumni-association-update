@extends('admin.master')
@include('admin.abouts.form_css')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Contact Information</h1>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<style>.span-star{
    color:red;
}</style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h5 class="card-title">Update Contact Information</h5>
                        </div>
                        @if ($errors->any())
                        <div class="text-danger font-italic pt-3 mb-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session('success'))
                    <div class="alert alert-success" role="alert">
                        Upadeted Successfully
                      </div>
                   @endif
                        <div class="card-body">
                            <form action="{{ route('contact.update', $all) }}" method="post">
                               @csrf
                                <!-- School Address Info:  -->
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">School Address Info:</legend>
                                    <div class="form-group">
                                        <label class="">Email<span class="span-star">*</span></label>
                                        <input type="email" class="form-control" name="school_email" value="{{ $all->school_email }}"
                                        placeholder="School email">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone<span class="span-star">*</span></label>
                                        <input type="number" class="form-control" name="school_phone" value="{{ $all->school_phone }}"
                                        placeholder="School Phone number">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Address<span class="span-star">*</span></label>
                                        <input type="text" class="form-control" name="school_address" value="{{ $all->school_address }}" placeholder="School Address">
                                    </div>
                                </fieldset>
        
        
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Secretary Address Info</legend>
                                    <div class="form-group">
                                        <label class="">Email<span class="span-star">*</span></label>
                                        <input type="email" class="form-control" name="secretary_email" value="{{ $all->secretary_email }}"
                                        placeholder="sec email">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone<span class="span-star">*</span></label>
                                        <input type="number" class="form-control" name="secretary_phone" value="{{$all->secretary_phone }}"
                                        placeholder="Secretary Phone number">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Address<span class="span-star">*</span></label>
                                        <input type="text" class="form-control" name="secretary_address" value="{{ $all->secretary_address }}" placeholder="Secretary Address">
                                    </div>
                                </fieldset>
        
        
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Committee Address Info</legend>
                                    <div class="form-group">
                                        <label class="">Email<span class="span-star">*</span></label>
                                        <input type="email" class="form-control" name="committee_email" value="{{ $all->committee_email }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone<span class="span-star">*</span></label>
                                        <input type="number" class="form-control" name="committee_phone" value="{{ $all->committee_phone }}" >
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="">Address<span class="span-star">*</span></label>
                                        <input type="text" class="form-control" name="committee_address" value="{{ $all->committee_address }}">
                                       
                                    </div>
                                </fieldset>
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Header Information</legend>
                                    @php
                                          $data = App\HeaderContent::first();  
                                    @endphp
                                    <div class="form-group">
                                        <label class="">Email<span class="span-star">*</span></label>
                                        <input type="email" class="form-control" name="header_email" value="{{ $data?$data->email:'' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone<span class="span-star">*</span></label>
                                        <input type="number" class="form-control" name="header_phone" value="{{ $data?$data->phone:'' }}" >
                                    </div>
                                </fieldset>                                
                                <fieldset class="form-group border p-3">
                                    <legend class="w-auto px-2">Celebration Date</legend>
                                    <div class="form-group">
                                        <label class="">Date<span class="span-star">*</span></label>
                                        <input type="date" class="form-control" name="program_start_date" value="{{ $all? date('Y-m-d', strtotime($all->program_start_date)):'' }}">
                                    </div>
                                </fieldset>
                               
                                <!-- Submit Button  -->
                                <div class="form-group row text-right">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
