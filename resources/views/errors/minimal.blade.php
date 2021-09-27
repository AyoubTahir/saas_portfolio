<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/assets/css/pages/error/style-400-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <title>@yield('title')</title>

</head>
<body class="error404 text-center">
    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">@yield('code')</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text mb-4 mt-1">@yield('message')</p>
            <a href="{{URL::previous()}}" class="btn btn-secondary btn-rounded mt-5">Go Back</a>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
