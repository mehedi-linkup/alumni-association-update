@extends('front.master')
@include('front.home.soronika.soronika_css')
@section('title')
    Ali azam School & College
@endsection
@section('content')
<div class="clearfix" style="padding-top: 40px">

</div>
<section class="soronika" style="padding: 40px 10px 0 10px">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
        <table class="table table-condensed table-bordered table-striped" style="width: 100%; font-family: roboto;">
        <tbody>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>File</th>
                <th>View</th>
            </tr>
            @foreach($documents as $item)
            <tr>
                <td>{{$item->document_name}}</td>
                <td>{{date('d M Y', strtotime($item->date))}}</td>
                <td><i class="fa fa-file-archive"></i> <a href="{{asset($item->file)}}" download>Download</a></td>
                <td><a href="{{asset($item->file)}}" target="_blank"><i class="fa fa-eye"></i></a></td>
            </tr>   
            @endforeach
        </tbody>
        <tfoot>
            {{$documents->links()}}
        </tfoot>
        </table>
        </div>
        </div>
        </div>
    </div>
</section>
<div class="clearfix" style="padding-bottom: 12%">
@endsection
