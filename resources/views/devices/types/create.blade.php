@extends('admin.layout')

@section('content')
<div class="uk-width-3-4">
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div class="uk-panel uk-panel-box uk-panel-box-danger uk-margin-top">
                <p>{{$e}}</p>
            </div>
        @endforeach
    @endif
    <h1 class="">Create Device Type</h1>
    <form action="{{ route('devices.types.store') }}" method="post" class="uk-form">
        {{ csrf_field() }}
        <div class="uk-form-row">
            <label for="name" class="uk-form-label">Name</label>
            <div class="uk-form-controls">
                <input type="text" name="name" class="uk-width-1-2" value="{{ old('name') }}">
            </div>
        </div>
        <div class="uk-form-row">
            <div class="uk-form-controls">
                <input type="submit" value="Create" class="uk-button">
            </div>
        </div>
    </form>
</div>
@endsection