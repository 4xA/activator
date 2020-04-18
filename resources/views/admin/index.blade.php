@extends('admin.layout')

@section('styles')
@endsection

@section('content')
    <ul class="uk-nav uk-nav-side uk-nav-parent-icon uk-width-1-2" data-uk-nav="">
        <li class="uk-parent uk-active">
            <a href="#">Device Type</a>
            <ul class="uk-nav-sub">
                <li><a href="{{ route('devices.types.index') }}">List</a></li>
                <li><a href="{{ route('devices.types.create') }}">Create</a></li>
            </ul>
        </li>
    </ul>
@endsection