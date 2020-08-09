@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/boxes.min.css') }}">
@endsection

@section('content')
    <vk-grid gutter="small" v-vk-height-match="'> div .uk-card'">
        @forelse (\Auth::user()->devices as $device)
            <div class="uk-width-1-4">
                <vk-card class="device-panel">
                    <span class="uk-text-warning">{{ $loop->iteration }}
                        @if ($loop->first)
                            <vk-icon icon="star" ratio="0.6" style="position: relative; top: -2px"></vk-icon>
                        @endif
                    </span>
                    <vk-label slot="badge">
                        <a href="{{ route('devices.edit', compact('device')) }}"><vk-button type="danger" size="small" class="">Edit</vk-button></a>
                    </vk-label>
                    <h3 class="uk-panel-title uk-text-center uk-text-uppercase">{{ $device->name }}</h3>
                    <h5 class="uk-panel-subtitle uk-text-center uk-text-uppercase">{{ $device->type->name }}</h5>
                    @if (\Storage::disk('public')->exists($device->image_path))
                        <img src="{{ asset($device->image) }}" class="device-image uk-align-center uk-border-rounded" style="display:block">
                    @endif
                    <a class="panel-link" href="{{ route('devices.panel', compact('device')) }}" class="uk-hidden"></a>
                </vk-card>
            </div>
        @empty
            <p>Create your first device here -></p>
        @endforelse
        <div class="uk-width-1-4">
            <a href="{{ route('devices.create') }}">
                <vk-card class="device-panel">
                    <vk-icon class="uk-position-center" icon="plus-circle" ratio="3" style="color: white"></vk-icon>
                </vk-card>
            </a>
        </div>
    </vk-grid>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(() => {
            $('.device-panel').click(function () {
                let link = $(this).find('.panel-link').attr('href');
                window.location.href = link;
            });
        });
    </script>

    @if (session('status'))
        <script type="text/javascript">
            $(document).ready(() => {
                UIkit.notify("{{ session('status') }}", {status:'danger'});
            });
        </script>
    @endif
@endsection
