<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activator - @yield('title', 'Remote Switch')</title>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="packages/uikit/css/uikit.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <script src="packages/jquery/js/jquery.min.js"></script>
    <script src="packages/uikit/js/uikit.min.js"></script>
    @yield('style')
</head>
<body>
    <nav class="uk-navbar">
        <a href="/" class="uk-navbar-brand uk-text-uppercase"><i class="uk-icon-plug"></i> activator</a>
        <div class="uk-navbar-content uk-navbar-flip">
            <a href="{{ route('register') }}" class="uk-button uk-button-danger">Register</a>
            <a href="{{ route('login') }}" class="uk-button uk-button-primary">Login</a>
        </div>
    </nav>

    <div id="main-content-container" class="uk-container">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>