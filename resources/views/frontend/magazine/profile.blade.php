@extends('layouts.frontend')

@section('title', $profile->title. '| SME Business Review')

@section('meta')
    <meta name="description"
        content="{{ $profile->description }}">
    <meta name="keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="news_keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="{{ $profile->description }}">
    <meta property="og:image" content="{{ Storage::url('magazines/' . $profile->mag_year . '/' . $profile->mag_issue . '/' . $profile->mag_type . '/profiles/' . $profile->image) }}">
    <meta property="og:title" content="{{ $profile->title }} | SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review™">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="{{ $profile->title }} | SME Business Review">
    <meta property="twitter:description"
        content="{{ $profile->description }}">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ Storage::url('magazines/' . $profile->mag_year . '/' . $profile->mag_issue . '/' . $profile->mag_type . '/profiles/' . $profile->image) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
    {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "{{ $profile->description }}",
                "url": "{{ url()->current() }}",
                "name": "{{ $profile->title }} | SME Business Review",
                "publisher": {
                    "@id": "http://smebusinessreview.com/"
                },
                "copyrightHolder": {
                    "@id": "http://smebusinessreview.com/"
                },
                "sourceOrganization": {
                    "@type": "Organization",
                    "@id": "http://smebusinessreview.com/"
                },
                "copyrightYear": "{{ date('Y') }}"
            }
        }
</script>
@endsection

@section('content')

    <div class="container-main pb-5">
        <div class="content-section">
            <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title">{{ $profile->mag_name }}</span></h2>
            <div class="profile-image">
                <img class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ Storage::url('magazines/' . $profile->mag_year . '/' . $profile->mag_issue . '/' . $profile->mag_type . '/profiles/' . $profile->image) }}"
                    alt="{{ $profile->title }}">
            </div>
            <h1 class="pr-title">{{ $profile->name }}</h1>
            <p class="fst-italic pb-4">{{ $profile->subtitle }}</p>
            <div class="pr-content">
                {!! $profile->body !!}
            </div>
        </div>
    </div>
    @include('frontend.post.includes.recommended')
@endsection
