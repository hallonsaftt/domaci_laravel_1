<!DOCTYPE html>
<html lang="sr">
<head>
    <title>@yield('pageTitle')</title>
</head>
        <body>

            @include('navigation')


            @yield('sourcePage')


            @include('footer')

        </body>
</html>
