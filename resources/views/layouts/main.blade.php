<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
</head>
<body>
    @yield('body')
    @stack('scripts')
</body>
</html>
