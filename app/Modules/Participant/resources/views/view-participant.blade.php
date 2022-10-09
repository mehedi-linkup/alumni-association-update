@extends('admin.master')
@section('header-resource')
@include('vendor.datatable.datatable_css')
@include('Participant::form_css')
@endsection
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Participant</h1>
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
                        <h5 class="card-title">Add Participant</h5>
                    </div>

                    <form method="POST" action="javascript:void(0)" id="frmCheckout" enctype="multipart/form-data">
                        @csrf
                        @include('Participant::form')
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Reg. SL</th>
                                    <th>Registration Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Passing Year</th>
                                    <th>Present Address</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="participant_list_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- payment modal --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Payment Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="" method="POST" action="{{route('save-payment')}}" enctype="multipart/form-data">
                @csrf
             
                <div class="form-top">
                   <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Tx id</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('tx_id') ? ' is-invalid' : '' }}" name="tx_id" placeholder="Tx id">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Bank tx id</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('bank_tx_id') ? ' is-invalid' : '' }}" name="bank_tx_id" placeholder="Bank tx id">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Amount</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount"  placeholder="Amount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Bank status</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('bank_status') ? ' is-invalid' : '' }}" name="bank_status" placeholder="Bank status">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Sp Code</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('sp_code') ? ' is-invalid' : '' }}" name="sp_code"  placeholder="Sp Code">
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Sp Code Des</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <textarea type="text" name="sp_code_des" class="form-control" style="height: 60px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Sp Payment Option</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('sp_payment_option') ? ' is-invalid' : '' }}" name="sp_payment_option" placeholder="Sp Payment Option">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="label-title">
                                    <label class="label">Status</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-2">
                                    <input type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status"  placeholder="status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-large">Save</button>
            </div>
        </form>
          
        </div>
    </div>
    
</div>
</div>
</div>

{{-- end payment modal--}}


@endsection
@include('Participant::form_js')
@section('script')

@include('vendor.datatable.datatable_js')

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<script>
    $(function() {
        // $status = 0;
        $('#list').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            ajax: {
                url: '{{url("participant/get-participant")}}',
                method: 'post',
                data: function(d) {
                    d._token = $('input[name="_token"]').val();
                    // d.status = $status;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'registration_id',
                    name: 'registration_id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'passing_year',
                    name: 'passing_year'
                },
                {
                    data: 'present_address',
                    name: 'present_address'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "aaSorting": []
        });
    });
</script>
@endsection