<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Design Blog a Blog Category Bootstrap Responsive Website Template | Home : W3layouts</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('1_WebFrontend/assets/css/style-starter.css') }}">
</head>

<body>

    @yield('content')


    <!-- Template JavaScript -->
    <script src="{{ asset('1_WebFrontend/assets/js/theme-change.js') }}"></script>

    <script src="{{ asset('1_WebFrontend/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script src="{{ asset('1_WebFrontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('1_WebFrontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')

</body>

</html>
