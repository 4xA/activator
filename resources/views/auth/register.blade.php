@extends('layouts.main')

@section('title') Register @endsection

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
        <vk-grid>
            <div>
                <vk-card>
                    <vk-card-title><h1 class="uk-penel-title uk-text-center uk-text-uppercase">Register</h1></vk-card-title>
                    <form action="{{ route('users.register') }}" method="post" class="uk-form-stacked">
                        {{ csrf_field() }}
                        <div>
                            <input type="text" name="first_name" class="uk-input uk-width-1-1" value="{{ old('first_name') }}" placeholder="First Name">
                        </div>
                        <div class="uk-margin-small-top">
                            <input type="text" name="last_name" class="uk-input uk-width-1-1" value="{{ old('last_name') }}" placeholder="Last Name">
                        </div>
                        <div class="uk-margin-small-top">
                            <input type="text" name="username" class="uk-input uk-width-1-1" value="{{ old('username') }}" placeholder="Username">
                        </div>
                        <div class="uk-margin-small-top">
                            <input type="email" name="email" class="uk-input uk-width-1-1" value="{{ old('email') }}" placeholder="E-mail">
                        </div>
                        <div class="uk-margin-small-top">
                            <input type="password" name="password" class="uk-input uk-width-1-1" placeholder="password">
                        </div>
                        <div class="uk-margin-small-top">
                            <input type="password" name="password_confirmation" class="uk-input uk-width-1-1" placeholder="Confirm Passowrd">
                        </div>
                        <div class="uk-margin uk-child-width-auto">
                            <button type="submit" class="uk-button uk-button-primary uk-align-right">Register</button>
                        </div>
                    </form>
                </vk-card>
            </div>
            <div>
                <vk-card>
                </vk-card>
            </div> 
        </vk-grid>
    </div>
@endsection
