<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
            <li class="nav-item d-flex">
                <a href="{{route('dashboard')}}" class="navbar-brand">
                    <img src="{{asset('assets/admin/assets/img/logo-3.png')}}" class="img-fluid" alt="logo">
                </a>
                <p class="border-underline"></p>
            </li>
            <li class="nav-item theme-text">
                <a href="{{route('dashboard')}}" class="nav-link"> Tahir </a>
            </li>
        </ul>


        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{route('dashboard')}}" aria-expanded="false" class="dropdown-toggle {{ (request()->is('t-admin')) ? 'active-menu' : '' }}">
                    <div class="">
                        <i class="flaticon-computer-6 ml-3 {{ (request()->is('t-admin')) ? 'active-menu' : '' }}"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#ecommerceg" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-home-line"></i>
                        <span>Home Page</span>
                    </div>
                    <div>
                        <i class="flaticon-right-arrow"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="ecommerceg" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('home.hero')}}"> Hero Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.about')}}"> About Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.interest')}}"> Interest Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.facts')}}"> Facts Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.services')}}"> Services Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.resumes')}}"> Resume Section </a>
                    </li>
                    <li>
                        <a href="{{route('home.expertises')}}"> Expertise Section </a>
                    </li>
                    <li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{route('users')}}" aria-expanded="false" class="dropdown-toggle {{ (request()->is('t-admin/users')) ? 'active-menu' : '' }}">
                    <div class="">
                        <i class="flaticon-users {{ (request()->is('t-admin/users')) ? 'active-menu' : '' }}"></i>
                        <span>Users</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i class="flaticon-mail-16"></i>
                        <span>Contact</span>
                    </div>
                    <div>
                        <span class="badge badge-pill badge-secondary mr-2">7</span>
                    </div>
                </a>
            </li>

        </ul>
    </nav>

</div>
<!--  END SIDEBAR  -->
