<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activator - @yield('title', 'Remote Switch')</title>
    <link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('packages/uikit/css/components/form-advanced.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/uikit/css/components/notify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.min.css') }}">
    @yield('styles')
</head>
<body>
    <nav class="uk-navbar">
        <a href="/" class="uk-navbar-brand uk-text-uppercase"><i class="uk-icon-plug"></i> {{ __('main.title') }} admin panel</a>
        <div class="uk-navbar-content uk-navbar-flip">
            @if (\Auth::check())
                <a id="logout-button" class="uk-button uk-button-danger">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" class="uk-hidden">
                    @csrf
                    <input class="uk-button uk-button-danger" type="submit" value="Logout">
                </form>
            @else
                <a href="{{ route('register') }}" class="uk-button uk-button-danger">Register</a>
                <a href="{{ route('login') }}" class="uk-button uk-button-primary">Login</a>
            @endif
        </div>
    </nav>

    <div id="main-content-container" class="uk-container">
        @yield('content')
    </div>

    <script src="{{ asset('packages/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('packages/uikit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('packages/uikit/js/components/notify.js') }}"></script>
    @yield('scripts')

    @unless (session('status') == 'success')
        <script>
            UIkit.notify("{{ session('status') }}", {status:'danger'});
        </script>
    @endunless
    
    <script>
        $(document).ready(function() {
            $('#logout-button').click(function() {
                $('#logout-form').submit();
            });
        });
    </script>
</body>
</html>