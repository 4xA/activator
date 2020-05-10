@extends('layouts.main')

@section('content')
    <table class="uk-table">
        <thead>
            <th>Cookie</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach (Cookie::get() as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('misc.cookies.create') }}" method="post" class="uk-form uk-width-1-4">
        @csrf
        <div class="uk-form-row">
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-1-3">
                    <input type="text" name="key" placeholder="key">
                </div>
                <div class="uk-width-1-3">
                    <input type="text" name="value" placeholder="value">
                </div>
                <div class="uk-width-1-3">
                    <input type="submit" value="Eat" class="uk-button uk-button-primary">
                </div>
            </div>
        </div>
    </form>
@endsection