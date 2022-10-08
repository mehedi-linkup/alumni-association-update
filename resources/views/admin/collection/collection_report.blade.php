@extends('admin.master')
@include('admin.collection.collection_css')
@include('vendor.datatable.datatable_css')
@section('content')
    <div class="container">
        <div class="row">
            <h4 class="primary-title p4 mt5 align-center">
            Collection Report
            </h4>
        </div>
        <form action="javascript:void(0)" id="collection_form">
            @csrf
        <div class="row">
            <div class="form-group">
                <label class="form-label">
                    Date From
                </label>
                <div>
                <input type="date" id="date_from" class="form-control" name="date_from">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">
                    Date To
                </label>
                <div>
                <input type="date" id="date_to" class="form-control" name="date_to">
                </div>
            </div>
            <div class="form-group">
            
                <div>
                <button class="btn btn-primary" onclick="getcollection()" type="submit" class="form-control"> Submit </button>
                </div>
            </div>
        </div>
        </form>
    </div>
    
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card-body">
                            <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Participant Name</th>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="collection_data">
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        </section>
@endsection

@section('script')

    @include('vendor.datatable.datatable_js')
    @include('vendor.datepicker.datepicker_js')

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <script>
        $(function () {
            $('#list').DataTable({
                processing: true,
                serverSide: false,
                iDisplayLength: 10,
                "aaSorting": []
            });
        });
        function getcollection()
        {
            var date_from = $("#date_from").val();
            var date_to = $("#date_to").val();
            if( date_from == '' || date_from == null){
                alert("select Date from");
                return;
            }
            if( date_to == '' || date_to == null){
                alert("select Date to");
                return;
            }
            $.ajax({
                url: 'get_collection',
                method: "post",
                dataType: "json",
                data:{ "_token": "{{ csrf_token() }}",date_from: date_from, date_to: date_to},
                success:function(data){
                   let length =  data.length;
                   var output = "";
                   for(var i = 0; i<length; i++){
                    output += "<tr>";                       
                    output += "<td>"+i+"</td>";                       
                    output += "<td>"+data[i].name+"</td>";                       
                    output += "<td>"+data[i].tx_id+"</td>";                       
                    output += "<td>"+data[i].date+"</td>";                       
                    output += "<td>"+data[i].amount+"</td>";                       
                    output += "<td>Success</td>";                      
                    output += "</tr>";                       
                   }
                   $("#collection_data").empty();
                   $("#collection_data").append(output);
                }
            })
        }
    </script>
@endsection