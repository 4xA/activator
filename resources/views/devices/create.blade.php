@extends('layouts.main')

@section('content')
<div class="uk-width-3-4">
    @if ($errors->devices->any())
        @foreach ($errors->devices->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <h1>Create Device</h1>
    <form action="{{ route('devices.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label for="type_id" class="uk-form-label">Type</label>
            <div class="uk-form-controls">
                <select name="type_id" class="uk-select uk-width-1-2">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="name" class="uk-form-label">Name</label>
            <div class="uk-form-controls">
                <input type="text" name="name" class="uk-input uk-width-1-2" value="{{ old('name') }}">
            </div>
        </div>
        <div class="uk-margin-top">
            <label for="image" class="uk-form-label">Image</label>
            <div class="uk-form-controls">
                <input type="file" name="image" class="uk-width-1-2" value="{{ old('file') }}">
            </div>
        </div>
     
        <div class="uk-margin-top">
            <div class="uk-form-controls">
                <input type="submit" value="create" class="uk-button">
            </div>
        </div>
    </form>
</div>
@endsection
