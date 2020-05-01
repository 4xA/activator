@extends('layouts.layout')

@section('content')
    @if ($user->subscribed_to_mail)
        <a href="{{ $mailRoute  }}" class="uk-button uk-button-danger uk-text-uppercase">unsubscribe</a>
    @else
        <a href="{{ $mailRoute }}" class="uk-button uk-text-uppercase">subscribe</a>
    @endif   
@endsection
