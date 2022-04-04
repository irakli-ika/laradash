<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <title>@yield('title')</title>
    </head>
    <body class="bg-gray-100">
        <header>
            <div class="container m-auto">
                <nav>
                    @include('templates.nav')
                </nav>
            </div>
        </header>
        <div class="container m-auto px-5">
            @yield('content')
        </div>
    </body>
</html>