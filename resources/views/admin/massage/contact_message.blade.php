@extends('admin.master')
@section('header-resource')
    @include('vendor.datatable.datatable_css')
    @include('admin.committee.form_css')
@endsection
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Contact Message</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
   
    @include('message.message')
           
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                         <div class="card-header">
                        <div class="card-body">
                            <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="massage_list_data">
                                @foreach($messages as $index => $message)
                                    <tr>
                                    <td style="text-align:center">{{$index + 1}}</td>
                                    <td style="text-align:center">{{$message->name}}</td>
                                    <td style="text-align:center">{{$message->email}}</td>
                                    <td style="text-align:center">{{$message->phone}}</td>
                                    <td style="text-align:center">{{$message->message}}</td>
                                    <td><a style="color: #fff" name="{{$message->id}}" onclick="deleteContactmessage(this.name)" class="btn btn-danger btn-xs"> <i class="fa fa-remove"></i> Delete </a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
@endsection
@include('admin.massage.form_js')
@section('script')

    @include('vendor.datatable.datatable_js')

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <script>
        $(function () {
            $('#list').DataTable({
                autoWidth: false,
                processing: true,
                iDisplayLength: 10,
                "aaSorting": []
            });
        });
    </script>
@endsection
