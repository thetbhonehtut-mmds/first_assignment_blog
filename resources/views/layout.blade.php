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

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</head>

<body>
    <div>
        <div id="navbar" class="flex-box nav-bar">
            <div class="nav-title"><span><a href="/">
                        <h4>Sample Blog Post</h2>
                    </a></span></div>
            <div class="flex-grow">
                <input type="text" placeholder="search" class="search" />
            </div>
            @auth
           <div id="notification">

           </div>
            <div class="config">
                <span>
                    <h4>
                        Welcome, {{Auth::user()->name}}
                    </h4>
                </span>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="header">Logout</button>
                </form>
            </div>


            @else
            <form action="/login">
                <button class="header">Login</button>
            </form>
            <form action="/register">

                <button class="header">Register</button>
            </form>
            @endauth
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    @auth
    <script>
        Echo.channel("users.{{Auth::user()->id}}").listen('PostEvent', (e) => {
            // console.log(e, '{{Auth::user()->id}}')
            // document.getElementById('notification')
        })
    </script>
    @endauth
</body>

</html>