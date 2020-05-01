@extends('layouts.layout')

@section('content')
    <a href="{{ route('users.profile.image') }}" class="uk-link-muted">view profile image</a>
    <br>
    @if ($user->subscribed_to_mail)
        <a href="{{ $mailRoute  }}" class="uk-link-muted">unsubscribe from mail</a>
    @else
        <a href="{{ $mailRoute }}" class="uk-link-muted">subscribe to mail</a>
    @endif   
    <br>
    <a href="{{ route('users.profile.download') }}" class="uk-link-muted">download stored user info</a>
@endsection
