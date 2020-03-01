@extends('layouts.layout')

@section('title') Login @endsection

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
            <h1 class="uk-penel-title uk-text-center uk-text-uppercase">Login</h1>
            <form action="/login" method="post" class="uk-form uk-form-stacked">
                {{ csrf_field() }}
                <div class="uk-form-row">
                    <label for="username" class="uk-form-label">Username</label>
                    <div class="uk-form-controls">
                        <input type="text" name="username" class="uk-width-1-1" value="{{ old('username') }}">
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="password" class="uk-form-label">Password</label>
                    <div class="uk-form-controls">
                        <input type="password" name="password" class="uk-width-1-1">
                    </div>
                </div>
                <div class="uk-form-row uk-clearfix">
                    <button type="submit" class="uk-button uk-button-primary uk-align-right">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection