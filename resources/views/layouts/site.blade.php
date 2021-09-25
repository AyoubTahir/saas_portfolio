<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('page_css')
    <title>{{ ucwords(str_replace('-', ' ', $user->name)) }}</title>

</head>
<body>
    <!-- navbar Start -->
    @include('site.includes.navbar')
    <!-- end navbar -->

    <!-- content Start -->
    @yield('content')
    <!-- end content -->

    <!-- footer Start -->
    @include('site.includes.footer')
    <!-- end footer -->

    @stack('page_scripts')
</body>
</html>
