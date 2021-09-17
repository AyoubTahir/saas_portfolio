<!-- Tab Mobile View Header -->
<header class="tabMobileView header navbar fixed-top d-lg-none">
    <div class="nav-toggle">
            <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                <i class="flaticon-menu-line-2"></i>
            </a>
        <a href="{{route('dashboard')}}" class=""> <img src="{{asset('assets/admin/assets/img/logo-3.png')}}" class="img-fluid" alt="logo"></a>
    </div>
</header>
<!-- Tab Mobile View Header -->

<!--  BEGIN NAVBAR  -->
<header class="header navbar fixed-top navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>

    <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
        <li class="nav-item dropdown message-dropdown ml-lg-4">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-mail-10"></span><span class="badge badge-primary">13</span>
            </a>
            <div class="dropdown-menu  position-absolute" aria-labelledby="messageDropdown">
                <a class="dropdown-item title" href="javascript:void(0);">
                    <i class="flaticon-chat-line mr-3"></i><span>You have 13 new messages</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0);">
                    <div class="media">
                        <div class="usr-img online mr-3">
                            <img class="usr-img rounded-circle" src="{{asset('assets/admin/assets/img/90x90.jpg')}}" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <div class="mt-0">
                                <p class="text mb-0">Browse latest projects...</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="meta-user-name mb-0">Kara Young</p>
                                <p class="meta-time mb-0  align-self-center">1 min ago</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a class="footer dropdown-item" href="javascript:void(0);">
                    <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View more</div>
                </a>
            </div>
        </li>
    </ul>


    <ul class="navbar-nav flex-row ml-lg-auto">
        <li class="nav-item dropdown user-profile-dropdown ml-lg-4 mr-lg-2 ml-3 order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-user-12"></span>
            </a>
            <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                <a class="dropdown-item" href="#">
                    <i class="mr-1 flaticon-user-6"></i> <span>Welcome {{ Auth::user() ? Auth::user()->name : 'admin' }}</span>
                </a>
                <a class="dropdown-item" href="apps_scheduler.html">
                    <i class="mr-1 flaticon-calendar-bold"></i> <span>My Schedule</span>
                </a>
                <a class="dropdown-item" href="apps_mailbox.html">
                    <i class="mr-1 flaticon-email-fill-1"></i> <span>My Inbox</span>
                </a>
                <a class="dropdown-item" href="user_lockscreen_1.html">
                    <i class="mr-1 flaticon-lock-2"></i> <span>Lock Screen</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</header>
<!--  END NAVBAR  -->

