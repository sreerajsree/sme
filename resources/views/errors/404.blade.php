@extends('layouts.frontend')

@section('title', 'Page not found - SME Business Review™')

@section('content')



<section class="error-page">
    <div class="error-page-wrapper">
        <h2>404</h2>
        <h6>Page not found</h6>
        <p>
            The page details you entered may be incorrect or the page was removed.
        </p>
        <a href="{{ url('/') }}" class="button">Home page</a>
    </div>
</section>

@endsection
