{{--<!DOCTYPE html>--}}
{{--<html lang="sr">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>@yield('pageTitle')</title>--}}

{{--    <!-- Bootstrap CSS -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <!-- Bootstrap Icons -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">--}}
{{--    <!-- Custom CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">--}}

{{--</head>--}}
{{--<body class="d-flex flex-column min-vh-100">--}}

{{--@include('navigation')--}}

{{--<div class="container flex-grow-1 mt-4">--}}
{{--    @yield('sourcePage')--}}
{{--</div>--}}

{{--@include('footer')--}}

{{--<!-- Bootstrap JS -->--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}


{{--@yield('scripts')--}}

{{--<!-- jQuery (ako ga koristiš za custom kod) -->--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
{{--<!-- Bootstrap 5 Bundle (sadrži Popper) -->--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>--}}



{{--</body>--}}
{{--</html>--}}



    <!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>

    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

@include('navigation')

<div class="container flex-grow-1 mt-4">
    @yield('sourcePage')
</div>

@include('footer')

<!-- Učitaj jQuery (ako ga koristiš za custom kod) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Učitaj Bootstrap 5 Bundle (sadrži Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tvoj custom skript -->
@yield('scripts')
</body>
</html>


