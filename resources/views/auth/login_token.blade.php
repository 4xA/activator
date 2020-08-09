@extends('layouts.main')

@section('title') Email Token Login @endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <div class="uk-position-top-left">
        <a class="uk-link-reset" href="{{ route('login') }}">
            <vk-icon icon="arrow-left" ratio="1.5"></vk-icon> Login
        </a>
    </div>
    <div class="uk-position-center">
        <div>
            <vk-card>
                <vk-card-title><h1 class="uk-penel-title uk-text-center uk-text-uppercase">Email Token Login</h1></vk-card-title>
                <form action="/users/login/token" method="post">
                    {{ csrf_field() }}
                    <div class="uk-margin-small-top">
                        <label for="email_token" class="uk-form-label">Please input emailed token</label>
                        <div class="uk-form-controls">
                            <input type="text" name="email_token" class="uk-input uk-width-1-1" value="{{ old('email_token') }}">
                        </div>
                    </div>
                    <div class="uk-margin-small-top">
                        <button type="submit" class="uk-button uk-button-primary uk-align-right">Login</button>
                    </div>
                </form>
            </vk-card>
        </div>
    </div>
@endsection
