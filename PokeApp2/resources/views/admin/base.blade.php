<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <base href="{{ url('/') }}/">
    <!-- Fontfaces CSS-->

    <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">


    <!-- Bootstrap CSS-->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('assets/css/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    

    <!-- Main CSS-->
    <link href="{{ url('assets/css/theme.css') }}" rel="stylesheet" media="all">

</head>
<body class="animsition">
    @yield('content')
    
    @yield('js')
        <!-- Jquery JS-->
    <script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ url('assets/js/slick.min.js') }}">
    </script>
    <script src="{{ url('assets/js/wow.min.js') }}"></script>
    <script src="{{ url('assets/js/animsition.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ url('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ url('assets/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>
</html>