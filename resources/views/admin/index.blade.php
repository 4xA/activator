@extends('layouts.main')

@section('content')
    <vk-nav type="primary">
        <vk-nav-item-parent href="#" title="Device Type">
            <vk-nav-item href="{{ route('devices.types.index') }}" title="List"></vk-nav-item>
            <vk-nav-item href="{{ route('devices.types.create') }}" title="Create"></vk-nav-item>
        </vk-nav-item-parent>
    </vk-nav>
@endsection
