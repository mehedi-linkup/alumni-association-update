@extends('admin.master')
@section('header-resource')
    @include('vendor.datatable.datatable_css')
    @include('admin.etc.form_css')
    @include('vendor.datepicker.datepicker_css')
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">About Us</h1>
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
                            <h5 class="card-title">Update About Us</h5>
                        </div>

                        <form method="POST" action="{{ route('etc.update', $etc->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @include('admin.etc.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.abouts.form_js')

@section('script')

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        // var terms = document.getElementById('terms_conditions');
        // var return = document.getElementById('return_policy');
        // var privacy = document.getElementById('privacy_policy');
            ClassicEditor
            .create( document.querySelector('#terms_conditions' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector('#return_policy' ) )
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector('#privacy_policy' ) )
            .catch( error => {
                console.error( error );
            } );
        // CKEDITOR.replace('terms_conditions');
        // CKEDITOR.replace('return_policy');
        // CKEDITOR.replace('privacy_policy');

    </script>


    {{-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
    </script> --}}
@endsection
