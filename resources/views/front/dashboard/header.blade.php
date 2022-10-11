<div id="main-header-nav" class="clear-fix">
    <div class="container">
        <nav id="header-navigation" class="main-header-navigation" role="navigation" aria-expanded="false">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <i class="fa fa-bars"></i>
                <i class="fa fa-close"></i>
                Menu</button>

            <div class="header-menu-content">
                <div class="menu-main_menu-container">
                    <ul id="primary-menu" class="menu">
                        <li id="menu-item-243" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-243">
                            <a href="{{route('dashboard')}}" aria-current="page"> <i class="fa fa-university" aria-hidden="true"></i> Dashboard</a></li>
                            <!-- <li class=" float-center"><a style="color: #fff">ALi Azam School</a></li> -->
                            <li class="header-title"> Ali Azam User Panel</li>
                            
                        <li id="menu-item-604" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-604 float-right" aria-haspopup="true">

                    <a href="#!">
                        @if (!Auth::guard('participant')->user()->image == '')
                        <img class="img-center-circle" style="    height: 24px;
                        border-radius: 50%;
                        width: 24px;
                        font-size: 12px;" src="{{asset(Auth::guard('participant')->user()->image)}}" alt=""/>
                        @elseif(Auth::guard('participant')->user()->gender == 'Male')
                        <img class="img-center-circle" style="    height: 24px;
                        border-radius: 50%;
                        width: 24px;
                        font-size: 12px;" src="{{ asset('front/images/male.png') }}" alt="">
                        @else
                        <img class="img-center-circle" style="    height: 24px;
                        border-radius: 50%;
                        width: 24px;
                        font-size: 12px;"  src="{{ asset('front/images/female.png') }}" alt="">
                        @endif
        
        {{Auth::guard('participant')->user()->name}}</a>



                            <button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text"></span></button>
                            <ul class="sub-menu">
                                <li id="menu-item"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-605">
                                    <a class="profile" href=""><i class="fa fa-user-tag" style="padding: 3px"></i>Profile</a>
                                </li>
                                <li id="menu-item"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-605">
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
    </div> 
</div>
   
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
                <a href="{{ route('participant.participant-logout') }}" class="btn btn-primary"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} </a>
                <form id="logout-form" action="{{ route('participant.participant-logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
