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

@endsection
@include('Participant::form_js')
@section('script')

@include('vendor.datatable.datatable_js')

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<script>
    $(function() {
        $status = 2;
        $('#list').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            iDisplayLength: 10,
            ajax: {
                url: '{{url("participant/get-participant-pending")}}',
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