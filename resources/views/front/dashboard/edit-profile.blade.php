@extends('front.dashboard.master')

@section('content')
    <div class="container">
        <div class="clearfix" style="padding-bottom: 20px">

        </div>
        <div class="card-title">
            <h2 class="align-center" style="text-align: center">Dashboard</h2>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="row" style="min-height:400px;">
                <div class="col-sm-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li><a href="#home" data-toggle="tab">Home</a>

                        </li>
                        <li class="active"><a href="#profile" data-toggle="tab">Profile</a>

                        </li>
                        <li><a href="#messages" data-toggle="tab">Messages</a>
                        <li><a href="#payment" data-toggle="tab">Payment Info</a>

                        </li>
                        <li><a href="#settings" data-toggle="tab">Settings</a>

                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">Home Tab.</div>
                        <div class="tab-pane" id="profile">
                            <div class="col-md-12">
                                <div class="container std-profile">
                                    <form method="post">
                                        <div class="row">


                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="messages">Messages Tab.</div>
                        <div class="tab-pane" id="payment">Payment Info.</div>
                        <div class="tab-pane" id="settings">Settings Tab.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
