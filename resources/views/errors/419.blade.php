@extends('layouts.frontend')

@section('title', 'Page expired - SME Business Review™')

@section('content')


<section class="error-page">
    <div class="error-page-wrapper">
        <h2>419</h2>
        <h6>Page expired</h6>
        <p>
            Sorry, your session has expired. Please refresh and try again.
        </p>
        <a href="{{ url('/') }}" class="button">Home page</a>
    </div>
</section>

@endsection
