<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/colors.css">

</head>

<body>
    <div id="wrapper">
        @include('layouts.header',["transparent" => $ishome ?? ''])
        @yield('content')
        @include('layouts.footer')
    </div>
</body>

<!-- Scripts
================================================== -->
<script src="scripts/jquery-3.4.1.min.js"></script>
<script src="scripts/jquery-migrate-3.1.0.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="scripts/jquery.superfish.js"></script>
<script src="scripts/jquery.themepunch.tools.min.js"></script>
<script src="scripts/jquery.themepunch.revolution.min.js"></script>
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="scripts/jquery.flexslider-min.js"></script>
<script src="scripts/chosen.jquery.min.js"></script>
<script src="scripts/jquery.magnific-popup.min.js"></script>
<script src="scripts/waypoints.min.js"></script>
<script src="scripts/jquery.counterup.min.js"></script>
<script src="scripts/jquery.jpanelmenu.js"></script>
<script src="scripts/stacktable.js"></script>
<script src="scripts/slick.min.js"></script>
<script src="scripts/headroom.min.js"></script>

</html>