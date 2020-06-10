@extends('layouts.main')

@section('content')
    <div class="uk-grid">
        <div class="uk-width-1-5">
            <ul class="uk-nav uk-nav-side">
                <li><a href="{{ route('documentation.index') }}">@lang('Index')</a></li>
            </ul>
        </div>
        <div class="uk-width-3-5">
            <article class="uk-article">
                <h1 class="uk-article-title theme-text">@lang('Welcome to Activator documentation!')</h1>
                <p class="uk-article-lead">
                    @lang('Activator is our module for controlling all the devices in your system with the convience of your computer/phone wherever you might be. Here you will find all the neccassary information on using and maintaining Activator.')
                </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima, eius. Eum aliquam pariatur voluptates, dicta quasi, laborum sint labore accusamus molestiae est dolor praesentium nihil accusantium animi sapiente adipisci magni.
                </p>
                <p>
                    Please select one of the title on the left for help on the item you need.
                </p>
            </article>
        </div>
        <div class="uk-width-1-3"></div>
    </div>
@endsection
