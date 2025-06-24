<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">
        <title>@yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        @include('layouts.scripts')
        @include('layouts.styles')
        @stack('add-styles')

    </head>

    <body>
        
        <!-- ======= Header - Navbar ======= -->
        @include('layouts.navbar')
        <!-- End Navbar -->

        <!-- ======= Content ======= -->
        @yield('content')
        <!-- End Content -->

        <!-- ======= Footer ======= -->
        @include('layouts.footer')
        <!-- End Footer -->

        <!-- ======= Back Top ======= -->
        <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script>
            new PureCounter();
        </script>        
    </body>
</html>