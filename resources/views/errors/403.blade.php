@extends('layouts.frontend')

@section('title', 'Forbidden page')

@section('content')

<!-- Title jumbotron -->
<section class="title-jumbotron">
    <div class="parallax-text">
        <h1>Forbidden page</h1>
    </div>
</section>
<!-- /.Title jumbotron -->

<!-- Error page -->
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
<!-- /.Error page -->

@endsection
