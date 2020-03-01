@extends('layouts.layout')

@section('title') Email Token Login @endsection

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
            <h1 class="uk-penel-title uk-text-center uk-text-uppercase">Email Token Login</h1>
            <form action="/users/login/token" method="post" class="uk-form uk-form-stacked">
                {{ csrf_field() }}
                <div class="uk-form-row">
                    <label for="email_token" class="uk-form-label">Please input emailed token</label>
                    <div class="uk-form-controls">
                        <input type="text" name="email_token" class="uk-width-1-1" value="{{ old('email_token') }}">
                    </div>
                </div>
                <div class="uk-form-row uk-clearfix">
                    <button type="submit" class="uk-button uk-button-primary uk-align-right">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection