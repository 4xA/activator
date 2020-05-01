@extends('layouts.layout')

@section('content')
    <div class="uk-grid">
        <div class="uk-width-1-5">
            <ul class="uk-nav uk-nav-side">
                <li><a href="{{ route('documentation.index') }}">Index</a></li>
            </ul>
        </div>
        <div class="uk-width-3-5">
            <article class="uk-article">
                <h1 class="uk-article-title theme-text">Welcome to Activator documentation!</h1>
                <p class="uk-article-lead">
                    Activator is our module for controlling all the devices in your system
                    with the convience of your computer/phone wherever you might be. 
                    Here you will find all the neccassary information on using and maintaining 
                    Activator.
                </p>
                <p>
                    Please select one of the title on the left for help on the item you need.
                </p>
            </article>
        </div>
        <div class="uk-width-1-3"></div>
    </div>
@endsection