@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/boxes.css') }}">
@endsection

@section('content')
    <div class="uk-grid uk-grid-small" data-uk-grid-margin>
        @foreach (\Auth::user()->devices as $device)
            <div class="uk-width-1-4">
                <div class="device-panel uk-panel uk-panel-box uk-panel-box-primary">
                    <h3 class="uk-penel-title uk-text-center uk-text-uppercase">{{ $device->name }}</h3>
                </div>
            </div>
        @endforeach
        <div class="uk-width-1-4">
            <a href="{{ route('device.create') }}" id="device-panel-add" class="uk-height-1-1 device-panel uk-panel uk-panel-box uk-panel-box-primary uk-vertical-align">
                <div class="uk-vertical-align-middle uk-text-center uk-width-1-1"><i class="uk-icon-plus-circle uk-icon-large"></i></div>
            </a>
        </div>
    </div>
@endsection