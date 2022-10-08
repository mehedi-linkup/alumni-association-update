@extends('admin.master')
@section('header-resource')
@include('vendor.datatable.datatable_css')
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
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Registration Id</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Phone</th>
                                    <th>Passing Year</th>
                                    <th>Present Address</th>
                                    <th>Transaction Id</th>
                                    <th>Pay Amount</th>
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

{{--    barcode modal --}}
    <div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Barcode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="barcode_data" style="height: 80px; width: 120px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('participant.participant-logout') }}" class="btn btn-primary"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('participant.participant-logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    end logout modal--}}

@endsection
@include('Participant::form_js')
@section('script')

@include('vendor.datatable.datatable_js')

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<script>
    $(function() {
        $status = 1;
        $('#list').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            ajax: {
                url: '{{url("participant/get-participant-active")}}',
                method: 'post',
                data: function(d) {
                    d._token = $('input[name="_token"]').val();
                    d.status = $status;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
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
                    data: 'tx_id',
                    name: 'tx_id'
                },
                {
                    data: 'amount',
                    name: 'amount'
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