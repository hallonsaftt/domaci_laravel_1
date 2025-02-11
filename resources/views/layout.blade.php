<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle')</title>

    <!-- Bootstrap CSS -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        const darkModeToggle = document.getElementById("toggleDarkMode");--}}
{{--        const body = document.body;--}}


{{--        body.classList.add("bg-dark", "text-white");--}}
{{--        darkModeToggle.innerText = "☀️ Light";--}}

{{--        darkModeToggle.addEventListener("click", function () {--}}
{{--            if (body.classList.contains("bg-dark")) {--}}
{{--                body.classList.remove("bg-dark", "text-white");--}}
{{--                localStorage.setItem("darkMode", "disabled");--}}
{{--                darkModeToggle.innerText = "🌙 Dark";--}}
{{--            } else {--}}
{{--                body.classList.add("bg-dark", "text-white");--}}
{{--                localStorage.setItem("darkMode", "enabled");--}}
{{--                darkModeToggle.innerText = "☀️ Light";--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}

</body>
</html>

