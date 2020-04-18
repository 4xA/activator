@extends('admin.layout')

@section('content')
<div class="uk-width-3-4">
    <h1 class="">List Device Types</h1>
    <table class="uk-table uk-table-condensed">
        <thead class="uk-text-uppercase">
            <tr>
                <th>Device Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deviceTypes as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>
                        
                        <a href="{{ route('devices.types.edit', compact('type')) }}" class="uk-button uk-button-primary uk-text-uppercase uk-button-small">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection