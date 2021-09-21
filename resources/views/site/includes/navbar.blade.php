    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="logo">
                <img src="{{ $user->settings['dark_logo_'.$lang] ? asset('uploads/'.$user->settings['dark_logo_'.$lang]) : asset('assets/images/logo.png') }}" height="20" class="d-block mx-auto" alt="">
            </div>
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky">
        <div class="container">
            <a class="navbar-brand" href="{{ route('site.home',str_replace(' ', '-', $user->name)) }}">
                <img src="{{ $user->settings['dark_logo_'.$lang] ? asset('uploads/'.$user->settings['dark_logo_'.$lang]) : asset('assets/images/logo.png') }}" class="l-dark" height="16" alt="">
                <img src="{{ $user->settings['light_logo_'.$lang] ? asset('uploads/'.$user->settings['light_logo_'.$lang]) : asset('assets/images/logo-light.png') }}" class="l-light" height="16" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="menu" class="fea icon-md"></span>
            </button><!--end button-->

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto"><!--user this class to change color-navbar-nav-link-->
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">{{__('site.home')}}</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#about">{{__('site.about')}}</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#services">{{__('site.services')}}</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#resume">{{__('site.resume')}}</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">{{__('site.projects')}}</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">{{__('site.contact')}}</a>
                    </li><!--end nav item-->
                </ul>

                <ul class="list-unstyled mb-0 mt-2 mt-sm-0 social-icon light-social-icon">
                    <li class="list-inline-item mr-5"><a href="/lang">{{ session()->get('currentLang') == 'en' ? 'AR' : 'EN'}}</i></a></li>
                    @if($user->settings->facebook)<li class="list-inline-item"><a href="{{ $user->settings->facebook }}" target="_blank"><i class="mdi mdi-facebook"></i></a></li>@endif
                    @if($user->settings->twiter)<li class="list-inline-item"><a href="{{ $user->settings->twiter }}" target="_blank"><i class="mdi mdi-twitter"></i></a></li>@endif
                    @if($user->settings->instagram)<li class="list-inline-item"><a href="{{ $user->settings->instagram }}" target="_blank"><i class="mdi mdi-instagram"></i></a></li>@endif
                    @if($user->settings->linkedin)<li class="list-inline-item"><a href="{{ $user->settings->linkedin }}" target="_blank"><i class="mdi mdi-linkedin"></i></a></li>@endif
                </ul>
            </div>
        </div><!--end container-->
    </nav><!--end navbar-->
    <!-- Navbar End -->
