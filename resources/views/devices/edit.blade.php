@extends('layouts.layout')

@section('content')
<div class="uk-width-3-4">
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <h1 class="">Update Device</h1>
    <form action="{{ route('device.update', compact('device')) }}" method="post" class="uk-form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="uk-form-row">
            <label for="name" class="uk-form-label">Name</label>
            <div class="uk-form-controls">
                <input type="text" name="name" class="uk-width-1-2" value="{{ old('name', $device->name) }}">
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-form-controls">
                <input type="submit" name="action" value="update" class="uk-button uk-text-capitalize">
                <input type="submit" name="action" value="delete" class="uk-button uk-button-danger uk-text-capitalize">
            </div>
        </div>
    </form>
</div>
@endsection