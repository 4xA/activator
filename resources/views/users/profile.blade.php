@extends('layouts.main')

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
    <form class="uk-form" id="locale-form">
        @csrf
        <label class="uk-form-label" for="locale">change locale</label>
        <select name="locale" id="local-selector">
            @foreach ($locales as $locale)
                <option value="{{ $locale }}" @if ($user->locale === $locale) selected @endif>{{ $locale }}</option>
            @endforeach
        </select>
        <span id="locale-spinner" class="uk-hidden"><i class="uk-icon-spinner uk-icon-spin"></i></span>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            let $localeSpinner = $('#locale-spinner');
            $('#local-selector').change(function (e) {
                $localeSpinner.removeClass('uk-hidden');
                let data = $('#locale-form').serialize();
                $.ajax({
                        type: 'POST',
                        url: '{{ route('users.profile.setLocale') }}',
                        data: data,
                        success:function(response){ 
                            $localeSpinner.addClass('uk-hidden');
                        }
                    });
            });
        });
    </script>
@endsection
