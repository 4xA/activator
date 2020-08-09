@extends('layouts.main')

@section('title', 'Generic Panel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('packages/jquery-toggles/css/toggles.min.css') }}">
    <style>
        .activator-panel {
            background-color: #e5e5e5;
            border: 2px solid #7a7a7a;
            border-radius: 4px;
        }

        .inner-panel {
            background-color: #fff;
        }

        .inner-panel .uk-panel-title,
        .inner-panel .uk-panel-subtitle {
            margin: 0px;
        }

        .toggle {
            width: 70px;
        }

        .toggle-slide .toggle-blob {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <vk-grid>
        <div class="uk-width-1-2">
            <device-panel name="{{ $device->name }}" type="{{ $device->type->name }}" toggles="{{ json_encode($data) }}" url="{{ route('devices.toggle', $device) }}">
                <a href="{{ route('devices.calculator') }}" class="uk-link-muted uk-align-right">calculator.com</a>
            </device-panel>
        </div>
        <power-switch :initial="{{ $data['power_switch'] ? 'true' : 'false' }}" off-image="{{ asset('img/0.jpg') }}" on-image="{{ asset('img/1.jpg') }}"></power-switch>
    </vk-grid>
@endsection
