@extends('layouts.layout')

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
    <div class="uk-grid">
        <div class="uk-width-1-2">
            <div class="activator-panel uk-panel uk-panel-box">
                <div class="inner-panel uk-panel uk-panel-box uk-height-1-1">
                    <h3 class="uk-panel-title uk-text-uppercase">{{ $device->name }}</h3>
                    <h5 class="uk-panel-subtitle">> {{ $device->type->name }}</h5>
                    <hr>
                    <form id="toggle-form" method="post" class="uk-form uk-form-horizontal">
                        @csrf
                        <div class="uk-form-row">
                            <label for="toggle[power_switch]" class="uk-form-label">Power Switch</label>
                            <div class="uk-form-controls">
                                <div class="toggle toggle-modern uk-align-right"></div>
                                <input type="checkbox" name="toggles[power_switch]" style="display:none">
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('devices.calculator') }}" class="uk-link-muted uk-align-right">calculator.com</a>
                </div>
            </div>
        </div>
        <div class="uk-width-1-2">
            <img id="switch-image-0" src="{{ asset('img/0.jpg') }}" alt="switch off" @if($data['power_switch']) class="uk-hidden" @endif>
            <img id="switch-image-1" src="{{ asset('img/1.jpg') }}" alt="switch off" @if(!$data['power_switch']) class="uk-hidden" @endif>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('packages/jquery-toggles/js/toggles.min.js') }}"></script>
    <script>
        let toggles = {
            switchImage0: $('#switch-image-0'),
            switchImage1: $('#switch-image-1'),
            init: function () {
                $('.toggle').toggles({
                    drag: false,
                    click: true,
                    text: {
                        on: 'ON',
                        off: 'OFF'
                    },
                    on: {{ $data['power_switch'] }},
                    animate: 50,
                    easing: 'swing',
                    checkbox: 'input[name="toggles[power_switch]"]',
                    height: 20,
                    type: 'compact'
                });

                $('.toggle').on('toggle', function () {
                    let data = $('#toggle-form').serialize();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('devices.toggle', $device) }}',
                        data: data,
                        success:function(response){ 
                            response.toggles.forEach(element => {
                                if (element.key == 'power_switch') {
                                    if (element.value == 'on') toggles.images.on();
                                    else if (element.value == 'off') toggles.images.off();
                                }
                            });
                        }
                    });
                });
            },
            images: {
                on: function () {
                    toggles.switchImage0.addClass('uk-hidden');
                    toggles.switchImage1.removeClass('uk-hidden');
                },
                off: function () {
                    toggles.switchImage0.removeClass('uk-hidden');
                    toggles.switchImage1.addClass('uk-hidden');
                }
            }
        };

        $(document).ready(function () {
            toggles.init();
        });
    </script>
@endsection