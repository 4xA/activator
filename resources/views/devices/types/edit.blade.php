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
    <h1 class="">Update Device Type</h1>
    <form action="{{ route('devices.types.update', $type) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="name" class="uk-form-label">Name</label>
            <div class="uk-form-controls">
                <input type="text" name="name" class="uk-input uk-width-1-2" value="{{ old('name', $type->name) }}">
            </div>
        </div>
        <div class="uk-margin-top">
            <div class="uk-form-controls">
                <vk-button html-type="submit" value="update" >Update</vk-button>
            </div>
        </div>
    </form>
</div>
@endsection
