<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    @stack('scripts')
    <title>@yield('title')</title>
</head>
<body class="@yield('bodyClasses')">
    @yield('body')
</body>
@stack('bodyScripts')
</html>
