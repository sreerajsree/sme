@extends('layouts.frontend')

@section('title', 'Advertise - SME Business Review')

@section('meta')
    <meta name="description"
        content="Advertise - SME Business Review">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="Advertise - SME Business Review">
    <meta property="og:image" content="{{ asset('logo/image.webp') }}">
    <meta property="og:title" content="Advertise - SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://smebusinessreview.com/">
    <meta property="twitter:title" content="Advertise - SME Business Review">
    <meta property="twitter:description"
        content="Advertise - SME Business Review">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ asset('logo/image.webp') }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
@endsection

@section('content')

    <div class="content-section">
        <div class="container-main about">
            <div class="row">
                <div class="content">
                    <h1 class="header-title">Advertise</h1>
                
                </div>
            </div>
        </div>
    </div>

@endsection
