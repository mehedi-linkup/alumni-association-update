@extends('admin.master')
@section('header-resource')
    @include('vendor.datatable.datatable_css')
    @include('admin.news.form_css')
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Notice</h1>
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
                            <h5 class="card-title">Notice</h5>
                        </div>

                        <form method="POST" action="javascript:void(0)" id="frmCheckout">
                            @csrf
                            @include('admin.news.form')
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
                                    <th>Name</th>
                                    <th>Notice Type</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
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
@include('admin.news.form_js')
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
                    url: '{{url("get-news")}}',
                    method: 'post',
                    data: function (d) {
                        d._token = $('input[name="_token"]').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'news_type', name: 'news_type'},
                    {data: 'description', name: 'description'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
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
