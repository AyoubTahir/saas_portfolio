<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <!-- css links Start -->
    @include('admin.includes.css_links')
    <!-- end css links -->

    <style>
        .active-menu{
            color:white !important;
            background-color: #2b293d !important;
            border-radius: 10px !important;
        }
        #sidebar ul.menu-categories li.menu:first-child > a {
            background-color:transparent;
            color: #8c8b8b;
            border-radius: 0;
        }
    </style>

</head>
<body class="default-sidebar">


<!--  BEGIN HEADER  -->
@include('admin.includes.header')
<!-- END HEADER -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>


    <!--  BEGIN SIDEBAR  -->
    @include('admin.includes.sidebar')
    <!--  END SIDEBAR  -->


    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="container">


            <!-- Page Header Start -->
            @yield('page_header')
            <!-- end Page Header -->


            <!-- content Start -->
            @yield('content')
            <!-- end content -->


        </div>
    </div>
    <!--  END CONTENT PART  -->


</div>
<!-- END MAIN CONTAINER -->


<!--  BEGIN FOOTER  -->
<footer class="footer-section theme-footer">

    <div class="footer-section-1  sidebar-theme">

    </div>

    <div class="footer-section-2 container-fluid">
        <div class="row">
            <div id="toggle-grid" class="col-xl-7 col-md-6 col-sm-6 col-12 text-sm-left text-center">
                <ul class="list-inline links ml-sm-5">
                    <li class="list-inline-item mr-3">
                        <a href="javascript:void(0);">Home</a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="javascript:void(0);">Blog</a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="javascript:void(0);">About</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0);">Buy</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                <ul class="list-inline mb-0 d-flex justify-content-sm-end justify-content-center mr-sm-3 ml-sm-0 mx-3">
                    <li class="list-inline-item  mr-3">
                        <p class="bottom-footer">&#xA9; 2019 <a target="_blank" href="https://designreset.com/equation">Equation Admin Theme</a></p>
                    </li>
                    <li class="list-inline-item align-self-center">
                        <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--  END FOOTER  -->


@yield('page_model')


<!-- js scripts Start -->
@include('admin.includes.js_scripts')
<!-- end js scripts -->


</body>
</html>
