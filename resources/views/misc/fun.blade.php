@extends('layouts.main')

@section('content')
    <div class="uk-grid">
        <div class="uk-width-1-2">
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
        </div>
        <div class="uk-width-1-2">
            <h1>Request Info</h1>
             <table class="uk-table">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>String</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pathInfo as $method => $string)
                        <tr>
                            <td>{{$method}}</td>
                            <td>{{$string}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>           
        </div>
        <div class="uk-width-1-2">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routeInfo as $method => $result)
                        <tr>
                            <td>{{ $method }}</td>
                            <td>{{ $result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="uk-width-1-2">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urlInfo as $method => $result)
                        <tr>
                            <td>{{ $method }}</td>
                            <td>{{ $result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
