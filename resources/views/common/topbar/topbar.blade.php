@section('topbar')
    <!-- TopBar -->
    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown timer-design">
                <a class="clock" style="background: #15305b !important;color: #ffffff;">
                    <span style="font-size:20px;">
                        <i class="fas fa-clock" style="color: #17a2b8 "></i>
                    </span> <span style="font-size:15px;">&nbsp;
                        <span id="timer" style="font-size:15px;">1:12:30 PM</span>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                     aria-labelledby="searchDropdown">
                    <form class="navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                                   aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <?php $messages = DB::table('contact_messages')->orderby("id","desc")->get(); ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-warning badge-counter">{{count($messages)}}</span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    @foreach($messages as $message)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <?php
                            $startTime = Illuminate\Support\Carbon::now();
                            $endTime = $message->created_at;
                            $total_duration = $startTime->diff($endTime)->format('%H hour %I minute %S seconds')." Ago";
                            ?>
                            <div class="text-truncate">{{$message->message}}</div>
                            <div class="small text-gray-500">{{$message->name}} - <?php echo $total_duration; ?></div>
                        </div>
                    </a>
                    @endforeach
                    <a class="dropdown-item text-center small text-gray-500" href="{{route('get_contact_message')}}">Read More Messages</a>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="{{asset(Auth::user()->image)}}" style="max-width: 60px">
                    <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Topbar -->
{{--    logout modal --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}" class="btn btn-primary"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    end logout modal--}}
@endsection
