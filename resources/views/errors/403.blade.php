@extends('layouts.frontend')

@section('title', 'Forbidden page - SME Business Review™')

@section('content')



<section class="error-page">
    <div class="error-page-wrapper">
        <h2>403</h2>
        <h6>Forbidden page</h6>
        <p>
            You're not allowed to this page.
        </p>
        <a href="{{ url('/') }}" class="button">Home page</a>
    </div>
</section>


@endsection
