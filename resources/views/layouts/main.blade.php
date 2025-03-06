<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css'])
    <title>@yield('title')</title>
</head>
<body class="@yield('bodyClasses')">
    @yield('body')
</body>
@stack('scripts')
</html>
