<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
</head>
<body>
    {{-- @yield('case') --}}
    @yield('increment')

    <a href="{{ action('HomeController@increment', 5) }}">Test</a>
</body>
</html>