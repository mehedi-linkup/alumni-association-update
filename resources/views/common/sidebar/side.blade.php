@section('sidebar')
    <!-- Sidebar -->
    @php
        $route = \Request::route()->getName();
    @endphp
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon">
                <img src="{{asset('/admin/images/school.png')}}">
            </div>
            <div class="sidebar-brand-text mx-3"></div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        <li class="nav-item">
            <a class="nav-link {{$route == 'view-user' ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseUser"
               aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-user-circle"></i>
                <span>User</span>
            </a>
            <div id="collapseUser" class="collapse {{$route == 'view-user' ? 'show' : ''}}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a href="{{route('view-user')}}" class="collapse-item {{$route == 'view-user' ? 'active' : ''}}" >View User</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$route == 'sms-active-list' ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseSms"
               aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-user-circle"></i>
                <span>SMS</span>
            </a>
            <div id="collapseSms" class="collapse {{$route == 'participant-sms' ? 'show' : ''}}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a href="{{route('participant-sms')}}" class="collapse-item {{$route == 'sms-active-list' ? 'active' : ''}}" >Send SMS</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            @php
                $participateArray = ['view-participant','pending-participant','active-participant','participant_list'];
                $participateExist = in_array($route, $participateArray, TRUE);
            @endphp
            <a class="nav-link {{ $participateExist ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseParticipant"
               aria-expanded="true" aria-controls="collapseParticipant">
                <i class="fas fa-user-circle"></i>
                <span>Participant</span>
            </a>
            <div id="collapseParticipant" class="collapse {{ $participateExist ? 'show' : '' }}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a href="{{route('view-participant')}}" class="collapse-item {{ @$route == 'view-participant' ? 'active' : ''}}" >View Participant</a>
                    <a href="{{route('pending-participant')}}" class="collapse-item {{ @$route == 'pending-participant' ? 'active' : ''}}" >Pending Participant</a>
                    <a href="{{route('active-participant')}}" class="collapse-item {{ @$route == 'active-participant' ? 'active' : ''}}" >Active Participant List</a>

                    <ul>
                        @php
                            use App\Modules\Participant\Models\Participant;
                           
                            $passing_year = Participant::orderby("passing_year","desc")->where('status', 1)->select('passing_year')->get();
                        @endphp
                            @php
                                $yearArray = [];
                            @endphp
                        @foreach ($passing_year as $passing)
                            @if($passing->passing_year != null)
                                @if(!in_array($passing->passing_year, $yearArray))
                                <li><a href="{{route('participant_list',['passing_year'=>$passing->passing_year])}}"><i class="fa fa-folder-open"></i>
                                    {{$passing->passing_year}} <span class="text-warning">({{$passing_year->where('passing_year', $passing->passing_year)->count()}})</span>
                                </a></li>
                                @endif

                                @php
                                    array_push($yearArray, $passing->passing_year);
                                @endphp
                            @endif
                            <?php
                            //  $contain = $passing->passing_year; 
                            ?>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link {{@$route=='view-gallery' ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseEvent"
               aria-expanded="true" aria-controls="collapseEvent">
                <i class="fas fa-user-circle"></i>
                <span>Event</span>
            </a>
            <div id="collapseEvent" class="collapse {{@$route == 'view-gallery' ? 'show' : ''}}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <a href="{{route('view-user')}}" class="collapse-item" >Event List</a> -->
                    <a href="{{route('view-gallery')}}" class="collapse-item {{@$route=='view-gallery' ? 'active' : ''}}" >Photo Gallery</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Utilities and Setup
        </div>
        <li class="nav-item">
            @php
              $routeArray = ['edit-notes','edit-news-notes','edit-updatenews','soronika-documents','view-sponsor','view-about-us','contactinfo','view-slider','view-downloads','view-massage','get_contact_message','view-category','view-committee','view-news','etc.index'];
              $exist = in_array($route, $routeArray, TRUE);

            @endphp
            <a class="nav-link {{ $exist ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
               aria-controls="collapsePage">
                <i class="fas fa-fw fa-columns"></i>
                <span>Utilities</span>
            </a>
            <div id="collapsePage" class="collapse {{ $exist ? 'show' : ''}}" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Utilities</h6>
                    <a class="collapse-item {{ @$route == 'edit-notes' ? 'active' : ''}}" href="{{route('edit-notes',['id'=>1])}}">Welcome Notes</a>
                    <a class="collapse-item {{ @$route == 'edit-news-notes' ? 'active' : ''}}" href="{{route('edit-news-notes',['id'=>1])}}">Welcome News</a>
                    <a class="collapse-item {{ @$route == 'edit-updatenews' ? 'active' : ''}}" href="{{route('edit-updatenews',['id'=>1])}}">Update News</a>
                    <a class="collapse-item {{ @$route == 'soronika-documents' ? 'active' : ''}}" href="{{route('soronika-documents')}}">Soronika</a>
                    <a class="collapse-item {{ @$route == 'view-sponsor' ? 'active' : ''}}" href="{{route('view-sponsor')}}">Sponsor</a>
                    <a class="collapse-item {{ @$route == 'view-about-us' ? 'active' : ''}}" href="{{route('view-about-us')}}">About Us</a>
                    <a class="collapse-item {{ @$route == 'contactinfo' ? 'active' : ''}}" href="{{route('contactinfo')}}">Contact Info</a>
                    <a class="collapse-item {{ @$route == 'view-slider' ? 'active' : ''}}" href="{{route('view-slider')}}">Slider</a>
                    <a class="collapse-item {{ @$route == 'view-downloads' ? 'active' : ''}}" href="{{route('view-downloads')}}">Downloads</a>
                    <!-- <a class="collapse-item" href="{{route('view-content')}}">Content</a> -->
                    <!-- <a class="collapse-item" href="{{route('view-teacher')}}">Teacher</a> -->
                    <a class="collapse-item {{ @$route == 'view-massage' ? 'active' : ''}}" href="{{route('view-massage')}}">Message</a>
                    <a class="collapse-item {{ @$route == 'get_contact_message' ? 'active' : ''}}" href="{{route('get_contact_message')}}">Contact Message</a>
                    <a class="collapse-item {{ @$route == 'view-category' ? 'active' : ''}}" href="{{route('view-category')}}">Category</a>
                    <a class="collapse-item {{ @$route == 'view-committee' ? 'active' : ''}}" href="{{route('view-committee')}}">Committee</a>
                    <a class="collapse-item {{ @$route == 'view-news' ? 'active' : ''}}" href="{{route('view-news')}}">News & Events</a>
                    <a class="collapse-item {{ @$route == 'etc.index' ? 'active' : ''}}" href="{{route('etc.index')}}">Terms & Conditions</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->

@endsection
