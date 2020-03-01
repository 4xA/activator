@extends('layouts.layout')

@section('title') Register @endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <div class="auth-panel uk-container-center uk-vertical-align">
        <div class="uk-panel uk-panel-box uk-vertical-align-middle uk-width-1-1">
            <h1 class="uk-penel-title uk-text-center uk-text-uppercase">Register</h1>
            <form action="/users/register" method="post" class="uk-form uk-form-stacked">
                {{ csrf_field() }}
                <div class="uk-form-row">
                    <label for="first_name" class="uk-form-label">First Name</label>
                    <div class="uk-form-controls">
                        <input type="text" name="first_name" class="uk-width-1-1" value="{{ old('first_name') }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="last_name" class="uk-form-label">Last Name</label>
                    <div class="uk-form-controls">
                        <input type="text" name="last_name" class="uk-width-1-1" value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="username" class="uk-form-label">Username</label>
                    <div class="uk-form-controls">
                        <input type="text" name="username" class="uk-width-1-1" value="{{ old('username') }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="email" class="uk-form-label">E-mail</label>
                    <div class="uk-form-controls">
                        <input type="email" name="email" class="uk-width-1-1" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="password" class="uk-form-label">Password</label>
                    <div class="uk-form-controls">
                        <input type="password" name="password" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="password_confirmation" class="uk-form-label">Confirm Password</label>
                    <div class="uk-form-controls">
                        <input type="password" name="password_confirmation" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-form-row uk-clearfix">
                    <button type="submit" class="uk-button uk-button-primary uk-align-right">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection