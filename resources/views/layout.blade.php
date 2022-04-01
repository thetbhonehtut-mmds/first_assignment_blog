<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</head>

<body>
    <div>
        <div id="navbar" class="flex-box">
            <div class="nav-title flex-grow"><span><a href="/" style="">Sample Blog Post</a></span></div>
            @auth
            <h4>
                Welcome, {{Auth::user()->name}}
            </h4>
            <form method="POST" action="/logout">
                @csrf
                <button class="header">Logout</button>
            </form>
            @else
            <form action="/login">
                <button class="header">Login</button>
            </form>
            <form action="/register">

                <button class="header">Register</button>
            </form>
            @endauth
        </div>
        @yield('content')
    </div>
</body>

</html>