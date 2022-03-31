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
</head>

<body>
    <div>
        <div id="navbar" class="flex-box">
            <div style="flex-grow:1;height:auto;padding:10px"><span>Sample Blog Post</span></div>
            @auth
            <button class="header">Logout</button>
            @else
            <button class="header">Login</button>
            <button class="header">Register</button>
            @endauth
        </div>
        @yield('content')
    </div>
</body>

</html>