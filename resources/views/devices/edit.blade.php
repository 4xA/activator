@extends('layouts.main')

@section('content')
<div class="uk-width-3-4">
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <h1 class="">Edit Device</h1>
    <form action="{{ route('devices.update', compact('device')) }}" method="post" class="uk-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <select name="type_id" class="uk-width-1-2">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @if($type->id === @$device->type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
        <div class="uk-form-row">
            <label for="name" class="uk-form-label">Name</label>
            <div class="uk-form-controls">
                <input type="text" name="name" class="uk-width-1-2" value="{{ old('name', $device->name) }}">
            </div>
        </div>
        <div class="uk-form-row">
            @if (\Storage::disk('public')->exists($device->image_path))
                @image
                    @slot('image_path')
                        {{ asset($device->image) }}
                    @endslot
                    {{ basename($device->image) }}
                @endimage
            @endif
        </div>
        <div class="uk-form-row">
            <label for="image" class="uk-form-label">Image</label>
            <div class="uk-form-controls">
                <input type="file" name="image" class="uk-width-1-2" value="{{ old('file') }}">
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