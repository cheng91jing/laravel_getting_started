<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title', null) {{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>