@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/boxes.css') }}">
@endsection

@section('content')
    <div class="uk-grid uk-grid-small" data-uk-grid-margin>
        @foreach (\Auth::user()->devices as $device)
            <div class="uk-width-1-4">
                <div class="device-panel uk-panel uk-panel-box uk-panel-box-primary">
                    <div class="uk-panel-badge">
                        <a href="{{ route('device.edit', compact('device')) }}" class="uk-button uk-button-danger uk-button-mini">Edit</a>
                    </div>
                    <h3 class="uk-panel-title uk-text-center uk-text-uppercase">{{ $device->name }}</h3>
                    @if (\Storage::disk('public')->exists($device->image_path))
                        <img src="{{ asset($device->image) }}" class="device-image uk-margin-large-top uk-container-center uk-width-1-2 uk-border-rounded" style="display:block">
                    @endif
                </div>
            </div>
        @endforeach
        <div class="uk-width-1-4">
            <a href="{{ route('device.create') }}" id="device-panel device-panel-add" class="device-panel uk-panel uk-panel-box uk-panel-box-primary uk-vertical-align">
                <div class="uk-vertical-align-middle uk-text-center uk-width-1-1"><i class="uk-icon-plus-circle uk-icon-large"></i></div>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    @if (session('status'))
        <script>
            UIkit.notify("{{ session('status') }}", {status:'danger'});
        </script>
    @endif
@endsection