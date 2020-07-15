<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">--}}


    {{-- @if(($isDashboard ?? '')!='')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endif --}}

</head>

<body>
    <div id="wrapper">

        @if ($isDashboard??''!='')
        @include('layouts.header',["dashboard" => 'dashboard-header'])
        @else
        @include('layouts.header',["transparent" => $ishome ?? ''])
        @endif
        @yield('content')
        @if(($isDashboard ?? '')!='')
        <div id="dashboard">
            @include('layouts.dashboard-nav')
            @yield('dashboard-content')
        </div>
        @endif

        @if (($isDashboard ?? '')=='')
        @include('layouts.footer')
        @endif
    </div>





    <!-- Scripts
================================================== -->
    <script src="{{asset('scripts/jquery-3.4.1.min.js')}} "></script>
    <script src="{{asset('scripts/jquery-migrate-3.1.0.min.js')}}"></script>
    <script src="{{asset('scripts/custom.js')}}"></script>
    <script src="{{asset('scripts/jquery.superfish.js')}}"></script>
    <script src="{{asset('scripts/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.themepunch.showbizpro.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('scripts/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('scripts/waypoints.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('scripts/jquery.jpanelmenu.js')}}"></script>
    <script src="{{asset('scripts/stacktable.js')}}"></script>
    <script src="{{asset('scripts/slick.min.js')}}"></script>
    <script src="{{asset('scripts/headroom.min.js')}}"></script>
    <script src="{{asset('scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('scripts/jquery-3.5.1.min.js')}}"></script>
    @yield('lastScript')

</body>





</html>
