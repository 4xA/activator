<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activator - @yield('title', 'Remote Switch')</title>
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    @yield('styles')
</head>
<body>
    <div id="app">
        @auth
            <vk-navbar>
                <vk-navbar-nav>
                    @if (auth()->user()->isAdmin())
                        <vk-navbar-logo><a class="uk-text-uppercase uk-link-reset" href="{{ route('admin.index') }}"><vk-icon icon="bolt" ratio="1.2"></vk-icon> {{ __('main.title') }} Admin</a></vk-navbar-logo>
                    @else
                        <vk-navbar-logo><a class="uk-text-uppercase uk-link-reset" href="{{ route('index') }}"><vk-icon icon="bolt" ratio="1.2"></vk-icon> {{ __('main.title') }}</a></vk-navbar-logo>
                    @endif
                </vk-navbar-nav>
                <vk-navbar-nav slot="right">
                    @if (auth()->user()->isAdmin())
                        <vk-navbar-item>
                            <vk-button-link href="{{ route('admin.logout') }}" type="danger" size="small"><vk-icon icon="sign-out"></vk-icon> Logout</vk-button-link>
                        </vk-navbar-item>
                    @else
                        <vk-navbar-nav-item href="{{ route('documentation.index') }}" title="Documentation" icon="pencil"></vk-navbar-nav-item>
                        <vk-navbar-nav-item href="{{ route('users.profile') }}" title="Profile" icon="user"></vk-navbar-nav-item>
                        <vk-navbar-item>
                            <vk-button-link href="{{ route('logout') }}" type="danger" size="small"><vk-icon icon="sign-out"></vk-icon> Logout</vk-button-link>
                        </vk-navbar-item>
                    @endif
                </vk-navbar-nav>
            </vk-navbar>
        @endauth
            
        <div id="main-content-container" class="uk-container" v-vk-height-viewport="{ offsetBottom: 20 }">
            @yield('content')
        </div>
        @auth
            <vk-sticky bottom>
                <footer class="uk-margin-top">
                    <hr>
                    @php
                        $now = now();
                    @endphp
                    <p class="uk-margin-left">@datetime($now) | {{ trans_choice('main.hours_left', $hoursLeft, ['hours' => $hoursLeft]) }}</p>
                </footer>
            </vk-sticky>
        @endauth
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')

    @if (session('status') == 'success')
        <script>
            // UIkit.notify("{{ session('message') }}", {status:'success'});
        </script>
    @elseif (session('status') == 'danger')
        <script>
            // UIkit.notify("{{ session('message') }}", {status:'danger'});
        </script>
    @endif
</body>
</html>
