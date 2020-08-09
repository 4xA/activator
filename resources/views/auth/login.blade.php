@extends('layouts.main')

@section('title') Login @endsection

@section('content')
    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <div class="uk-position-center">
        <vk-grid>
            <div>
                <vk-card>
                    <vk-card-title><h1 class="uk-penel-title uk-text-center uk-text-uppercase"><vk-icon icon="bolt" ratio="1.5"></vk-icon> {{ __('main.title') }}</h1></vk-card-title>
                    <form action="/users/login" method="post" class="uk-form-stacked">
                        {{ csrf_field() }}
                        <div>
                            <label for="username" class="uk-form-label">Username</label>
                            <div class="uk-form-controls">
                                <input type="text" name="username" class="uk-input uk-width-1-1" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="uk-form-label">Password</label>
                            <div class="uk-form-controls">
                                <input type="password" name="password" class="uk-input uk-width-1-1">
                            </div>
                        </div>
                        <div class="uk-margin uk-child-width-auto">
                            <label><input name="remember_me" class="uk-checkbox" type="checkbox" checked> Remember Me</label>
                            <button type="submit" class="uk-button uk-button-primary uk-align-right">Login</button>
                        </div>
                    </form>
                    <div class="uk-margin-large-top">
                        <hr>
                        <a href="{{ route('login.token') }}">Have an emailed key?</a>
                        <p>Are you a new user? <a href="{{ route('register') }}">Register Here</a></p>
                    </div>
                </vk-card>
            </div>
            <div>
                <vk-card>
                </vk-card>
            </div> 
        </vk-grid>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.min.css') }}">
@endsection
