@extends('admin.master')
@section('header-resource')
    @include('vendor.datatable.datatable_css')
    @include('admin.abouts.form_css')
    @include('vendor.datepicker.datepicker_css')
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">About Us</h1>
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
                            <h5 class="card-title">Update About Us</h5>
                        </div>

                        <form method="POST" action="javascript:void(0)" id="frmCheckout">
                            @csrf
                            @include('admin.abouts.form')
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
                            <table id="list" style="width: 100%;" class="table dt-responsive table-bordered table-striped nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">About Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id="news_list_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.abouts.form_js')
@section('script')

    @include('vendor.datatable.datatable_js')
    @include('vendor.datepicker.datepicker_js')

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <script>
        $(function () {
            $('#list').DataTable({
                autoWidth: false,
                aoColumns : [
                    { sWidth: '5%' },
                    { sWidth: '10%' },
                    { sWidth: '10%' },
                    { sWidth: '10%' },
                    { sWidth: '40%' },
                    { sWidth: '10%' },
                    { sWidth: '15%' }
                ],
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                ajax: {
                    url: '{{url("get-about-us")}}',
                    method: 'post',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', width:'5%', name: 'DT_RowIndex'},
                    {data: 'title',width:'10%', name: 'title'},
                    {data: 'date', width:'10%', name: 'date'},
                    {data: 'about_type', width:'10%', name: 'about_type'},
                    {data: 'description', width: '40%', name: 'description'},
                    {data: 'image', width: '10%', name: 'image'},
                    {data: 'action', width: '15%', name: 'action', orderable: false, searchable: false},
                ],
                "aaSorting": []
            });
            CKEDITOR.replace('description', {
                width: '100%',
                height: 80
            });
        });
    </script>
@endsection
