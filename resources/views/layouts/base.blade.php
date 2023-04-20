<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
<header class="p-2 mb-2 border-bottom">
    <nav>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('posts.index') }}" class="nav-link px-2">Home</a></li>
            <li><a href="{{ route('posts.export') }}" class="nav-link px-2">Download</a></li>
        </ul>
    </nav>
</header>
@yield('content')
</body>
</html>
