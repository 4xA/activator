@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/boxes.css') }}">
@endsection

@section('content')
    <div class="uk-grid">
        @foreach (\Auth::user()->devices as $device)
            <div class="device-panel uk-panel uk-panel-box uk-panel-box-primary uk-width-1-4 uk-margin-top uk-margin-left">
                <h3 class="uk-penel-title uk-text-center uk-text-uppercase">{{ $device->name }}</h3>
            </div>
        @endforeach

            <a href="{{ route('device.create') }}" id="device-panel-add" class="device-panel uk-panel uk-panel-box uk-panel-box-primary uk-width-1-4 uk-margin-top uk-margin-left uk-vertical-align">
                <div class="uk-vertical-align-middle uk-text-center uk-width-1-1"><i class="uk-icon-plus-circle uk-icon-large"></i></div>
            </a>
    </div>
@endsection