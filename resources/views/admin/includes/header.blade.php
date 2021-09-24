<!-- Tab Mobile View Header -->
<header class="tabMobileView header navbar fixed-top d-lg-none">
    <div class="nav-toggle">
            <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                <i class="flaticon-menu-line-2"></i>
            </a>
        <a href="{{route('dashboard')}}" class=""> <img src="{{logo()}}" class="img-fluid" alt="logo"></a>
    </div>
</header>
<!-- Tab Mobile View Header -->

<!--  BEGIN NAVBAR  -->
<header class="header navbar fixed-top navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>

    <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
        <li class="nav-item dropdown message-dropdown ml-lg-4">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-mail-10"></span><span class="badge badge-primary">{{ MsgCount() ? MsgCount() : '' }}</span>
            </a>
            <div class="dropdown-menu  position-absolute" aria-labelledby="messageDropdown">
                <a class="dropdown-item title" href="{{ route('messages.index') }}">
                    <i class="flaticon-chat-line mr-3"></i><span>You have {{ MsgCount() }} new messages</span>
                </a>
                @if (lastMsgs())
                    @foreach ( lastMsgs() as $message )
                        <a class="dropdown-item" href="{{ route('messages.show',$message->id) }}">
                            <div class="media">
                                <div class="media-body">
                                    <div class="mt-0">
                                        <p class="text mb-0">{{ Str::limit($message->subject, 20) }}...</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="meta-user-name mb-0">{{ $message->full_name }}</p>
                                        <p class="meta-time mb-0  align-self-center">{{ $message->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                <a class="footer dropdown-item" href="{{ route('messages.index') }}">
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
                    <i class="mr-1 flaticon-user-6"></i> <span>{{ Auth::user() ? Auth::user()->name : 'admin' }}</span>
                </a>
                <a class="dropdown-item" href="{{ route('site.home',str_replace(' ','-', Auth::user()->name)) }}"  target="_blank">
                    <i class="mr-1 flaticon-log"></i> <span>My Website</span>
                </a>
                <a class="dropdown-item" href="{{route('messages.index')}}">
                    <i class="mr-1 flaticon-email-fill-1"></i> <span>My Inbox</span>
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

