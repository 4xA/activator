@extends('layouts.layout')

@section('content')
    <table class="uk-table">
        <thead>
            <tr>
                <th>Method</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($times as $method => $time)
                <tr>
                    <td>{{$method}}</td>
                    <td>{{$time}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection