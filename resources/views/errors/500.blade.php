@extends('layouts.frontend')

@section('title', 'Something went wrong - SME Business Review™')

@section('content')


<section class="error-page">
    <div class="error-page-wrapper">
        <h2>500</h2>
        <h6>Something went wrong.</h6>
        <p>
            We've been notified and will try to fix the problem as soon as possible.
        </p>
        <a href="{{ url('/') }}" class="button">Home page</a>
    </div>
</section>


@endsection
