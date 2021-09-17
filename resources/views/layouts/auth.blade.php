<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/assets/css/users/login-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <style>
        body{
            background: #1b1c25 url('{{ asset('assets/admin/assets/img/login-background.jpg')}}') no-repeat fixed center;
        }
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active
        {
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="login">

    @yield('content')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
