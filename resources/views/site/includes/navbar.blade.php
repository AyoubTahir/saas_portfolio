    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" height="20" class="d-block mx-auto" alt="">
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
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/logo.png') }}" class="l-dark" height="16" alt="">
                <img src="{{ asset('assets/images/logo-light.png') }}" class="l-light" height="16" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="menu" class="fea icon-md"></span>
            </button><!--end button-->

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#resume">Resume</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#news">Blog</a>
                    </li><!--end nav item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li><!--end nav item-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages
                        </a>
                        <div class="dropdown-menu rounded m-0" aria-labelledby="navbarDropdown">
                            <div class="container mx-0 mx-md-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="dropdown-item" href="page-blog.html">Blog</a>
                                        <a class="dropdown-item" href="page-blog-detail.html">Blog Detail</a>
                                        <a class="dropdown-item" href="page-portfolio.html">Portfolio</a>
                                        <a class="dropdown-item" href="page-portfolio-detail.html">Portfolio Detail</a>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end container-->
                        </div>
                    </li><!--end nav item-->
                </ul>

                <ul class="list-unstyled mb-0 mt-2 mt-sm-0 social-icon light-social-icon">
                    <li class="list-inline-item mr-5"><a href="/lang">{{ session()->get('currentLang') == 'en' ? 'AR' : 'EN'}}</i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-instagram"></i></a></li>
                </ul>
            </div>
        </div><!--end container-->
    </nav><!--end navbar-->
    <!-- Navbar End -->
