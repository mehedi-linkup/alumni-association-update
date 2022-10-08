@extends('admin.master')
@section('header-resource')
    @include('vendor.datatable.datatable_css')
    @include('admin.slider.form_css')
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Slider</h1>
                </div>
            </div>
        </div>
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
                            <h5 class="card-title">Add Slider</h5>
                        </div>

                        <form method="POST" action="javascript:void(0)" id="frmCheckout">
                            @csrf
                            @include('admin.slider.form')
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="slider_list_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.slider.form_js')
@section('script')

    @include('vendor.datatable.datatable_js')

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <script>
        $(function () {
            $('#list').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                ajax: {
                    url: '{{url("get-slider")}}',
                    method: 'post',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "aaSorting": []
            });
        });
    </script>
@endsection
