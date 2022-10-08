<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>Invoice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
======================= -->
    <link href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>

    </style>
</head>

<body>
<style>
    .card {
        background: linear-gradient(to right, #d6f3fb, #b6e5f6, #93bdd8);
    }

    .header-text {
        font-size: 28px;
        padding-left: 5%;
        padding-top: 1%;
        padding-right: 2%;
        text-shadow: 1px 0px #fff;
        font-weight: 600;
        font-family: roboto;
        color: white;
        text-shadow: 1px 1px 0 #26258d, 1px 1px 0 #26258d, 1px 1px 0 #26258d, 1px 1px 0 #26258d;
        float:right;
        -webkit-text-stroke: 0.4px #3d3e9a;
    }
    ul{
        text-decoration: none;
    }
    li{
        list-style: none;
    }

    .card-img {
        text-align: center;
    }

    .card-img img {
        /* width: 88px; */
        height: 100px;
    }

    .profile-image {
        text-align: center;
    }

    .profile-image img {
        height: 250px;
        width: 95%;
        border-radius: 5px;
    }

   .profile-image h5 {
    text-transform: uppercase;
    text-align: center;
    color: #fbef01;
    font-size: 35px;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-family: 'Times New Roman', Times, serif;
    margin-bottom: 0px;
    }

   .profile-image span {
        text-align: center;
        font-weight: 700;
        color: #ff4f1f;
        text-shadow: 2px 2px grey;
        font-size: 35px;
    }
    .profile-image span.year {
        font-size: 70px;
    }
    .footer-img {
        text-align: center;
        display: flex;
    }

    .card-name {
        font-size: 20px;
        color: #000000;
    }
    .profile-image {
        align-items: center;
    }

    .frontpart {
        margin-top: 20px;
        height: 90%;
        width: 46%;
    }

    .backpart {
        height: 90%;
        width: 46%;
    }

    .backpart-center {
        margin-top: 50%;
        text-align: center;
    }
    .text-dark{
        color: #000000!important;
        font-family: roboto;
    }
    .card>hr{
        margin-top: 1%!important;
        margin-bottom: 6px!important;
    }
    svg {
        width: 100%;
        height: 160px;
        margin-top: 15px;
    }
</style>
    <!-- Container -->
    <div class="container invoice-container">
        <!-- Header -->


        <!-- Main Content -->
        <main>
            <div class="container">
                <div class="row">
                    <div class="d-flex">
                        <div class="card frontpart shadow p-2 ">
                            <div class="row">
                                <div class="card-img">
                                    <img class="text-center" src="{{ asset('front/images/card-logo.png') }}" alt="">
                                </div>
                                <h1 class="text-center header-text text-shadow">
                                    Ali Azam School & College Alumni Association
                                </h1>
                            </div>
                            <hr>
                            <div class="profile-image d-flex">
                                <div class="pro-img w-50">
                                    @if ($part->image)
                                        <img src="{{ asset($part->image) }}" class="float-left" alt="">
                                    @elseif($part->gender == 'Male')
                                        <img src="{{ asset('front/images/male.png') }}" class="float-left" alt="">
                                    @else
                                        <img src="{{ asset('front/images/female.png') }}" class="float-left" alt="">
                                    @endif
                                </div>
                                <div class="pro-text w-50">
                                    <h5>STUDENT</h5>
                                    <span class="year">{{$part->passing_year}}</span>
                                    <div class="font-weight-bold card-name">{{ucwords($part->name)}}</div>
                                </div>
                            </div>
                            <div class="footer-img">
                                <img class="w-50 h-100" src="{{ asset('/invoice/images/ali_azam.png') }}" alt="">

                                <div class="image w-50" style=" text-align:right">
                                    <?php

                                    // use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                    echo QrCode::generate("Name: ".$part->name."\r\n Id: ".intval($part->registration_id)."\r\n". 'lunch'); ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card frontpart shadow p-2 " style="margin-left: 10px;">
                            <div class="row">
                                <div class="card-img">
                                    <img class="text-center" src="{{ asset('front/images/card-logo.png') }}" alt="">
                                </div>
                                <h1 class="text-center header-text text-shadow">
                                    Ali Azam School & College Alumni Association
                                </h1>
                            </div>
                            <hr>
                            <div class="profile-image d-flex">
                                <div class="pro-img w-50">
                                    @if (!$part->image == '')
                                        <img src="{{ asset($part->image) }}" class="float-left" alt="">
                                    @elseif($part->gender == 'Male')
                                        <img src="{{ asset('front/images/male.png') }}" class="float-left" alt="">
                                    @else
                                        <img src="{{ asset('front/images/female.png') }}" class="float-left" alt="">
                                    @endif
                                </div>
                                <div class="pro-text w-50">
                                    <h5>STUDENT</h5>
                                    <span class="year">{{$part->passing_year}}</span>
                                    <div class="font-weight-bold card-name">{{ucwords($part->name)}}</div>
                                </div>
                            </div>
                            <div class="footer-img">
                                <img class="w-50 h-100" src="{{ asset('/invoice/images/ali_azam.png') }}" alt="">

                                <div class="image w-50" style=" text-align:right">
                                    <?php

                                    // use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                    echo QrCode::generate("Name: ".$part->name."\r\n Id: ".intval($part->registration_id)."\r\n". 'lunch'); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"> Download</a> </div>
        </footer>
    </div>
    <script src="{{asset('/admin/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            window.print();
        })
    </script>
</body>

</html>