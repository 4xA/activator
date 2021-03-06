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
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <script src="{{ asset('packages/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('packages/uikit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('packages/uikit/js/components/notify.js') }}"></script>
    @yield('styles')
</head>
<body>
    <nav class="uk-navbar">
        <a href="/" class="uk-navbar-brand uk-text-uppercase"><i class="uk-icon-plug"></i> {{ __('main.title') }}</a>
        <div class="uk-navbar-content uk-navbar-flip">
            @auth
                <a href="{{ route('documentation.index') }}" class="uk-button">documenation</a>
                <a href="{{ route('users.profile') }}" class="uk-button"><i class="uk-icon-user"></i></a>
                <a id="logout-button" class="uk-button uk-button-danger">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" class="uk-hidden">
                    @csrf
                    <input class="uk-button uk-button-danger" type="submit" value="Logout">
                </form>
            @endauth
            @guest
                <a href="{{ route('register') }}" class="uk-button uk-button-danger">Register</a>
                <a href="{{ route('login') }}" class="uk-button uk-button-primary">Login</a>
            @endguest
        </div>
    </nav>

    <div id="main-content-container" class="uk-container">
        @yield('content')

        <div>
            <hr>
            <footer>
                @php
                    $now = now();
                @endphp
                <p class="">@datetime($now) | {{ trans_choice('main.hours_left', $hoursLeft, ['hours' => $hoursLeft]) }}</p>
            </footer>
        </div>
    </div>

    @yield('scripts')

    @if (session('status') == 'success')
        <script>
            UIkit.notify("{{ session('message') }}", {status:'success'});
        </script>
    @elseif (session('status') == 'danger')
        <script>
            UIkit.notify("{{ session('message') }}", {status:'danger'});
        </script>
    @endif
    
    <script>
        $(document).ready(function() {
            $('#logout-button').click(function() {
                $('#logout-form').submit();
            });
        });
    </script>
</body>
</html>