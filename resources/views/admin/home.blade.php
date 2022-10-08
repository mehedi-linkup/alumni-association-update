@extends('admin.master')
@section('title')
   Ali Azam School Admin Dashboard
@endsection
@section('content')
    <div class="container-fluid">
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Participant</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                              @php
                                $totalparticipant = DB::table('participants')->count();
                              @endphp
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$totalparticipant}}</span>
                                <span>Total Participant</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">This Month Participant</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                             @php 
                             use Carbon\Carbon;
                             use App\Modules\Participant\Models\Participant;
                             $now = date('m',strtotime(Carbon::now()));
                             $month = Participant::whereMonth('created_at',$now)->count();
                             @endphp
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>{{$month}}</span>
                                <span>This Month Participant</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-alt-slash fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"> Today Participant </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                             @php 
                             use Carbon\Carbon as Today;
                             use App\Modules\Participant\Models\Participant as Todayparticipant;
                             $today = Carbon::today();
                             $today = Todayparticipant::whereMonth('created_at',$today)->count();
                             @endphp
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>{{$today}}</span>
                                <span>Today Participant</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Recent Notice</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 5</span>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--reports-->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Todays Collection</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> {{$t_collection}}</span>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-xl-3 col-md-6 mb-4">
             <a href="{{route('collection_report')}}">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">This Month Collection</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> {{$m_collection}}</span>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
             </a>
        </div>
    </div>
    </div>
@endsection
