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
        .table > tbody > tr > td .usr-img-frame img {
            height: 100% !important;
            width: 100% !important;
        }
        #sidebar .navbar-brand .img-fluid {
            width: 70px !important;
            margin-left: 8px !important;
            margin-top: 20px !important;
        }
        header.tabMobileView img {
            margin-top: 18px !important;
        }
    </style>

    @if (Auth::user()->first_time)
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('assets/admin/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/assets/css/modals/component.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('assets/admin/assets/css/ui-kit/custom-modal.css')}}" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
    @endif

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

@if (Auth::user()->first_time)
    <button id="first_time" class="btn btn-button-4 rounded btn-block md-trigger" data-modal="modal-12">first Time</button>

    <div class="md-overlay"></div>

    <div class="md-modal md-effect-12" id="modal-12">
        <div class="md-content">
            <h3 class="pt-4">Welcome {{ ucwords(Auth::user()->name) }} To Your Portfolio Website Dashboard</h3>
            <div>
                <p class="mb-4">!!Please Read This Befor Start!!</p>
                <ul>
                    <li class="mb-2">Your website has been generated automatically</li>
                    <li class="mb-2">Please Don't Forget To Change The Dummy Data</li>
                    <li class="mb-2"><a href="{{ route('site.home',str_replace(' ','-', Auth::user()->name)) }}"  target="_blank" style="color: #006eff;font-size: 17px;">Visit Website</a></li>
                </ul>
                <button class="btn btn-button-4 btn-rounded md-close mb-3">Close</button>
            </div>
        </div>
    </div>

    <div class="md-overlay"></div>
@endif

<!-- js scripts Start -->
@include('admin.includes.js_scripts')
<!-- end js scripts -->

@if (Auth::user()->first_time)
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/admin/assets/js/modal/classie.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/js/modal/modalEffects.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
        $('#first_time').click()
    </script>
@endif

</body>
</html>
