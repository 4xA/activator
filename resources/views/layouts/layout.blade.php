<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Activator')</title>
    <link rel="stylesheet" href="packages/uikit/css/uikit.min.css"/>
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

    @yield('content')
    @yield('scripts')
</body>
</html>